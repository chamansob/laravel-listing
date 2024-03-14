<x-error-layout>
      @php
        $template = App\Models\SiteSetting::find(1);
        // dd($coach->coach_code);
    @endphp
    @section('main')
    @section('title', '403 - Authentication error')
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)
    <section>
				<div class="container">
					<div class="error-page padd-top-30 padd-bot-30">
						<h1 class="mrg-top-15 mrg-bot-0 cl-danger font-250 font-bold">403 </h1>
						<h2 class="mrg-top-10 mrg-bot-5 funky-font font-60">Authentication error</h2>
						<p>Forbidden – You don’t have permission to access / on this server
403 – Forbidden: Access is denied </p>
						<a href="{{ url('/') }}" class="btn theme-btn-trans mrg-top-20">Go To Home Page</a>
					</div>
				</div>
			</section>
</x-error-layout>