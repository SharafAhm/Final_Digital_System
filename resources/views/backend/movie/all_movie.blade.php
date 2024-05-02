@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <a href="{{ route('add.movie') }}" class="btn btn-outline-primary px-5 radius-30">Add Movie</a>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">All Movies</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Poster</th>
                            <th>title</th>
                            {{-- <th>Address</th> --}}
                            <th>Release Date</th>
                            <th>Age Rating</th>
                            <th>Ticket Price</th>
                            <th>Movie Duration</th>
                            {{-- <th>Total Members</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movie as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @if (Str::startsWith($item->poster_url, 'http') || Str::endsWith($item->poster_url,
                                '.png'))
                                <img src="{{ $item->poster_url }}" alt="Poster" style="max-width: 100px;">
                                @else
                                <img src="{{ asset('uploads/movie/' . $item->poster_url) }}" alt="Poster"
                                    style="max-width: 100px;">
                                @endif
                            </td>
                            <td>{{ $item->title }}</td>
                            {{-- <td>{{ $item->description }}</td> --}}
                            <td>{{ $item->release_date }}</td>
                            <td>{{ $item->age_rating }}</td>
                            <td>{{ $item->ticket_price }}</td>
                            <td>{{ $item->duration_minutes }}</td>
                            <td>
                                <a href="{{ route('edit.movie', $item->id) }}"
                                    class="btn btn-warning px-3 radius-30">Edit</a>
                                <a href="{{ route('movie.delete', $item->id) }}"
                                    class="btn btn-danger px-3 radius-30">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr />

</div>
@endsection