<x-dashboard-layout>
    @section('title', breadcrumb())

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('roles.create') }}">
            <h4 class="">Add Roles</h4>
        </a>
    </div>
    <div class="page-content">


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">All Roles</h6>

                        <div class="table-responsive">
                            <table id="html5-extension" class="table dt-table-hover">
                                <thead>
                                    <tr>
                                        <th>Sl </th>
                                        <th>Roles Name </th>
                                        <th class="text-center">Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $item)
                                        <tr class="role-{{ $item->id }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td class="text-center">
                                                <div class="action-btns">
                                                    <a href="{{ route('roles.edit', $item->id) }}"
                                                        class="action-btn btn-edit bs-tooltip me-2"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"
                                                        data-bs-original-title="Edit">
                                                        <i data-feather="edit"></i>
                                                    </a>
                                               
                                                    <a href="#" onClick="deleteFunction({{ $item->id }})"
                                                        class="action-btn btn-edit bs-tooltip me-2 delete{{ $item->id }}"
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
    @if ($item->count() != 0)
        <script type="text/javascript">
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
                            var elems = document.querySelector('.role-' + id);
                            
                            elems.remove();
                            var crf = '{{ csrf_token() }}';
                            $.post("{{ route('roles.delete') }}", {
                                _token: crf,
                                id: id,table:table
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
    </x-backend-layout>
