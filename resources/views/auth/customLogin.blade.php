@extends('layouts.loginLayout')
@section('login')
<form class="form-signin" method="post" action="/loginUser">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="login" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required>
    {{ csrf_field() }}
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>
    @endsection
