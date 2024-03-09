<x-main-layout>
    @section('title', breadcrumb())

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="seperator-header layout-top-spacing">
        <a href="{{ route('export') }}">
            <h4 class="">Download Xlsx</h4>
        </a>

    </div>
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <h6 class="card-title fw-bold">Import Permission </h6>

                        <form id="myForm" method="POST" action="{{ route('import') }}" class="forms-sample"
                            enctype="multipart/form-data">
                            @csrf


                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Xlsx File Import </label>
                                <input type="file" name="import_file" class="form-control">

                            </div>




                            <button type="submit" class="btn btn-inverse-warning">Upload </button>

                        </form>

                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->

            <!-- right wrapper end -->
        </div>

    </div>
</x-main-layout>
