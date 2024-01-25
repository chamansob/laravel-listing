<x-main-layout>
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('tag.index') }}">
            <h4 class="">Show Blog Tag</h4>
        </a>
    </div>
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Add Tag</h6>
                        {{ Form::open([
                            'route' => 'tag.store',
                            'class' => 'forms-sample needs-validation',
                            'novalidate' => 'novalidate',
                            'method' => 'post',
                        ]) }}

                        <div class="mb-3">

                            {!! Form::label('tag_name', 'Tag Name', ['class' => 'form-label', 'required' => 'required']) !!}

                            {!! Form::text('tag_name', $value = null, ['class' => 'form-control', 'placeholder' => 'Tag Name']) !!}
                            @error('tag_name')
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
</x-main-layout>
