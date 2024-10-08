<?php

use Razorpay\Api\Product;
use App\Models\ImportErrorMessage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\BulkUploadController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\APIAuth\AuthController;
use App\Http\Controllers\APIAuth\ResetController;
use App\Http\Controllers\Auth\AuthViewController;
use App\Http\Controllers\Import\ImportController;
use App\Http\Controllers\APIAuth\ForgotController;
use App\Http\Controllers\APIAuth\ProductInventory;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\APIAuth\PaymentController;
use App\Http\Controllers\APIAuth\ProfileController;
use App\Http\Controllers\APIAuth\CategoryController;
use App\Http\Controllers\APIAuth\RegisterController;
use App\Http\Controllers\ImportErrorMessageController;
use App\Http\Controllers\APIAuth\VerificationController;
use App\Http\Controllers\APIAuth\ProductInvetoryController;
use App\Http\Controllers\APIAuth\BuyerRegistrationController;
use App\Http\Controllers\APIAuth\SupplierRegistraionController;

use App\Http\Controllers\Shine\ShineController;
use App\Http\Controllers\Shine\MyShineController;
use App\Http\Controllers\Shine\ShineCreditController;
use App\Http\Controllers\Shine\ProductController;

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

// Define the root route that returns the welcome view
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Define routes for buyer, supplier, and admin login and registration forms
Route::get('buyer/login', [AuthViewController::class, 'loginFormView'])->name('buyer.login');
Route::get('supplier/login', [AuthViewController::class, 'loginFormView'])->name('supplier.login');
Route::get('center/admin/login', [AuthViewController::class, 'adminloginFormView'])->name('admin.login');
Route::get('buyer/register', [AuthViewController::class, 'loginFormView'])->name('buyer.register');
Route::get('supplier/register', [AuthViewController::class, 'loginFormView'])->name('supplier.register');
Route::get('supplier/forget', [AuthViewController::class, 'loginFormView'])->name('supplier.forget');
Route::get('buyer/forget', [AuthViewController::class, 'loginFormView'])->name('buyer.forget');
Route::get('verify/show/email', [ResetController::class, 'showVerifyEmailForm'])->name('verification.email.verify');
Route::get('reset', [AuthViewController::class, 'loginFormView'])->name('password.reset');
Route::get('verify/email', [ResetController::class, 'showVerifyForm'])->name('verification.verify');
Route::get('thankyou', [AuthViewController::class, 'loginFormView'])->name('thankyou');
Route::get('payment-failed', [AuthViewController::class, 'loginFormView'])->name('payment.failed');


// Define routes for Google authentication
Route::group(['prefix' => 'auth/google', 'as' => 'auth.google.'], function () {
    Route::get('/', [GoogleController::class, 'redirectToGoogle'])->name('redirect');
    Route::get('/call-back', [GoogleController::class, 'handleGoogleCallback'])->name('callback');
});

Route::middleware(['auth', 'api', 'emailverified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('editProfile', [DashboardController::class, 'editProfile'])->name('edit.profile');
    Route::get('myInventory', [DashboardController::class, 'myInventory'])->name('my.inventory');
    Route::get('addInventory', [DashboardController::class, 'addInventory'])->name('add.inventory');
    Route::get('bulk-upload', [DashboardController::class, 'bulkUpload'])->name('bulk-upload');
    Route::get('bulk-upload-list', [DashboardController::class, 'bulkUploadList'])->name('bulk-upload.list');
    Route::get('editInventory/{variation_id}', [DashboardController::class, 'editInventory'])->name('edit.inventory');
});

// If we need blade file data and update directory in blade that time we will use this route
Route::middleware(['auth', 'api', 'emailverified'])->group(function () {
    Route::prefix('api')->group(function () {
        Route::get('/product/inventory', [ProductInvetoryController::class, 'index'])->name('product.inventory');
        Route::post('/update/company-profile', [DashboardController::class, 'updateCompanyDetails'])->name('company-profile.update');
        Route::post('/add-inventory', [ProductInvetoryController::class, 'addInventory'])->name('inventory.store');
        Route::post('update-inventory', [ProductInvetoryController::class, 'updateInventory'])->name('inventory.update');
        Route::get('/product/find-category', [CategoryController::class, 'findCategory']);
        Route::post('bulk/import-product-inventory', [ImportController::class, 'importFile'])->name('import-product-inventory');
        Route::get('/download-template', [BulkUploadController::class, 'downloadSampleTemplate'])->name('download-template');
        Route::get('/bulk-data', [ProductInvetoryController::class, 'getDataBulkInventory'])->name('bulk-data');
        Route::patch('/product/updateStock/{variation_id}', [ProductInvetoryController::class, 'updateStock'])->name('product.updateStock');
        Route::patch('/product/updateStatus/{variation_id}', [ProductInvetoryController::class, 'updateStatus'])->name('product.updateStatus');
        Route::get('import-error-message', [BulkUploadController::class, 'index'])->name('import-error-message'); // This route is not used in the application
    });
});

// If we use json post and get data that time we will use this route
Route::middleware(['api', 'jwt.auth', 'emailverified'])->group(function () {
    Route::prefix('api')->group(function () {
        // Define routes for jwt token refresh, user details, and logout
    });
});

// Route group for API authentication routes
Route::group(['prefix' => 'api'], function () {
    Route::post('register', [RegisterController::class, 'registerUser']);
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('password/forget', [ForgotController::class, 'sendResetLinkEmail']);
    Route::post('password/reset', [ResetController::class, 'reset']);
    Route::post('resend', [VerificationController::class, 'resend']);
    Route::post('verify', [VerificationController::class, 'verify'])->name('verify');
    Route::post('send-email-link', [VerificationController::class, 'sendEmailLink'])->name('sendEmailLink');
    Route::post('supplier/register', [SupplierRegistraionController::class, 'supplierPostData']);
    Route::post('buyer/register', [BuyerRegistrationController::class, 'buyerPostData']);

    // Razorpay payment gateway routes
    Route::post('create-payment', [PaymentController::class, 'createPayment'])->name('create.payment');
    Route::post('payment-success/callback', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
});

// Define routes for authenticated API routes
Route::middleware(['api', 'jwt.auth', 'emailverified'])->group(function () {
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

// Define routes for shine module routes
Route::middleware(['auth', 'api', 'emailverified'])->group(function () {
    Route::get('myShine', [MyShineController::class, 'my_shine'])->name('my-shine');
    Route::get('newShine', [MyShineController::class, 'new_shine'])->name('new-shine');
    Route::get('Shine', [ShineController::class, 'shine'])->name('shine');
    Route::post('/shine-products', [MyShineController::class, 'addShine'])->name('shine.store');
    Route::get('/fetch-shine-products', [ShineController::class, 'fetchShineProducts'])->name('fetch.shine.products');
    Route::get('/shine-batch-details/{batch_id}', [ShineController::class, 'showBatchDetails'])->name('shine.product.details');

    // shine module routes
    Route::get('assignedShine/Status_{id}', [MyShineController::class, 'complete_shine'])->name('complete-shine');
    Route::get('myShine/Status_{id}', [MyShineController::class, 'shine_status'])->name('shine-status');
    Route::get('/download-shine-order-invoice/{id}', [MyShineController::class, 'download_shine_order_invoice'])->name('download_shine_order_invoice.download');
    Route::get('/download-shine-screenshots/{id}', [MyShineController::class, 'download_shine_screenshots'])->name('download_shine_screenshots.download');
    Route::put('/shine-product-reviews1/{productId}', [MyShineController::class, 'update_product_review1']);
    Route::put('/shine-product-reviews2/{productId}', [MyShineController::class, 'update_product_review2']);
    Route::put('/shine-product-reviews3/{productId}', [MyShineController::class, 'update_product_review3']);
    Route::put('/shine-product-reviews4/{productId}', [MyShineController::class, 'update_product_review4']);

    // Route::get('/shine-credits', [ShineCreditController::class, 'showCredits']);
    // Route::get('/assigner/products', [ProductController::class, 'showAssignedProducts'])->name('assigner.products');
    // Route::get('/assigner/submit-order-details/{id}', [ProductController::class, 'showOrderDetailsForm'])->name('assigner.submitOrderDetailsForm');
    // Route::post('/assigner/submit-order-details', [ProductController::class, 'submitOrderDetails'])->name('assigner.submitOrderDetails');


});