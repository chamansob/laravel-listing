<x-main-layout>
    @section('title', breadcrumb())
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('social.index') }}">
            <h4 class="">Show Social</h4>
        </a>
    </div>
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Add Social</h6>

                        {{ Form::open([
                            'route' => 'social.store',
                            'class' => 'forms-sample needs-validation',
                            'novalidate' => 'novalidate',
                            'method' => 'post',
                            'files' => true,
                        ]) }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">

                                    {!! Form::label('title', 'Title', ['class' => 'form-label']) !!}

                                    {!! Form::text('title', $value = null, [
                                        'class' => 'form-control',
                                        'required' => 'required',
                                        'placeholder' => 'Title',
                                    ]) !!}
                                    @error('title')
                                        <span class="text-danger pt-3">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">

                                    {!! Form::label('class', 'Class', ['class' => 'form-label']) !!}

                                    {!! Form::text('class', $value = null, ['class' => 'form-control', 'placeholder' => 'Class']) !!}

                                </div>

                            </div>
                        </div>

                        <div class="mb-3">

                            {!! Form::label('url', 'Url', ['class' => 'form-label']) !!}

                            {!! Form::text('url', $value = null, ['class' => 'form-control', 'placeholder' => 'Url']) !!}

                        </div>


                        {!! Form::submit('Submit', ['class' => 'btn btn-outline-primary btn-icon-text mb-2 mb-md-0']) !!}
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>

    </div>
</x-main-layout>
