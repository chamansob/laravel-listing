<x-guest-layout>

    <!-- ================ Start Page Title ======================= -->
    <section class="title-transparent page-title"
        style="background:url({{ asset('frontend/assets/img/title-bg.jpg') }});">
        <div class="container">
            <div class="title-content">
                <h1>Login</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <span class="gt3_breadcrumb_divider"></span>
                    <span class="current">Login</span>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- ================ End Page Title ======================= -->

    <!-- ================ Start Add Listing Section ======================= -->
    <section>
        <div class="container">
            <div class="col-md-10 col-sm-12 col-md-offset-1 mob-padd-0">
                <!-- General Information -->
                <div class="add-listing-box general-info mrg-bot-25 padd-bot-30 padd-top-25">

                    <div class="wel-back listing-box-header">
                        <i class="ti-lock theme-cl"></i>
                        <h2>Welcome <span class="theme-cl">Back Coach!</span></h2>
                    </div>
                    {{ Form::open(['route' => 'login', 'class' => 'text-left login-form needs-validation', 'id' => 'login', 'method' => 'post', 'novalidate' => 'novalidate']) }}

                    <div class="row mrg-r-10 mrg-l-10">
                        <div class="form-group">
                           <x-input-label for="username" :value="__('Username')" />
                            <x-text-input id="username"
                                class="form-control {{ $errors->get('username') ? 'is-invalid' : '' }}" type="text"
                                name="username" :value="old('username')" autofocus required />
                           

                            <x-input-error :messages="$errors->get('username')" class="invalid-feedback" />
                        </div>

                        <div class="form-group">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="invalid-feedback" />
                        </div>

                        <div class="block mt-4">
                            <div class="pull-right">   @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif</div>
                            <div class="pull-left">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded"
                                    name="remember">
                                <span
                                    class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                            </label></div>
                          
                        </div>

                        <div class="center mrg-top-30">
                           

                            <x-primary-button class="ms-3" class="btn btn-midium theme-btn btn-radius width-200">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                        <div class="center mrg-top-20 mrg-r-15">
                            <div class="bottom-login text-center">Don't have an account</div>
                            <a href="{{ route('register') }}" class="theme-cl"> {{ __('Create An Account') }}</a>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                <!-- End General Information -->


            </div>

        </div>
    </section>
    <!-- ================ End Add Listing Section ======================= -->

</x-guest-layout>
