<!-- Testimonial Section -->
			<section class="testimonials-3" style="background:url({{ asset('frontend/assets/img/testimonial.png')}})">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
						<div class="heading">
							<h2>What Say <span>Our Customers</span></h2>
							<p>Empowering Voices, Amplifying Visions: What Say Our Client?</p>
						</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div id="testimonial-3" class="slick-carousel-3">
							@foreach (App\Models\Testimonial::select('name','designation','image','text')->where('status',0)->get() as $tes )
									
								<div class="testimonial-detail">
									<div class="client-detail-box">
										<div class="pic">
											<img src="{{ asset($tes->image)}}" alt="">
										</div>
										<div class="client-detail">
											<h3 class="testimonial-title">{{ ucfirst($tes->name) }}</h3>
											<span class="post">{{ ucfirst($tes->designation) }}</span>
										</div>
									</div>
									<p class="description">
										{{ ucfirst($tes->text) }}</p>
								</div>
							@endforeach
							
							</div>
						</div>
					</div>
					
				</div>
			</section>	
			<!-- End Testimonial Section -->