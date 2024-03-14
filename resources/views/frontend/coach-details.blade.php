<x-front-layout>
    @php
        $template = App\Models\SiteSetting::find(1);
        // dd($coach->coach_code);
    @endphp
    @section('main')
    @section('title', 'Coach Details')
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)

    <!-- ================ Listing Detail Basic Information ======================= -->
    <section class="detail-section bg-image" style="background:url({{ asset($coach->image) }});"
        data-overlay="6">
        <div class="profile-cover-content">
            <div class="container">
                <div class="cover-buttons">
                    <ul>
                        <li>
                            <div class="buttons medium button-plain "><i class="fa fa-phone"></i>{{ $coach->phone }}</div>
                        </li>
                        <li>
                            <div class="buttons medium button-plain "><i
                                    class="fa fa-map-marker"></i>{{ $coach->address }}</div>
                        </li>
                        <li>
                            <div class="inside-rating buttons listing-rating theme-btn button-plain"><span
                                    class="value">9.7</span> <sup class="out-of">/10</sup></div>
                        </li>
                        <li><a href="#add-review" class="buttons btn-outlined medium add-review"><i
                                    class="fa fa-comments-o"></i><span class="hidden-xs">Add review</span></a></li>
                        <li><a href="#" data-listing-id="74" data-nonce="01a769d424"
                                class="buttons btn-outlined"><i class="fa fa-heart-o"></i><span
                                    class="hidden-xs">Bookmark</span> </a></li>
                    </ul>
                </div>
                <div class="listing-owner hidden-xs hidden-sm">
                    <div class="listing-owner-avater">
                        <img src="assets/img/avatar.jpg" class="img-responsive img-circle" alt="" />
                    </div>
                    <div class="listing-owner-detail">
                        <h4>{{ $coach->name }}</h4>
                        <span class="theme-cl">{{ $coach->coach_code }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ End Listing Detail Basic Information ======================= -->

    <!-- ================ Listing Detail Full Information ======================= -->
    <section class="list-detail">
        <div class="container">
            <div class="row">
                <!-- Start: Listing Detail Wrapper -->
                <div class="col-md-8 col-sm-8">
                    <div class="detail-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <h3>{{ $coach->name }} <span class="mrg-l-5 category-tag"> {{ $categories = implode(',', $coach->categories()->pluck('name')->toArray()) }}</span></h3>
                                <div>
                                    <a href="#listing-location" class="listing-address">
                                        <i class="ti-location-pin mrg-r-5"></i>
                                       {{ $coach->address }}
                                    </a>

                                 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="detail-wrapper">
                        <div class="detail-wrapper-header">
                            <h4>Overview</h4>
                        </div>
                        <div class="detail-wrapper-body">
                            <p>{{ $coach->text }}</p>
                        </div>
                    </div>

                    <div class="detail-wrapper">
                        <div class="detail-wrapper-header">
                            <h4>Details</h4>
                        </div>
                        <div class="detail-wrapper-body">
                            <table class="ui unstackable very basic definition table">
                                <tbody>

                                    <tr>
                                        <td width="25%">Coaching Themes</td>
                                        <td> {{ $coachthemes = implode(',', $coach->coachthemes()->pluck('name')->toArray()) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="25%">Coaching Methods</td>
                                        <td>
                                            {{ $coachmethods = implode(',', $coach->coachmethods()->pluck('name')->toArray()) }}
                                        </td>
                                    </tr>



                                    <tr>
                                        <td width="25%">Rates</td>
                                        <td>
                                            ${{ $coach->price }}
                                        </td>
                                    </tr>



                                    <tr>
                                        <td width="25%">Coached Organizations</td>
                                        <td>
                                            {{ $coachorgs = implode(',', $coach->coachorgs()->pluck('name')->toArray()) }}
                                        </td>
                                    </tr>



                                    <tr>
                                        <td width="25%">Positions Held</td>
                                        <td>
                                            {{ $heldpositions = implode(',', $coach->heldpositions()->pluck('name')->toArray()) }}
                                        </td>
                                    </tr>



                                    <tr>
                                        <td width="25%">Degrees</td>
                                        <td>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="25%">Gender</td>
                                        <td>

                                            {{ GENDER[$coach->gender] }}

                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="25%">Age</td>
                                        <td>
                                            {{ $coach->age }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="25%">Fluent Languages</td>
                                        
                                        <td>
                                            {{ $languages = implode(',', $coach->languages()->pluck('name')->toArray()) }}
                                        </td>
                                        
                                    </tr>

                                    <tr>
                                        <td width="25%">Can Provide</td>
                                        <td>
                                            {{ $canprovides = implode(',', $coach->canprovides()->pluck('name')->toArray()) }}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>





                </div>
                <!-- End: Listing Detail Wrapper -->

                <!-- Sidebar Start -->
                <div class="col-md-4 col-sm-12">
                    <div class="sidebar">
                        <!-- Start: Book A Reservation -->
                        <div class="widget-boxed">
                            <div class="widget-boxed-header">
                                <h4><i class="ti-calendar padd-r-10"></i>Book A Meeting</h4>
                            </div>
                            <div class="widget-boxed-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <input type="text" id="reservation-date" data-lang="en"
                                            data-large-mode="true" data-min-year="2017" data-max-year="2020"
                                            data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0"
                                            data-theme="my-style" class="form-control" readonly="">
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <input type="text" id="reservation-time" class="form-control" readonly="">
                                    </div>
                                </div>
                                <div class="row mrg-top-15">
                                    <div class="col-lg-6 col-md-12">
                                        <label>Adult</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn counter-btn theme-cl btn-number"
                                                    disabled="disabled" data-type="minus" data-field="quant[1]">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </span>
                                            <input type="text" name="quant[1]"
                                                class="border-0 text-center form-control input-number" data-min="0"
                                                data-max="10" value="0">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn counter-btn theme-cl btn-number"
                                                    data-type="plus" data-field="quant[1]">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <label>Children</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn counter-btn theme-cl btn-number"
                                                    disabled="disabled" data-type="minus" data-field="quant[2]">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </span>
                                            <input type="text" name="quant[2]"
                                                class="border-0 text-center form-control input-number" data-min="0"
                                                data-max="10" value="0">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn counter-btn theme-cl btn-number"
                                                    data-type="plus" data-field="quant[2]">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <a href="payment-method.html"
                                    class="btn reservation btn-radius theme-btn full-width mrg-top-10">Book Now</a>
                            </div>
                        </div>
                        <!-- End: Book A Reservation -->

                    </div>
                </div>
                <!-- End: Sidebar Start -->
            </div>
        </div>
    </section>
    <!-- ================ Listing Detail Full Information ======================= -->

    <!-- ================ Start Footer ======================= -->
</x-front-layout>
