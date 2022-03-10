<!DOCTYPE html>
<html>

<head>
    <title>Credit1solutions | CRM</title>

    <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{ asset('/') }}css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('/') }}css/flatly.css" />
    <link rel="stylesheet" href="{{ asset('/') }}css/font-awesome.css" />
    <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="{{ asset('/') }}css/sweetalert.css" />
    <link rel="stylesheet" href="{{ asset('/') }}css/crm/crm.css" />
    @yield("extrastyles")
</head>

<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href={!! URL::to("/") !!} class="navbar-brand"><img src={!! URL::asset("images/logo.png") !!} style="width: 200px;height: 35px;margin-top: -5px;"></a>
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                    @if(auth()->user()->role=='Admin')
                    <li @if(isset($optclass))class="active" @endif>
                        <a href={!! URL::to("/options") !!}>Options</a>
                    </li>
                    @endif
                    <li @if(isset($resclass)) class="active" @endif>
                        <a href="{{route('admin.dashboard')}}">Dashboard</a>
                    </li>
                    @if(auth()->user()->role=='Admin')
                    <li @if(isset($invclass)) class="active" @endif>
                        <a href={!! URL::to("/invite") !!}>Manage CRM users</a>
                    </li>
                    @endif
                    @if(auth()->user()->role=='Admin')
                    <li @if(isset($agreclass)) class="active" @endif>
                        <a href={!! URL::to("/agreement") !!}>Manage Agreement</a>
                    </li>
                    @endif
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="loginmenu">Welcome , {!! auth()->user()->username !!} <span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="loginmenu">
                            <li><a href={!! URL::to("/user") !!}>Settings</a></li>
                            <li>
                                <form action="{!! URL::to('/logout') !!}" method="post" id='logout'>
                                    @csrf
                                    <a href="#" class="logout" onclick="document.getElementById('logout').submit();">Logout</a>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <div style="display:none">
            <div id="apiUrl">{!! URL::to("api") !!}</div>
            <div id="token">{!! session()->token() !!}</div>
        </div>
    </div>

    @yield("container")
    <script src="{{ asset('/') }}js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}js/bootstrap.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}js/angular.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}js/sweetalert.min.js" type="text/javascript"></script>
    @yield("extrascripts")
</body>

</html>
