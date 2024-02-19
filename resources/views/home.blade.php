<x-front-layout>
    <!-- Main Banner Section Start -->
			<div class="banner dark-opacity" style="background-image:url({{ asset('frontend/assets/img/home-banner.jpg')}});" data-overlay="8">  
				<div class="container">
					<div class="banner-caption">
						<div class="col-md-12 col-sm-12 banner-text">
							<h1>Discover Exceptional Coaches on  <span>Our Comprehensive Listing</span></h1>
							<p>Our platform is dedicated to connecting individuals with experienced coaches who can guide them on their personal and professional journeys. Whether you're seeking support in career advancement, personal development, or achieving specific goals, our curated directory features a diverse range of coaches with expertise in various fields.</p>
							<form class="form-verticle">
								<div class="col-md-4 col-sm-4 no-padd">
									<i class="banner-icon icon-pencil"></i>
									<input type="text" class="form-control left-radius right-br" placeholder="Keywords..">
								</div>
								<div class="col-md-3 col-sm-3 no-padd">
									<div class="form-box">
										<i class="banner-icon icon-map-pin"></i>
										<input type="text" class="form-control right-br" placeholder="Location..">
									</div>
								</div>
								<div class="col-md-3 col-sm-3 no-padd">
									<div class="form-box">
										<i class="banner-icon icon-layers"></i>
										<select class="form-control">
											<option data-placeholder="Choose Category" class="chosen-select">Choose Category</option>
											<option value="1">Food & restaurants </option>
											<option value="2">Shop & Education</option>
											<option value="3">Education</option>
											<option value="4">Business</option>
										</select>
									</div>
								</div>

								<div class="col-md-2 col-sm-2 no-padd">
									<div class="form-box">
										<button type="button" class="btn theme-btn btn-default">Search</button>
									</div>
								</div>
							</form>
							
							
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<!-- Main Banner Section End -->
			
			<!-- Services Section -->
			<section class="features">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
						<div class="heading">
							<h2>Plan Which in <span>Your Mind</span></h2>
							<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
						</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="feature-box">
							<span class="ti-map-alt"></span>
							<h4>Find Interesting Place</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="feature-box">
							<span class="ti-email"></span>
							<h4>Contact a Few Owners</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="feature-box">
							<span class="ti-user"></span>
							<h4>Make a Reservation</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
						</div>
					</div>
				</div>
			</section>
			<!-- End Services Section -->
			
			<!-- Popular Listing Section -->
			<section class="bg-image" style="background-image:url({{ asset('frontend/assets/img/bg-simple-2.jpg')}});" data-overlay="6">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
						<div class="heading light">
							<h2>Top & Popular <span>Listings</span></h2>
							<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
						</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="listing-shot grid-style style-2">
								<div class="listing-badge now-open">Now Open</div>
								<a href="listing-detail.html">
									<div class="listing-shot-img">
										<img src="{{ asset('frontend/assets/img/category/art.jpg')}}" class="img-responsive" alt="">
										<span class="approve-listing"><i class="fa fa-check"></i></span>
										<span class="like-listing" data-toggle="tooltip" title="22 Likes">
											<i class="fa fa-heart-o" aria-hidden="true"></i>
										</span>
									</div>
									<div class="listing-shot-caption">
										<h4>Art & Design</h4>
										<p class="listing-location">Bishop Avenue, New York</p>
										<a href="#" class="author-img-box"><img src="{{ asset('frontend/assets/img/user-1.png')}}" class="img-responsive author" alt=""></a>
									</div>
								</a>
								<div class="listing-shot-info">
									<div class="row extra">
										<div class="col-md-12">
											<div class="listing-detail-info">
												<span><i class="fa fa-phone" aria-hidden="true"></i> 807-502-5867</span>
												<span><i class="fa fa-globe" aria-hidden="true"></i> www.mysitelink.com</span>
											</div>
										</div>
									</div>
								</div>
								<div class="listing-shot-info rating">
									<div class="row extra">
										<div class="col-md-7 col-sm-7 col-xs-6">
											<i class="color fa fa-star" aria-hidden="true"></i>
											<i class="color fa fa-star" aria-hidden="true"></i>
											<i class="color fa fa-star" aria-hidden="true"></i>
											<i class="color fa fa-star-half-o" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
										<div class="col-md-5 col-sm-5 col-xs-6 pull-right">
											<div class="listing-info">
												<ul>
													<li><i class="ti-eye"></i>247</li>
													<li><i class="ti-comment-alt"></i>32</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-4 col-sm-6">
							<div class="listing-shot grid-style style-2">
								<a href="listing-detail.html">
									<div class="listing-shot-img">
										<img src="{{ asset('frontend/assets/img/category/education.jpg')}}" class="img-responsive" alt="">
										<span class="like-listing" data-toggle="tooltip" title="22 Likes">
											<i class="fa fa-heart-o" aria-hidden="true"></i>
										</span>
										<span class="approve-listing"><i class="fa fa-check"></i></span>
										<span class="pcat-name">Restourants</span>
									</div>
									<div class="listing-shot-caption">
										<h4>Education</h4>
										<p class="listing-location">Bishop Avenue, New York</p>
										<a href="#" class="author-img-box">
											<img src="{{ asset('frontend/assets/img/user-2.jpg')}}" class="img-responsive author" alt="">
										</a>
									</div>
								</a>
								<div class="listing-shot-info">
									<div class="row extra">
										<div class="col-md-12">
											<div class="listing-detail-info">
												<span><i class="fa fa-phone" aria-hidden="true"></i> 807-502-5867</span>
												<span><i class="fa fa-globe" aria-hidden="true"></i> www.mysitelink.com</span>
											</div>
										</div>
									</div>
								</div>
								<div class="listing-shot-info rating">
									<div class="row extra">
										<div class="col-md-7 col-sm-7 col-xs-6">
											<i class="color fa fa-star" aria-hidden="true"></i>
											<i class="color fa fa-star" aria-hidden="true"></i>
											<i class="color fa fa-star" aria-hidden="true"></i>
											<i class="color fa fa-star-half-o" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<span class="rating-count">4.7</span>
										</div>
										<div class="col-md-5 col-sm-5 col-xs-6 pull-right">
											<div class="listing-info">
												<ul>
													<li><i class="ti-eye"></i>247</li>
													<li><i class="ti-comment-alt"></i>32</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-4 col-sm-6">
							<div class="listing-shot grid-style style-2">
								<a href="listing-detail.html">
									<div class="listing-shot-img">
										<img src="{{ asset('frontend/assets/img/category/documentry.jpg')}}" class="img-responsive" alt="">
										<span class="approve-listing"><i class="fa fa-check"></i></span>
										<span class="like-listing"  data-toggle="tooltip" title="23 Likes">
											<i class="fa fa-heart-o" aria-hidden="true"></i>
										</span>
									</div>
									<div class="listing-shot-caption">
										<h4>Documentary</h4>
										<p class="listing-location">Bishop Avenue, New York</p>
										<a href="#" class="author-img-box"><img src="{{ asset('frontend/assets/img/user-3.jpg')}}" class="img-responsive author" alt=""></a>
									</div>
								</a>
								<div class="listing-shot-info">
									<div class="row extra">
										<div class="col-md-12">
											<div class="listing-detail-info">
												<span><i class="fa fa-phone" aria-hidden="true"></i> 807-502-5867</span>
												<span><i class="fa fa-globe" aria-hidden="true"></i> www.mysitelink.com</span>
											</div>
										</div>
									</div>
								</div>
								<div class="listing-shot-info rating">
									<div class="row extra">
										<div class="col-md-7 col-sm-7 col-xs-6">
											<i class="color fa fa-star" aria-hidden="true"></i>
											<i class="color fa fa-star" aria-hidden="true"></i>
											<i class="color fa fa-star" aria-hidden="true"></i>
											<i class="color fa fa-star-half-o" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
										<div class="col-md-5 col-sm-5 col-xs-6 pull-right">
											<div class="listing-info">
												<ul>
													<li><i class="ti-eye"></i>247</li>
													<li><i class="ti-comment-alt"></i>32</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- End Popular Listing Section -->
			
			<!-- Top Places Listing -->
			<section>
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
						<div class="heading">
							<h2>Top Places <span>Listing</span></h2>
							<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis.</p>
						</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-8 col-sm-7">
							<a href="search-listing.html" class="place-box">
								<span class="listing-count">110 Listing</span>
								<div class="place-box-content">
									<h4>Great Britain</h4>
									<span>Get All Listing</span>
								</div>
								<div class="place-box-bg" style="background-image: url({{ asset('frontend/assets/img/places/place-1.jpg')}});"></div>
							</a>
						</div>
						<div class="col-md-4 col-sm-5">
							<a href="search-listing.html" class="place-box">
								<span class="listing-count">110 Listing</span>
								<div class="place-box-content">
									<h4>Brunei Darussalam</h4>
									<span>Get All Listing</span>
								</div>
								<div class="place-box-bg" style="background-image: url({{ asset('frontend/assets/img/places/place-2.jpg')}});"></div>
							</a>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<a href="search-listing.html" class="place-box">
								<span class="listing-count">110 Listing</span>
								<div class="place-box-content">
									<h4>New Zealand</h4>
									<span>Get All Listing</span>
								</div>
								<div class="place-box-bg" style="background-image: url({{ asset('frontend/assets/img/places/place-3.jpg')}});"></div>
							</a>
						</div>
						
						<div class="col-md-8 col-sm-7">
							<a href="search-listing.html" class="place-box">
								<span class="listing-count">110 Listing</span>
								<div class="place-box-content">
									<h4>London</h4>
									<span>Get All Listing</span>
								</div>
								<div class="place-box-bg" style="background-image: url({{ asset('frontend/assets/img/places/place-4.jpg')}});"></div>
							</a>
						</div>
					</div>
				</div>
			</section>
			<!-- End Top Places Listing -->
			
			<!-- Counter Section -->
			<section class="company-state theme-overlap" style="background:url({{ asset('frontend/assets/img/tag-bg.jpg')}});">
				<div class="container-fluid">
					<div class="col-md-3 col-sm-6">
						<div class="work-count">
							<span class="theme-cl icon icon-trophy"></span>
							<span class="counter">200</span> <span class="counter-incr">+</span>
							<p>Awards Winning</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="work-count">
							<span class="theme-cl icon icon-layers"></span>
							<span class="counter">307</span> <span class="counter-incr">+</span>
							<p>Done Projects</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="work-count">
							<span class="theme-cl icon icon-happy"></span>
							<span class="counter">700</span> <span class="counter-incr">+</span>
							<p>Happy Clients</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="work-count">
							<span class="theme-cl icon icon-dial"></span>
							<span class="counter">770</span> <span class="counter-incr">+</span>
							<p>Cups Of Cofee</p>
						</div>
					</div>
				</div>
			</section>
			<!-- End Counter Section -->
			
			<!-- Testimonial Section -->
			<section class="testimonials-3" style="background:url({{ asset('frontend/assets/img/testimonial.png')}})">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
						<div class="heading">
							<h2>What Say <span>Our Customers</span></h2>
							<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
						</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div id="testimonial-3" class="slick-carousel-3">
								<div class="testimonial-detail">
									<div class="client-detail-box">
										<div class="pic">
											<img src="{{ asset('frontend/assets/img/user-1.png')}}" alt="">
										</div>
										<div class="client-detail">
											<h3 class="testimonial-title">Adam Alloriam</h3>
											<span class="post">Web Developer</span>
										</div>
									</div>
									<p class="description">
										" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi facilis itaque minus non odio, quaerat ullam eligendi facilis itaque minus non odio, quaerat ullam unde  unde voluptatum Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi. "
									</p>
								</div>

								<div class="testimonial-detail">
									<div class="client-detail-box">
										<div class="pic">
											<img src="{{ asset('frontend/assets/img/user-2.jpg')}}" alt="">
										</div>
										<div class="client-detail">
											<h3 class="testimonial-title">Illa Millia</h3>
											<span class="post">Project Manager</span>
										</div>
									</div>
									<p class="description">
										" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi facilis itaque minus non odio, quaerat ullam unde voluptatum eligendi facilis itaque minus non odio, quaerat ullam unde  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi."
									</p>
								</div>
								
								<div class="testimonial-detail">
									<div class="client-detail-box">
										<div class="pic">
											<img src="{{ asset('frontend/assets/img/user-3.jpg')}}" alt="">
										</div>
										<div class="client-detail">
											<h3 class="testimonial-title">Rout Millance</h3>
											<span class="post">Web Designer</span>
										</div>
									</div>
									<p class="description">
										" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi facilis itaque minus non odio, quaerat ullam unde voluptatum Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi."
									</p>
								</div>
								
								<div class="testimonial-detail">
									<div class="client-detail-box">
										<div class="pic">
											<img src="{{ asset('frontend/assets/img/team3.jpg')}}" alt="">
										</div>
										<div class="client-detail">
											<h3 class="testimonial-title">williamson</h3>
											<span class="post">Web Developer</span>
										</div>
									</div>
									<p class="description">
										" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi facilis itaque minus non odio, quaerat ullam unde voluptatum eligendi facilis itaque minus non odio, quaerat ullam unde ? "
									</p>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</section>	
			<!-- End Testimonial Section -->
</x-front-layout>
