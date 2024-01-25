<x-main-layout>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('permission.index') }}">
            <h4 class="">Show All Permission</h4>
        </a>

    </div>
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Edit Permission</h6>
                        {!! Form::open([
                            'method' => 'put',
                            'route' => ['permission.update', $permission->id],
                            'class' => 'forms-sample',
                        ]) !!}<div class="row">

                            <div class="mb-3">

                                {!! Form::label('name', 'Permission Name', ['class' => 'form-label']) !!}

                                {!! Form::text('name', $value = $permission->name, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Permission Name',
                                ]) !!}
                                @error('name')
                                    <span class="text-danger pt-3">{{ $message }}</span>
                                @enderror

                            </div>

                        </div>
                        <div class="row">

                            <div class="mb-3">
                                {!! Form::label('plan_heading', 'Plan Heading', ['class' => 'form-label']) !!}
                                <select name="group_name" class="form-select" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Select Group</option>
                                     <option value="pages" {{ $permission->group_name == 'pages' ? 'selected' : '' }}>
                                        Pages </option>
                                         <option value="menu" {{ $permission->group_name == 'menu' ? 'selected' : '' }}>
                                        Menu </option>
                                         <option value="menugroup" {{ $permission->group_name == 'menugroup' ? 'selected' : '' }}>
                                        Menu Group </option>
                                    <option value="module" {{ $permission->group_name == 'module' ? 'selected' : '' }}>
                                        Module </option>
                                    <option value="category"
                                        {{ $permission->group_name == 'category' ? 'selected' : '' }}>
                                        Blog Category</option>
                                    <option value="post" {{ $permission->group_name == 'blog' ? 'selected' : '' }}>
                                        Blog Post</option>
                                        <option value="tag" {{ $permission->group_name == 'tag' ? 'selected' : '' }}>
                                        Blog Tag</option>
                                    <option value="smtp" {{ $permission->group_name == 'smtp' ? 'selected' : '' }}>
                                        SMTP Setting</option>
                                    <option value="site" {{ $permission->group_name == 'site' ? 'selected' : '' }}>
                                        Site Setting</option>
                                    <option value="role" {{ $permission->group_name == 'role' ? 'selected' : '' }}>
                                        Role & Permission </option>
                                    <option value="role" {{ $permission->group_name == 'admin' ? 'selected' : '' }}>
                                        Admin </option>
                                    <option value="image_preset" {{ $permission->group_name == 'image_preset' ? 'selected' : '' }}>
                                        Image Preset </option>
                                </select>
                                @error('group_name')
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    amenitis_name: {
                        required: true,
                    },

                },
                messages: {
                    amenitis_name: {
                        required: 'Please Enter Amenities Name',
                    },

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
</x-main-layout>
