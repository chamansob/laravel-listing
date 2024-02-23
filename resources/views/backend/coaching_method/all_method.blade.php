<x-dashboard-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('coaching_methods.create') }}">
            <h4 class="">Add Coaching Method</h4>
        </a>
        &nbsp;
        <a href="{{ route('import.coaching_methods') }}" class="">
            <h4 class="bg-success text-white"><i data-feather="share"></i> Import</h4>
        </a>
        &nbsp;
        <a href="{{ route('export.coaching_method') }}" class="">
            <h4 class="bg-primary text-white"> <i data-feather="download"></i> Export</h4>
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
                                    <th>Name</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coachingmethod as $method)
                                    <tr class="social-{{ $method->id }}">
                                        <td><span class="form-check form-check-primary"><input
                                                    class="form-check-input mixed_child " value="{{ $method->id }}"
                                                    type="checkbox"> &nbsp; {{ $method->id }}</span></td>

                                        <td>{{ $method->id }}</td>
                                        <td>{{ !empty($method->name) ? $method->name : '-' }}</td>
                                        <td class="text-center">
                                            <button type="button" onClick="statusFunction({{ $method->id }})"
                                                class="shadow-none badge badge-light-{{ $method->status == 1 ? 'danger' : 'success' }} warning changestatus{{ $method->id }}  bs-tooltip"
                                                data-toggle="tooltip" data-placement="top" title="Status"
                                                data-original-title="Status">{{ $method->status == 1 ? 'Deactive' : 'Active' }}</button>

                                        </td>

                                        <td class="text-center">
                                            <div class="action-btns">


                                                <a href="{{ route('coaching_methods.edit', $method->id) }}"
                                                    class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                                    data-placement="top" title="Edit" data-bs-original-title="Edit">
                                                    <i data-feather="edit"></i>
                                                </a>

                                                <a href="#" onClick="deleteFunction({{ $method->id }})"
                                                    class="action-btn btn-edit bs-tooltip me-2 delete{{ $method->id }}"
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
                        @if ($coachingmethod->count() != 0)
                            <div class="ms-3">
                                <button id="deleteall" onClick="deleteAllFunction()" class="btn btn-danger mb-2 me-4">
                                    <span class="btn-text-inner">Delete Selected</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>



    </div>
    @if ($coachingmethod->count() != 0)
        <script type="text/javascript">
            function deleteAllFunction() {
                // Get all checkboxes with the specified class name
                var checkboxes = document.querySelectorAll('.mixed_child');
                // Initialize an array to store checked checkbox values
                var checkedValues = [];
                // Iterate through each checkbox
                checkboxes.forEach(function(checkbox) {
                    // Check if the checkbox is checked
                    if (checkbox.checked) {
                        // Add the value to the array
                        checkedValues.push(checkbox.value);
                    }
                });
                if (checkedValues.length === 0) {
                    // Display an alert if none are checked               
                    toastr.warning("Please check at least one checkbox.");
                } else {
                    // Output the array to the console (you can do whatever you want with the array)
                    checkboxes.forEach(function(checkbox) {
                        // Check if the checkbox is checked
                        if (checkbox.checked) {
                            // Add the value to the array
                            checkedValues.push(checkbox.value);
                            var elems = document.querySelector('.social-' + checkbox.value);
                            elems.remove();
                        }
                    });
                    // console.log("Checked Checkbox Values: ", checkedValues);
                    var crf = '{{ csrf_token() }}';
                    $.post("{{ route('coachingmethod.delete') }}", {
                        _token: crf,
                        id: checkedValues
                    }, function(data) {
                        toastr.success("Selected Data Deleted");
                    });
                }
            }

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
                                $.post("{{ route('coaching_methods.status') }}", {
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
                            var elems = document.querySelector('.social-' + id);
                            elems.remove();
                            var crf = '{{ csrf_token() }}';
                            $.post("{{ route('coaching_methods.delete') }}", {
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
