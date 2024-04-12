<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Instructor Dashboard - WebMarka LMS Tema</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/dist/font/bootstrap-icons.css" rel="stylesheet">


    <style>
        body {
            background-image: url('https://example.com/your-background-image.jpg');
            background-size: cover;
            background-position: center;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
            margin: 0; /* Margin reset for the body */
            padding: 0; /* Padding reset for the body */
        }

        .invoice-box {
            max-width: 800px;
            margin: 50px auto; /* Added margin for better centering */
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #555;
            background-color: #fff;
            border-radius: 10px; /* Added border-radius for a modern look */
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 10px; /* Increased padding for better spacing */
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 20px; /* Adjusted padding for better spacing */
        }

        .invoice-box table tr.heading td {
            background: #f5f5f5; /* Changed background color for heading */
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 10px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
            background: #f5f5f5; /* Changed background color for total */
        }

        .line {
            border: 1px solid #ddd; /* Line'ın stilini belirledik */
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table class="table">
            <tr class="top">
                <td colspan="3">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('frontend/assets/images/logo/logo.png') }}" style="width: 117px; max-width: 350px" alt="LOGO" />
                            </td>

                            <td>
                                <div>
                                    <div>Fatura #: {{ $payment->invoice_no }}</div>
                                    <div>Fatura Tarihi: {{ $payment->order_date }}</div>
                                    <div>Sipariş Tarihi: {{ $payment->order_date }}</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="3">
                    <table>
                        <tr>
                            <td>
                                <div>
                                    <div>Sparksuite, Inc.</div>
                                    <div>12345 Sunny Road</div>
                                    <div>Sunnyville, CA 12345</div>
                                </div>
                            </td>

                            <td>
                                <div>
                                    <div>{{ $payment->name }}</div>
                                    <div>{{ $payment->phone }}</div>
                                    <div>{{ $payment->email }}</div>
                                    <div>{{ $payment->address }}</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td class="text-start">Kurs Görseli</td>
                <td class="text-center">Kurs Adı</td>
                <td class="text-end">Fiyat</td>
            </tr>

            @foreach ($orderItem as $item)
                <tr class="item">
                    <td class="text-start"><img src="{{ public_path($item->course->course_image) }}" height="65" width="120"></td>
                    <td class="text-center">{{ $item->course->course_name }}</td>
                    <td class="text-end">{{ $item->price }} TL</td>
                </tr>
            @endforeach

            <tr class="item">
                <td colspan="2"></td>
                <td><strong> Kupon:</strong> $385.00</td>
            </tr>
            <tr class="item">
                <td colspan="2"></td>
                <td><strong> İndirim Tutarı:</strong> $385.00</td>
            </tr>
            <tr class="item">
                <td colspan="2"></td>
                <td><strong>Toplam:</strong> {{ $payment->total_amount }}</td>
            </tr>
        </table>

        <div class="footer mt-5">
            <hr class="line">

            <div class="footer-info d-flex justify-content-between">
                <div class="contact-info text-start">
                    <p>+90(550) 456-7890</p>
                </div>
                <div class="contact-info text-center">
                    <p>info@webmarka.com</p>
                </div>
                <div class="contact-info text-end">
                    <p>123 Main Street, Sunnyville, CA 12345</p>
                </div>
            </div>
        </div>

    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
