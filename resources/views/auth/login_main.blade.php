<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Credit1solutions | Log in</title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.3/skins/square/blue.min.css" integrity="sha512-58MzVQsj6kCCAzW+nXmeIdE/z4LfZQVUzE1prM+Gd3bAu0XLgCcfYYZxx4e/STDh/bYMx6EVG/oVxNcEO/EZhQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('/') }}css/crm/login.css"/>

  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="{!! URL::to('/') !!}">
          <img src="{!! URL::asset("images/logo.png") !!}" style="width: 200px;height: 35px;margin-top: -5px;">
        </a>
      </div><!-- /.login-logo -->
      @yield('content')
     <!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.3/icheck.min.js" integrity="sha512-RGDpUuNPNGV62jwbX1n/jNVUuK/z/GRbasvukyOim4R8gUEXSAjB4o0gBplhpO8Mv9rr7HNtGzV508Q1LBGsfA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $(function () {
        $('input.iCheckbox').iCheck({
          checkboxClass: 'icheckbox_square-orange',
          radioClass: 'iradio_square-orange',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
