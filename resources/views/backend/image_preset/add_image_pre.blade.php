<x-main-layout>
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('image_preset.index') }}">
            <h4 class="">Show All Image Preset</h4>
        </a>
    </div>
    <div class="page-content">


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Add Image Preset</h6>
                        {{ Form::open([
                            'route' => 'image_preset.store',
                            'class' => 'forms-sample needs-validation',
                            'novalidate' => 'novalidate',
                            'method' => 'post',
                        ]) }}
                        <div class="row">
                            <div class="col-lg-4 mb-3">
                                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                                {!! Form::text('name', $value = null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Name',
                                    'required' => 'required',
                                ]) !!}
                                @error('name')
                                    <span class="text-danger pt-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 mb-3">

                                {!! Form::label('width', 'Width', ['class' => 'form-label']) !!}

                                {!! Form::text('width', $value = null, [
                                    'class' => 'form-control',
                                    'required' => 'required',
                                    'placeholder' => 'Width',
                                ]) !!}
                                @error('width')
                                    <span class="text-danger pt-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 mb-3">

                                {!! Form::label('height', 'Height', ['class' => 'form-label']) !!}

                                {!! Form::text('height', $value = null, [
                                    'class' => 'form-control',
                                    'required' => 'required',
                                    'placeholder' => 'Height',
                                ]) !!}
                                @error('height')
                                    <span class="text-danger pt-3">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {!! Form::submit('Submit', ['class' => 'btn btn-outline-primary btn-icon-text mb-2 mb-md-0']) !!}
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>

    </div>
</x-main-layout>
