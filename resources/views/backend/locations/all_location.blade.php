<x-dashboard-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('locations.create') }}">
            <h4 class="">Add Location</h4>
        </a>
          &nbsp;
        <a href="{{ route('import.locations') }}" class="">
            <h4 class="bg-success text-white"><i data-feather="share"></i> Import</h4>
        </a>
        &nbsp;
        <a href="{{ route('export.location') }}" class="">
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
                                    <th>Country</th>
                                    <th>Name</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $country=[
                                            1 => 'Africa',
                                            2 => 'Asia',
                                            3 => 'Asia Pacific',
                                            4 => 'Caribbean',
                                            5 => 'Central America',
                                            6 => 'Europe',
                                            7 => 'Middle East/ North Africa',
                                            8 => 'North America',
                                            9 => 'Other',
                                            10 => 'South America',
                            ];
                                @endphp
                                @foreach ($locations as $provide)
                                    <tr class="social-{{ $provide->id }}">

                                        <td>{{ $provide->id }}</td>
                                        <td>{{ $country[$provide->location_id] }}</td>
                                        <td>{{ !empty($provide->name) ? $provide->name : '-' }}</td>
                                        <td class="text-center">
                                            <button type="button" onClick="statusFunction({{ $provide->id }})"
                                                class="shadow-none badge badge-light-{{ $provide->status == 1 ? 'danger' : 'success' }} warning changestatus{{ $provide->id }}  bs-tooltip"
                                                data-toggle="tooltip" data-placement="top" title="Status"
                                                data-original-title="Status">{{ $provide->status == 1 ? 'Deactive' : 'Active' }}</button>

                                        </td>

                                        <td class="text-center">
                                            <div class="action-btns">


                                                <a href="{{ route('locations.edit', $provide->id) }}"
                                                    class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                                    data-placement="top" title="Edit" data-bs-original-title="Edit">
                                                    <i data-feather="edit"></i>
                                                </a>

                                                <a href="#" onClick="deleteFunction({{ $provide->id }})"
                                                    class="action-btn btn-edit bs-tooltip me-2 delete{{ $provide->id }}"
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
    @if ($locations->count() != 0)
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
                                $.post("{{ route('locations.status') }}", {
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
                            $.post("{{ route('locations.delete') }}", {
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
