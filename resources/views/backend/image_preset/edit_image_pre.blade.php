<x-main-layout>
    @section('title', breadcrumb())
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
                        <h6 class="card-title fw-bold">Edit Image Preset</h6>
                        {!! Form::open([
                            'method' => 'put',
                            'route' => ['image_preset.update', $image_preset->id],
                            'class' => 'forms-sample',
                        ]) !!}
                        <div class="row">
                            <div class="col-lg-4">

                                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}

                                {!! Form::text('name', $value = $image_preset->name, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Name',
                                    'required' => 'required',
                                ]) !!}
                                @error('name')
                                    <span class="text-danger pt-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4">

                                {!! Form::label('width', 'Width', ['class' => 'form-label']) !!}

                                {!! Form::text('width', $value = $image_preset->width, [
                                    'class' => 'form-control',
                                    'required' => 'required',
                                    'placeholder' => 'Width',
                                ]) !!}
                                @error('width')
                                    <span class="text-danger pt-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4">

                                {!! Form::label('height', 'Height', ['class' => 'form-label']) !!}

                                {!! Form::text('height', $value = $image_preset->height, [
                                    'class' => 'form-control',
                                    'required' => 'required',
                                    'placeholder' => 'Height',
                                ]) !!}
                                @error('height')
                                    <span class="text-danger pt-3">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 mt-3">
                                <?php
                                $status = [
                                    '0' => 'Active',
                                    '1' => 'Deactive',
                                ];
                                ?>
                                {!! Form::label('status', 'Status', ['class' => 'form-label']) !!}

                                {!! Form::Select('status', $status, $image_preset->status, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Select Status',
                                ]) !!}
                                @error('status')
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
</x-dashboard-layout>
