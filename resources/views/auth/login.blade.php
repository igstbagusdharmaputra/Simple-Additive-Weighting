@extends('layouts.app')

@section('css')
<style>
    .invalid-feedback{
        display: block;
        margin-bottom: .75rem;
        margin-top: -1.25rem;
    }
</style>
@endsection

@section('content')
<!-- login area start -->
<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form method="POST" action="{{ route('login') }}">
            	@csrf

                <div class="login-form-head">
                    <h4>Sign In</h4>
                    {{-- <p>Hello there, Sign in and start managing your Admin Template</p> --}}
                </div>
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" id="exampleInputUsername1" class="{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                        <i class="ti-user"></i>
                    </div>
                    @if ($errors->has('username'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" id="exampleInputPassword1" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        <i class="ti-lock"></i>
                    </div>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember" {{ old('remember') ? 'checked' : '' }} id="remember" >
                                <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                            </div>
                        </div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Login <i class="ti-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->
@endsection