@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <a href="{{ route('all.booking') }}" class="btn btn-outline-primary px-5 radius-30">All Bookings</a>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">All Bookings</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>User ID</th>
                            <th>Movie ID</th>
                            <th>Total price</th>
                            <th>Status</th>
                            <th>Booked Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($booking as $key => $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->user_id }}</td>
                            <td>{{ $item->date_showtime_id }}</td>
                            <td>{{ $item->total_price }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                @if ($item->status !== 'cancelled')
                                <a href="{{ route('booking.delete', $item->id) }}"
                                    class="btn btn-danger px-3 radius-30">Cancel</a>
                                @else
                                <span class="text-secondary">N/A</span>
                                @endif
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