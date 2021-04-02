@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')

{{--    <h1>{{$id}}</h1>--}}
<div class="container">
    <div class="card">
        <div class="card-body">

                <div class="px-4 py-5 chat-box bg-secondary">
                                                    @foreach($comments as $comment)
                <!-- Reciever Message-->
                                                                @if($comment->sendername != Auth::user()->name)
                    <div class="media w-50 mb-3"><h4>{{$comment->sendername}}</h4>
                        <div class="media-body ml-3">
                            <div class="bg-light rounded py-2 px-3 mb-2">
                                <p class="text-small mb-0 text-muted">{{$comment->message}}</p>
                            </div>
                            <p class="small text-muted">{{$comment->created_at}}</p>
                        </div>
                    </div>
                                                                @else
                    <div class="media w-50 ml-auto mb-3">
                        <div class="media-body">
                            <div class="bg-primary rounded py-2 px-3 mb-2">
                                <p class="text-small mb-0 text-white">{{$comment->message}}</p>
                            </div>
                            <p class="small text-muted">{{$comment->created_at}}</p>
                        </div>
                    </div>
                                                                @endif
                                                            @endforeach
                </div>

                <!-- Typing area -->
        </div>
        <div class="card-footer">
            <form action="{{route('Comment.store')}}" method="post" class="bg-light">
                @csrf
                <div class="input-group">
                    <input type="text" name="post_id" value="{{$id}}" hidden>
                    <input type="text" name="sendername" value="{{Auth::user()->name}}" hidden>
                    <input type="text" name="message" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                    <div class="input-group-append">
                        <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
