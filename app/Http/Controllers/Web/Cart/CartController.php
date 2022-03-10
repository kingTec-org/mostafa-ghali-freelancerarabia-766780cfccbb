<?php

namespace App\Http\Controllers\Web\Cart;

use App\Helpers\FCM;
use App\Http\Controllers\Controller;
use App\Models\Cart\Cart;
use App\Models\Item\Item;
use App\Models\Order\Order;
use App\Models\Order\OrderItemAdditionalServices;
use App\Models\Services\Service;
use App\Models\Settings\SystemSettings;
use App\Models\User;
use App\Notifications\web\ServiceRequestsNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Stripe\StripeClient;
use Throwable;

class CartController extends Controller
{
    public function showCart()
    {

        $carts = Cart::with('service.AdditionalServices')->where('user_id',auth('web')->user()->id)->where('cart_id', $this->getCartId())->get();

        $sub_total = $carts->sum(function ($item) {
            return $item->service->price * $item->quantity;
        });

        $similar_services = Service::where('user_id', '!=', auth('web')->user()->id)->with('ServiceOwner')->inRandomOrder()->limit(10)->get();
        $settings = SystemSettings::first();
        $tax = $settings->stripe_tax;

        $tax =round($sub_total * $tax /100,0,PHP_ROUND_HALF_UP) ;
        $total = $sub_total + $tax;
        $total = round($total,0,PHP_ROUND_HALF_UP) ;
        return view('web.cart.cart', get_defined_vars());
    }

    public function getCartId()
    {

        $id = Cookie::get('cart_id');
        if (!$id) {
            $id = Str::uuid();
            Cookie::queue('cart_id', $id, 60 * 24 * 30,);
        }

        return $id;
    }

    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required',
            'attachment' => 'required',
            'notes' => 'required',
        ]);
        $user_id = auth('web')->user()->id;

        $service = Service::where('admin_accept', 1)->where('id', $request->service_id)->first();

        $service_price = $service->price;

        $total_price = $request->quantity * $service_price;

        $cart = Cart::where([
            'cart_id' => $this->getCartId(),
            'service_id' => $request->service_id,
        ])->first();

        if ($cart) {
            $cart->increment('quantity', $request->quantity);
        } else {
            $attachment_file_name = saveImage($request->file('attachment'), 'uploads/attachment');
            $cart = Cart::create([
                'cart_id' => $this->getCartId(),
                'user_id' => $user_id,
                'service_id' => $request->service_id,
                'quantity' => $request->quantity,
                'price' => $service_price,
                'total_price' => $total_price,
                'notes' => $request->notes,
                'attachment' => $attachment_file_name,
            ]);
        }

        $cart->update([
            'total_price' => $cart->quantity * $service_price
        ]);


        return redirect()->back()->with('alert-success', 'تم اضافة الخدمة الى السلة');
    }


    public function checkout(Request $request)
    {

        $cart_service_ids = Cart::with('service')->where('cart_id', $this->getCartId())->get()->pluck('service_id')->toArray();
        $cart_service_users_ids = Service::where('admin_accept', 1)->whereIN('id', $cart_service_ids)->pluck('user_id')->toArray();
        $user_id = auth('web')->user();
        $carts = Cart::with('service')->where('cart_id', $this->getCartId())->get();
        $sub_total = $carts->sum(function ($item) {
            return $item->service->price * $item->quantity;
        });

        if ($carts->count() == 0) {
            return redirect()->route('store.home');
        }

        DB::beginTransaction();
        try {
            $settings = SystemSettings::first();
            $tax = $settings->stripe_tax;
            $tax = round($sub_total * $tax /100,0,PHP_ROUND_HALF_UP) ;
            $total = $sub_total + $tax;
            $total = round($total,0,PHP_ROUND_HALF_UP) ;
            $stripe = new StripeClient(env('STRIPE_SECRET'));
            $paymentIntents = $stripe->paymentIntents->create([
                'amount' => $total*100,
                'currency' => 'usd',
                'customer'=>$user_id->getStripeCustomerId(),
                'payment_method_types' => ['card'],
            ]);
            $paymentIntentId = $paymentIntents->id;
            $order = new Order();
            $order->user_id = $user_id->id;
            $order->total_price = $total;
            $order->status = 'UNPAID';
            $order->charge_id = $paymentIntentId;
            $order->tax = $tax;
            $order->save();
            foreach ($carts as $item) {
                $order->items()->create([
                    'service_id' => $item->service_id,
                    'quantity' => $item->quantity,
                    'price' => $item->service->price,
                    'user_owner_service_id' => $item->service->user_id,
                    'waiting_acceptance' => 1,
                    'is_complete' => 0,
                    'is_canceled' => 0,
                    'in_progress' => 0,
                    'notes' => $item->notes,
                    'attachment' => $item->attachment,
                ]);
            }
            if (!is_null($request->additional_service)){
                foreach ($request->additional_service as $key=> $add){
                    foreach ($add as $ad){
                        $new_order_add_service = new OrderItemAdditionalServices();
                        $new_order_add_service->order_id = $order->id;
                        $new_order_add_service->service_id = $key;
                        $new_order_add_service->additional_services_id = $ad;
                        $new_order_add_service->save();
                    }
                }
            }
            DB::commit();

            return redirect()->route('checkout.form', encrypt($paymentIntentId));


        } catch (Throwable $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function PaymentIntentForm($paymentIntentId)
    {
        $paymentIntentId = decrypt($paymentIntentId);
        return view('web.cart.checkout', get_defined_vars());


    }

    public function ConfirmPaymentIntent(Request $request)
    {
        $order = Order::where('charge_id', $request->paymentIntentId)->first();
        $order->update([
            'status' => 'COMPLATED',
        ]);
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );
        $stripe->paymentIntents->confirm(
            $request->paymentIntentId,
            ['payment_method' => 'pm_card_visa']
        );
        $cart_service_ids = Cart::with('service')->where('cart_id', $this->getCartId())->get()->pluck('service_id')->toArray();
        $cart_service_users_ids = Service::where('admin_accept', 1)->whereIN('id', $cart_service_ids)->pluck('user_id')->toArray();

        $order_items = Item::where('order_id', $order->id)->with('service', 'order')->get();
//        $order_items_additional_services = OrderItemAdditionalServices::where('order_id', $order->id)->get();
//        foreach ($order_items_additional_services as $item){
//            $item->delete();
//        }
        foreach ($order_items as $item) {
            $user = User::where('id', $item->user_owner_service_id)->first();
            $user->notify(new ServiceRequestsNotification($item));
        }
        $services_owners_tokens = User::whereIn('id', $cart_service_users_ids)->get()->pluck('device_key')->toArray();
        FCM::push($services_owners_tokens, ' طلب خدمة ', 'لديك طلب خدمة');
        $carts = Cart::where('cart_id', $this->getCartId())->delete();

        return redirect()->route('store.home');


    }

    public function deleteCartItem($id){
       $cart_item  = Cart::where('user_id',auth('web')->user()->id)->where('service_id',$id)->first();
        if (!$cart_item){
            return view('web.error.404');
        }
        $cart_item->delete();
        $order_items_additional_services = OrderItemAdditionalServices::where('service_id',$id)->get();
        foreach ($order_items_additional_services as $item){
            $item->delete();
        }
        return redirect()->back()->with('alert-success', 'تم حذف الخدمة من السلة');

    }
}
