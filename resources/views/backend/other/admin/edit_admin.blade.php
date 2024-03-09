<x-main-layout>
    @section('title', breadcrumb())
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('add.admin') }}">
            <h4 class="">Add Staff</h4>
        </a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="page-content">



        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title fw-bold">Edit Staff </h6>


                        {!! Form::open([
                            'method' => 'post',
                            'route' => ['update.admin', $user->id],
                            'class' => 'forms-sample needs-validation',
                            'novalidate' => 'novalidate',
                        ]) !!}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">

                                    {!! Form::label('username', 'User Name', ['class' => 'form-label']) !!}

                                    {!! Form::text('username', $value = $user->username, [
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

                                    {!! Form::text('name', $value = $user->name, [
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

                                    {!! Form::text('email', $value = $user->email, [
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

                                    {!! Form::text('phone', $value = $user->phone, ['class' => 'form-control', 'placeholder' => 'Phone']) !!}
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

                                    {!! Form::text('address', $value = $user->address, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
                                    @error('address')
                                        <span class="text-danger pt-3">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="mb-3">
                                    {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}

                                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                                    @error('password')
                                        <span class="text-danger pt-3">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="mb-3">
                                {!! Form::label('roles', 'Role Name', ['class' => 'form-label']) !!}

                                {!! Form::select('roles', $value = $roles, ($user->role=='admin')? $user->roles[0]->id : 4, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Select Roles',
                                ]) !!}
                                @error('roles')
                                    <span class="text-danger pt-3">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>





                        <button type="submit" class="btn btn-primary me-2">Save Changes </button>

                        </form>

                    </div>





                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->

            <!-- right wrapper end -->
        </div>

    </div>
</x-dashboard-layout>
