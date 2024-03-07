<!-- Counter Section -->
			<section class="company-state theme-overlap" style="background:url({{ asset('frontend/assets/img/tag-bg.jpg')}});">
				<div class="container-fluid">
					@foreach (App\Models\Counter::select('icon','name','sign','number') as $counter )
						<div class="col-md-3 col-sm-6">
						<div class="work-count">
							<span class="theme-cl icon icon-{{ $counter->icon }}"></span>
							<span class="counter">{{ $counter->number }}</span> <span class="counter-incr">{{ $counter->sign }}</span>
							<p>{{ $counter->name }}</p>
						</div>
					</div>
					@endforeach
					
					
				</div>
			</section>
			<!-- End Counter Section -->