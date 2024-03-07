<x-front-layout>
    @php
        $template = App\Models\SiteSetting::find(1);
        $module_banner = App\Models\Module::find(1);
        $module2 = App\Models\Module::find(2);
        //dd($module2);
    @endphp
    @section('main')
    @section('title', $template->site_title)
    @section('meta_description', $template->meta_description)
    @section('meta_keywords', $template->meta_keywords)

    @include('frontend.body.banner')

    @include('frontend.body.services')

    @include('frontend.body.popular-listing')
    @include('frontend.body.top-listing')

    @include('frontend.body.counter')

    @include('frontend.body.testimonails')
</x-front-layout>
