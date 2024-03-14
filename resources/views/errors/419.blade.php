<x-error-layout>
      @php
        $template = App\Models\SiteSetting::find(1);
        // dd($coach->coach_code);
    @endphp
    @section('main')
    @section('title', '419 - Page Expired')
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)
    <section>
				<div class="container">
					<div class="error-page padd-top-30 padd-bot-30">
						<h1 class="mrg-top-15 mrg-bot-0 cl-danger font-250 font-bold">419 </h1>
						<h2 class="mrg-top-10 mrg-bot-5 funky-font font-60">Page Expired</h2>
						<p>click the refresh button in your browser and re-send the form</p>
						<a href="{{ url('/') }}" class="btn theme-btn-trans mrg-top-20">Go To Home Page</a>
					</div>
				</div>
			</section>
</x-error-layout>