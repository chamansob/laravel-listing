<x-main-layout>
    @section('title', breadcrumb())
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('all.admin') }}">
            <h4 class="">Show User</h4>
        </a>
    </div>


    <div class="page-content">


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title fw-bold">Add User </h6>
                        {{ Form::open([
                            'route' => 'store.admin',
                            'class' => 'forms-sample needs-validation',
                            'novalidate' => 'novalidate',
                            'method' => 'post',
                        ]) }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">

                                    {!! Form::label('username', 'User Name', ['class' => 'form-label']) !!}

                                    {!! Form::text('username', $value = null, [
                                        'class' => 'form-control',
                                        'required' => 'required',
                                        'placeholder' => 'User Name',
                                    ]) !!}
                                    @error('username')
                                        <span class="text-danger pt-3">{{ $message }}</span>
                                    @enderror



                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    {!! Form::label('name', 'Full Name', ['class' => 'form-label']) !!}

                                    {!! Form::text('name', $value = null, [
                                        'class' => 'form-control',
                                        'required' => 'required',
                                        'placeholder' => 'Full Name',
                                    ]) !!}
                                    @error('name')
                                        <span class="text-danger pt-3">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}

                                    {!! Form::text('email', $value = null, [
                                        'class' => 'form-control',
                                        'required' => 'required',
                                        'placeholder' => 'Email',
                                    ]) !!}
                                    @error('email')
                                        <span class="text-danger pt-3">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    {!! Form::label('phone', 'Phone', ['class' => 'form-label']) !!}

                                    {!! Form::text('phone', $value = null, ['class' => 'form-control', 'placeholder' => 'Phone']) !!}
                                    @error('phone')
                                        <span class="text-danger pt-3">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    {!! Form::label('address', 'Address', ['class' => 'form-label']) !!}

                                    {!! Form::text('address', $value = null, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
                                    @error('address')
                                        <span class="text-danger pt-3">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="mb-3">
                                    {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}

                                    {!! Form::password('password', [
                                        'class' => 'form-control',
                                        'required' => 'required',
                                        'placeholder' => 'Password',
                                    ]) !!}
                                    @error('password')
                                        <span class="text-danger pt-3">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3">
                                {!! Form::label('roles', 'Role Name', ['class' => 'form-label']) !!}

                                {!! Form::select('roles', $value = $roles, null, ['class' => 'form-control', 'placeholder' => 'Select Roles']) !!}
                                @error('roles')
                                    <span class="text-danger pt-3">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {!! Form::submit('Submit', ['class' => 'btn btn-outline-primary btn-icon-text mb-2 mb-md-0']) !!}
                        {{ Form::close() }}


                    </div>





                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->

            <!-- right wrapper end -->
        </div>

    </div>
</x-main-layout>
