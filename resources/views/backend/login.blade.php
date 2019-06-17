<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Head Links-->
@include('layouts.head')
<!-- Head Links-->
<body>
<!-- Loading animation -->
@include('layouts.loading')
<!-- /Loading animation -->
<div id="page" class="page">
    <!-- Main Content -->
    <div id="main" class="site-main m-0">
        <!-- Page changer wrapper -->
        <div class="col-sm-6 col-md-4 m-auto">
            <div class="my-photo">
                <img src="org/sunshine/images/my_photo.png" alt="image">
                <div class="mask"></div>
            </div>
            <div class="m-auto">
                <h3 class="text-center">Welcome Back !</h3>
            </div>
            <form method="post" action="{{route('login')}}">
                @csrf
                <div class="messages"></div>
                <div class="controls">
                    <div class="form-group">
                        <input id="email" type="email" name="email" placeholder="Email Address"
                               required="required" data-error="Valid email is required."
                               class="form-control"
                               value="{{old('email')}}"
                        >
                        <div class="form-control-border"></div>
                        <i class="form-control-icon fa fa-envelope"></i>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" name="password" placeholder="Your password"
                               required="required" data-error="Password is required."
                               class="form-control">
                        <div class="form-control-border"></div>
                        <i class="form-control-icon fa fa-key"></i>
                        <div class="help-block with-errors"></div>
                    </div>

                    <button class="button btn-send float-right">Login</button>
                    <a href="{{route('emailPage')}}">Forget password?</a>
                </div>
            </form>
        </div>
        <!-- /Page changer wrapper -->
        <!-- /Main Content -->
    </div>
</div>
@include('layouts.foot')
@include('util.message')
@stack('js')
</body>
</html>
