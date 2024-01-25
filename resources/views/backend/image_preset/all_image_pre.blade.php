<x-main-layout>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('menus.create') }}">
            <h4 class="">Add Image Preset</h4>
        </a>
    </div>
    <div class="page-content">



        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">

                        <div class="table-responsive">
                            <table id="html5-extension" class="table dt-table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Width</th>
                                        <th>Height</th>
                                        <th class="text-center">Status</th>
                                          <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($image_preset as $img)
                                        <tr class="imageset-{{ $img->id }}">
                                            <td>{{ $img->id }}</td>
                                            <td>{{ ucfirst($img->name) }}</td>
                                            <td>{{ $img->width }}</td>
                                            <td>{{ $img->height }}</td>

                                            <td class="text-center">
                                                <button type="button" onClick="statusFunction({{ $img->id }})"
                                                    class="shadow-none badge badge-light-{{ $img->status == 1 ? 'danger' : 'success' }} warning changestatus{{ $img->id }}  bs-tooltip"
                                                    data-toggle="tooltip" data-placement="top" title="Status"
                                                    data-original-title="Status">{{ $img->status == 1 ? 'Deactive' : 'Active' }}</button>

                                            </td>
                                            <td class="text-center">
                                                <div class="action-btns">


                                                    <a href="{{ route('image_preset.edit', $img->id) }}"
                                                        class="action-btn btn-edit bs-tooltip me-2"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"
                                                        data-bs-original-title="Edit">
                                                        <i data-feather="edit"></i>
                                                    </a>

                                                    <a href="#" onClick="deleteFunction({{ $img->id }})"
                                                        class="action-btn btn-edit bs-tooltip me-2 delete{{ $img->id }}"
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

    </div>
    @if ($image_preset->count() != 0)
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
                                $.post("{{ route('image_preset.status') }}", {
                                    _token: crf,
                                    id: id,
                                }, function(data) {
                                    var elems = document.querySelector('.warning.changestatus' +id);
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
                            setTimeout(function() {
                                var elems = document.querySelector('.imageset-' + id);
                                elems.remove();
                                var crf = '{{ csrf_token() }}';
                                $.post("{{ route('image_preset.delete') }}", {
                                    _token: crf,
                                    id: id,
                                }, function(data) {
                                    toastr.success("Entry no " + id + " Deleted");
                                });

                            }, 1000);
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
</x-main-layout>
