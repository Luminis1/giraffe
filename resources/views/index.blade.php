@extends('layouts.app')
@section('index')
<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            @foreach($ads as $k => $v)
            <div class="blog-post">
                <a href="/{{$v->id}}"><h2 class="blog-post-title">{{$v->title}}</h2></a>
                <p class="blog-post-meta">{{$v->created_at}} by <a href="#">{{$v->email}}</a></p>
                <p>{{$v->description}}</p>
                @if($v->author_id == $user_id)
                    <a href="/edit/{{$v->id}}">
                        <input type="button" class="btn btn-primary" value="Edit ad">
                    </a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <nav aria-label="paginator">
        <ul class="pagination justify-content-center">
            @for($i = 1; $i<$len+1; $i++)
            <li class="page-item"><a class="page-link" data-page="{{$i}}" href="/?page={{$i}}">{{$i}}</a></li>
                @endfor
        </ul>
    </nav>
</main>

@endsection