<!-- Main Banner Section Start -->
			<div class="banner dark-opacity" style="background-image:url({{ asset($module_banner->image)}});" data-overlay="8">  
				<div class="container">
					<div class="banner-caption">
						<div class="col-md-12 col-sm-12 banner-text">
							<h1>{{ $module_banner->heading }}</span></h1>
							<p>{{ $module_banner->small_text }}</p>
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