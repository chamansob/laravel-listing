<x-guest-layout>

    <!-- ================ Start Page Title ======================= -->
    <section class="title-transparent page-title"
        style="background:url({{ asset('frontend/assets/img/title-bg.jpg') }});">
        <div class="container">
            <div class="title-content">
                <h1>Reset Password</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <span class="gt3_breadcrumb_divider"></span>
                    <span class="current">Reset Password</span>
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

                    {{ Form::open(['route' => 'password.store', 'class' => 'text-left needs-validation', 'id' => 'login', 'method' => 'post', 'novalidate' => 'novalidate']) }}


                    <div class="row mrg-r-10 mrg-l-10">
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email', $request->email)" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="btn btn-midium theme-btn btn-radius width-200">
                                {{ __('Reset Password') }}
                            </x-primary-button>
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
