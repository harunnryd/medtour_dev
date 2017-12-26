@extends('layouts.app')

@section('content')
<div class="container container-bg-login">
            <div class="panel panel-default panel-default-padding box-login-custom">
                <div class="panel-heading login-head">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} padding-form-group-custom custom-login-label">
                            <label for="email">E-Mail Address</label>

                            <div class="input-login-custom">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} padding-form-group-custom custom-login-label">
                            <label for="password">Password</label>

                            <div class="input-login-custom">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                     
                        <div class="form-group padding-form-group-custom">
                                <button type="submit" class="btn-login-st">
                                    Login
                                </button>
								 <div class="checkbox checkbox-login">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                        </div>
                    </form>
                </div>
            </div>
</div>
@endsection
