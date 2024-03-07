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

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif

                    <div class="mt-4 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <div class="row mrg-r-10 mrg-l-10">
                                <div>
                                    <x-primary-button>
                                        {{ __('Resend Verification Email') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div class="row mrg-r-10 mrg-l-10">
                                <button type="submit"
                                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Log Out') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End General Information -->


            </div>

        </div>
    </section>
    <!-- ================ End Add Listing Section ======================= -->

</x-guest-layout>
