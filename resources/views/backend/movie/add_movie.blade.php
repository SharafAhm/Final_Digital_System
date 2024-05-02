@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Movie</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Movie</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">

                <div class="col-lg-8">
                    <div class="card">
                        <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="card">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <p>Poster</p>
                                        <img id="posterPreview"
                                            src="{{ empty(asset('backend/assets/images/no-img.png')) }}" alt="admin"
                                            class="pb-3" style="max-width: 250px; max-height: 500px">
                                        <input id="image" class="form-control" type="file" name="image">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Movie Title</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="title" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Description</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="description" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Release Date</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="date" name="release_date" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Age Rating</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="age_rating" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Ticket Price</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="ticket_price" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Movie Duration</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="duration_minutes" class="form-control" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
            $('#image').change(function(e) {
                if (e.target.files.length > 0) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#posterPreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files[0]);
                } else {
                    $('#posterPreview').attr('src', "{{ asset('backend/assets/images/no-img.png') }}");
                }
            });
        });
</script>
@endsection