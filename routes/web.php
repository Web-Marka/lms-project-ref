<?php

use App\Models\Review;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Backend\KuponController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\PaytrController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Frontend\WishlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'Index'])->name('index');

Route::get('/dashboard', function () {
    return view('frontend.dashboard.index');
})->middleware(['auth', 'roles:user', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::post('/user/profile/update', [UserController::class, 'UserProfileUpdate'])->name('user.profile.update');
    Route::post('/user/profile/password', [UserController::class, 'UserChangePassword'])->name('user.profile.password');

    // Kullanıcı Yorumları
    Route::controller(ReviewController::class)->group(function(){
        Route::get('/review','UserReview')->name('user.review');
        Route::get('/review/create/{course_id}','UserReviewCreate')->name('user.review.create');
        Route::post('/review','UserStoreReview')->name('store.review');
    });

    // Kullanıcı Siparişlerim
    Route::controller(UserController::class)->group(function(){
        Route::get('/user/all/order','UserOrder')->name('user.all.order');
        Route::get('/user/order/invoice/{payment_id}','UserOrderInvoice')->name('user.order.invoice');
    });

    // Kullanıcı Kursları
    Route::controller(OrderController::class)->group(function(){
        Route::get('/my/course','MyCourse')->name('my.course');
        Route::get('/course/view/{course_id}','CourseView')->name('course.view');
    });

    // İstek Listesi
    Route::controller(WishlistController::class)->group(function(){
        Route::get('/user/wishlist','AllWishlist')->name('user.wishlist');
        Route::get('/get-wishlist-course/','GetWishlistCourse');
        Route::get('/wishlist-remove/{id}','RemoveWishlist');
    });
});

require __DIR__.'/auth.php';

// Instructor Middleware
Route::middleware(['auth', 'roles:instructor'])->group(function (){
    Route::get('/instructor/dashboard', [InstructorController::class, 'InstructorDashboard'])->name('instructor.dashboard');
    Route::get('/instructor/logout', [InstructorController::class, 'InstructorLogout'])->name('instructor.logout');
    Route::get('/instructor/profile', [InstructorController::class, 'InstructorProfile'])->name('instructor.profile');
    Route::post('/instructor/profile/store', [InstructorController::class, 'InstructorProfileStore'])->name('instructor.profile.store');
    Route::post('/instructor/profile/password', [InstructorController::class, 'InstructorChangePassword'])->name('instructor.profile.password');
    Route::post('/instructor/profile/social', [InstructorController::class, 'InstructorProfileSocial'])->name('instructor.profile.social');

    // Kurs Ekle Metod
    Route::controller(CourseController::class)->group(function(){
        Route::get('/all/course','AllCourse')->name('all.course');
        Route::get('/add/course','AddCourse')->name('add.course');
        Route::get('/subcategory/ajax/{category_id}','GetSubCategory');
        Route::post('/store/course','StoreCourse')->name('store.course');
        Route::get('/edit/course/{id}','EditCourse')->name('edit.course');
        Route::post('/update/course','UpdateCourse')->name('update.course');
        Route::post('/update/course/image','UpdateCourseImage')->name('update.course.image');
        Route::get('/delete/course/{id}','DeleteCourse')->name('delete.course');
    });

    // Lecture Ekle Metod
    Route::controller(CourseController::class)->group(function(){
        Route::get('/add/course/lecture/{id}','AddCourseLecture')->name('add.course.lecture');
        Route::post('/add/course/section','AddCourseSection')->name('add.course.section');
        Route::post('/save-lecture','SaveLecture')->name('save-lecture');
        Route::get('/edit/lecture/{id}','EditLecture')->name('edit.lecture');
        Route::post('/update/lecture','UpdateLecture')->name('update.lecture');
        Route::get('/delete/lecture/{id}','DeleteLecture')->name('delete.lecture');
        Route::post('/delete/section/{id}','DeleteSection')->name('delete.section');
    });

    // Siparişler
    Route::controller(OrderController::class)->group(function(){
        Route::get('/instructor/all/order','InstructorOrder')->name('instructor.all.order');
        Route::get('/instructor/order/invoice/{payment_id}','InstructorOrderInvoice')->name('instructor.order.invoice');
    });

    // Kurs Yorumları
    Route::controller(ReviewController::class)->group(function(){
        Route::get('/instructor/all/review','InstructorAllReview')->name('instructor.all.review');
    });

});


// Admin Middleware
Route::middleware(['auth', 'roles:admin'])->group(function (){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::post('/admin/profile/password', [AdminController::class, 'AdminChangePassword'])->name('admin.profile.password');

    // Siparişler Rotası
    Route::controller(OrderController::class)->group(function(){
        Route::get('/admin/bekleyen/siparisler','BekleyenSiparisler')->name('admin.bekleyen.siparisler')->middleware('permission:siparisler.menu');
        Route::get('/admin/tamamlanan/siparisler','TamamlananSiparisler')->name('admin.tamamlanan.siparisler')->middleware('permission:siparisler.menu');
        Route::get('/admin/siparis/detay{id}','SiparisDetay')->name('admin.siparis.detay');
        Route::get('/siparis-onayla/{id}','SiparisOnayla')->name('siparis-onayla');
    });

    // Kurs Rotası
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/all/course','AdminAllCourse')->name('admin.all.course')->middleware('permission:kurs.menu');
        Route::post('/update/course/status','UpdateCourseStatus')->name('update.course.status');
        Route::get('/admin/course/details/{id}','AdminCourseDetails')->name('admin.course.details');
    });

    //Category Route
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/all/category','AllCategory')->name('all.category')->middleware('permission:category.menu');
        Route::get('/add/category','AddCategory')->name('add.category');
        Route::post('/store/category','StoreCategory')->name('store.category');
        Route::get('/edit/category/{id}','EditCategory')->name('edit.category');
        Route::post('/update/category','UpdateCategory')->name('update.category');
        Route::get('/delete/category/{id}','DeleteCategory')->name('delete.category');
    });

    //SubCategory Route
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/all/subcategory','AllSubCategory')->name('all.subcategory')->middleware('permission:category.menu');
        Route::get('/add/subcategory','AddSubCategory')->name('add.subcategory')->middleware('permission:category.menu');
        Route::post('/store/subcategory','StoreSubCategory')->name('store.subcategory');
        Route::get('/edit/subcategory/{id}','EditSubCategory')->name('edit.subcategory');
        Route::post('/update/subcategory','UpdateSubCategory')->name('update.subcategory');
        Route::get('/delete/subcategory/{id}','DeleteSubCategory')->name('delete.subcategory');
    });

    // Eğitmen Rotası
    Route::controller(AdminController::class)->group(function(){
        Route::get('/all/instructor','AllInstructor')->name('all.instructor')->middleware('permission:egitmen.menu');
        Route::post('/update/user/status','UpdateUserStatus')->name('update.user.status');
    });

    // Kullanıcı Rotası
    Route::controller(AdminUserController::class)->group(function(){
        Route::get('/all/user','AllUser')->name('all.user')->middleware('permission:kullanici.menu');
        Route::get('/active/all/instructor','ActiveAllInstructor')->name('active.all.instructor')->middleware('permission:kullanici.menu');
    });

    // Kupon Rotası
    Route::controller(KuponController::class)->group(function(){
        Route::get('/admin/kuponlar','Kuponlar')->name('admin.kuponlar')->middleware('permission:kuponlar.menu');
        Route::get('/admin/kupon/ekle','KuponEkle')->name('admin.kupon.ekle');
        Route::post('/admin/store/kupon','StoreKupon')->name('admin.store.kupon');
        Route::get('/admin/edit/kupon/{id}','EditKupon')->name('admin.edit.kupon');
        Route::post('/admin/update/kupon','UpdateKupon')->name('admin.update.kupon');
        Route::get('/admin/delete/kupon/{id}','DeleteKupon')->name('admin.delete.kupon');
    });

    // Site Ayarları
    Route::controller(SettingController::class)->group(function(){
        Route::get('/site/setting','SiteSetting')->name('admin.site.setting')->middleware('permission:site.setting.menu');
        Route::post('/update/site/setting','UpdateSiteSetting')->name('update.site.setting');
        Route::get('/smtp/setting','SmtpSetting')->name('smtp.setting');
        Route::post('/update/smtp','UpdateSmtp')->name('update.smtp');
    });

    // Raporlar
    Route::controller(ReportController::class)->group(function(){
        Route::get('/raporlar','Raporlar')->name('raporlar')->middleware('permission:raporlar.menu');
        Route::post('/gunluk/rapor','GunlukRapor')->name('gunluk.rapor');
        Route::post('/aylik/rapor','AylikRapor')->name('aylik.rapor');
        Route::post('/yillik/rapor','YillikRapor')->name('yillik.rapor');
    });

    // Kurs Yorumları
    Route::controller(ReviewController::class)->group(function(){
        Route::get('/pending/review','AdminPedingReview')->name('pending.review')->middleware('permission:kurs.yorumlari.menu');
        Route::get('/active/review','AdminActiveReview')->name('active.review')->middleware('permission:kurs.yorumlari.menu');
        Route::post('/update/review/status','UpdateReviewStatus')->name('update.review.status');
    });

    // Blog Kategori
    Route::controller(BlogController::class)->group(function(){
        Route::get('/blog/category','BlogCategory')->name('admin.blog.category')->middleware('permission:blog.menu');
        Route::get('/add/blog/category','AddBlogCategory')->name('add.blog.category')->middleware('permission:blog.menu');
        Route::get('/edit/blog/category/{id}','EditBlogCategory')->name('edit.blog.category');
        Route::post('/store/blog/category','StoreBlogCategory')->name('store.blog.category');
        Route::post('/update/blog/category','UpdateBlogCategory')->name('update.blog.category');
        Route::get('/delete/blog/category/{id}','DeleteBlogCategory')->name('delete.blog.category');
    });

    // Blog Yazı
    Route::controller(BlogController::class)->group(function(){
        Route::get('/blog/posts','Blog')->name('admin.blog.posts')->middleware('permission:blog.menu');
        Route::get('/add/blog/post','AddBlogPost')->name('add.blog.post')->middleware('permission:blog.menu');
        Route::get('/edit/blog/post/{id}','EditBlogPost')->name('edit.blog.post');
        Route::post('/store/blog/post','StoreBlogPost')->name('store.blog.post');
        Route::post('/update/blog/post','UpdateBlogPost')->name('update.blog.post');
        Route::get('/delete/blog/post/{id}','DeleteBlogPost')->name('delete.blog.post');
    });

    // İzinler
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/permission','AllPermission')->name('all.permission')->middleware('permission:roller.menu');
        Route::get('/add/permission','AddPermission')->name('add.permission')->middleware('permission:roller.menu');
        Route::post('/store/permission','StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}','EditPermission')->name('edit.permission');
        Route::post('/update/permission','UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}','DeletePermission')->name('delete.permission');
    });

    // Roller
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/roles','AllRoles')->name('all.roles')->middleware('permission:roller.menu');
        Route::get('/add/roles','AddRoles')->name('add.roles')->middleware('permission:roller.menu');
        Route::post('/store/roles','StoreRoles')->name('store.roles');
        Route::get('/edit/roles/{id}','EditRoles')->name('edit.roles');
        Route::post('/update/roles','UpdateRoles')->name('update.roles');
        Route::get('/delete/roles/{id}','DeleteRoles')->name('delete.roles');
    });

    // Roller ve İzinler
    Route::controller(RoleController::class)->group(function(){
        Route::get('/add/roles/permission','AddRolesPermission')->name('add.roles.permission')->middleware('permission:roller.menu');
        Route::post('/role/permission/store','RolePermissionStore')->name('role.permission.store')->middleware('permission:roller.menu');
        Route::get('/all/roles/permission','AllRolesPermission')->name('all.roles.permission');
        Route::get('/edit/roles/permission/{id}','EditRolesPermission')->name('edit.roles.permission');
        Route::post('/update/roles/permission/{id}','UpdateRolesPermission')->name('update.roles.permission');
        Route::get('/delete/roles/permission/{id}','DeleteRolesPermission')->name('delete.roles.permission');
    });

    // Yöneticiler
    Route::controller(AdminController::class)->group(function(){
        Route::get('/yoneticiler','Yoneticiler')->name('yoneticiler')->middleware('permission:yonetici.menu');
        Route::get('/yonetici/ekle','YoneticiEkle')->name('yonetici.ekle')->middleware('permission:yonetici.menu');
        Route::post('/yonetici/ekle/post','YoneticiEklePost')->name('yonetici.ekle.post');
        Route::get('/yonetici/duzenle/{id}','YoneticiDuzenle')->name('yonetici.duzenle');
        Route::post('/yonetici/update/{id}','YoneticiUpdate')->name('yonetici.update');
        Route::get('/yonetici/sil/{id}','YoneticiSil')->name('yonetici.sil');
    });

    // Sözleşmeler
    Route::controller(SettingController::class)->group(function(){
        Route::get('/sozlesmeler','Sozlesmeler')->name('admin.sozlesmeler');
        Route::post('/sozlesmeler/gizlilik-politikasi-store','GizlilikPolitikasiStore')->name('gizlilik.politikasi.store');
        Route::post('/sozlesmeler/cerez-politikasi-store','CerezPolitikasiStore')->name('cerez.politikasi.store');
        Route::post('/sozlesmeler/mesafeli-satis-sozlesmesi-store','MesafeliSatisSozlesmesiStore')->name('mesafeli.satis.sozlesmesi.store');
    });

    // Sıkça Sorulan Sorular
    Route::controller(SettingController::class)->group(function(){
        Route::get('/faq','Faq')->name('admin.faq');
        Route::get('/faq/title','FaqTitle')->name('admin.faq.title');
        Route::post('/faq/main-title-store','FaqMainTitleStore')->name('admin.faq.main.title.store');
        Route::get('/faq/ekle','FaqEkle')->name('faq.ekle');
        Route::post('/faq/ekle/post','FaqEklePost')->name('admin.add.faq');
        Route::get('/faq/duzenle/{id}','FaqDuzenle')->name('admin.edit.faq');
        Route::post('/faq/update/{id}','FaqUpdate')->name('admin.update.faq');
        Route::get('/faq/sil/{id}','FaqSil')->name('admin.delete.faq');
    });

    // Hakkımızda
    Route::controller(SettingController::class)->group(function(){
        Route::get('/admin/hakkimizda','AdminHakkimizda')->name('admin.hakkimizda');
        Route::post('/admin/hakkimizda/update','AdminHakkimizdaUpdate')->name('admin.hakkimizda.update');
    });

    // Başlık Ayarları
    Route::controller(SettingController::class)->group(function(){
        Route::get('/admin/basliklar','AdminBasliklar')->name('admin.basliklar');
        Route::post('/admin/basliklar/update','AdminBasliklarUpdate')->name('admin.basliklar.update');
    });
});

// Sepet İşlemleri
Route::controller(CartController::class)->group(function(){
    Route::get('/mycart','MyCart')->name('mycart');
    Route::get('/add-course-cart','GetCartCourse');
    Route::get('/cart/remove/{rowId}', 'RemoveCart');
});

// Ödeme İşlemleri
Route::get('/odeme', [CartController::class, 'Odeme'])->name('odeme');
Route::post('/payment', [CartController::class, 'Payment'])->name('payment');
Route::get('/payment/credit-card',[PaytrController::class,'CreditCardPage'])->name('credit.card.page');
Route::post('/payment/credit-card/send',[PaytrController::class,'CreditCardSend'])->name('credit.card.send');
Route::any('/payment/credit-card/basarili',[PaytrController::class,'Sonuc'])->name('payment.credit.card.basarili');
Route::any('/payment/credit-card/basarisiz',[PaytrController::class,'Sonuc'])->name('payment.credit.card.basarisiz');
Route::any('/payment/credit-card/bildirim',[PaytrController::class,'Bildirim'])->name('payment.credit.card.bildirim');

// Sepet İşlemleri
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
Route::post('/buy/course/{id}', [CartController::class, 'BuyToCart']);
Route::get('/cart/data/', [CartController::class, 'CartData']);
Route::get('/course/header/cart', [CartController::class, 'AddHeaderCart']);
Route::get('/headercart/course/remove/{rowId}', [CartController::class, 'RemoveHeaderCart']);
Route::post('/kupon-uygula', [CartController::class, 'KuponUygula']);
Route::get('/kupon-hesaplama', [CartController::class, 'KuponHesaplama']);
Route::get('/kupon-remove', [CartController::class, 'KuponRemove']);
Route::post('/add-to-wishlist/{course_id}', [WishlistController::class, 'AddToWishList']);
Route::post('/mark-notification-as-read/{notification}', [CartController::class, 'MarkAsRead']);

// Herkese Açık Rota
Route::get('/course/details/{slug}/{id}', [IndexController::class, 'CourseDetails']);
Route::get('/courses', [IndexController::class, 'AllCourses'])->name('instructor.courses');
Route::get('/filter-courses', [IndexController::class, 'FilterCourses'])->name('filter.courses');
Route::get('/search-courses', [IndexController::class, 'searchCourses'])->name('search.courses');
Route::get('/category/{slug}/{id}', [IndexController::class, 'CategoryCourse']);
Route::get('/subcategory/{slug}/{id}', [IndexController::class, 'SubCategoryCourse']);
Route::get('/instructor/details/{id}', [IndexController::class, 'InstructorDetails'])->name('instructor.details');

Route::get('/instructor/login', [InstructorController::class, 'InstructorLogin'])
    ->name('instructor.login')
    ->middleware(RedirectIfAuthenticated::class);
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])
    ->name('admin.login')
    ->middleware(RedirectIfAuthenticated::class);
Route::get('/become/instructor', [AdminController::class, 'BecomeInstructor'])->name('become.instructor');
Route::post('/instructor/register', [AdminController::class, 'InstructorRegister'])->name('instructor.register');

// Blog
Route::get('/blog', [BlogController::class, 'BlogPage'])->name('blog');
Route::get('/blog/details/{slug}', [BlogController::class, 'BlogDetails']);
Route::get('/blog/category/{id}', [BlogController::class, 'BlogCategoryPage']);

// Sayfalar
Route::get('/iletisim', [IndexController::class, 'Iletisim'])->name('iletisim');
Route::get('/hakkimizda', [IndexController::class, 'Hakkimizda'])->name('hakkimizda');
Route::get('/sikca-sorulan-sorular', [IndexController::class, 'SSS'])->name('sss');
Route::get('/gizlilik-politikasi', [IndexController::class, 'GizlilikPolitikasi'])->name('gizlilik.politikasi');
Route::get('/mesafeli-satis-sozlesmesi', [IndexController::class, 'MesafeliSatis'])->name('mesafeli.satis.sozlesmesi');
Route::get('/cerez-politikasi', [IndexController::class, 'CerezPolitikasi'])->name('cerez.politikasi');

