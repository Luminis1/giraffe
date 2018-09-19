
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href={{ asset('css/bootstrap.min.css') }} rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href={{ asset('css/blog.css') }} rel="stylesheet">
    <link href={{ asset('css/main.css') }} rel="stylesheet">

</head>

<body>
<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
            @if($auth != false)
                    <a class="text-muted" href="/edit">Create Ad</a>
                @endif
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="#">Adverts</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                @if($auth == false)
                    <a class="btn btn-sm btn-outline-secondary" href="/login">Sign up</a>
                    @else
                    <a class="btn btn-sm btn-outline-secondary" href="/logout">Logout</a>
                @endif
            </div>
        </div>
    </header>
</div>

@yield('index')
@yield('edit')
@yield('ad')


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src={{ asset('js/bootstrap.min.js') }}></script>
<script src={{ asset('js/jquery-3.3.1.min.js') }}></script>
<script src={{ asset('js/main.js') }}></script>

</body>
</html>
