<?php

use App\Http\Controllers\FrontHome;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SolutionsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\QAController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DonationDashboardController;
use App\Http\Controllers\LocaleController;


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});
// ──────────────────────────────────────────────────────────────────────────────
//  AUTH
// ──────────────────────────────────────────────────────────────────────────────

// Registration is disabled — this site has no public sign-up
Auth::routes(['register' => false]);

// ──────────────────────────────────────────────────────────────────────────────
//  DASHBOARD (requires login)
// ──────────────────────────────────────────────────────────────────────────────

Route::middleware('auth')->group(function () {

    // ── Overview ──────────────────────────────────────────────────────────────
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    Route::get('/dashboard/convert-glob', [ProductsController::class, 'globTe']);


    Route::get('/dashboard/convert-webp', [ProductsController::class, 'convertToWebP'])
     ->name('dashboard.convert.webp');

    // ── Sliders ───────────────────────────────────────────────────────────────
    Route::get   ('/dashboard/slider',                  [SliderController::class, 'index']  )->name('slider.show');
    Route::get   ('/dashboard/slider/create',           [SliderController::class, 'create'] )->name('slider.create');
    Route::post  ('/dashboard/slider/store',            [SliderController::class, 'store']  )->name('slider.store');
    Route::get   ('/dashboard/slider/{slider}/edit',    [SliderController::class, 'edit']   )->name('slider.edit');
    Route::post  ('/dashboard/slider/{slider}/update',  [SliderController::class, 'update'] )->name('slider.update');
    Route::delete('/dashboard/slider/{slider}/delete',  [SliderController::class, 'destroy'])->name('slider.destroy');

    // ── Clients (stat cards) ──────────────────────────────────────────────────
    Route::get   ('/dashboard/client',                  [ClientController::class, 'index']  )->name('client.show');
    Route::get   ('/dashboard/client/create',           [ClientController::class, 'create'] )->name('client.create');
    Route::post  ('/dashboard/client/store',            [ClientController::class, 'store']  )->name('client.store');
    Route::get   ('/dashboard/client/{client}/edit',    [ClientController::class, 'edit']   )->name('client.edit');
    Route::post  ('/dashboard/client/{client}/update',  [ClientController::class, 'update'] )->name('client.update');
    Route::delete('/dashboard/client/{client}/delete',  [ClientController::class, 'destroy'])->name('client.destroy');

    // ── Partners ──────────────────────────────────────────────────────────────
    Route::get   ('/dashboard/partner',                   [PartnerController::class, 'index']  )->name('partner.show');
    Route::get   ('/dashboard/partner/create',            [PartnerController::class, 'create'] )->name('partner.create');
    Route::post  ('/dashboard/partner/store',             [PartnerController::class, 'store']  )->name('partner.store');
    Route::get   ('/dashboard/partner/{partner}/edit',    [PartnerController::class, 'edit']   )->name('partner.edit');
    Route::post  ('/dashboard/partner/{partner}/update',  [PartnerController::class, 'update'] )->name('partner.update');
    Route::delete('/dashboard/partner/{partner}/delete',  [PartnerController::class, 'destroy'])->name('partner.destroy');

    // ── Addresses ─────────────────────────────────────────────────────────────
    Route::get   ('/dashboard/address',                   [AddressController::class, 'index']  )->name('address.show');
    Route::get   ('/dashboard/address/create',            [AddressController::class, 'create'] )->name('address.create');
    Route::post  ('/dashboard/address/store',             [AddressController::class, 'store']  )->name('address.store');
    Route::get   ('/dashboard/address/{address}/edit',    [AddressController::class, 'edit']   )->name('address.edit');
    Route::post  ('/dashboard/address/{address}/update',  [AddressController::class, 'update'] )->name('address.update');
    Route::delete('/dashboard/address/{address}/delete',  [AddressController::class, 'destroy'])->name('address.destroy');

    // ── Settings ──────────────────────────────────────────────────────────────
    Route::get   ('/dashboard/setting',                   [SettingController::class, 'index']  )->name('setting.show');
    Route::get   ('/dashboard/setting/{setting}/edit',    [SettingController::class, 'edit']   )->name('setting.edit');
    Route::post  ('/dashboard/setting/{setting}/update',  [SettingController::class, 'update'] )->name('setting.update');
    Route::delete('/dashboard/setting/{setting}/delete',  [SettingController::class, 'destroy'])->name('setting.destroy');

    // ── Solutions ─────────────────────────────────────────────────────────────
    Route::get   ('/dashboard/solutions',                    [SolutionsController::class, 'index']  )->name('solution.show');
    Route::get   ('/dashboard/solutions/create',             [SolutionsController::class, 'create'] )->name('solution.create');
    Route::post  ('/dashboard/solutions/store',              [SolutionsController::class, 'store']  )->name('solution.store');
    Route::get   ('/dashboard/solutions/{solution}/edit',    [SolutionsController::class, 'edit']   )->name('solution.edit');
    Route::post  ('/dashboard/solutions/{solution}/update',  [SolutionsController::class, 'update'] )->name('solution.update');
    Route::delete('/dashboard/solutions/{solution}/delete',  [SolutionsController::class, 'destroy'])->name('solution.destroy');

    // ── Menu Items ────────────────────────────────────────────────────────────
    Route::get   ('/dashboard/menuItem',                    [MenuController::class, 'index']  )->name('menuItem.show');
    Route::get   ('/dashboard/menuItem/create',             [MenuController::class, 'create'] )->name('menuItem.create');
    Route::post  ('/dashboard/menuItem/store',              [MenuController::class, 'store']  )->name('menuItem.store');
    Route::get   ('/dashboard/menuItem/{menuItem}/edit',    [MenuController::class, 'edit']   )->name('menuItem.edit');
    Route::post  ('/dashboard/menuItem/{menuItem}/update',  [MenuController::class, 'update'] )->name('menuItem.update');
    Route::delete('/dashboard/menuItem/{menuItem}/delete',  [MenuController::class, 'destroy'])->name('menuItem.destroy');

    // ── Products ──────────────────────────────────────────────────────────────
    // NOTE: privacy and refund pages reuse ProductsController::index()
    //       which filters by type based on the route name
    Route::get('/dashboard/privacy', [ProductsController::class, 'index'])->name('privacy.show');
    Route::get('/dashboard/refund',  [ProductsController::class, 'index'])->name('refund.show');

    Route::get   ('/dashboard/fixedAllSlug',               [ProductsController::class, 'fixedAllSlug']   )->name('fixedAllSlug');
    Route::get   ('/dashboard/products',                   [ProductsController::class, 'index']  )->name('products.show');
    Route::get   ('/dashboard/products/create',            [ProductsController::class, 'create'] )->name('products.create');
    Route::post  ('/dashboard/products/store',             [ProductsController::class, 'store']  )->name('products.store');
    Route::get   ('/dashboard/products/{product}/edit',    [ProductsController::class, 'edit']   )->name('product.edit');
    Route::post  ('/dashboard/products/{product}/update',  [ProductsController::class, 'update'] )->name('product.update');
    Route::delete('/dashboard/products/{product}/delete',  [ProductsController::class, 'destroy'])->name('product.destroy');
    Route::delete('/dashboard/product-images/{productImage}', [ProductsController::class, 'deleteImage'])->name('product-image.delete');

    // ── Services ──────────────────────────────────────────────────────────────
    Route::get('/dashboard/services', [ServicesController::class, 'index'])->name('services.show');

    // ── Contacts ──────────────────────────────────────────────────────────────
    Route::get('/dashboard/contacts',     [ContactController::class, 'contacts']     )->name('contacts.show');
    Route::get('/dashboard/contacts/{id}',[ContactController::class, 'singleContact'])->name('contacts.single');

    // ── Paragraphs (reusable text blocks on the home page) ───────────────────
    Route::get ('/dashboard/pragraphs',                  [HomeController::class, 'paragraphs']      )->name('pragraphs.show');
    Route::get ('/dashboard/pragraphs/{pragraph}/edit',  [HomeController::class, 'paragraphsEdit']  )->name('pragraphs.edit');
    Route::post('/dashboard/pragraphs/{pragraph}/update',[HomeController::class, 'paragraphsUpdate'])->name('pragraphs.update');

    // ── Dynamic Pages ─────────────────────────────────────────────────────────
    Route::get ('/dashboard/pages/about', [PagesController::class, 'about'])->name('dashboard.pages.about');
    Route::post('/dashboard/pages/about', [PagesController::class, 'about'])->name('dashboard.pages.about1');

    // ── Articles ──────────────────────────────────────────────────────────────
    Route::get('/dashboard/articles', [HomeController::class, 'articles'])->name('dashboard.articles');

    Route::get('/dashboard/donations',          [DonationDashboardController::class, 'index'])->name('donations.index');
    Route::patch('/dashboard/donations/{id}',   [DonationDashboardController::class, 'updateStatus'])->name('donations.status');
    Route::delete('/dashboard/donations/{id}',  [DonationDashboardController::class, 'destroy'])->name('donations.destroy');
    Route::get('/dashboard/donations/export',   [DonationDashboardController::class, 'export'])->name('donations.export');


    // ── Logout ────────────────────────────────────────────────────────────────
    // FIX: logout should use POST (not GET) to protect against CSRF logout attacks.
    //      Keeping GET here for backward-compatibility; consider switching to POST.
    Route::get('/logout', [LoginController::class, 'logout']);
});

Route::get('/', [FrontHome::class, 'services'])->name('main');

// ── Static pages ─────────────────────────────────────────────────────────────
Route::get('/free-trail', fn () => view('frontend.freetrail'))->name('freetrial');
Route::get('/about-us',   fn () => view('frontend.about'))->name('about');
Route::view('/undercontstruction', 'frontend.underconstruction')->name('underconstruction');

// ── Redirects for old URLs (SEO: keeps external links alive) ─────────────────
Route::redirect('/Privacy-policy', '/privacy', 301);
Route::redirect('/refund-policy',  '/refundpolicy', 301);
Route::get('/privacy',      [FrontHome::class, 'pageBySlug'])->defaults('slug', 'privacy');
Route::get('/refundpolicy', [FrontHome::class, 'pageBySlug'])->defaults('slug', 'refund');

// ── Dynamic pages ─────────────────────────────────────────────────────────────
Route::get('/pages/{id}', [FrontHome::class, 'page'])->name('pages');

// ── Q&A ───────────────────────────────────────────────────────────────────────
Route::get('/indexQA', [QAController::class, 'index'])->name('indexQA');

// ── Products / News / Solutions / Services ───────────────────────────────────
Route::get('/product',    [FrontHome::class, 'Product']  )->name('product');
Route::get('/news',       [FrontHome::class, 'news']     )->name('news');
Route::get('/solutions',  [FrontHome::class, 'solutions'])->name('solutions');
Route::get('/services',   [FrontHome::class, 'service']  )->name('services');

// ── Articles, Clients, Partners ──────────────────────────────────────────────
Route::view('/articles', 'frontend.articles')->name('frontend.articles');
Route::get('/clients',   [FrontHome::class, 'clients'] )->name('frontend.clients');
Route::get('/partners',  [FrontHome::class, 'partners'])->name('frontend.partners');

// ── Contact ───────────────────────────────────────────────────────────────────
// Route::get ('/contact-us', [ContactController::class, 'index'] )->name('contact');
// Route::post('/contact-us', [ContactController::class, 'create'])->name('contact1');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// ── Single product (by slug) ──────────────────────────────────────────────────
Route::get('/product/{slug}', [FrontHome::class, 'show'])->name('single.product');

// ── Category grid ─────────────────────────────────────────────────────────────
Route::get('/category/{category}', [FrontHome::class, 'show1'])->name('category');

Route::get('/donate', [DonationController::class, 'index'])->name('donate');
Route::post('/donate', [DonationController::class, 'store'])->name('donate.store');


Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
Route::post('/settings/theme', [SettingsController::class, 'updateTheme'])->name('settings.theme');
Route::get('/locale/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

