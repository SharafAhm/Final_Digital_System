@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Movie</div>
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
                        <form action="{{ route('movie.update', $movie->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" id="{{ $movie->id }}">

                            <div class="card-body">


                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Movie Title</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="title" class="form-control"
                                            value="{{ $movie->title }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Description</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="description" class="form-control"
                                            value="{{ $movie->description }}" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Age Rating</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="age_rating" class="form-control"
                                            value="{{ $movie->age_rating }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Ticket Price</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="ticket_price" class="form-control"
                                            value="{{ $movie->ticket_price }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Movie Duration</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="duration_minutes" class="form-control"
                                            value="{{ $movie->duration_minutes }}" />
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
@endsection