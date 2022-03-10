@extends('web.layouts.master')
@section('content')
<!-- begin main -->
<main class="container-fluid p-0">
    <div class="custom-card p-0">
        <div class="custom-card-body chat">
            <div class="chat-side sidenav" id="chatSideNav">
                <div class="chat-header">
                    <div class="dropdown custom-dropdown font-lg text-primary">
{{--                        <div class="dropdown-toggle" data-bs-toggle="dropdown">--}}
                        <div class="dropdown-toggle">

                                <a href="{{route('store.contact.show')}}" class="font-lg">{{$labels['all_chats']}}  </span>
                                </a>


{{--                      <i class="fas fa-chevron-down"></i>--}}
                    </a>
                        </div>

                        <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenuButton"
                        >
                            <label>
                                <input
                                    class="form-check-input me-3"
                                    type="radio"
                                    name="chatType"
                                    value=""
                                    checked
                                />
                                {{$labels['all_chats']}}
                            </label>
                            <label>
                                <input
                                    class="form-check-input me-3"
                                    type="radio"
                                    name="chatType"
                                    value=""
                                />
                                الأحدث
                            </label>
                            <label>
                                <input
                                    class="form-check-input me-3"
                                    type="radio"
                                    name="chatType"
                                    value=""
                                />
                                المميزة </label
                            ><label>
                                <input
                                    class="form-check-input me-3"
                                    type="radio"
                                    name="chatType"
                                    value=""
                                />
                                الغير مقروءة
                            </label>
                        </div>
                    </div>

                    <div class="text-primary font-sm">
                        <i class="fas fa-search cursor-pointer"></i>
                        <i class="fas fa-arrow-right cursor-pointer btn-close-chat"></i>
                    </div>
                </div>
                <div class="chat-list">
                        @foreach($senders as $sender)
                    <a href="{{route('store.contact.showMessages',$sender->id,auth('web')->user()->id)}}">
                        <div class="chat-list-item border-bottom">
                        <div class="chat-list-item-avatar">
                            <div class="avatar">
                                <img src="{{asset('web_ar/img/default-avatar.jpg')}}" class="avatar-image" />
                            </div>
                        </div>
                        <div class="chat-list-item-name">
                            <div class="font-sm text-primary">{{$sender->name}}</div>

                            <span class="font-xs">{{substr($sender->messeges->where('sender_id',$sender->id)->latest()->first()->message,-30) }}</span>
                        </div>
                        <div class="chat-list-item-time">{{time_elapsed_string($sender->messeges->where('sender_id',$sender->id)->latest()->first()->created_at)}}</div>
                    </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="chat-main">
                <div class="chat-header">
                    <div>
                        <button class="btn btn-light btn-open-chat">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <div>

                        <div class="chat-title font-md">
                            <a href="{{route('store.profile_seller',$user->id)}}">{{$user->name}}</a>
                        </div>
{{--                        <div class="chat-info font-xs">--}}
{{--                            <span> اخر ظهور منذ 3 س </span>--}}
{{--                            |--}}
{{--                            <span>--}}
{{--                      <i class="far fa-clock text-sm"></i>--}}
{{--                      6 ابريل , 1:12 م--}}
{{--                    </span>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="chat-log">
                    @foreach($messages_sender as $message)
                    <div class="message message-sent">
                        <div class="message-avatar">
                            <div class="avatar">
                                <img src="{{asset('web_ar/img/default-avatar.jpg')}}" class="avatar-image" />
                            </div>
                        </div>
                        <div class="message-name">
                            <div>
                                <a
                                    class="font-sm text-primary"
                                    href="#"
                                >
                                    @foreach($message->Sender as $name)
                                        {{$name->name}}
                                    @endforeach
                                </a>
                            </div>

                            <span class="font-xs">{{ substr($message->message , -50) }}</span>
                        </div>
                        <div class="message-time">{{time_elapsed_string($message->created_at)}}</div>
                    </div>
                    @endforeach
                </div>
<form action="{{route('store.contact.replayMessages')}}" method="post">

        @csrf
                <div class="chat-control">
                    <div class="chat-file cursor-pointer">
{{--                        <i class="fas fa-paperclip fa-lg"></i>--}}
                    </div>
                    <div class="chat-input">
                        <input type="text" name="message" class="form-control" />
                        <input type="hidden" name="sender_id" value="{{auth('web')->user()->id}}" class="form-control" />
                        <input type="hidden" name="receiver_id" value="{{$messages_sender->first()->Sender->first()->id}}" class="form-control" />
                    </div>

                    <button type="submit" class="btn btn-primary px-5 chat-btn">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
</form>
            </div>
        </div>
    </div>
</main>
<!-- end main -->
@endsection
