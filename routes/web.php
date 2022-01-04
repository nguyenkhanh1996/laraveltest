<?php
use App\HTTP\Livewire\CategoryComponent;
use App\HTTP\Livewire\DetailsComponent;
use App\HTTP\Livewire\ContactComponent;
use App\HTTP\Livewire\Admin\AdminDashboardComponent;
use App\HTTP\Livewire\Admin\AdminCategoryComponent;
use App\HTTP\Livewire\Admin\AdminAddCategoryComponent;
use App\HTTP\Livewire\Admin\AdminEditCategoryComponent;
use App\HTTP\Livewire\Admin\AdminAddProductComponent;
use App\HTTP\Livewire\Admin\AdminEditProductComponent;
use App\HTTP\Livewire\Admin\AdminHomeSliderComponent;
use App\HTTP\Livewire\Admin\AdminOrderDetailsComponent;
use App\HTTP\Livewire\Admin\AdminAddHomeSliderComponent;
use App\HTTP\Livewire\Admin\AdminEditHomeSliderComponent;
use App\HTTP\Livewire\Admin\AdminHomeCategoryComponent;
use App\HTTP\Livewire\Admin\AdminCouponsComponent;
use App\HTTP\Livewire\Admin\AdminAddCouponsComponent;
use App\HTTP\Livewire\Admin\AdminEditCouponsComponent;
use App\HTTP\Livewire\Admin\AdminSaleComponent;
use App\HTTP\Livewire\Admin\AdminOrderComponent;
use App\HTTP\Livewire\Admin\AdminProductComponent;
use App\HTTP\Livewire\Admin\AdminContactComponent;
use App\HTTP\Livewire\Admin\AdminSettingComponent;
use App\HTTP\Livewire\User\UserDashboardComponent;
use App\HTTP\Livewire\User\UserOrdersComponent;
use App\HTTP\Livewire\User\UserOrderDetailsComponent;
use App\HTTP\Livewire\User\UserReviewComponent;
use App\HTTP\Livewire\User\UserChangePasswordComponent;
use App\HTTP\Livewire\WishlistComponent;
use App\HTTP\Livewire\ThankyouComponent;
use App\HTTP\Livewire\CheckoutComponent;
use App\HTTP\Livewire\CartComponent;
use App\HTTP\Livewire\ShopComponent;
use App\HTTP\Livewire\HomeComponent;
use App\HTTP\Livewire\SearchComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|`1
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class);

Route::get('/shop', ShopComponent::class);

Route::get('/cart', CartComponent::class)->name('product.cart');

Route::get('/checkout', CheckoutComponent::class);

Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');

Route::get('/search',SearchComponent::class)->name('product.search'); 

Route::get('/wishlist',WishlistComponent::class)->name('product.wishlist'); 

Route::get('/thank-you',ThankyouComponent::class)->name('thankyou'); 

Route::get('/contact-us',ContactComponent::class)->name('contact');
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// For User or Customers
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/orders', UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/orders/{order_id}', UserOrderDetailsComponent::class)->name('user.orderdetails');
    Route::get('/user/review/{order_item_id}', UserReviewComponent::class)->name('user.review');
    Route::get('/user/change-password', UserChangePasswordComponent::class)->name('user.changepassword');


});



// For Admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct');

    Route::get('/admin/slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slide_id}', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

    Route::get('/admin/home-categories', AdminHomeCategoryComponent::class)->name('admin.homecategories');
    Route::get('/admin/sale', AdminSaleComponent::class)->name('admin.sale');

    Route::get('/admin/coupons', AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/sale/add', AdminAddCouponsComponent::class)->name('admin.addcoupon');
    Route::get('/admin/sale/{coupon_id}', AdminEditCouponsComponent::class)->name('admin.editcoupon');
    Route::get('/admin/orders', AdminOrderComponent::class)->name('admin.orders');

    Route::get('/admin/orders/{order_id}', AdminOrderDetailsComponent::class)->name('admin.orderdetails');

    Route::get('/admin/contact-us',AdminContactComponent::class)->name('admin.contact');

    Route::get('/admin/settings',AdminSettingComponent::class)->name('admin.settings');



});