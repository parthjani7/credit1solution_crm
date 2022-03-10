@extends("auth.login_main")

@section("content")
    <div class="login-box-body">
        <h2 class="login-box-msg">Password Reset</h2>
        <p>Enter the new password</p>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <form method="POST" action="{{ route('password.update') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="email" value="{!! $email !!}" />
            <input type="hidden" name="token" value="{!! $token !!}" />
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-6">
                </div><!-- /.col -->
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Set Password</button>
                </div><!-- /.col -->
            </div>
        </form>
    </div>
@endsection
