<?php

namespace App\Http\Controllers\Web\Contact;

use App\Helpers\FCM;
use App\Http\Controllers\Controller;
use App\Models\Messages\Messages;
use App\Models\Services\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {

        $service_id = $id;
        $service = Service::where('admin_accept', 1)->where('id', $id)->with('ServiceOwner')->first();
        $labels = labels(['web.general']);
        return view('web.contact.contact-seller', get_defined_vars());
    }

    public function sendMessage(Request $request)
    {

        $request->validate([
            'message' => 'required',
            'check_message_does_not_contain' => 'required|accepted',
            'check_terms_conditions' => 'required|accepted',
        ]);

        $service = Service::where('admin_accept', 1)->where('id', $request->service_id)->with('ServiceOwner')->first();
        $service_owner_token = User::where('id', $service->ServiceOwner->id)->first()->pluck('device_key')->toArray();
        $new_mesage = Messages::create([
            'sender_id' => auth('web')->user()->id,
            'receiver_id' => $service->ServiceOwner->id,
            'message' => $request->message,
        ]);
        FCM::push($service_owner_token, 'message', $request->message);
        return redirect()->back()->with('alert-success', 'تم ارسال الرسالة بنجاح');
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
    public function show()
    {

        $messages = Messages::where('receiver_id', auth('web')->user()->id)->with('Sender')->get();
        $senders = User::whereIn('id', $messages->pluck('sender_id')->toArray())->with('messeges')->get();
        $first_message = Messages::where('receiver_id', auth('web')->user()->id)->with('Sender')->first();

        /*
         * select * from users
         * where id <> ?
         * (id in (select sender_id from messages where receiver_id = ?)
         * or id in (select receiver_id from messages where sender_id = ?))
         *
         */
//
        $first_uid_message = Messages
            ::where(function ($query) {
                $query->where('receiver_id', auth('web')->user()->id)
                    ->where('sender_id', '<>', auth('web')->user()->id);
            })
            ->orWhere(function ($query) {
                $query->where('sender_id', auth('web')->user()->id)
                    ->where('receiver_id', '<>', auth('web')->user()->id);
            })->with('Sender')->first();
//        dd($first_uid_message);
        $labels = labels(['web.general']);

        return view('web.contact.chat', get_defined_vars());
    }

    public function showMessages($sender_id)
    {
        $messages_sender = Messages::with('Sender')
            ->where(function ($query) use ($sender_id) {
                $query->where('receiver_id', auth('web')->user()->id)
                    ->where('sender_id', $sender_id);
            })
            ->orWhere(function ($query) use ($sender_id) {
                $query->where('sender_id', auth('web')->user()->id)
                    ->where('receiver_id', $sender_id);
            })
            ->get();
        $messages_sender_ids = Messages::where('receiver_id', auth('web')->user()->id)->with('Sender')->get();

        $senders = User::whereIn('id', $messages_sender_ids->pluck('sender_id')->toArray())->with('messeges')->get();
        $user = User::where('id', $sender_id)->first();

        $labels = labels(['web.general']);
        return view('web.contact.chat_messages', get_defined_vars());
    }


    public function replayMessages(Request $request)
    {

        $request->validate([
            'message' => 'required'
        ]);
        $service_owner_token = User::where('id', $request->receiver_id)->first()->pluck('device_key')->toArray();
        $user_sender = User::where('id', $request->sender_id)->first();
        $user_sender->update([
            'response_speed' => rand(0, 9)
        ]);

        $new_mesage = Messages::create([
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);
        FCM::push($service_owner_token, 'message', $request->message);
        return redirect()->back();
//        dd($request->all());
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
