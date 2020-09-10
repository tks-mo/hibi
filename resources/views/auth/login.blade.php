@extends('layouts.user')

@section('content')
<div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">
        
        <div class="col-md-2 mx-0">
            <h1 class="text-center">hibi</h1>
        </div>
        
        <div class="col-md-6 mx-0">
            <div class="card bg-transparent">
                <div class="card-body">
                    <div class="card-title text-md-center"><h3>Login</h3></div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-8 mx-auto">
                                <label for="email" class="col-form-label text-md-right">{{ __('messages.E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 mx-auto">
                                <label for="password" class="col-form-label text-md-right">{{ __('messages.Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 mx-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('messages.Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 mx-auto">
                                <button type="submit" class="btn btn-outline-secondary">
                                    {{ __('messages.Login') }}
                                </button>
                            </div>
                        </div>
                        
                        <div cloass="form-group row mb-0">
                            <div  class="col-md-8 mx-auto">
                                @if (Route::has('password.request'))
                                    <a class="btn-link" href="{{ route('password.request') }}">
                                        {{ __('messages.Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
