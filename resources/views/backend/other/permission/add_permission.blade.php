<x-main-layout>
    @section('title', breadcrumb())
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('permission.index') }}">
            <h4 class="">All Permission</h4>
        </a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Add Permission</h6>
                        {{ Form::open(['route' => 'permission.store', 'class' => 'forms-sample', 'method' => 'post']) }}
                        <div class="row">

                            <div class="mb-3">

                                {!! Form::label('name', 'Permission Name', ['class' => 'form-label']) !!}

                                {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Permission Name']) !!}
                                @error('name')
                                    <span class="text-danger pt-3">{{ $message }}</span>
                                @enderror

                            </div>

                        </div>
                        <div class="row">

                            <div class="mb-3">
                                {!! Form::label('plan_heading', 'Permission Heading', ['class' => 'form-label']) !!}
                                <select name="group_name" class="form-select" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Select Group</option>
                                    <option value="menus">Menu </option>
                                    <option value="menugroup">Menu Group </option>
                                    <option value="pages">Pages </option>
                                    <option value="module">Module</option>
                                    <option value="slider">Slider</option>
                                    <option value="counters">Counters</option>
                                    <option value="testimonial">Testimonials</option>
                                    <option value="category">Blog Category</option>
                                    <option value="blog">Blog Post</option>
                                    <option value="tag">Blog Tag</option>                                   
                                    <option value="admin">Admin </option>
                                    <option value="image_preset">Image Preset </option>                                    
                                    <option value="categories">Categories</option>
                                    <option value="coached_organizations">Coached Organization</option>
                                    <option value="can_provides">Can Provides</option>
                                    <option value="coach_themes">Coach Themes</option>
                                    <option value="coaches">Coaches</option>
                                    <option value="coaching_methods">Coaching Methods</option>
                                    <option value="held_positions">Held Positions</option>
                                    <option value="languages">Languages</option>
                                     <option value="locations">Location</option>
                                      <option value="smtp">SMTP Setting</option>
                                    <option value="site">Site Setting</option>
                                    <option value="role">Role & Permission </option>
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
