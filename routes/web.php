<?php


use App\Http\Controllers\Admin\Local\LocalController;
use App\Http\Controllers\User\Fav\FavController;
use App\Http\Controllers\Web\Auth\UserLoginController;
use App\Http\Controllers\Web\Auth\UserRegistersController;
use App\Http\Controllers\Web\Cart\CartController;
use App\Http\Controllers\Web\Contact\ContactController;
use App\Http\Controllers\Web\FcmNotifications\FcmNotifications;
use App\Http\Controllers\Web\Notifications\NotificationsController;
use App\Http\Controllers\Web\Orders\OrdersController;
use App\Http\Controllers\Web\Payment\PaymentController;
use App\Http\Controllers\Web\Profile\ProfileController;
use App\Http\Controllers\Web\Seller\SellerController;
use App\Http\Controllers\Web\Services\ServiceController;
use App\Http\Controllers\Web\Settings\SettingsController;
use App\Http\Controllers\Web\SocialAuth\SocialAuthController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Stripe\StripeClient;

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
//انا ضفتو متمسحوش الا باذني
Route::get('paymenttest', function () {
    return view('web.paymenttest');
});
Route::get('carttt', function () {
    return view('web.carttt');
});
Route::get('cat', function () {
    return view('web.subcat');
});
Route::get('newprice', function () {
    return view('web.testprice');
});


Route::get('test_currencies', function () {
//    return view('web.testprice');
    $date = date('Y-m-d');

    $req_url = "https://api.exchangerate.host/{$date}?base=KWD";

    $response = Http::get($req_url)->json();
    dd($response);
});
Auth::routes(['register' => false]);

//Route::get('export_label', function () {
//    return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\LabelsExport(), 'labels.xlsx');
//
////    \Maatwebsite\Excel\Facades\Excel::import(new \App\Imports\SubCategoryImport(), public_path('import_sub_category.xlsx'));
//
//    dd('success to add  data');
////    return view('web.testprice');
//});
Route::get('test_stripe', function () {
    $stripe = new StripeClient(
        env('STRIPE_SECRET')
    );
    $account_id = $stripe->accounts->create(['type' => 'express',
//        'country' => 'US',
        'email' => 'elassoulidev@gmail.com',
//        'capabilities' => [
//            'card_payments' => ['requested' => true],
//            'transfers' => ['requested' => true],
//        ],
        ]);

    $account_c = $stripe->accounts->allCapabilities($account_id->id);



    dd($account_c);


//    $count_link = $stripe->tokens->create(
//        [
//            'account' => 'acct_1032D82eZvKYlo2C',
//            'refresh_url' => url('reauth'),
//            'return_url' => url('return'),
//            'type' => 'account_onboarding',
//        ]
//    );

/*    $count_link = $stripe->accountLinks->create(
        [
            'account' => 'acct_1032D82eZvKYlo2C',
            'refresh_url' => url('reauth'),
            'return_url' => url('return'),
            'type' => 'account_onboarding',
        ]
    );*/


    dd($count_link);
    $this->customer_stripe_account = $account_id->id;
//    $this->save();
/*   $account_link  =  $stripe->accountLinks->create(
        [
            'account' => $this->customer_stripe_account,
            'refresh_url' => 'https://example.com/reauth',
            'return_url' => 'https://example.com/return',
            'type' => 'account_onboarding',
        ]
    );*/




    \Stripe\Stripe::setApiKey( env('STRIPE_SECRET'));
    $product = $stripe->products->create([
        'name' => 'Gold Special',


    ]);
   $price =  $stripe->prices->create([
        'unit_amount' => 2000,
        'currency' => 'aed',
        'recurring' => ['interval' => 'month'],
        'product' => $product->id,
    ]);

    /*
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'name' => 'Stainless Steel Water Bottle',
            'amount' => 1000,
            'currency' => 'aed',
            'quantity' => 1,
        ]],
        'payment_intent_data' => [
            'application_fee_amount' => 123,
        ],
        'mode' => 'payment',
        'success_url' => url('success'),
        'cancel_url' => url('failure')  ,
    ], ['stripe_account' =>  $account_id->id]);*/
 $session = \Stripe\Checkout\Session::create([
      'line_items' => [[
            'price' =>$price->id,
            'quantity' => 1,
        ]],
/*
     'line_items' => [[
         'name' => 'Stainless Steel Water Bottle',
         'amount' => 1000,
         'currency' => 'aed',
         'quantity' => 1,
     ]],*/
//        'mode' => 'subscription',
        'mode' => 'payment',
        'success_url' => url('success'),
        'cancel_url' => url('failure')  ,
        'payment_intent_data' => [
            'application_fee_amount' => 123,
            'transfer_data' => [
                'destination' => $account_id->id,
            ],
        ],
    ]);

    dd($account_id ,$session->url ,$session->url );
//    return view('web.testprice');
});Route::get('import_sub_category', function () {
    \Maatwebsite\Excel\Facades\Excel::import(new \App\Imports\SubCategoryImport(), public_path('import_sub_category.xlsx'));

    dd('success to add  data');
//    return view('web.testprice');
});
Route::get('/switch-lang/{lang}', [LocalController::class, 'switchLang'])->name('switchLang');
Route::get('store/terms_conditions', [LocalController::class, 'terms_conditions'])->name('store.terms_conditions');
Route::get('store/about_us', [LocalController::class, 'about_us'])->name('store.about_us');
Route::get('store/privacy', [LocalController::class, 'privacy'])->name('store.privacy');
Route::get('store/common-questions', [LocalController::class, 'common_questions'])->name('store.common_questions');
Route::get('auth/{provider}', [SocialAuthController::class, 'redirect'])->name('SocialAuth.redirect');
Route::get('callback/{provider}', [SocialAuthController::class, 'SocialAuth'])->name('store.SocialAuth');
Route::post('email/verification', [UserRegistersController::class, 'email_verification'])->name('store.email_verification');
Route::get('sub-category/{id}', [App\Http\Controllers\Web\SubCategory\SubCategoryController::class,'index'])->name('store.sub_category');
Route::get('sub-category/{id}/services', [App\Http\Controllers\Web\SubCategory\SubCategoryController::class,'ServicesBaseSubCategory'])->name('store.ServicesBaseSubCategory');


Route::group(['namespace' => 'Web'], function () {

    Route::post('store-token', [FcmNotifications::class, 'StoreToken']);
    Route::get('/', [App\Http\Controllers\Web\Home\WebHomeController::class, 'index'])->name('store.index');
    Route::post('store/login', [UserLoginController::class, 'login'])->name('store.login');
    Route::post('store/register', [UserRegistersController::class, 'register'])->name('store.register');




    Route::post('/filter', [App\Http\Controllers\Web\Home\WebHomeController::class, 'general_search'])->name('store.general_search');
    Route::get('/profile-seller/{id}', [App\Http\Controllers\Web\Home\WebHomeController::class, 'profile_seller'])->name('store.profile_seller');
    Route::group(['middleware' => 'auth:web'], function () {


        Route::get('/start_selling', [SellerController::class, 'start_selling'])->name('seller.start_selling');
        Route::get('/seller_on_boarding', [SellerController::class, 'seller_on_boarding'])->name('seller.seller_on_boarding');
        Route::post('/seller_on_boarding', [SellerController::class, 'update_seller'])->name('seller.update_seller');

        Route::get('store/home', [App\Http\Controllers\Web\Home\WebHomeController::class, 'home'])->name('store.home');

        Route::get('store/search', [App\Http\Controllers\Web\Home\WebHomeController::class, 'home_search'])->name('store.home_search');

        Route::get('store/service_owner/home', [LocalController::class, 'service_owner'])->name('store.service_owner');
        Route::post('store/logout', [UserLoginController::class, 'logout'])->name('store.logout');

        //services
        Route::get('store/service/create', [ServiceController::class, 'create'])->name('store.service.create');
        Route::get('store/service/details/{id}', [ServiceController::class, 'show'])->name('store.service.details');

        Route::post('store/service/store}', [ServiceController::class, 'store'])->name('store.service.store');


        //orders
        Route::get('store/show/orders', [OrdersController::class, 'index'])->name('store.order.show');
        Route::get('store/purchases/orders', [OrdersController::class, 'purchases'])->name('store.order.purchases');

        Route::get('store/orders/complete', [OrdersController::class, 'orderComplete'])->name('store.order.orderComplete');
        Route::get('store/orders/canceled', [OrdersController::class, 'orderCanceled'])->name('store.order.orderCanceled');

        Route::get('store/purchases/complete', [OrdersController::class, 'purchasesComplete'])->name('store.order.purchasesComplete');
        Route::get('store/purchases/canceled', [OrdersController::class, 'purchasesCanceled'])->name('store.order.purchasesCanceled');
        Route::get('store/purchases/show/{id}', [OrdersController::class, 'show_purchases_item'])->name('order_item.show_purchases_item');

        Route::get('store/order/{id}/cancel', [OrdersController::class, 'cancel_order_item'])->name('order_item.cancel');
        Route::post('store/order/{id}/complete', [OrdersController::class, 'complete_order_item'])->name('order_item.complete');


        Route::post('store/order/{id}/deliver', [OrdersController::class, 'deliver_order_item'])->name('order_item.deliver_order_item');
        Route::post('store/order/{id}/review', [OrdersController::class, 'review_order_item'])->name('order_item.review_order_item');
        Route::get('store/order/{id}/accept', [OrdersController::class, 'accept_order_item'])->name('order_item.accept_order_item');
        Route::get('store/order/show/{id}', [OrdersController::class, 'show_order_item'])->name('order_item.show_order_item');
        Route::post('store/order/finish/{id}', [OrdersController::class, 'finish_order_item'])->name('order_item.finish_order_item');


        Route::get('store/profile/edit', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('store/profile/update', [ProfileController::class, 'update'])->name('profile.update');

        Route::group(['prefix' => 'cart'], function () {
            Route::get('/', [CartController::class, 'showCart'])->name('store.cart.show');
            Route::post('/store', [CartController::class, 'store'])->name('store.cart');
            Route::get('/delete/{id}', [CartController::class, 'deleteCartItem'])->name('store.cart.delete_item');
            Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout.cart');
            Route::get('/checkout/form/{paymentIntentId}', [CartController::class, 'PaymentIntentForm'])->name('checkout.form');
            Route::post('/checkout/confirm', [CartController::class, 'ConfirmPaymentIntent'])->name('confirm.checkout');
        });

        Route::group(['prefix' => 'contact'], function () {
            Route::get('/{id}', [ContactController::class, 'index'])->name('store.contact.send.show');
            Route::post('/contact/send', [ContactController::class, 'sendMessage'])->name('store.contact.sendMessage');
            Route::get('/contact/chat', [ContactController::class, 'show'])->name('store.contact.show');
            Route::get('/contact/messages/{sender_id}', [ContactController::class, 'showMessages'])->name('store.contact.showMessages');
            Route::post('/contact/messages/replay', [ContactController::class, 'replayMessages'])->name('store.contact.replayMessages');

        });


        Route::group(['prefix' => 'fav'], function () {
            Route::get('add/fav/{service_id}', [FavController::class, 'AddServiceFav'])->name('store.user.add_fav');
        });
        Route::group(['prefix' => 'settings'], function () {
            Route::get('/settings-account', [SettingsController::class, 'index'])->name('store.settings.show');
            Route::get('/settings-notifications', [SettingsController::class, 'settings_notifications'])->name('store.settings.settings_notifications');
            Route::get('/settings-payment', [SettingsController::class, 'settings_payment'])->name('store.settings.payment');
            Route::post('/withdraw-payment', [SettingsController::class, 'withdraw_payment'])->name('store.settings.withdraw_payment');
            Route::post('/general-settings/update', [SettingsController::class, 'general_settings'])->name('store.settings.general_settings.update');
            Route::post('/general-settings/update/account-connect', [SettingsController::class, 'account_connect'])->name('store.settings.general_settings.account_connect');
        });
        Route::get('notifications/', [NotificationsController::class, 'notifications'])->name('notification.index');
        Route::post('stop/notifications/', [NotificationsController::class, 'stop_notifications'])->name('notification.stop_notifications');

        Route::get('notifications/mark-read-notification/{item_id}/{notification_id}', [NotificationsController::class, 'markAsReadNotification'])->name('notification.markAsReadNotification');

    });


//    Route::get('telr/payment', [PaymentController::class, 'showForm'])->name('payment.showForm');
//    Route::get('telr/payment/pay', [PaymentController::class, 'CreatePayment'])->name('payment.CreatePayment');
    Route::get('get-cat/{cat_id?}', [ServiceController::class, 'getSubCategoryBaseCategory'])->name('services.getSubCategoryBaseCategory');
});
