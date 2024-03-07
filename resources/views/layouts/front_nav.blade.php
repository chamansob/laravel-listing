<nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">
    <div class="container-fluid">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
            <i class="ti-align-left"></i>
        </button>

        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">
                <x-logo path="{{ App\Models\SiteSetting::find(1)->logo }}" class="logo logo-display"
                    name="{{ App\Models\SiteSetting::find(1)->site_title }}"></x-logo>
                <x-logo-scrolled path="{{ App\Models\SiteSetting::find(1)->logo }}" class="logo logo-scrolled"
                    name="{{ App\Models\SiteSetting::find(1)->site_title }}"></x-logo-scrolled>

            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                <li class="dropdown active">
                    <a href="login.html" class="dropdown-toggle" data-toggle="dropdown">Home</a>
                    <ul class="dropdown-menu animated fadeOutUp">
                        <li><a href="index-2.html">Home 1</a></li>
                        <li><a href="index-3.html">Home 2</a></li>
                        <li><a href="index-4.html">Home 3</a></li>
                        <li><a href="index-5.html">Home 4</a></li>
                        <li><a href="index-6.html">Home 5</a></li>
                        <li><a href="index-7.html">Home 6</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="login.html" class="dropdown-toggle" data-toggle="dropdown">Explore</a>
                    <ul class="dropdown-menu animated fadeOutUp">
                        <li><a href="top-author.html">Top Author<span class="new-page-badge">New</span></a></li>
                        <li><a href="author-detail.html">Author Detail<span class="new-page-badge">New</span></a></li>
                        <li><a href="search-listing.html">Search Listing</a></li>
                        <li><a href="add-listing.html">Add Listing</a></li>
                        <li><a href="listing-detail.html">Listing Detail</a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Listing</a>
                            <ul class="dropdown-menu animated fadeOutUp">
                                <li><a href="full-width-grid.html">Full Width Listing</a></li>
                                <li><a href="full-width-vertical.html">Full Vertical Listing</a></li>
                                <li><a href="grid-sidebar.html">Listing With Sidebar</a></li>
                                <li><a href="vertical-sidebar.html">Vertical With Sidebar</a></li>
                                <li><a href="top-place-list.html">Top Places</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category</a>
                            <ul class="dropdown-menu animated fadeOutUp">
                                <li><a href="category-1.html">Category Style 1</a></li>
                                <li><a href="category-2.html">Category Style 2</a></li>
                                <li><a href="category-3.html">Category Style 3</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">User Panel</a>
                            <ul class="dropdown-menu animated fadeOutUp">
                                <li><a href="edit-profile.html">Profile Settings</a></li>
                                <li><a href="profile-detail.html">Profile Detail</a></li>
                                <li><a href="manage-listing.html">Manage Listing</a></li>
                                <li><a href="invoice.html">Check Invoice</a></li>
                                <li><a href="create-pricing.html">Create Pricing</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="login.html" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
                    <ul class="dropdown-menu animated fadeOutUp">
                        <li><a href="payment-method.html">Payment Method</a></li>
                        <li><a href="thank-you.html">Thank You</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-detail.html">Blog Detail</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="component.html">Component</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="pricing.html">Pricing</a></li>
                        <li><a href="404.html">404</a></li>
                        <li><a href="icons.html">Icons</a></li>
                    </ul>
                </li>


            </ul>
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">

                @auth
                    @if (Auth::user()->role == 'user')
                        <li class="no-pd dropdown">
                            <a href="{{ route('dashboard') }}" class="addlist"><img
                                    src="{{ asset('frontend/assets/img/avatar.jpg') }}"
                                    class="img-responsive img-circle avater-img"
                                    alt="" /><strong>{{ Auth::user()->name }}</strong></a>
                            <ul class="dropdown-menu animated navbar-left fadeOutUp">
                                <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                                <li><a href="{{ route('logout') }}">Log Out</a></li>
                            </ul>
                        </li>
                    @elseif (Auth::user()->role == 'admin')
                        <li class="no-pd dropdown">
                            <a href="{{ route('admin.dashboard') }}" class="addlist"><img
                                    src="{{ asset('assets/img/avatar.jpg') }}"
                                    class="img-responsive img-circle avater-img"
                                    alt="" /><strong>Admin</strong></a>
                            <ul class="dropdown-menu animated navbar-left fadeOutUp">
                                <li><a href="{{ route('logout') }}">Log Out</a></li>
                            </ul>
                        </li>
                    @endif
                @else
                    <li class="no-pd">
                        <a class="addlist" href="{{ route('login') }}"><i class="ti-user" aria-hidden="true"></i>Sign
                            In</a>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>
