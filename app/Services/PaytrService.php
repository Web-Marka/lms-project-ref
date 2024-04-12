<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class PaytrService{
    private $merchantId;
    private $merchantSalt;
    private $merchantKey;
    private $merchantOid;
    private $paymentAmount;
    private $paymentType;
    private $installmentCount;
    private $noInstallment;
    private $maxInstallment;
    private $currency;
    private $testMode;
    private $non3d;
    private $userIp;
    private $clientLang;
    private $non3dTestFailed;
    private $postUrl;
    private $debug;
    private $userBasket;
    private $token;
    private $merchantOkUrl;
    private $merchantFailUrl;
    private $email;

    public function __construct()
    {
        $this->merchantId = env('PAYTR_MERCHANT_ID');
        $this->merchantKey = env('PAYTR_MERCHANT_KEY');
        $this->merchantSalt = env('PAYTR_MERCHANT_SALT');
        $this->merchantOkUrl = url('/payment/credit-card/basarili');
        $this->merchantFailUrl = url('/payment/credit-card/basarisiz');
    }

    public function basket($carts)
    {
        $this->userBasket = [];
            foreach ($carts as $cartItem)
            {
                $product = [
                    $cartItem->name,  // Ürün adı
                    $cartItem->price, // Ürün fiyatı
                    $cartItem->qty,   // Ürün adedi
                ];
            array_push($this->userBasket, $product);
            }

        return $this->userBasket = htmlentities(json_encode($product));
    }

    public function generateToken()
    {
        $hash_str = $this->merchantId . $this->userIp . $this->merchantOid . $this->email . $this->paymentAmount . $this->paymentType . $this->installmentCount. $this->currency. $this->testMode. $this->non3d;
        $this->token = base64_encode(hash_hmac('sha256', $hash_str . $this->merchantSalt, $this->merchantKey, true));
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getPostData($request, $data, $carts, $cartTotal)
    {
        $basketArray = $this->basket($carts);
        $this->userBasket = $basketArray;
        $this->merchantOid = rand();
        $this->paymentAmount = round($cartTotal);
        $this->paymentType = 'card';
        $this->non3dTestFailed = '0';
        $this->email = $data['email'] ?? 'testnon3d@paytr.com';
        $this->installmentCount = "0";
        $this->noInstallment = "1";
        $this->maxInstallment = "0";
        $this->currency = '';
        $this->testMode = "1";
        $this->non3d = "0";
        $this->debug = "1";
        $this->clientLang = "tr";
        $this->userIp = request()->ip();
        $this->postUrl = "https://www.paytr.com/odeme";

        $this->generateToken();

        return [
            'card_type' => $this->paymentType,
            'cc_owner' => $request['cc_owner'],
            'card_number' => $request['card_number'],
            'expiry_month' => $request['expiry_month'],
            'expiry_year' => $request['expiry_year'],
            'cvv' => $request['cvv'],
            'merchant_id' => $this->merchantId,
            'user_ip' => $this->userIp,
            'merchant_oid' => $this->merchantOid,
            'payment_amount' => $this->paymentAmount,
            'payment_type' => $this->paymentType,
            'currency' => $this->currency,
            'test_mode' => $this->testMode,
            'merchant_ok_url' => $this->merchantOkUrl,
            'merchant_fail_url' => $this->merchantFailUrl,
            'email' => $data['email'],
            'user_name' => $data['name'],
            'user_address' => $data['address'] . ' ' . $data['town'] . '/' . $data['city'],
            'user_phone' =>$data['phone'],
            'user_basket' =>$this->userBasket,
            'non3d' => $this->non3d,
            'installment_count' => $this->installmentCount,
            'no_installment' => $this->noInstallment,
            'max_installment' => $this->maxInstallment,
            'lang' => $this->clientLang,
            'non3d_test_failed' => $this->non3dTestFailed,
            'debug_on' => $this->debug,
            'paytr_token' => $this->token,
        ];
    }

    public function sendData($request, $data, $carts, $cartTotal)
    {
        $postData = $this->getPostData($request, $data, $carts, $cartTotal);

        dd($postData);
        $response = Http::asForm()->post($this->postUrl, $postData);

        if ($response->successful()) {
            // PAYTR ile başarılı bir şekilde iletişim kuruldu
            $responseContent = $response->body();

            Log::info("PAYTR Response: " . $responseContent);

            return view('frontend.sepetim.payment_ok', ['responseContent' => $responseContent]);
        } else {

            Log::error('Failed to send request to PAYTR: ' . $response->status());

            throw new \Exception('Failed to send request to PAYTR: ' . $response->status());
        }
    }

}
