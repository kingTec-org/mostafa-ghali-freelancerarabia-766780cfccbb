<?php

namespace App\Http\Controllers\Web\Notifications;

use App\Http\Controllers\Controller;
use App\Models\Item\Item;
use App\Models\Order\MovementOrderItem;
use App\Models\Order\OrderItemAdditionalServices;
use App\Models\Services\AdditionalServices;
use App\Models\User\UserFav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class NotificationsController extends Controller
{
    public function notifications(){

        $notifications = DB::table('notifications')
            ->where('notifiable_id',auth('web')->user()->id)
            ->orderBy('created_at', 'DESC')
           ->paginate(5);
        $all_notifications = DB::table('notifications')->where('notifiable_id',auth('web')->user()->id)->get();
        foreach (auth('web')->user()->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return view('web.notifications.notifications',get_defined_vars());
    }
    public function markAsReadNotification($item_id,$notification_id){
        $item = Item::where('id',$item_id)->with('service')->first();
        if($item->attachment){
            $infoPath =pathinfo($item->attachment) ;

            $extension = $infoPath['extension'];
        }
        $notification = auth('web')->user()->unreadNotifications->where('id',$notification_id)->first();
        $order_item_add_service_ids = OrderItemAdditionalServices::where('service_id',$item->service->id)->where('order_id',$item->order_id)->get()->pluck('additional_services_id')->toArray();
        $order_item_add_service = AdditionalServices::whereIn('id',$order_item_add_service_ids)->get();

        if ($notification){
           $notification->update(['read_at' => now()]);
       }
        $additional_services = AdditionalServices::where('service_id',$item->service->id)->get();
        $fav_services = UserFav::where('user_id',auth('web')->user()->id)->get()->pluck('service_id')->toArray();
        $deliver_items = MovementOrderItem::where('order_item_id',$item_id)->with('item.service')->get();
        $deliver_items_ids = $deliver_items->pluck('id')->toArray();
        if($deliver_items_ids){
            $max_item = max($deliver_items_ids);
        }  else{
            $max_item = -1;
        }

        return view('web.notifications.show_notification',get_defined_vars());

    }
    public function stop_notifications(Request $request){

        if ($request->has('push_notifications')&& $request->push_notifications =='on'){
            $user =auth('web')->user();
            $user ->messages_push_notifications = 1;
           $user->update();
            return back()->with('alert-success','تم تفعيل الاشعارات ');
        }
        $user =auth('web')->user();
        $user ->messages_push_notifications = 0;
        $user->update();
        return back()->with('alert-success','تم الغاء تفعيل الاشعارات ');
    }
}
