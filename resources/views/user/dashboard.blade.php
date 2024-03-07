<x-front-layout>
    <!-- ================ Start Page Title ======================= -->
    <section class="title-transparent page-title"
        style="background:url({{ asset('frontend/assets/img/title-bg.jpg') }});">
        <div class="container">
            <div class="title-content">
                <h1>Profile</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <span class="gt3_breadcrumb_divider"></span>
                    <span class="current">Profile</span>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- ================ End Page Title ======================= -->

    <!-- ================ Edit Section Start ======================= -->
    <section class="padd-40">
        <div class="container">
            <div class="col-md-4 col-sm-12">
               @include('frontend.body.sidebar')
            </div>
            <div class="col-md-8 col-sm-12">
                <!-- General Information -->
                <div class="add-listing-box edit-info ">
                    <div class="listing-box-header">
                        <div class="avater-box">
                            <img src="{{ asset('frontend/assets/img/avatar.jpg') }}"
                                class="img-responsive img-circle edit-avater" alt="" />
                        </div>
                        <h3>{{ Auth::user()->name }}</h3>

                    </div>
                    <div class="row mrg-r-10 mrg-l-10 preview-info">
                        <div class="col-sm-6">
                            <label><i class="ti-mobile preview-icon call mrg-r-10"></i>{{ Auth::user()->phone }}</label>
                        </div>
                        <div class="col-sm-6">
                            <label><i class="ti-email preview-icon email mrg-r-10"></i>{{ Auth::user()->email }}</label>
                        </div>
                       
                    </div>
                </div>
                <!-- End General Information -->


            </div>
        </div>
    </section>
    <!-- ================ End Edit Section Start ======================= -->
</x-front-layout>
