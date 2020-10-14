@extends('layouts.user')

@section('title', 'hibi - 新規登録')

@section('content')
<div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">
        
        <div class="col-md-2 mx-0">
            <h1 class="text-center">hibi</h1>
        </div>
        
        <div class="col-md-6 mx-0">
            <div class="card bg-transparent">
                <div class="card-body">
                    <div class="card-title text-center"><h2>新規登録</h2></div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-8 mx-auto">
                                <label for="name" class="col-form-label text-md-right">{{ __('messages.Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 mx-auto">
                                <label for="email" class="col-form-label text-md-right">{{ __('messages.E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-Mail Address" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 mx-auto">
                                <label for="password-confirm" class="col-form-label text-md-right">{{ __('messages.Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 text-right">
                                <button type="submit" class="btn btn-outline-secondary">
                                    {{ __('messages.Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
