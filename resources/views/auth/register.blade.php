@extends('custom-theme.master-auth')
@push('styles')
    <style>
        .pass-colorbar {
            background-image: url('{{url('custom-theme/assets/images/passwordstrength.jpg')}}');
        }
    </style>
@endpush
@section('content')

    <!-- ==========Sign-In-Section========== -->
    <section class="account-section bg_img" data-background="{{url('custom-theme/assets/images/account/')}}">
        <div class="container">
            <div class="padding-top padding-bottom">
                <div class="account-area">
                    <a href="{{url('/')}}" class="auth-btn">Home</a>
                    <div class="section-header-3" style="clear: both;">
                        <span class="cate">welcome to {{ config('app.name', 'Laravel') }}</span>
                        <h2 class="title">{{ __('Register') }}</h2>
                    </div>
                    <form class="account-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="name" class="mt-2 mb-0">Create account as<span>*</span></label>
                                    @error('register_as')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group filter-main">
                                    <div class="left w-100 mb-0">
                                        <div class="item w-100 mr-0 mb-0">
                                            <select class="select-bar wide" name="register_as">
                                                <option value="teacher">Coach</option>
                                                <option value="student">Coachee</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}<span>*</span></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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
                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}<span>*</span></label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group checkgroup">
                            <input type="checkbox" id="bal" required checked>
                            <label for="bal">I agree to the <a href="#0">Terms, Privacy Policy</a> and <a href="#0">Fees</a></label>
                        </div>
                        <div class="form-group text-center">
                            <input class="disabled" id="submit" type="submit" value="{{ __('Register') }}" disabled>
                        </div>
                    </form>
                    <div class="option">
                        Already have an account? <a href="{{ route('login') }}">Login</a>
                    </div>
                    <div class="or"><span>Or</span></div>
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
@push('scripts')
    <script>
        $('#password').password({
            field: '#email',
            useColorBarImage: false,
        }).on('password.score',function(e,score){
            if (score > 75) {
              $('#submit').removeAttr('disabled');
              $('#submit').removeClass('disabled');
            } else {
              $('#submit').attr('disabled', true);
              $('#submit').addClass('disabled');
            }
        });
    </script>
@endpush