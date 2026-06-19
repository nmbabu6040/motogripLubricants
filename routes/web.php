<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\DealerInquiryController;
use App\Http\Controllers\Admin\DealerInquiryController as AdminDealerInquiryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\Frontend\SitemapController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Frontend\FrontendFaqController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Frontend\FrontendGalleryController;
use App\Http\Controllers\Admin\VideoGalleryController;
use App\Http\Controllers\Frontend\VideoController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Frontend\FrontendCategoryController;
use App\Http\Controllers\Frontend\FrontendSubCategoryController;
use App\Http\Controllers\ProductInquiryController;
use App\Http\Controllers\Admin\ProductInquiryManageController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Backend Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::delete(
        '/product-gallery/{image}',
        [ProductController::class, 'deleteGalleryImage']
    )->name('products.gallery.delete');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    Route::resource('sliders', SliderController::class);
    Route::get('/dealer-inquiries', [AdminDealerInquiryController::class, 'index'])->name('dealer.inquiries.index');
    Route::get(
        '/dealer-inquiries/{dealerInquiry}',
        [AdminDealerInquiryController::class, 'show']
    )->name('dealer.inquiries.show');
    Route::delete('/dealer-inquiries/{dealerInquiry}', [AdminDealerInquiryController::class, 'destroy'])->name('dealer.inquiries.destroy');
    Route::get('/contact-messages', [ContactMessageController::class, 'index'])->name('contact.messages.index');
    Route::get(
        '/contact-messages/{contactMessage}',
        [ContactMessageController::class, 'show']
    )->name('contact.messages.show');
    Route::delete('/contact-messages/{contactMessage}', [ContactMessageController::class, 'destroy'])->name('contact.messages.destroy');
    Route::resource('sub-categories', SubCategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('blogs', AdminBlogController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('video-galleries', VideoGalleryController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('menus', \App\Http\Controllers\Admin\MenuController::class);
    Route::get('/product-inquiries', [ProductInquiryManageController::class, 'index'])->name('product.inquiries.index');
    Route::get(
        '/product-inquiries/{productInquiry}',
        [ProductInquiryManageController::class, 'show']
    )->name('product.inquiries.show');
    Route::delete(
        '/product-inquiries/{productInquiry}',
        [ProductInquiryManageController::class, 'destroy']
    )->name('product.inquiries.destroy');
});


// Frontend routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dealer-inquiry', [DealerInquiryController::class, 'create'])->name('dealer.inquiry');
Route::post('/dealer-inquiry', [DealerInquiryController::class, 'store'])->name('dealer.inquiry.store');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/products/{slug}', [HomeController::class, 'productDetails'])->name('product.details');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/blogs', [FrontendBlogController::class, 'index'])->name('blogs');
Route::get('/blogs/{slug}', [FrontendBlogController::class, 'details'])->name('blog.details');
Route::get('/faqs', [FrontendFaqController::class, 'index'])->name('faqs');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/gallery', [FrontendGalleryController::class, 'index'])->name('gallery');
Route::get('/video-gallery', [VideoController::class, 'index'])->name('video.gallery');
Route::get('/category/{slug}', [FrontendCategoryController::class, 'show'])->name('category.show');
Route::get('/sub-category/{slug}', [FrontendSubCategoryController::class, 'show'])->name('subcategory.show');
Route::post('/product-inquiry', [ProductInquiryController::class, 'store'])->name('product.inquiry');








require __DIR__ . '/auth.php';
