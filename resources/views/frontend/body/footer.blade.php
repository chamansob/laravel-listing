 <!-- ================ Start Footer ======================= -->
        <footer class="footer dark-footer dark-bg">
            <div class="container">
                <div class="row">

                    <div class="col-md-3 col-sm-6">
                        <div class="footer-widget">
                            <x-logo path="{{ $template->logo }}" class="logo logo-display"
                                name="{{ $template->site_title }}"></x-logo>
                            <p>{{ $template->about }}</p>

                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="footer-widget">
                            <h3 class="widgettitle widget-title">Popular Services</h3>
                            <ul class="footer-navigation sinlge">
                                @foreach (App\Models\Categories::all() as $cat)
                                    <li><a href="#">{{ $cat->name }}</a></li>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-widget">
                            <h3 class="widgettitle widget-title">Quick Links</h3>
                            <ul class="footer-navigation sinlge">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="textwidget">
                                <h3 class="widgettitle widget-title">Get In Touch</h3>
                                <div class="address-box">
                                    <div class="sing-add">
                                        <i class="ti-location-pin"></i><a href="#"
                                            target="_blank">{{ $template->company_address }}</a>
                                    </div>
                                    <div class="sing-add">
                                        <i class="ti-email"></i><a href="mailto:{{ $template->email }}"
                                            target="_blank">{{ $template->email }}</a>
                                    </div>
                                    <div class="sing-add">
                                        <i class="ti-mobile"></i><a href="tel:{{ $template->support_phone }}"
                                            target="_blank">{{ $template->support_phone }}</a>
                                    </div>

                                </div>
                                <ul class="footer-social">
                                    <li><a href="{{ $template->facebook }}" target="_blank"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{ $template->twitter }}" target="_blank"><i
                                                class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{ $template->instagram }}" target="_blank"><i
                                                class="fa fa-instagram"></i></a></li>
                                    <li><a href="{{ $template->youtube }}" target="_blank"><i
                                                class="fa fa-youtube"></i></a></li>
                                    <li><a href="{{ $template->pinterest }}" target="_blank"><i
                                                class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
            <div class="footer-copyright">
                <p>Copyright@ {{ date('Y') }} {{ $template->site_title }} Design By <a
                        href="https://www.seooutofthebox.com/" title="SEO OUT THE BOX" target="_blank">Seo out of the
                        box</a></p>
            </div>
        </footer>
        <!-- ================ End Footer Section ======================= -->