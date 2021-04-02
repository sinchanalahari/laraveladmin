@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 px-0">
                <div class="px-4 py-5 chat-box bg-secondary">
    @foreach($chats as $chat)
                    <!-- Reciever Message-->
                    @if($chat->rec_id != Auth::user()->id)
                    <div class="media w-50 ml-auto mb-3">
                        <div class="media-body">
                            <div class="bg-primary rounded py-2 px-3 mb-2">
                                <p class="text-small mb-0 text-white">{{$chat->message}}</p>
                            </div>
                            <p class="small text-muted">{{$chat->created_at}}</p>
                        </div>
                    </div>
                        @else
                            <div class="media w-50 mb-3"><img src="{{ url('storage/'.$recv->image) }}" alt="user" width="50" class="rounded-circle">
                                <div class="media-body ml-3">
                                    <div class="bg-light rounded py-2 px-3 mb-2">
                                        <p class="text-small mb-0 text-muted">{{$chat->message}}</p>
                                    </div>
                                    <p class="small text-muted">{{$chat->created_at}}</p>
                                </div>
                            </div>
                        @endif
    @endforeach
                </div>

                <!-- Typing area -->
                <form action="{{route('Chat.store')}}" method="post" class="bg-light">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="rec_id" value="{{$recv->id}}" hidden>
                        <input type="text" name="message" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                        <div class="input-group-append">
                            <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-2"></div>
        </div>
    </div>

@endsection
