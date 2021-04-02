@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div >
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @foreach($posts as $post)
                            <div class="card mt-2">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-1">
                                            <img src="{{ url('storage/'.$post->user_img) }}"  height="50px" width="50px" class="rounded-circle" alt="">
                                        </div>
                                        <div class="col-11">
                                            <p style="margin-bottom: unset">{{$post->username}}</p>
                                            <p style="margin-bottom: unset">{{$post->created_at}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5>{{$post->caption}}</h5>
                                </div>
                                <div class="card-footer">
                                    <img src="{{ url('storage/'.$post->image) }}" width="100%" alt="">
                                </div>
                                <div class="card-footer text-right">
                                    <a href="{{route('Comment.show',$post->id)}}" class="btn btn-success btn-sm">Comment</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="#" class="float" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus my-float"></i>
            </a>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">

                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="row">
                                <div class="col-4">
                                    <a href="#">
                                        <img width="50px" height="50px" src="{{ url('storage/'.Auth::user()->image) }}">
                                    </a>
                                </div>
                                <div class="col-8">
                                    {{Auth::user()->name}}
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('Post.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="username" value="{{Auth::user()->name}}" hidden>
                                <input type="text" name="user_img" value="{{Auth::user()->image}}" hidden>
                                <div class="form-group">
                                    <label for="Password">Caption</label>
                                    <input type="text" class="form-control" name="caption" id="Password" placeholder="Enter Caption" required="">
                                </div>
                                <div class="form-group">
                                    <label>Upload photo</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile02">
                                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                    </div>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="reset" class="btn btn-block btn-danger">Cancel</button>
                                    </div>
                                    <div class="col">
                                        <button type="submit" name="post" class="btn btn-block btn-primary">Post</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>

        </div>
    </div>
@endsection
