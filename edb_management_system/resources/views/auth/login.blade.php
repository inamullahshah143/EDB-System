@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row align-items-lg-center" style="height:100vh">
            <div class="col"></div>
            <div class="col-md-5 align-items-lg-center">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <a href="#">
                                <img src="{{ URL::to('assets/images/logo.png') }}" style="height:150px;" alt="">
                            </a>
                        </div>
                        <h4 class="text-center m-2 p-2">Sign in your account</h4>
                        <form method="POST" action="{{ route('login') }}" class="m-2">
                            @csrf
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required
                                        autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="{{ __('Password') }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class=" text-center">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center m-3">
                                    <span class="opacity-70 mr-4">
                                        Don't have an account yet?
                                    </span>
                                    <a href="{{ route('register') }}"
                                        class="text-muted text-hover-primary font-weight-bold">Sign
                                        Up!</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
