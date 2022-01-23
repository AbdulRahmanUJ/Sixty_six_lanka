<?php

use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\Admin\PackageController as AdminPackageController;
use App\Http\Controllers\Admin\ReceiverController as AdminReceiverController;
use App\Http\Controllers\Admin\SenderController as AdminSenderController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Auth\RegisterController as AuthRegisterController;
use App\Http\Controllers\Contact_Admin_Controller;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceiverController;
use App\Http\Controllers\PackageTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Country_state_cityController;
use App\Http\Controllers\PreOrderController;
use App\Http\Controllers\Sender_Receiver_AddressController;
use App\Http\Controllers\SuperAdmin\CostController as SuperCostController;
use App\Http\Controllers\SuperAdmin\CountryController;
use App\Http\Controllers\SuperAdmin\ManageAdminController;
use App\Http\Controllers\SuperAdmin\PackageController as SuperAdminPackageController;
use App\Http\Controllers\SuperAdmin\PreOrderController as SuperAdminPreOrderController;
use App\Http\Controllers\SuperAdmin\ReceiverController as SuperAdminReceiverController;
use App\Http\Controllers\SuperAdmin\SenderController as SuperAdminSenderController;
use App\Http\Controllers\SuperAdmin\UserController as SuperAdminUserController;
use App\Http\Controllers\User_addressController;
use App\Http\Controllers\User_Receiver_addressController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class,'index']);
Route::get('/tracking', [WelcomeController::class,'tracking']);
Route::view('/calc', 'calc');


// Route::get('package/selectSearch', [PackageController::class,'selectSearch']);

Route::get('/senders', [AdminSenderController::class, 'searchsender']);
Route::get('autocomplete', [AdminSenderController::class, 'fetch'])->name('autocomplete');
// Route::get('autocomplete', [AutosearchController::class, 'action'])->name('autocomplete');


// email
Route::get('contact', [EmailController::class,'create']);
Route::get('contact/list', [EmailController::class,'index']);
Route::post('contact/send', [EmailController::class,'send_mail']);
Route::get('contact/store', [EmailController::class,'store']);
Route::get("contact/show/{id}", [EmailController::class,'show']);

Route::get('register', [AuthRegisterController::class,'showRegistrationForm']);


// aythentication
Auth::routes();

Route::get('/home', [HomeController::class, 'index']);
Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin.home');
Route::get('/superadmin/home', [HomeController::class, 'superadmin'])->name('superadmin.home');

Route::middleware(['auth'])->group(function () {

    // profile
    Route::get("/user/edit/{id}", [ProfileController::class,'edit']);
    Route::get("/user_address/add/{id}", [ProfileController::class,'add_address']);
    Route::post("/user_address/store/{id}", [ProfileController::class,'store_address']);
    Route::get("/user_address/edit/{id}", [ProfileController::class,'edit_address']);
    Route::patch("/user_address/update/{id}", [ProfileController::class,'update_address']);
    Route::delete("/user_address/delete/{id}", [ProfileController::class,'delete_address']);
    Route::patch("/user/{id}", [ProfileController::class,'update']);
    Route::put("/update_profile_image/{id}", [ProfileController::class,'update_profile_image']);
    Route::get("/delete_profile_image/{id}", [ProfileController::class,'delete_profile_image']);
    Route::delete("/user/delete/{id}", [ProfileController::class,'destroy']);

    // reciver
    Route::get('receiver', [User_Receiver_addressController::class,'index']);
    Route::get("receiver/create", [User_Receiver_addressController::class,'create']);
    Route::post("receiver", [User_Receiver_addressController::class,'store']);
    Route::get("receiver/show/{id}", [User_Receiver_addressController::class,'show']);
    Route::get("receiver/edit/{id}", [User_Receiver_addressController::class,'edit']);
    Route::patch("receiver/{id}", [User_Receiver_addressController::class,'update']);
    Route::delete("receiver/delete/{id}", [User_Receiver_addressController::class,'destroy']);

    // sender Address
    Route::get('/sender_address/add/{id}', [Sender_Receiver_AddressController::class,'user_add_senderAddress']);
    Route::post('/sender_address/store/{id}', [Sender_Receiver_AddressController::class,'user_store_senderAddress']);
    Route::get('/sender_address/edit/{id}', [Sender_Receiver_AddressController::class,'user_edit_senderAddress']);
    Route::patch('/sender_address/{id}', [Sender_Receiver_AddressController::class,'user_update_senderAddress']);
    Route::delete('/sender_address/delete/{id}', [Sender_Receiver_AddressController::class,'user_delete_sender_address']);

    // receiver Address
    Route::get('/receiver_address/add/{id}', [Sender_Receiver_AddressController::class,'user_add_receiverAddress']);
    Route::post('/receiver_address/store/{id}', [Sender_Receiver_AddressController::class,'user_store_receiverAddress']);
    Route::get('/receiver_address/edit/{id}', [Sender_Receiver_AddressController::class,'user_edit_receiverAddress']);
    Route::patch('/receiver_address/{id}', [Sender_Receiver_AddressController::class,'user_update_receiverAddress']);
    Route::delete('/receiver_address/delete/{id}', [Sender_Receiver_AddressController::class,'user_delete_receiver_address']);

    // User Address
    // Route::get('getUserAddress/{id}', [User_addressController::class,'userAddress']);

    // pre Order
    Route::get('/preorder', [PreOrderController::class,'index']);
    Route::get('/preorder/create', [PreOrderController::class,'create']);
    Route::get('/preOrder/show/{id}', [PreOrderController::class,'show']);
    Route::get('/preOrder/edit/{id}', [PreOrderController::class,'edit']);
    Route::patch('/pre_order_package/{id}', [PreOrderController::class,'update']);
    Route::post('/pre_order_package', [PreOrderController::class,'store']);
    Route::delete('/preOrderPackage/delete/{id}', [PreOrderController::class,'destroy']);
    Route::delete('/pre_order/delete/{id}', [PreOrderController::class,'order_destroy']);

    // email
    Route::get('/contact/admin/{id}', [Contact_Admin_Controller::class,'create']);
    Route::post('/contact/admin/send/{id}', [Contact_Admin_Controller::class,'send_mail']);
});

// Admin
Route::prefix('admin')->name('admin.')->group(function () {

  Route::middleware(['auth', 'checkStatus', 'admin'])->group(function () {
    //Admin
    Route::get('/', [AdminHomeController::class,'home'])->name('home');
    // Route::get('/profile', [AdminHomeController::class,'profile'])->name('profile');
    // Route::patch('/profile/{id}', [AdminHomeController::class, 'update'])->name('update');
    Route::get('/setting', [AdminHomeController::class,'setting'])->name('setting');
    Route::patch('/{id}', [AdminHomeController::class, 'update_profile']);
    Route::get('/address/edit/{id}', [AdminHomeController::class,'edit_address']);
    Route::patch('/admin_address/{id}', [AdminHomeController::class, 'update_address']);
    Route::post('/change_password/{id}', [AdminHomeController::class,'change_password'])->name('change_password');

    //Receiver
    Route::get('/receiver', [AdminReceiverController::class,'index'])->name('receiver');
    Route::get('/receiver/show/{id}', [AdminReceiverController::class,'show']);
    Route::post('/receiver', [AdminReceiverController::class,'store']);
    Route::get('/receiver/edit/{id}', [AdminReceiverController::class,'edit']);
    Route::patch('/receiver/{id}', [AdminReceiverController::class,'update']);
    Route::delete('/receiver/delete/{id}', [AdminReceiverController::class,'destroy']);

    //sender
    Route::get('/sender', [AdminSenderController::class,'index'])->name('sender');
    Route::get('/sender/show/{id}', [AdminSenderController::class,'show']);
    Route::post('/sender', [AdminSenderController::class,'store']);
    Route::get('/sender/edit/{id}', [AdminSenderController::class,'edit']);
    Route::patch('/sender/{id}', [AdminSenderController::class,'update']);
    Route::delete('/sender/delete/{id}', [AdminSenderController::class,'destroy']);

    Route::get('/search_sender', [AdminSenderController::class,'search']);

    // package
    Route::get('/package', [AdminPackageController::class,'index'])->name('index');
    Route::get('/package/create', [AdminPackageController::class,'create']);
    Route::post('/package', [AdminPackageController::class,'store']);
    Route::get('/package/show/{id}', [AdminPackageController::class,'show']);
    Route::get('/package/edit/{id}', [AdminPackageController::class,'edit']);
    Route::patch('/package/{id}', [AdminPackageController::class,'update']);
    Route::delete('/package/delete/{id}', [AdminPackageController::class,'destroy']);

    Route::patch('/package/change_status/{id}', [AdminPackageController::class,'update_status']);


    // order
    Route::delete('/order/delete/{id}', [AdminPackageController::class,'order_destroy']);
    // pdf label with barcode
    Route::get('/package/preview/{id}', [AdminPackageController::class, 'preview_package'])->name('package.preview');
    Route::patch('/package/pickup/{id}', [AdminPackageController::class,'pickup']);

    Route::patch('/package/cancel/{id}', [AdminPackageController::class,'cancel_package']);
    Route::patch('/package/remove_cancel/{id}', [AdminPackageController::class,'remove_cancel']);

    //Shipping Process
    Route::get('/package/ready/{id}', [AdminPackageController::class,'ready']);
    Route::get('/package/rdy_to_ship/{id}', [AdminPackageController::class,'rdy_to_ship']);
    Route::get('/package/shipped/{id}', [AdminPackageController::class,'shipped']);
    Route::get('/package/arrived/{id}', [AdminPackageController::class,'arrived']);

    Route::get('/sender_address/add/{id}', [Sender_Receiver_AddressController::class,'admin_add_senderAddress']);
    Route::post('/sender_address/store/{id}', [Sender_Receiver_AddressController::class,'admin_store_senderAddress']);
    Route::get('/sender_address/edit/{id}', [Sender_Receiver_AddressController::class,'admin_edit_senderAddress']);
    Route::patch('/sender_address/{id}', [Sender_Receiver_AddressController::class,'admin_update_senderAddress']);
    Route::delete('/sender_address/delete/{id}', [Sender_Receiver_AddressController::class,'admin_delete_sender_address']);

    Route::get('/receiver_address/add/{id}', [Sender_Receiver_AddressController::class,'admin_add_receiverAddress']);
    Route::post('/receiver_address/store/{id}', [Sender_Receiver_AddressController::class,'admin_store_receiverAddress']);
    Route::get('/receiver_address/edit/{id}', [Sender_Receiver_AddressController::class,'admin_edit_receiverAddress']);
    Route::patch('/receiver_address/{id}', [Sender_Receiver_AddressController::class,'admin_update_receiverAddress']);
    Route::delete('/receiver_address/delete/{id}', [Sender_Receiver_AddressController::class,'admin_delete_receiver_address']);

    //Country | State | City
    Route::get('/country', [CountryController::class,'admin_index']);
    Route::get('/country/show/{id}', [CountryController::class,'admin_show_states']);
    Route::post('/state/{id}', [CountryController::class,'admin_add_state']);
    Route::get('/state/show/{id}', [CountryController::class,'admin_show_cities']);;
    Route::get('/state/edit_state/{id}', [CountryController::class,'admin_edit_state']);
    Route::patch('/state/update_state/{id}', [CountryController::class,'admin_update_state']);
    Route::delete('/state/delete/{id}', [CountryController::class,'admin_delete_state']);
    Route::post('/city/{id}', [CountryController::class,'admin_add_city']);
    Route::get('/city/edit_city/{id}', [CountryController::class,'admin_edit_city']);
    Route::patch('/city/update_city/{id}', [CountryController::class,'admin_update_city']);
    Route::delete('/city/delete/{id}', [CountryController::class,'admin_delete_city']);
    });
});

  //country - state - city
  Route::get('getState/{id}', [Country_state_cityController::class,'getState']);
  Route::get('getCity/{id}', [Country_state_cityController::class,'getCity']);

    //Sender & Receiver Address
    Route::get('getSenderAddress/{id}', [Sender_Receiver_AddressController::class,'senderAddress']);
    Route::get('/sender/delete_address/{id}', [Sender_Receiver_AddressController::class,'senderAddressDelete']);
    Route::get('getReceiverAddress/{id}', [Sender_Receiver_AddressController::class,'receiverAddress']);


  // Super Admin
  Route::prefix('superadmin')->name('superadmin.')->group(function () {

    Route::middleware(['auth','checkStatus', 'superadmin'])->group(function () {
        Route::get('/', [SuperAdminController::class,'home'])->name('home');

        // settings
        Route::get('/setting', [SuperAdminController::class,'setting'])->name('setting');
        Route::patch('/{id}', [SuperAdminController::class, 'update_profile']);
        Route::get('/address/edit/{id}', [SuperAdminController::class,'edit_address']);
        Route::patch('/superadmin_address/{id}', [SuperAdminController::class, 'update_address']);

        // Admin
        Route::get('admin/create', [ManageAdminController::class,'create_admin']);
        Route::get('/admin/show/{id}', [ManageAdminController::class,'show']);
        Route::post('admin/register', [ManageAdminController::class,'store_admin']);
        Route::get('admin/change_status', [ManageAdminController::class,'change_status']);
        Route::get('admin/list', [ManageAdminController::class,'list_admin']);

        //sender
        Route::get('/sender', [SuperAdminSenderController::class,'index'])->name('sender');
        Route::get('/sender/show/{id}', [SuperAdminSenderController::class,'show']);
        Route::post('/sender', [SuperAdminSenderController::class,'store']);
        Route::get('/sender/edit/{id}', [SuperAdminSenderController::class,'edit']);
        Route::patch('/sender/{id}', [SuperAdminSenderController::class,'update']);
        Route::delete('/sender/delete/{id}', [SuperAdminSenderController::class,'destroy']);

        //Receiver
        Route::get('/user/show/{id}', [SuperAdminUserController::class,'show']);
        // Route::post('/receiver', [SuperAdminReceiverController::class,'store']);
        // Route::get('/receiver/edit/{id}', [SuperAdminReceiverController::class,'edit']);
        // Route::patch('/receiver/{id}', [SuperAdminReceiverController::class,'update']);
        // Route::delete('/receiver/delete/{id}', [SuperAdminReceiverController::class,'destroy']);

        //Receiver
        Route::get('/receiver', [SuperAdminReceiverController::class,'index'])->name('receiver');
        Route::get('/receiver/show/{id}', [SuperAdminReceiverController::class,'show']);
        Route::post('/receiver', [SuperAdminReceiverController::class,'store']);
        Route::get('/receiver/edit/{id}', [SuperAdminReceiverController::class,'edit']);
        Route::patch('/receiver/{id}', [SuperAdminReceiverController::class,'update']);
        Route::delete('/receiver/delete/{id}', [SuperAdminReceiverController::class,'destroy']);

        // package
        Route::get('/package', [SuperAdminPackageController::class,'index'])->name('index');
        Route::get('/package/create', [SuperAdminPackageController::class,'create']);
        Route::post('/package', [SuperAdminPackageController::class,'store']);
        Route::post('/preorder/add_admin/{id}', [SuperAdminPackageController::class,'store_pre_order']);
        Route::get('/package/show/{id}', [SuperAdminPackageController::class,'show']);
        Route::get('/package/edit/{id}', [SuperAdminPackageController::class,'edit']);
        Route::patch('/package/{id}', [SuperAdminPackageController::class,'update']);
        Route::delete('/package/delete/{id}', [SuperAdminPackageController::class,'destroy']);

        Route::get('/package/preview/{id}', [SuperAdminPackageController::class, 'preview_package'])->name('package.preview');
        Route::patch('/package/change_status/{id}', [SuperAdminPackageController::class,'update_status']);
        Route::patch('/package/pickup/{id}', [SuperAdminPackageController::class,'pickup']);

        Route::patch('/package/cancel/{id}', [SuperAdminPackageController::class,'cancel_package']);
        Route::patch('/package/remove_cancel/{id}', [SuperAdminPackageController::class,'remove_cancel']);

        // Cost
        Route::get('/cost', [SuperCostController::class,'index']);
        Route::post('/cost', [SuperCostController::class,'store']);
        Route::patch('/cost/{id}', [SuperCostController::class, 'update']);

        // pre Order
        Route::get('/preorder', [SuperAdminPreOrderController::class,'index']);
        // Route::get('/preorder/show/{id}', [SuperAdminPreOrderController::class,'show']);
        Route::get('/preorder/show_preorder/{id}', [SuperAdminPreOrderController::class,'show_pre_order']);
        Route::get('/preorder/change_status', [SuperAdminPreOrderController::class,'change_status']);
        Route::delete('/preorder/delete/{id}', [SuperAdminPreOrderController::class,'destroy']);


        //Country | State | City
        Route::get('/country', [CountryController::class,'index']);
        Route::post('/country', [CountryController::class,'add_country']);
        Route::get('country/change_status', [CountryController::class, 'change_status']);
        Route::get('/country/show/{id}', [CountryController::class,'show_states']);
        Route::get('/country/edit_country/{id}', [CountryController::class, 'edit_country']);
        Route::patch('/country/update_country/{id}', [CountryController::class, 'update_country']);
        Route::delete('/country/delete/{id}', [CountryController::class, 'delete_country']);
        Route::post('/state/{id}', [CountryController::class,'add_state']);
        Route::get('/state/show/{id}', [CountryController::class,'show_cities']);;
        Route::get('/state/edit_state/{id}', [CountryController::class,'edit_state']);
        Route::patch('/state/update_state/{id}', [CountryController::class,'update_state']);
        Route::delete('/state/delete/{id}', [CountryController::class,'delete_state']);
        Route::post('/city/{id}', [CountryController::class,'add_city']);
        Route::get('/city/edit_city/{id}', [CountryController::class,'edit_city']);
        Route::patch('/city/update_city/{id}', [CountryController::class,'update_city']);
        Route::delete('/city/delete/{id}', [CountryController::class,'delete_city']);

        Route::get('/sender_address/add/{id}', [Sender_Receiver_AddressController::class,'add_senderAddress']);
        Route::post('/sender_address/store/{id}', [Sender_Receiver_AddressController::class,'store_senderAddress']);
        Route::get('/sender_address/edit/{id}', [Sender_Receiver_AddressController::class,'edit_senderAddress']);
        Route::patch('/sender_address/{id}', [Sender_Receiver_AddressController::class,'update_senderAddress']);
        Route::delete('/sender_address/delete/{id}', [Sender_Receiver_AddressController::class,'delete_sender_address']);

        Route::get('/receiver_address/add/{id}', [Sender_Receiver_AddressController::class,'add_receiverAddress']);
        Route::post('/receiver_address/store/{id}', [Sender_Receiver_AddressController::class,'store_receiverAddress']);
        Route::get('/receiver_address/edit/{id}', [Sender_Receiver_AddressController::class,'edit_receiverAddress']);
        Route::patch('/receiver_address/{id}', [Sender_Receiver_AddressController::class,'update_receiverAddress']);
        Route::delete('/receiver_address/delete/{id}', [Sender_Receiver_AddressController::class,'delete_receiver_address']);
    });
});

Route::fallback(function () {
  return view("notfound");
});

// Route::any('{query}',
//   function() { return redirect(URL::previous() ) -> with('error','Invelid Try');})
//   ->where('query', '.*');
