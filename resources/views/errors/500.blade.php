<x-error-layout>
      @php
        $template = App\Models\SiteSetting::find(1);
        // dd($coach->coach_code);
    @endphp
    @section('main')
    @section('title', '500 - Internal Server Error')
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)
    <section>
				<div class="container">
					<div class="error-page padd-top-30 padd-bot-30">
						<h1 class="mrg-top-15 mrg-bot-0 cl-danger font-250 font-bold">500 </h1>
						<h2 class="mrg-top-10 mrg-bot-5 funky-font font-60">Internal Server</h2>
						<p>The page you are looking for doesn't exist </p>
						<a href="{{ url('/') }}" class="btn theme-btn-trans mrg-top-20">Go To Home Page</a>
					</div>
				</div>
			</section>
</x-error-layout>