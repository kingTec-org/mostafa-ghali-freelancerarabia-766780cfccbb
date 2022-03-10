<?php

namespace App\Http\Controllers\Web\Orders;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Comments\ServicesComments;
use App\Models\Item\Item;
use App\Models\Order\MovementOrderItem;
use App\Models\Order\Order;
use App\Models\Order\OrderItemAdditionalServices;
use App\Models\Order\ReviewOrderItem;
use App\Models\Services\AdditionalServices;
use App\Models\Services\Service;
use App\Models\User;
use App\Models\User\UserFav;
use App\Notifications\web\AcceptOrder\AcceptOrderNotification;
use App\Notifications\web\CancelOrder\CancelOrderNotification;
use App\Notifications\web\DeliverOrder\DeliverOrderNotification;
use App\Notifications\web\ReviewOrder\ReviewOrderNotification;
use App\Notifications\web\ServiceRequestsNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\VarDumper\Dumper\esc;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user_id = 1;
        $request = '';
        $data = Order::where('user_id', $user_id)->with(['items' => function ($q) use ($request) {
            return $q->with(['service.ServiceOwner']);
        }])->get();
        $user_id = Auth::user()->id;
        $services_auth_user_id = Service::where('admin_accept',1)->where('user_id',$user_id)->get()->pluck('id')->toArray();
        $serviceOrderItem =  Item::whereIN('service_id',$services_auth_user_id)->with('service.ServiceOwner', 'order.user')->paginate(5);

        $orders_user_ids = Order::where('user_id',$user_id)->get()->pluck('id')->toArray();

        $itemPurchasesComplete = Item::whereIN('service_id',$services_auth_user_id)->where('is_complete',1)->with('service.ServiceOwner')->get();
        $itemPurchasesCanceled = Item::whereIN('service_id',$services_auth_user_id)->where('is_canceled',1)->with('service.ServiceOwner')->get();
        $categories = Category::get();
        return view('web.orders.incoming_orders.index', get_defined_vars());
    }

    public function purchases()
    {

        $user_id = Auth::user()->id;
        $orders_user_ids = Order::where('user_id',$user_id)->get()->pluck('id')->toArray();
        $itemPurchasesComplete = Item::whereIN('order_id',$orders_user_ids)->where('is_complete',1)->where('is_canceled',0)->with('service.ServiceOwner')->get();
        $itemPurchasesCanceled = Item::whereIN('order_id',$orders_user_ids)->where('is_canceled',1)->where('is_complete',0)->with('service.ServiceOwner')->get();
        $itemPurchases = Item::whereIN('order_id',$orders_user_ids)->with('service.ServiceOwner')->paginate(5);
        $categories = Category::get();

        return view('web.orders.purchases.purchases', get_defined_vars());
    }

    public function purchasesComplete()
    {

        $user_id = Auth::user()->id;
        $orders_user_ids = Order::where('user_id',$user_id)->get()->pluck('id')->toArray();
        $itemPurchasesComplete = Item::whereIN('order_id',$orders_user_ids)->where('is_complete',1)->with('service.ServiceOwner')->paginate(5);
        $itemPurchasesCompleteCount = Item::whereIN('order_id',$orders_user_ids)->where('is_complete',1)->with('service.ServiceOwner')->get();
        $itemPurchasesCanceled = Item::whereIN('order_id',$orders_user_ids)->where('is_canceled',1)->with('service.ServiceOwner')->get();
        $categories = Category::get();

        return view('web.orders.purchases.complete', get_defined_vars());
    }

    public function purchasesCanceled()
    {

        $user_id = Auth::user()->id;

        $orders_user_ids = Order::where('user_id',$user_id)->get()->pluck('id')->toArray();
        $itemPurchasesCanceled = Item::whereIN('order_id',$orders_user_ids)->where('is_canceled',1)->with('service.ServiceOwner')->paginate(5);
        $itemPurchasesCanceledCount = Item::whereIN('order_id',$orders_user_ids)->where('is_canceled',1)->with('service.ServiceOwner')->get();
        $itemPurchasesComplete = Item::whereIN('order_id',$orders_user_ids)->where('is_complete',1)->with('service.ServiceOwner')->get();
        $categories = Category::get();

        return view('web.orders.purchases.canceled', get_defined_vars());
    }

    public function cancel_order_item($id){
        $order_item = Item::where('id',$id)->first();
        $order_item->update([
            'is_canceled'=>1,
            'is_complete'=>0,
            'in_progress'=>0,
            'finished'=>0,
            'is_delivered'=>0,

            'waiting_acceptance'=>0,
        ]);
        $order_owner = User::where('id',$order_item->order->user_id)->first();
        $order_owner->notify(new CancelOrderNotification($order_item,'Cancel Order','Your Order Is Canceled'));

        return redirect()->back()->with('alert-success','تم الغاء الخدمة بنجاح');
    }

    public function accept_order_item($id){
        $order_item = Item::where('id',$id)->with('order')->first();

        $order_item->update([
            'is_canceled'=>0,
            'in_progress'=>1,
            'is_complete'=>0,
            'finished'=>0,
            'is_delivered'=>0,
            'waiting_acceptance'=>0,
        ]);
        $order_owner = User::where('id',$order_item->order->user_id)->first();
        $order_owner->notify(new AcceptOrderNotification($order_item));
        return redirect()->back()->with('alert-success','تم تسليم الخدمة بنجاح');
    }

    public function complete_order_item($id,Request $request){
//        dd($request->all());
        $request->validate([
           'delivery_title'=>'required',
           'delivery_desc'=>'required',
           'delivery_attachment'=>'required',
        ]);
        $order_item = Item::where('id',$id)->first();
      $delivery_attachment_file = saveImage($request->file('delivery_attachment'),'uploads/delivery_attachment');
        $order_item->update([
            'is_canceled'=>0,
            'is_complete'=>1,
            'in_progress'=>0,
            'finished'=>0,
            'is_delivered'=>0,
            'waiting_acceptance'=>0,
            'type'=>'deliver',
            'delivery_title'=>$request->delivery_title,
            'delivery_desc'=>$request->delivery_desc,
            'delivery_attachment'=>$delivery_attachment_file,
        ]);
        $order_owner = User::where('id',$order_item->order->user_id)->first();
        $order_owner->notify(new DeliverOrderNotification($order_item,'Deliver Order','Your Order Is Delivered'));

        return redirect()->back()->with('alert-success','تم تسليم الخدمة بنجاح');

    }


    public function orderComplete()
    {

        $user_id = Auth::user()->id;
        $orders_user_ids = Order::where('user_id',$user_id)->get()->pluck('id')->toArray();
        $services_auth_user_id = Service::where('admin_accept',1)->where('user_id',$user_id)->get()->pluck('id')->toArray();

        $itemPurchasesComplete = Item::whereIN('service_id',$services_auth_user_id)->where('is_complete',1)->with('service.ServiceOwner')->paginate(5);
        $itemPurchasesCompleteCount = Item::whereIN('service_id',$services_auth_user_id)->where('is_complete',1)->with('service.ServiceOwner')->get();
        $itemPurchasesCanceled = Item::whereIN('service_id',$services_auth_user_id)->where('is_canceled',1)->with('service.ServiceOwner')->get();
        $categories = Category::get();

        return view('web.orders.incoming_orders.complete', get_defined_vars());
    }

    public function orderCanceled()
    {

        $user_id = Auth::user()->id;

        $orders_user_ids = Order::where('user_id',$user_id)->get()->pluck('id')->toArray();

        $services_auth_user_id = Service::where('admin_accept',1)->where('user_id',$user_id)->get()->pluck('id')->toArray();

        $itemPurchasesComplete = Item::whereIN('service_id',$services_auth_user_id)->where('is_complete',1)->with('service.ServiceOwner')->get();
        $itemPurchasesCanceled = Item::whereIN('service_id',$services_auth_user_id)->where('is_canceled',1)->with('service.ServiceOwner')->paginate(5);
        $itemPurchasesCanceledCount = Item::whereIN('service_id',$services_auth_user_id)->where('is_canceled',1)->with('service.ServiceOwner')->get();
        $categories = Category::get();

        return view('web.orders.incoming_orders.canceled', get_defined_vars());
    }


    public function  show_order_item($id){
        $item = Item::where('id',$id)->with('service')->first();
        if($item->attachment){
            $infoPath =pathinfo($item->attachment) ;
            $extension = $infoPath['extension'];
        }
        $order_item_add_service_ids = OrderItemAdditionalServices::where('service_id',$item->service->id)->where('order_id',$id)->get()->pluck('additional_services_id')->toArray();
        $order_item_add_service = AdditionalServices::whereIn('id',$order_item_add_service_ids)->get();

        $additional_services = AdditionalServices::where('service_id',$item->service->id)->get();

        $fav_services = UserFav::where('user_id',auth('web')->user()->id)->get()->pluck('service_id')->toArray();

        $deliver_items = MovementOrderItem::where('order_item_id',$id)->with('item.service')->get();

        $deliver_items_ids = $deliver_items->pluck('id')->toArray();
      if($deliver_items_ids){
          $max_item = max($deliver_items_ids);
      }  else{
          $max_item = -1;
      }

        $categories = Category::get();

        return view('web.orders.incoming_orders.show_order_item',get_defined_vars());

    }

    public function show_purchases_item($id){

        $item = Item::where('id',$id)->with('service')->first();
        if($item->attachment){
            $infoPath =pathinfo($item->attachment) ;
            $extension = $infoPath['extension'];
        }
        $additional_services = AdditionalServices::where('service_id',$item->service->id)->get();
        $fav_services = UserFav::where('user_id',auth('web')->user()->id)->get()->pluck('service_id')->toArray();

        $order_item_add_service_ids = OrderItemAdditionalServices::where('service_id',$item->service->id)->where('order_id',$id)->get()->pluck('additional_services_id')->toArray();
        $order_item_add_service = AdditionalServices::whereIn('id',$order_item_add_service_ids)->get();

        $deliver_items = MovementOrderItem::where('order_item_id',$id)->with('item.service')->get();
        $deliver_items_ids = $deliver_items->pluck('id')->toArray();

        if($deliver_items_ids){
            $max_item = max($deliver_items_ids);
        }  else{
            $max_item = 0;
        }
        $categories = Category::get();

        return view('web.orders.purchases.show_order_item',get_defined_vars());

    }


    public function finish_order_item(Request $request,$id){
        $request->validate([
           'rate'=>'required','comment'=>'required'
        ]);
        $order_item = Item::where('id',$id)->first();
        $order_item->update([
            'is_canceled'=>0,
            'is_complete'=>0,
            'in_progress'=>0,
            'finished'=>1,
            'is_delivered'=>0,
            'waiting_acceptance'=>0,
        ]);
        $order = Order::where('id',$order_item->order_id)->first();
        $order->available_withdraw = 1;
        $order->update();
        $deliver_items = MovementOrderItem::where('order_item_id',$id)->with('item.service')->get();

        if ($deliver_items){
            $deliver_items_ids = $deliver_items->pluck('id')->toArray();
            $max_item = max($deliver_items_ids);
        }
        $latest_movment_order_item = MovementOrderItem::where('id',$max_item)->where('order_item_id',$id)->first();
        $latest_movment_order_item->update(['type'=>'finished']);
        $categories = Category::get();
        $comment = new ServicesComments();
        $comment->service_id = $order_item->service_id;
        $comment->user_id = auth('web')->user()->id;
        $comment->seller_id = $order_item->user_owner_service_id;
        $comment->comment = $request->comment;
        $comment->rate = $request->rate;
        $comment->save();
        return redirect()->back()->with('alert-success','تم انهاء وتسليم الخدمة بنجاح');
    }

    public function review_order_item($id,Request $request){

        $request->validate([
            'review_title'=>'required',
            'review_desc'=>'required',
            'review_attachment'=>'required',
        ]);
        $order_item = Item::where('id',$id)->first();
        $delivery_attachment_file = saveImage($request->file('review_attachment'),'uploads/delivery_attachment');
        $order_item->update([
            'is_canceled'=>0,
            'is_complete'=>0,
            'in_progress'=>1,
            'finished'=>0,
            'is_delivered'=>0,
            'waiting_acceptance'=>0,
            'type'=>'review',

        ]);
        $delivery= new MovementOrderItem();
        $delivery->title =$request->review_title;
        $delivery->desc =$request->review_desc;
        $delivery->attachment =$delivery_attachment_file;
        $delivery->order_item_id =$id;
        $delivery->type ='review';
        $delivery->save();
        $order_owner = User::where('id',$order_item->user_owner_service_id)->first();
        $order_owner->notify(new ReviewOrderNotification($order_item,'Review Order','Your Deliver Is Review'));

        return redirect()->back()->with('alert-success','تم تسليم طلب المراجعة بنجاح');


    }





    public function deliver_order_item(Request $request,$id){

        $request->validate([
            'delivery_title'=>'required',
            'delivery_desc'=>'required',
            'delivery_attachment'=>'required',
        ]);
        $order_item = Item::where('id',$id)->first();
        $delivery_attachment_file = saveImage($request->file('delivery_attachment'),'uploads/delivery_attachment');
        $order_item->update([
            'is_canceled'=>0,
            'is_complete'=>0,
            'in_progress'=>0,
            'finished'=>0,
            'is_delivered'=>1,
            'waiting_acceptance'=>0,
            'type'=>'deliver',

        ]);
        $delivery= new MovementOrderItem();
        $delivery->title =$request->delivery_title;
        $delivery->desc =$request->delivery_desc;
        $delivery->attachment =$delivery_attachment_file;
        $delivery->order_item_id =$id;
        $delivery->type ='deliver';
        $delivery->save();
        $order_owner = User::where('id',$order_item->order->user_id)->first();
        $order_owner->notify(new DeliverOrderNotification($order_item,'Deliver Order','Your Order Is Delivered'));

        return redirect()->back()->with('alert-success','تم تسليم  الخدمة بنجاح');

    }
}
