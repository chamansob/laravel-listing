<x-dashboard-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('testimonials.create') }}">
            <h4 class="">Add Testimonials</h4>
        </a>
    </div>
    <div class="page-content">
        <div class="row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <table id="html5-extension" class="table dt-table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $testimonial)
                                    <tr class="testimonial-{{ $testimonial->id }}">
                                        <td>{{ $testimonial->id }}</td>
                                        <td>@php
                                            if (!empty($testimonial->image)) {
                                                $img = explode('.', $testimonial->image);
                                                $small_img = $img[0] . '_thumb.' . $img[1];
                                            } else {
                                                $small_img = '/upload/no_image.jpg'; # code...
                                            }
                                        @endphp
                                            <img src="{{ asset($small_img) }}"
                                                class="rounded-circle profile-img border border-dark w-25">
                                        </td>
                                        <td>{{ !empty($testimonial->name) ? $testimonial->name : '-' }}</td>
                                        <td>{{ !empty($testimonial->designation) ? $testimonial->designation : '-' }}
                                        </td>
                                        <td class="text-center">
                                            <button type="button" onClick="statusFunction({{ $testimonial->id }})"
                                                class="shadow-none badge badge-light-{{ $testimonial->status == 1 ? 'danger' : 'success' }} warning changestatus{{ $testimonial->id }}  bs-tooltip"
                                                data-toggle="tooltip" data-placement="top" title="Status"
                                                data-original-title="Status">{{ $testimonial->status == 1 ? 'Deactive' : 'Active' }}</button>

                                        </td>

                                        <td class="text-center">
                                            <div class="action-btns">


                                                <a href="{{ route('testimonials.edit', $testimonial->id) }}"
                                                    class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                                    data-placement="top" title="Edit" data-bs-original-title="Edit">
                                                    <i data-feather="edit"></i>
                                                </a>

                                                <a href="#" onClick="deleteFunction({{ $testimonial->id }})"
                                                    class="action-btn btn-edit bs-tooltip me-2 delete{{ $testimonial->id }}"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    data-bs-original-title="Delete">
                                                    <i data-feather="trash-2"></i>
                                                </a>



                                            </div>
                                        </td>






                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>



    </div>
    @if ($testimonials->count() != 0)
        <script type="text/javascript">
            function statusFunction(id) {
                // event.preventDefault(); // prevent form submit
                // var form = event.target.form; // storing the form
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                document.querySelector('.warning.changestatus' + id).addEventListener('click', function() {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to change the status!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, Change it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            swalWithBootstrapButtons.fire(
                                'Changed!',
                                'Your status has been changed.',
                                'success'
                            )
                            setTimeout(function() {
                                var crf = '{{ csrf_token() }}';
                                $.post("{{ route('testimonials.status') }}", {
                                    _token: crf,
                                    id: id
                                }, function(data) {
                                    var elems = document.querySelector('.warning.changestatus' +
                                        id);
                                    if (data == 'active') {
                                        elems.classList.remove("badge-light-danger");
                                        elems.classList.add("badge-light-success");
                                        elems.innerText = 'Active';
                                        toastr.success("Status Active");
                                    } else {
                                        elems.classList.remove("badge-light-success");
                                        elems.classList.add("badge-light-danger");
                                        elems.innerText = 'Deactive';
                                        toastr.warning(" Status Deactived");
                                    }

                                });

                            }, 1000);
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                'Cancelled',
                                'Your status is not Changed :)',
                                'error'
                            )
                        }
                    })
                })

            }

            function deleteFunction(id) {

                // event.preventDefault(); // prevent form submit
                // var form = event.target.form; // storing the form
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                document.querySelector('.delete' + id).addEventListener('click', function() {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            var elems = document.querySelector('.testimonial-' + id);
                            elems.remove();
                            var crf = '{{ csrf_token() }}';
                            $.post("{{ route('testimonials.delete') }}", {
                                _token: crf,
                                id: id
                            }, function(data) {
                                toastr.success("Entry no " + id + " Deleted");
                            });


                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                'Cancelled',
                                'Your data is safe :)',
                                'error'
                            )
                        }
                    })
                })



            }
        </script>
    @endif
</x-dashboard-layout>
