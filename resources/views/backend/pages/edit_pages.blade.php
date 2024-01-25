<x-main-layout>
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('pages.index') }}">
            <h4 class="">Show page</h4>
        </a>
    </div>
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Edit page</h6>
                        {!! Form::open([
                            'method' => 'put',
                            'route' => ['pages.update', $page->id],
                            'class' => 'forms-sample needs-validation',
                            'novalidate' => 'novalidate',
                            'files' => true,
                        ]) !!}

                        <div class="mb-3">

                            {!! Form::label('menu_id', 'Menu', ['class' => 'form-label']) !!}
                            {!! Form::select('menu_id', $menus, $page->menu->id, ['class' => 'form-select mb-3', 'placeholder' => 'Menu','required' => 'required']) !!}
                            @error('menu_id')
                                <span class="text-danger pt-3">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">

                            {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}

                            {!! Form::text('name', $page->name, ['class' => 'form-control','required' => 'required', 'placeholder' => 'Name']) !!}
                            @error('name')
                                <span class="text-danger pt-3">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">

                            {!! Form::label('heading', 'Heading', ['class' => 'form-label']) !!}

                            {!! Form::text('heading', $page->heading, ['class' => 'form-control', 'placeholder' => 'Heading']) !!}

                        </div>
                        <div class="mb-3">

                            {!! Form::label('link', 'Link', ['class' => 'form-label']) !!}

                            {!! Form::text('link', $page->link, ['class' => 'form-control', 'placeholder' => 'Link']) !!}

                        </div>
                        <div class="mb-3">

                            {!! Form::label('small_text', 'Small text', ['class' => 'form-label']) !!}

                            {!! Form::textarea('small_text', $page->small_text, [
                                'class' => 'form-control',
                                'rows' => 3,
                                'placeholder' => 'Small Text',
                            ]) !!}

                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="mb-3">

                                    {!! Form::label('image', 'Image', ['class' => 'form-label']) !!}

                                    {!! Form::file('image', [
                                        'class' => 'form-control',
                                        'placeholder' => 'Image',
                                        'onchange' => 'mainThamUrl(this)',
                                    ]) !!}
                                    @error('page_image')
                                        <span class="text-danger pt-3">{{ $message }}</span>
                                    @enderror
                                    <div class="mt-3"><img src="" id="mainThmb"
                                            class="img-responsive border border-1">
                                    </div>
                                   

                                </div>
                            </div>
                            @php
                                if (!empty($page->image)) {
                                    $img = explode('.', $page->image);
                                    $small_img = $img[0] . '_thumb.' . $img[1];
                                } else {
                                    $small_img = '/upload/no_image.jpg'; # code...
                                }
                            @endphp
                            <div class="mt-3 col-sm-2"><img src="{{ asset($small_img) }}"
                                    class="img-thumbnail img-fluid img-responsive w-10"></div>
                        </div>
                        <div class="mb-3">

                            {!! Form::label('text', 'Text', ['class' => 'form-label']) !!}

                            {!! Form::textarea('text', $page->text, ['class' => 'form-control', 'placeholder' => 'Text']) !!}

                        </div>

                        <div class="mb-3">
                            <?php
                            $status = [
                                '0' => 'Active',
                                '1' => 'InActive',
                            ];
                            ?>
                            {!! Form::label('status', 'Status', ['class' => 'form-label']) !!}

                            {!! Form::Select('status', $status, $page->status, [
                                'class' => 'form-control',
                                'placeholder' => 'Select Status',
                            ]) !!}
                            @error('status')
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
