<x-main-layout>
 @section('title', breadcrumb())
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('counters.index') }}">
            <h4 class="">Show Counter</h4>
        </a>
    </div>
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Add Counter</h6>

                        {{ Form::open([
                            'route' => 'counters.store',
                            'class' => 'forms-sample needs-validation',
                            'novalidate' => 'novalidate',
                            'method' => 'post',
                            'files' => true,
                        ]) }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">

                                    {!! Form::label('icon', 'Icon', ['class' => 'form-label']) !!}

                                    {!! Form::text('icon', $value = null, [
                                        'class' => 'form-control',
                                        'required' => 'required',
                                        'placeholder' => 'Icon',
                                    ]) !!}

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">

                                    {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}

                                    {!! Form::text('name', $value = null, [
                                        'class' => 'form-control',
                                        'required' => 'required',
                                        'placeholder' => 'Name',
                                    ]) !!}

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">

                                    {!! Form::label('sign', 'Sign', ['class' => 'form-label']) !!}

                                    {!! Form::text('sign', $value = null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Sign',
                                    ]) !!}

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">

                                    {!! Form::label('number', 'Number', ['class' => 'form-label']) !!}

                                    {!! Form::number('number', 1, [
                                        'class' => 'form-control',
                                        'min' => 10,
                                        'max' => 1000,
                                        'placeholder' => 'Number',
                                    ]) !!}

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
