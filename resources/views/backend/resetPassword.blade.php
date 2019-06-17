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
            <form method="post" action="{{route('resetPassword')}}" novalidate="novalidate">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-xs-12"><h2 class="text-center">Reset your password:</h2>
                        <input id="token" type="text" name="token" required="required"
                               class="form-control"
                               hidden
                               value="{{$data->token}}">

                        <h5>Your account:</h5>
                        <div class="form-group">
                            <input id="email" type="email" name="email" required="required"
                                   class="form-control"
                                   readonly
                                   value="{{$data->email}}">
                            <div class="form-control-border"></div>
                            <i class="form-control-icon fa fa-envelope"></i>
                            <div class="help-block with-errors"></div>
                        </div>

                        <h5>Your new password:</h5>
                        <div class="form-group">
                            <input id="password" type="password" name="newPassword"
                                   required="required"
                                   placeholder="Your password"
                                   class="form-control">
                            <div class="form-control-border"></div>
                            <i class="form-control-icon fa fa-key"></i>
                            <div class="help-block with-errors"></div>
                        </div>

                        <h5>Confirm your password:</h5>
                        <div class="form-group">
                            <input id="password" type="password" name="newPassword_confirmation"
                                   placeholder="confirm your password"
                                   required="required" data-error="Password is required." class="form-control">
                            <div class="form-control-border"></div>
                            <i class="form-control-icon fa fa-key"></i>
                            <div class="help-block with-errors"></div>
                        </div>
                        <button type="submit" class="button btn-send float-right">Submit</button>
                    </div>
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
