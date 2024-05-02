@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <a href="{{ route('add.user') }}" class="btn btn-outline-primary px-5 radius-30">Add Users</a>
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
                            <th>User Name</th>
                            <th>Age</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $key => $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->age }}</td>
                            <td>{{ $item->role }}</td>
                            <td>
                                <a href="{{ route('edit.user', $item->id) }}"
                                    class="btn btn-warning px-3 radius-30">Edit</a>
                                <a href="{{ route('user.delete', $item->id) }}"
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