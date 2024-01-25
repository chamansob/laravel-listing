<x-main-layout>
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('menugroup.index') }}">
            <h4 class="">Show Menu Group</h4>
        </a>
    </div>
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Edit Menu Group</h6>
                        {!! Form::open([
                            'method' => 'put',
                            'route' => ['menugroup.update', $menugroup->id],
                            'class' => 'forms-sample needs-validation',
                            'novalidate' => 'novalidate',
                            'files' => true,
                        ]) !!}

                        <div class="mb-3">

                            {!! Form::label('title', 'Title', ['class' => 'form-label']) !!}
                            {!! Form::text('title', $value = $menugroup->title, ['class' => 'form-control','required' => 'required', 'placeholder' => 'Title']) !!}
                            @error('title')
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
</x-main-layout>
