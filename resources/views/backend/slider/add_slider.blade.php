<x-main-layout>
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('sliders.index') }}">
            <h4 class="">Show Slider</h4>
        </a>
    </div>
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Add Slider</h6>

                        {{ Form::open([
                            'route' => 'sliders.store',
                            'class' => 'forms-sample needs-validation',
                            'novalidate' => 'novalidate',
                            'method' => 'post',
                            'files' => true,
                        ]) }}

                        <div class="mb-3">

                            {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}

                            {!! Form::text('name', $value = null, ['class' => 'form-control','required' => 'required', 'placeholder' => 'Name']) !!}
                            @error('name')
                                <span class="text-danger pt-3">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">

                            {!! Form::label('heading', 'Heading', ['class' => 'form-label']) !!}

                            {!! Form::text('heading', $value = null, ['class' => 'form-control','required' => 'required', 'placeholder' => 'Heading']) !!}

                        </div>
                        <div class="mb-3">

                            {!! Form::label('small', 'Small Text', ['class' => 'form-label']) !!}

                            {!! Form::text('small', $value = null, ['class' => 'form-control', 'placeholder' => 'Small Text']) !!}

                        </div>
                       
                        <div class="row">

                            <div class="mb-3">
                                {!! Form::label('image', 'Image', ['class' => 'form-label']) !!}

                                {!! Form::file('image', [
                                    'class' => 'form-control',
                                    'placeholder' => 'Main Thumbnail',
                                    'onchange' => 'mainThamUrl(this)',
                                ]) !!}
                                @error('image')
                                    <span class="text-danger pt-3">{{ $message }}</span>
                                @enderror
                                <img src="" id="mainThmb">

                            </div>

                        </div>
                        <div class="mb-3">

                            {!! Form::label('text', 'Text', ['class' => 'form-label']) !!}

                            {!! Form::textarea('text', $value = null, ['class' => 'form-control', 'placeholder' => 'Text']) !!}

                        </div>
                        {!! Form::submit('Submit', ['class' => 'btn btn-outline-primary btn-icon-text mb-2 mb-md-0']) !!}
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>

    </div>
</x-main-layout>
