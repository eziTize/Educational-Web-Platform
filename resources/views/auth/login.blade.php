@extends('custom-theme.master-auth')

@section('content')

    <!-- ==========Sign-In-Section========== -->
    <section class="account-section bg_img" data-background="{{url('custom-theme/assets/images/account/')}}">

        <div class="container">
            <div class="padding-top padding-bottom">
                <div class="account-area">
                     <a href="{{url('/')}}" class="auth-btn">Home</a>
                    <div class="section-header-3" style="clear: both;">
                        <span class="cate">welcome to {{ config('app.name', 'Laravel') }}</span>
                        <h2 class="title">{{ __('Login') }}</h2>
                    </div>
                    <form class="account-form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}<span>*</span></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}<span>*</span></label>
                            <input id="password" type="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group checkgroup">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">{{ __('Remember Me') }}</label>
                        </div>
                        <div class="form-group text-center">
                            <input id="submit" type="submit" value="{{ __('Login') }}">
                        </div>
                    </form>
                    <div class="option">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                        @endif
                    </div>
                    <div class="or"><span>Or</span></div>
                    <div class="option">
                        @if (Route::has('password.request'))
                            <a href="{{ route('register') }}">Create a new account</a>
                        @endif
                    </div>
                    <ul class="social-icons">
                        <li>
                            <a href="#0">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0" class="active">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                <i class="fab fa-google"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Sign-In-Section========== -->
@endsection