<x-guest-layout>

    <!-- ================ Start Page Title ======================= -->
    <section class="title-transparent page-title"
        style="background:url({{ asset('frontend/assets/img/title-bg.jpg') }});">
        <div class="container">
            <div class="title-content">
                <h1>Forget Password</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <span class="gt3_breadcrumb_divider"></span>
                    <span class="current">Forget Password</span>
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

                    

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />


                    {{ Form::open(['route' => 'password.email', 'class' => 'text-left login-form needs-validation', 'id' => 'login', 'method' => 'post', 'novalidate' => 'novalidate']) }}
                    <div class="row mrg-r-10 mrg-l-10">
                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="btn btn-midium theme-btn btn-radius">
                                {{ __('Email Password Reset Link') }}
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
