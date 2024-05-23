@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <a href="{{ route('add.user') }}" class="btn btn-outline-primary px-5"
                        style="border-radius: 0; background-color: #FFCCCC; color: black;">Add Users</a>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">All Users</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Age</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $key => $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->firstname }}</td>
                            <td>{{ $item->lastname }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->mobile_number }}</td>
                            <td>{{ $item->age }}</td>
                            <td>{{ $item->role }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('edit.user', $item->id) }}"
                                    class="btn btn-warning px-3 radius-30">Edit</a>
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