<x-main-layout>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('roles.index') }}">
            <h4 class="">All Roles</h4>
        </a>
    </div>
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Add Role</h6>
                        {{ Form::open(['route' => 'roles.store', 'class' => 'forms-sample', 'method' => 'post']) }}
                        <div class="row">

                            <div class="mb-3">

                                {!! Form::label('name', 'Role Name', ['class' => 'form-label']) !!}

                                {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Role Name']) !!}
                                @error('name')
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
</x-main-layout>
