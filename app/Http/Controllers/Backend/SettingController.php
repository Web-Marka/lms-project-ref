<?php

namespace App\Http\Controllers\Backend;

use App\Models\Faq;
use App\Models\Title;
use App\Models\Hakkimizda;
use App\Models\SiteSetting;
use App\Models\SmtpSetting;
use App\Models\Sozlesmeler;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SettingController extends Controller
{
    public function SmtpSetting()
    {
        $smtp = SmtpSetting::find(1);
        return view('admin.backend.setting.smtp_update', compact('smtp'));
    }

    public function UpdateSmtp(Request $request)
    {
        $smtp_id = $request->id;
        SmtpSetting::find($smtp_id)->update([
            'mailer' => $request->mailer,
            'host' => $request->host,
            'port' => $request->port,
            'username' => $request->username,
            'password' => $request->password,
            'encryption' => $request->encryption,
            'from_address' => $request->from_address,
        ]);

        $notification = array(
            'message' => 'SMTP Ayarları Başarılı Şekilde Güncellendi.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SiteSetting()
    {
        $siteSetting = SiteSetting::find(1);
        return view('admin.backend.setting.site_setting', compact('siteSetting'));
    }

    public function UpdateSiteSetting(Request $request)
    {
        $site_id = $request->id;

        if ($request->file('logo')) {
            $file = $request->file('logo');

            // Sadece PNG ve SVG formatlarını kabul et
            if ($file->getClientOriginalExtension() === 'png' || $file->getClientOriginalExtension() === 'svg') {
                $name_generate = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

                // Resmin kaydedileceği yol
                $save_path = base_path('public/upload/logo/' . $name_generate);

                // Yüklenen dosyayı doğrudan belirtilen yola taşı
                $file->move(public_path('upload/logo'), $name_generate);

                $save_url = 'upload/logo/' . $name_generate;

                // Site ayarlarını güncelle
                SiteSetting::find($site_id)->update([
                    'telefon' => $request->telefon,
                    'email' => $request->email,
                    'adres' => $request->adres,
                    'instagram' => $request->instagram,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'copyright' => $request->copyright,
                    'footer_description' => $request->footer_description,
                    'logo' => $save_url,
                ]);

                $notification = [
                    'message' => 'Site Ayarları Başarılı Şekilde Güncellendi.',
                    'alert-type' => 'success'
                ];
            } else {
                // Desteklenmeyen dosya türü için hata iletisi gönder
                $notification = [
                    'message' => 'Sadece PNG ve SVG formatları desteklenmektedir.',
                    'alert-type' => 'error'
                ];
            }
        } else {
            // Dosya yüklenmemişse mevcut site ayarlarını güncelle
            SiteSetting::find($site_id)->update([
                'telefon' => $request->telefon,
                'email' => $request->email,
                'adres' => $request->adres,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,
                'footer_description' => $request->footer_description,
            ]);

            $notification = [
                'message' => 'Site Ayarları Başarılı Şekilde Güncellendi.',
                'alert-type' => 'success'
            ];
        }

        // Yönlendirme ve bildirimler
        return redirect()->route('admin.site.setting')->with($notification);
    }

    public function Sozlesmeler()
    {
        $sozlesmeler = Sozlesmeler::find(1);
        return view('admin.backend.setting.sozlesmeler', compact('sozlesmeler'));
    }

    public function GizlilikPolitikasiStore(Request $request)
    {
        $sozlesme_id = $request->id;
        Sozlesmeler::find($sozlesme_id)->update([
            'gizlilik_politikasi' => $request->gizlilik_politikasi,
        ]);

        $notification = array(
            'message' => 'Sözleşme Güncellendi.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function CerezPolitikasiStore(Request $request)
    {
        $sozlesme_id = $request->id;
        Sozlesmeler::find($sozlesme_id)->update([
            'cerez_politikasi' => $request->cerez_politikasi,
        ]);

        $notification = array(
            'message' => 'Sözleşme Güncellendi.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function MesafeliSatisSozlesmesiStore(Request $request)
    {
        $sozlesme_id = $request->id;
        Sozlesmeler::find($sozlesme_id)->update([
            'mesafeli_satis_sozlesmesi' => $request->mesafeli_satis_sozlesmesi,
        ]);

        $notification = array(
            'message' => 'Sözleşme Güncellendi.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function Faq()
    {
        $sss_content = Faq::where('id', '!=', 1)->latest()->get();
        return view('admin.backend.setting.faq', compact('sss_content'));
    }

    public function FaqTitle()
    {
        $faq_main_title = Faq::find(1);
        return view('admin.backend.setting.faq_title', compact('faq_main_title'));
    }

    public function FaqMainTitleStore(Request $request)
    {
        $faq_id = $request->id;
        Faq::find($faq_id)->update([
            'faq_main_title' => $request->faq_main_title,
        ]);

        $notification = array(
            'message' => 'Sıkça Sorulan Sorular Başlığı Güncellendi.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.faq')->with($notification);
    }

    public function FaqEkle()
    {
        return view('admin.backend.setting.faq_add');
    }

    public function FaqEklePost(Request $request)
    {
        $rules = [
            'faq_title' => 'required',
            'faq_content' => 'required',
        ];

        $request->validate($rules);

        Faq::insert([
            'faq_title' => $request->faq_title,
            'faq_content' => $request->faq_content,
        ]);

        $notification = array(
            'message' => 'Sıkça Sorulan Sorular İçeriği Eklendi.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.faq')->with($notification);
    }

    public function FaqDuzenle($id)
    {
        $faq_duzenle = Faq::find($id);
        return view('admin.backend.setting.faq_edit', compact('faq_duzenle'));
    }

    public function FaqUpdate(Request $request)
    {
        $faq_content_id = $request->id;
        Faq::find($faq_content_id)->update([
            'faq_title' => $request->faq_title,
            'faq_content' => $request->faq_content,
        ]);

        $notification = array(
            'message' => 'Sıkça Sorulan Sorular İçeriği Güncellendi.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.faq')->with($notification);
    }

    public function FaqSil($id)
    {
        $item = Faq::find($id);
        Faq::find($id)->delete();

        $notification = array(
            'message' => 'Sıkça Sorulan Sorular İçeriği Silindi.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.faq')->with($notification);
    }

    public function AdminHakkimizda()
    {
        $hakkimizda = Hakkimizda::find(1);
        return view('admin.backend.setting.hakkimizda', compact('hakkimizda'));
    }

    public function AdminHakkimizdaUpdate(Request $request)
    {
        $hakkimizda_id = $request->hakkimizda_id;

        if ($request->hasFile('img_small')) {
            $manager = new ImageManager(new Driver());
            $name_generate = hexdec(uniqid()) . '.' . $request->file('img_small')->getClientOriginalExtension();
            $hakkimizdaImage = $manager->read($request->file('img_small'));
            $hakkimizdaImage->save(public_path('upload/hakkimizda/' . $name_generate));

            $save_url['img_small'] = 'upload/hakkimizda/' . $name_generate;
        }

        if ($request->hasFile('img_medium')) {
            $manager = new ImageManager(new Driver());
            $name_generate = hexdec(uniqid()) . '.' . $request->file('img_medium')->getClientOriginalExtension();
            $hakkimizdaImage = $manager->read($request->file('img_medium'));
            $hakkimizdaImage->save(public_path('upload/hakkimizda/' . $name_generate));

            $save_url['img_medium'] = 'upload/hakkimizda/' . $name_generate;
        }

        if ($request->hasFile('img_large')) {
            $manager = new ImageManager(new Driver());
            $name_generate = hexdec(uniqid()) . '.' . $request->file('img_large')->getClientOriginalExtension();
            $hakkimizdaImage = $manager->read($request->file('img_large'));
            $hakkimizdaImage->save(public_path('upload/hakkimizda/' . $name_generate));

            $save_url['img_large'] = 'upload/hakkimizda/' . $name_generate;
        }

        $updateData = [
            'main_title' => $request->main_title,
            'main_desc' => $request->main_desc,
            'main_mini_title_first' => $request->main_mini_title_first,
            'main_mini_title_first_desc' => $request->main_mini_title_first_desc,
            'main_mini_title_second' => $request->main_mini_title_second,
            'main_mini_title_second_desc' => $request->main_mini_title_second_desc,
            'second_title' => $request->second_title,
            'second_desc' => $request->second_desc,
            'third_title' => $request->third_title,
            'third_desc_one' => $request->third_desc_one,
            'third_desc_two' => $request->third_desc_two,
        ];

        if (!empty($save_url)) {
            $updateData = array_merge($updateData, $save_url);
        }

        Hakkimizda::find(1)->update($updateData);

        $notification = array(
            'message' => 'Hakkımızda Sayfa Bilgileri Güncellendi.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AdminBasliklar ()
    {
        $basliklar = Title::find(1);
        return view('admin.backend.setting.title_setting', compact('basliklar'));

    }

    public function AdminBasliklarUpdate(Request $request)
    {
        $titles_id = $request->titles_id;

        if ($request->hasFile('main_image')) {
            $manager = new ImageManager(new Driver());
            $name_generate = hexdec(uniqid()) . '.' . $request->file('main_image')->getClientOriginalExtension();
            $mainImage = $manager->read($request->file('main_image'));
            $mainImage->save(public_path('upload/' . $name_generate));

            $save_url['main_image'] = 'upload/' . $name_generate;
        }

        $updateData = [
            'banner_text_first' => $request->banner_text_first,
            'banner_text_second' => $request->banner_text_second,
            'badge_title' => $request->badge_title,
            'h1_title' => $request->h1_title,
            'h1_desc' => $request->h1_desc,
            'category_badge' => $request->category_badge,
            'category_title' => $request->category_title,
            'counter_badge' => $request->counter_badge,
            'counter_title' => $request->counter_title,
            'counter_first' => $request->counter_first,
            'counter_first_desc' => $request->counter_first_desc,
            'counter_second' => $request->counter_second,
            'counter_second_desc' => $request->counter_second_desc,
            'counter_third' => $request->counter_third,
            'counter_third_desc' => $request->counter_third_desc,
            'counter_fourth' => $request->counter_fourth,
            'counter_fourth_desc' => $request->counter_fourth_desc,
        ];

        if (!empty($save_url)) {
            $updateData = array_merge($updateData, $save_url);
        }

        Title::find(1)->update($updateData);

        $notification = array(
            'message' => 'İçerik Güncellendi.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
