@extends('layouts.auth')

@section('content')
<div class="container">
    

    <div class="row justify-content-center">
        <div class="col-md-6 mt-3">
        <div class="auth-wrapper auth-v1 px-2">
            <div class="auth-inner">
            
            <div class="card">

                <div class="card-body">
                <a href="{{ url('/') }}" class="brand-logo mb-3">
                                <img class="img-fluid" src="{{ asset(Helper::setting('logo')) }}" alt="Logo" title="Logo">
                            </a>
                            <h4 class="card-title mb-1">Welcome </h4>
                            <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="required">{{ __('Member ID') }}</label>
                                <input id="email" type="text" class="form-control @error('member_id') is-invalid @enderror" name="member_id" value="{{ old('member_id') }}" required autocomplete="email" autofocus>
                                @error('member_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="required">{{ __('Password') }}</label>
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link float-right p-0 m-0" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>

                                
                        </div>
                        <div class="form-group text-center">
                            or
                                
                        </div>
                        
                            <p class="text-center mt-2">
                                <span>New on our platform?</span>
                                <a href="{{ url('register') }}">
                                    <span>Create an account</span>
                                </a>
                            </p>
                    </form>
                </div>
                </div>
        </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</div>
@endsection
