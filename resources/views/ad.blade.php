@extends('layouts.app')
@section('ad')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                    <div class="blog-post">
                        <h2 class="blog-post-title">{{$ad->title}}</h2>
                        <p class="blog-post-meta">{{$ad->created_at}} by <a href="#">{{$ad->email}}</a></p>
                        <p>{{$ad->description}}</p>
                        @if($ad->author_id == $user_id)
                        <a href="/delete/{{$ad->id}}">
                            <input type="button" class="btn btn-primary" value="Delete ad">
                        </a>
                            @endif
                    </div>
            </div>
        </div>
    </main>
    @endsection