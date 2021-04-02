@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($posts as $post)
                    <div class="card mt-2">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-1">
                                    <img src="{{ url('storage/'.$post->user_img) }}"  height="50px" width="50px" class="rounded-circle" alt="">
                                </div>
                                <div class="col-8">
                                    <p style="margin-bottom: unset">{{$post->username}}</p>
                                    <p style="margin-bottom: unset">{{$post->created_at}}</p>
                                </div>
                                <div class="col-3">
                                    <form action="{{route('Post.destroy',$post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5>{{$post->caption}}</h5>
                        </div>
                        <div class="card-footer">
                            <img src="{{ url('storage/'.$post->image) }}" width="100%" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
