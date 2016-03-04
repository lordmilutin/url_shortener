
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>UpWork pro Web Developer Assignment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css')  !!}" media="screen">
    <link rel="stylesheet" href="{!! asset('assets/css/custom.min.css') !!}">
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{!! route('dashboard') !!}">Dashboard</a>
                </li>
                @if(auth()->check())
                    <li>
                        <a href="{!! route('url.index') !!}">My URLs</a>
                    </li>
                    <li>
                        <a href="{!! route('logout') !!}">Logout</a>
                    </li>
                @else
                    <li>
                        <a href="{!! route('login') !!}">Login</a>
                    </li>
                    <li>
                        <a href="{!! route('register') !!}">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>


<div class="container" style="padding: 30px">
    <div class="row">
        <div class="col-lg-8 col-md-7 col-sm-6">
            <h1>UpWork pro Web Developer Assignment</h1>
            <p class="lead">Milutin Stanković</p>
        </div>
    </div>
    @yield('content')
    @if(!auth()->check())
        <div class="alert alert-info">
            <p>Please login if you wish to save or manage your links</p>
        </div>
    @endif
</div>


<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="{!! asset('assets/js/bootstrap.min.js')!!}"></script>
<script src="{!! asset('assets/js/custom.js')!!}"></script>

@yield('extra-js')
</body>
</html>
