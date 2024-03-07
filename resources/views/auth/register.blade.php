<x-guest-layout>

    <!-- ================ Start Page Title ======================= -->
    <section class="title-transparent page-title"
        style="background:url({{ asset('frontend/assets/img/title-bg.jpg') }});">
        <div class="container">
            <div class="title-content">
                <h1>Register</h1>
                <div class="breadcrumbs">
                     <a href="{{ url('/') }}">Home</a>
                    <span class="gt3_breadcrumb_divider"></span>
                    <span class="current">Register</span>
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
                        <h2>Create <span class="theme-cl">an Account For Coach</span></h2>
                    </div>
                    {{ Form::open(['route' => 'register', 'class' => 'text-left login-form needs-validation', 'id' => 'login', 'method' => 'post', 'novalidate' => 'novalidate']) }}

                    <div class="row mrg-r-10 mrg-l-10">
                        <!-- Name -->
                        <div class="form-group">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="invalid-feedback" />
                        </div>
                        <!-- Username -->
                        <div class="form-group">
                            <x-input-label for="username" :value="__('Username')" />
                            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                                :value="old('username')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('username')" class="invalid-feedback" />
                        </div>

                        <!-- Email Address -->
                        <div class="form-group">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="invalid-feedback" />
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="invalid-feedback" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="invalid-feedback" />
                        </div>

                       

                        <div class="center">

                            <x-primary-button id="login-btn" class="btn btn-midium theme-btn btn-radius width-200">
                               {{ __('Register') }}
                            </x-primary-button>

                        </div>
                       <div class="center mrg-top-5">
								<div class="bottom-login text-center">Already have an account?</div>
								<a href="{{ route('login') }}" class="theme-cl" > {{ __('Login') }} </a>
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
