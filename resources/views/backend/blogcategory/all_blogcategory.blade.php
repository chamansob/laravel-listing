<x-dashboard-layout>
    @section('title', breadcrumb())
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('category.create') }}">
            <h4 class="">Add Blog Category</h4>
        </a>
    </div>
    <div class="page-content">



        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">All Blog Category </h6>

                        <div class="table-responsive">
                            <table id="html5-extension" class="table dt-table-hover">
                                <thead>
                                    <tr>
                                        <th>-</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $cat)
                                        <tr class="cat-{{ $cat->id }}">                                            
                                           <td style="width:1%"><span class="form-check form-check-primary"><input
                                                        class="form-check-input mixed_child "
                                                        value="{{ $cat->id }}" type="checkbox"></span></td>
                                            <td>{{ $cat->id }}</td>
                                            <td>{{ $cat->category_name }}</td>
                                            <td>{{ $cat->category_slug }}</td>
                                            <td class="text-center">
                                                <div class="action-btns">


                                                    <a href="{{ route('category.edit', $cat->id) }}"
                                                        class="action-btn btn-edit bs-tooltip me-2"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"
                                                        data-bs-original-title="Edit">
                                                        <i data-feather="edit"></i>
                                                    </a>

                                                    <a href="javascript:void(0)"
 onClick="deleteFunction({{ $cat->id }})"
                                                        class="action-btn btn-edit bs-tooltip me-2 delete{{ $cat->id }}"
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
                            @if ($category->count() != 0)
                                <div class="ms-3">
                                    <button id="deleteall" onClick="deleteAllFunction()"
                                        class="btn btn-danger mb-2 me-4">
                                        <span class="btn-text-inner">Delete Selected</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-dashboard-layout>
@if ($category->count() != 0)
    <script type="text/javascript">
       function deleteAllFunction(table)  {
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
                $.post("{{ route('category.delete') }}", {
                    _token: crf,
                    id: checkedValues,table:table
                }, function(data) {
                    toastr.success("Selected Data Deleted");
                });
            }
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
                            var elems = document.querySelector('.cat-' + id);
                            elems.remove();
                            var crf = '{{ csrf_token() }}';
                            $.post("{{ route('category.delete') }}", {
                                _token: crf,
                                id: id,table:table,
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
