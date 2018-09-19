@extends('layouts.app')
@section('edit')
    <main role="main" class="container">
        <br>
    <form method="post" action="/saveAd">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required
                   value="@if(!empty($ad)){{$ad->title}}@endif">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description" required>@if(!empty($ad)){{$ad->description}}@endif
            </textarea>
        </div>
        {{ csrf_field() }}
        @if(!empty($ad))
            <input type="text" name="ad-id" value="{{$ad->id}}" hidden>
            <button class="btn btn-primary" type="submit">Edit ad</button>
            @else
            <input type="text" name="ad-id" value="" hidden>
            <button class="btn btn-primary" type="submit">Create ad</button>
        @endif

    </form>
    </main>
    @endsection