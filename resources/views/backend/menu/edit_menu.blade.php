<x-main-layout>
    @section('title', breadcrumb())
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('menus.index') }}">
            <h4 class="">Show Menu</h4>
        </a>
    </div>
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Edit Menu</h6>
                        {!! Form::open([
                            'method' => 'put',
                            'route' => ['menus.update', $menu->id],
                            'class' => 'forms-sample needs-validation',
                            'novalidate' => 'novalidate',
                            'files' => true,
                        ]) !!}

                         <div class="mb-3">

                            {!! Form::label('group_id', 'Menu Group', ['class' => 'form-label']) !!}
                            {!! Form::select('group_id', $menugroup, $menu->group_id, ['class' => 'form-select mb-3', 'placeholder' => 'Menu Group']) !!}
                            @error('group_id')
                                <span class="text-danger pt-3">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">

                            {!! Form::label('parent_id', 'Parent Menu', ['class' => 'form-label']) !!}
                            {!! Form::select('parent_id', $value = $menus, $menu->parent_id, [
                                'class' => 'form-select mb-3',
                                'placeholder' => 'Parent Menu',
                            ]) !!}
                            @error('parent_id')
                                <span class="text-danger pt-3">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">

                            {!! Form::label('title', 'Title', ['class' => 'form-label']) !!}
                            {!! Form::text('title', $value = $menu->title, ['class' => 'form-control','required' => 'required', 'placeholder' => 'Title']) !!}
                            @error('title')
                                <span class="text-danger pt-3">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">

                            {!! Form::label('url', 'Url', ['class' => 'form-label']) !!}
                            {!! Form::text('url', $value = $menu->url, ['class' => 'form-control', 'placeholder' => 'Url']) !!}

                        </div>

                        <div class="mb-3">

                            {!! Form::label('type', 'Type', ['class' => 'form-label']) !!}

                            {!! Form::select('type', $value = $type, $menu->type, ['class' => 'form-select mb-3', 'placeholder' => 'Type']) !!}
                            @error('type')
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
