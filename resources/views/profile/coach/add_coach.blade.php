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
             
                    @include('profile.partials.add-coach-form')
              
               
            </div>

        </div>
    </section>
    <!-- ================ End Edit Section Start ======================= -->
</x-front-layout>
