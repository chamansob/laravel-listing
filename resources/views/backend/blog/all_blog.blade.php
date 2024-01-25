<x-main-layout>
 <div class="seperator-header layout-top-spacing">
        <a href="{{ route('blog.create') }}">
            <h4 class="">Add Blog</h4>
        </a>
    </div>
    <div class="page-content">

      
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">All Blog</h6>

                        <div class="table-responsive">
                           <table id="html5-extension" class="table dt-table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Post Title</th>
                                        <th>Created</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blog as $post)
                                         <tr class="blog-{{ $post->id }}">
                                            <td>{{ $post->id }}</td>
                                            <td>@php
                                                if (!empty($post->post_image)) {
                                                    $img = explode('.', $post->post_image);
                                                    $small_img = $img[0] . '_thumb.' . $img[1];
                                                } else {
                                                    $small_img = '/upload/no_image.jpg'; # code...
                                                }
                                            @endphp
                                                <img src="{{ asset($small_img) }}"
                                                    class="img-thumbnail img-fluid img-responsive w-10">
                                            </td>
                                            <td>{{ $post->post_title }}</td>
                                            <td>{{ $post->created_at->format('l d M Y') }}</td>
                                        <td class="text-center">
                                            <div class="action-btns">
                                                <a href="{{ route('blog.edit', $post->id) }}"
                                                    class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                                    data-placement="top" title="Edit" data-bs-original-title="Edit">
                                                    <i data-feather="edit"></i>
                                                </a>
                                                <a href="#" onClick="deleteFunction({{ $post->id }})"
                                                    class="action-btn btn-edit bs-tooltip me-2 delete{{ $post->id }}"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    data-bs-original-title="Delete">
                                                    <i data-feather="trash-2"></i>
                                                </a>
                                                </form>
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
      @if ($blog->count() != 0)
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
                            setTimeout(function() {
                                var elems = document.querySelector('.blog-' + id);
                                elems.remove();
                                var crf = '{{ csrf_token() }}';
                                $.post("{{ route('blog.delete') }}", {
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
