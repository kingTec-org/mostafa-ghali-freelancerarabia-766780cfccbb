<?php

namespace App\Http\Controllers\Web\Settings;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Order\Order;
use App\Models\Settings\SystemSettings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Stripe\StripeClient;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $labels = labels(['web.general']);
        $categories = Category::get();
        return view('web.settings.settings', get_defined_vars());
    }

    public function settings_notifications()
    {
        $labels = labels(['web.general']);
        $categories = Category::get();
        return view('web.settings.settings_notifications', get_defined_vars());
    }

    public function account_connect(Request $request)
    {
        $request->validate(['email' => 'required|unique:users.email',]);
        dd($request->all());

    }

    public function general_settings(Request $request)
    {
        $request->validate(['deactivation_reason' => 'required', 'deactivation_note' => 'required',]);
        $user = User::where('id', auth('web')->user()->id)->first();
        $user->active = $request->is_active;
        $user->deactivation_reason = $request->deactivation_reason;
        $user->deactivation_note = $request->deactivation_note;
        $user->update();
        Auth::logout();
        return redirect()->back()->with('alert-success', 'تم الغاء الحساب بنجاح');
    }

    public function settings_payment()
    {
        $labels = labels(['web.general']);
        $categories = Category::get();
        $total = 0;
        $settings = SystemSettings::first();
        $user_orders = Order::where('user_id',\auth('web')->user()->id)->where('available_withdraw',1)->get();
        foreach ($user_orders as $order){
            $system_tax = $order->total_price - ($order->total_price * $settings->system_tax / 100);
//            $stripe_tax = $order->total - ($order->total_price * $settings->stripe_tax / 100);
            $total += round($order->total_price - $system_tax);
        }
        return view('web.settings.payment', get_defined_vars());
    }
    public function withdraw_payment(Request $request)
    {
        $total = 0;
        $settings = SystemSettings::first();
        $user_orders = Order::where('user_id',\auth('web')->user()->id)->where('available_withdraw',1)->get();
        foreach ($user_orders as $order){
            $system_tax = $order->total_price - ($order->total_price * $settings->system_tax / 100);
            $total += round($order->total_price - $system_tax);
        }

        $request->witdrow_mony = $total = 100;
         if ($request->witdrow_mony == $total){

//            try {
                \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $transfer = \Stripe\Transfer::create([
                    'amount' => $request->witdrow_mony ,
                    'currency' => 'usd',
                    'destination' => \auth('web')->user()->getStripeAccountId(),
                ]);

                dd($transfer);


                $msg = 'تمت عملية التحويل بنجاح';
                $type= 'alert-success';

                return redirect()->back()->with($type, $msg);
  /*          }catch (\Exception $e){
                $msg = 'فشلت عملية التحويل بالرجاء التواصل مع الدعم الفني ل معرفة المشكلة';
                $type= 'alert-danger';
                return redirect()->back()->with($type, $msg);
            }*/
        }else{
            $msg = 'فشلت عملية التحويل بالرجاء التواصل مع الدعم الفني ل معرفة المشكلة';
            $type= 'alert-danger';
            return redirect()->back()->with($type, $msg);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
