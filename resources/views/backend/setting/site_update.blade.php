<x-main-layout>
    @section('title', breadcrumb())
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title fw-bold pb-4">Update Site Setting </h6>
                {!! Form::open([
                    'method' => 'patch',
                    'route' => ['update.site.setting', $sitesetting->id],
                    'class' => 'forms-sample needs-validation',
                    'novalidate' => 'novalidate',
                    'files' => true,
                ]) !!}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <?php
                            
                            if ($sitesetting->logo != null) {
                                $wsize = 10;
                                $small_img = $sitesetting->logo;
                            } else {
                                $small_img = '';
                                $wsize = 12;
                            }
                            ?>
                            <div class="col-sm-{{ $wsize }}">
                                <div class="mb-3">

                                    {!! Form::label('logo', 'Logo', ['class' => 'form-label']) !!}

                                    {!! Form::file('logo', [
                                        'class' => 'form-control',
                                        'placeholder' => 'Main Thumbnail',
                                        'onchange' => 'mainThamUrl(this)',
                                    ]) !!}
                                    @error('logo')
                                        <span class="text-danger pt-3">{{ $message }}</span>
                                    @enderror
                                    <div class="mt-3">
                                        <img src="" id="mainThmb" class="img-responsive border border-1">
                                    </div>
                                </div>
                            </div>
                            @if ($sitesetting->logo != null)
                                <div class="mt-3 col-sm-2"><img src="{{ asset($small_img) }}"
                                        class="img-thumbnail img-fluid img-responsive w-10">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <?php
                            
                            if ($sitesetting->favicon != null) {
                                $wsize = 10;
                                $small_img = $sitesetting->favicon;
                            } else {
                                $small_img = '';
                                $wsize = 12;
                            }
                            ?>
                            <div class="col-sm-{{ $wsize }}">
                                <div class="mb-3">

                                    {!! Form::label('favicon', 'Favicon', ['class' => 'form-label']) !!}

                                    {!! Form::file('favicon', [
                                        'class' => 'form-control',
                                        'placeholder' => 'Main Thumbnail',
                                        'onchange' => 'mainThamUrl(this)',
                                    ]) !!}
                                    @error('favicon')
                                        <span class="text-danger pt-3">{{ $message }}</span>
                                    @enderror
                                    <div class="mt-3">
                                        <img src="" id="mainThmb" class="img-responsive border border-1">
                                    </div>
                                </div>
                            </div>
                            @if ($sitesetting->favicon != null)
                                <div class="mt-3 col-sm-2"><img src="{{ asset($small_img) }}"
                                        class="img-thumbnail img-fluid img-responsive w-10">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">

                            {!! Form::label('app_name', 'App Name', ['class' => 'form-label']) !!}

                            {!! Form::text('app_name', $value = $sitesetting->app_name, [
                                'class' => 'form-control',
                                'placeholder' => 'App Name',
                                'required' => 'required',
                            ]) !!}
                            @error('site_title')
                                <span class="text-danger pt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">

                            {!! Form::label('site_title', 'Site Title', ['class' => 'form-label']) !!}

                            {!! Form::text('site_title', $value = $sitesetting->site_title, [
                                'class' => 'form-control',
                                'placeholder' => 'site_title',
                                'required' => 'required',
                            ]) !!}
                            @error('site_title')
                                <span class="text-danger pt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">

                            {!! Form::label('meta_description', 'Meta Description', ['class' => 'form-label']) !!}

                            {!! Form::textarea('meta_description', $value = $sitesetting->meta_description, [
                                'class' => 'form-control',
                                'placeholder' => 'Meta Description',
                                'rows' => 5,
                                'cols' => 30,
                            ]) !!}
                            @error('site_title')
                                <span class="text-danger pt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">

                            {!! Form::label('meta_keywords', 'Meta Keywords', ['class' => 'form-label']) !!}

                            {!! Form::textarea('meta_keywords', $value = $sitesetting->meta_keywords, [
                                'class' => 'form-control',
                                'placeholder' => 'Meta Keywords',
                                'rows' => 5,
                                'cols' => 30,
                            ]) !!}
                            @error('site_title')
                                <span class="text-danger pt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <h2>Footer Section</h2>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">

                            {!! Form::label('company_address', 'Company Address', ['class' => 'form-label']) !!}

                            {!! Form::text('company_address', $value = $sitesetting->company_address, [
                                'class' => 'form-control',
                                'placeholder' => 'Company Address',
                            ]) !!}

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">

                            {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}

                            {!! Form::text('email', $value = $sitesetting->email, [
                                'class' => 'form-control',
                                'placeholder' => 'Email',
                            ]) !!}

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">

                            {!! Form::label('support_phone', 'Phone', ['class' => 'form-label']) !!}

                            {!! Form::text('support_phone', $value = $sitesetting->support_phone, [
                                'class' => 'form-control',
                                'placeholder' => 'Phone',
                            ]) !!}

                        </div>

                    </div>
                </div>
                <div class="row">
                    @php
                        $stylelist = [
                            'main',
                            'alabama',
                            'imperial-blue',
                            'university',
                            'cerulean',
                            'bronze',
                            'viridian-green',
                            'amaranth',
                            'yellow',
                            'coquelicot',
                            'viridian-green',
                            'dark-cyan',
                            'azure',
                            'blue-green',
                            'crimson',
                            'cerulean',
                            'blueberry',
                            'burnt-orange',
                            'lilac',
                            'amber',
                            'cg-blue',
                            'ball-blue',
                            'american-rose',
                            'alizarin',
                            'dark-pink',
                            'lime-green',
                            'cyan-cornflower',
                            'blue-munsell',
                            'violet',
                            'orange-pantone',
                            'magenta-violet',
                            'forest-green',
                            'debian-red',
                            'go-green',
                            'rich-carmine',
                            'university',
                            'charcoal',
                            'cadmium',
                            'fuchsia',
                            'green-pantone',
                            'amaranth',
                        ];
                    @endphp
                    <div class="col-sm-1">
                        <div class="mbox {{ $stylelist[$sitesetting->style] }}  rounded-2 "></div>
                    </div>
                    <div class="col-sm-11"> {!! Form::label('style', 'Color Style', ['class' => 'form-label']) !!}
                        {!! Form::select('style', $stylelist, $sitesetting->style, [
                            'class' => 'form-select mb-3',
                            'placeholder' => 'Color Style',
                        ]) !!}</div>
                </div>

                <div class="mb-3">

                    {!! Form::label('facebook', 'Facebook', ['class' => 'form-label']) !!}

                    {!! Form::text('facebook', $value = $sitesetting->facebook, [
                        'class' => 'form-control',
                        'placeholder' => 'Facebook',
                    ]) !!}

                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">

                            {!! Form::label('twitter', 'Twitter', ['class' => 'form-label']) !!}

                            {!! Form::text('twitter', $value = $sitesetting->twitter, [
                                'class' => 'form-control',
                                'placeholder' => 'Twitter',
                            ]) !!}

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">

                            {!! Form::label('pinterest', 'Pinterest', ['class' => 'form-label']) !!}

                            {!! Form::text('pinterest', $value = $sitesetting->pinterest, [
                                'class' => 'form-control',
                                'placeholder' => 'Pinterest',
                            ]) !!}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">

                            {!! Form::label('instagram', 'Instagram', ['class' => 'form-label']) !!}

                            {!! Form::text('instagram', $value = $sitesetting->instagram, [
                                'class' => 'form-control',
                                'placeholder' => 'Instagram',
                            ]) !!}

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">

                            {!! Form::label('vimeo', 'Youtube', ['class' => 'form-label']) !!}

                            {!! Form::text('youtube', $value = $sitesetting->youtube, [
                                'class' => 'form-control',
                                'placeholder' => 'Youtube',
                            ]) !!}

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">

                            {!! Form::label('about', 'About', ['class' => 'form-label']) !!}

                            {!! Form::textarea('about', $value = $sitesetting->about, [
                                'class' => 'form-control',
                            
                                'placeholder' => 'About',
                            ]) !!}
                            @error('name')
                                <span class="text-danger pt-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                {!! Form::submit('Submit', ['class' => 'btn btn-primary _effect--ripple waves-effect waves-light']) !!}
                {{ Form::close() }}

            </div>
        </div>
    </div>

    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-dashboard-layout>
