<x-main-layout>
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('pages.index') }}">
            <h4 class="">Show Page</h4>
        </a>
    </div>
   <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
            <h6 class="card-title fw-bold">Add Page</h6>

            {{ Form::open([
                'route' => 'pages.store',
                'class' => 'forms-sample needs-validation',
                'novalidate' => 'novalidate',
                'method' => 'post',
                'files' => true,
            ]) }}

            <div class="mb-3">

                {!! Form::label('menu_id', 'Menu', ['class' => 'form-label']) !!}
                {!! Form::select('menu_id', $menus, null, ['class' => 'form-select mb-3','required' => 'required', 'placeholder' => 'Menu']) !!}
                @error('menu_id')
                    <span class="text-danger pt-3">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">

                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}

                {!! Form::text('name', $value = null, ['class' => 'form-control','required' => 'required', 'placeholder' => 'Name']) !!}
                @error('name')
                    <span class="text-danger pt-3">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">

                {!! Form::label('link', 'Link', ['class' => 'form-label']) !!}

                {!! Form::text('link', $value = null, ['class' => 'form-control', 'placeholder' => 'Link']) !!}

            </div>
            <div class="mb-3">

                {!! Form::label('small_text', 'Small text', ['class' => 'form-label']) !!}

                {!! Form::textarea('small_text', $value = null, [
                    'class' => 'form-control',
                    'rows' => 3,
                    'placeholder' => 'Small Text',
                ]) !!}

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
