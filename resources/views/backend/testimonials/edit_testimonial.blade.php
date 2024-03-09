<x-dashboard-layout>
    @section('title', breadcrumb())
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('testimonials.index') }}">
            <h4 class="">Show Testimonial</h4>
        </a>
    </div>
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Edit Testimonial</h6>
                        {!! Form::open([
                            'method' => 'put',
                            'route' => ['testimonials.update', $testimonial->id],
                            'class' => 'forms-sample needs-validation',
                            'novalidate' => 'novalidate',
                            'files' => true,
                        ]) !!}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">

                                    {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}

                                    {!! Form::text('name', $testimonial->name, [
                                        'class' => 'form-control',
                                        'required' => 'required',
                                        'placeholder' => 'Name',
                                    ]) !!}
                                    @error('name')
                                        <span class="text-danger pt-3">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">

                                    {!! Form::label('designation', 'Designation', ['class' => 'form-label']) !!}

                                    {!! Form::text('designation', $testimonial->designation, [
                                        'class' => 'form-control',
                                        'required' => 'required',
                                        'placeholder' => 'Designation',
                                    ]) !!}
                                    @error('designation')
                                        <span class="text-danger pt-3">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-10">
                                <div class="mb-3">

                                    {!! Form::label('image', 'Image', ['class' => 'form-label']) !!}

                                    {!! Form::file('image', [
                                        'class' => 'form-control',
                                        'placeholder' => 'Image',
                                        'onchange' => 'mainThamUrl(this)',
                                    ]) !!}
                                    @error('testimonial_image')
                                        <span class="text-danger pt-3">{{ $message }}</span>
                                    @enderror
                                    <div class="mt-3"><img src="" id="mainThmb"
                                            class="img-responsive border border-1">
                                    </div>


                                </div>
                            </div>
                            @php
                                if (!empty($testimonial->image)) {
                                    $img = explode('.', $testimonial->image);
                                    $small_img = $img[0] . '_thumb.' . $img[1];
                                } else {
                                    $small_img = '/upload/no_image.jpg'; # code...
                                }
                            @endphp
                            <div class="mt-3 col-sm-2"><img src="{{ asset($small_img) }}"
                                    class="img-thumbnail img-fluid img-responsive w-10"></div>
                        </div>
                        <div class="mb-3">

                            {!! Form::label('text', 'Text', ['class' => 'form-label']) !!}

                            {!! Form::textarea('text', $testimonial->text, ['class' => 'form-control', 'placeholder' => 'Text']) !!}

                        </div>

                        <div class="mb-3">
                            <?php
                            $status = [
                                '0' => 'Active',
                                '1' => 'InActive',
                            ];
                            ?>
                            {!! Form::label('status', 'Status', ['class' => 'form-label']) !!}

                            {!! Form::Select('status', $status, $testimonial->status, [
                                'class' => 'form-control',
                                'placeholder' => 'Select Status',
                            ]) !!}
                            @error('status')
                                <span class="text-danger pt-3">{{ $message }}</span>
                            @enderror
                        </div>
                        {!! Form::submit('Submit', ['class' => 'btn btn-outline-primary btn-icon-text mb-2 mb-md-0']) !!}
                        {{ Form::close() }}


                    </div>
                </div>
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
