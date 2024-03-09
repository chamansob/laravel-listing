<x-main-layout>
    @section('title', breadcrumb())
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('social.index') }}">
            <h4 class="">Show social</h4>
        </a>
    </div>
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Edit Social</h6>
                        {!! Form::open([
                            'method' => 'put',
                            'route' => ['social.update', $social->id],
                            'class' => 'forms-sample needs-validation',
                            'novalidate' => 'novalidate',
                            'files' => true,
                        ]) !!}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">

                                    {!! Form::label('title', 'Title', ['class' => 'form-label']) !!}

                                    {!! Form::text('title', $social->title, [
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

                                    {!! Form::text('class', $social->class, [
                                        'class' => 'form-control',
                                        'required' => 'required',
                                        'placeholder' => 'Class',
                                    ]) !!}

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="mb-3">

                                {!! Form::label('url', 'Url', ['class' => 'form-label']) !!}

                                {!! Form::text('url', $social->url, ['class' => 'form-control', 'placeholder' => 'Url']) !!}

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <?php
                                    $status = [
                                        '0' => 'Active',
                                        '1' => 'InActive',
                                    ];
                                    ?>
                                    {!! Form::label('status', 'Status', ['class' => 'form-label']) !!}

                                    {!! Form::Select('status', $status, $social->status, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Select Status',
                                    ]) !!}
                                    @error('status')
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
  
</x-dashboard-layout>
