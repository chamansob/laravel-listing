<x-main-layout>

    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('locations.index') }}">
            <h4 class="">Show Location</h4>
        </a>
    </div>
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Add Location</h6>

                        {{ Form::open([
                            'route' => 'locations.store',
                            'class' => 'forms-sample needs-validation',
                            'novalidate' => 'novalidate',
                            'method' => 'post',
                            'files' => true,
                        ]) }}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">

                                    {!! Form::label('location_id', 'Location', ['class' => 'form-label']) !!}

                                    {!! Form::select(
                                        'location_id',
                                        [
                                            1 => 'Africa',
                                            2 => 'Asia',
                                            3 => 'Asia Pacific',
                                            4 => 'Caribbean',
                                            5 => 'Central America',
                                            6 => 'Europe',
                                            7 => 'Middle East/ North Africa',
                                            8 => 'North America',
                                            9 => 'Other',
                                            10 => 'South America',
                                        ],
                                        1,
                                        [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => 'Select Type',
                                        ],
                                    ) !!}
                                    @error('type')
                                        <span class="text-danger pt-3">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">

                                    {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}

                                    {!! Form::text('name', $value = null, [
                                        'class' => 'form-control',
                                        'required' => 'required',
                                        'placeholder' => 'Name',
                                    ]) !!}
                                    @error('name')
                                        <span class="text-danger pt-3">{{ $message }}</span>
                                    @enderror
                                </div>
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
