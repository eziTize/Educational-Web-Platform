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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="account-form" method="POST" action="{{ route('password.email') }}">
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
                        <div class="form-group text-center">
                            <input id="submit" type="submit" value="{{ __('Send Password Reset Link') }}">
                        </div>
                    </form>
                    <div class="option">
                        Remember your password? <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Sign-In-Section========== -->
@endsection