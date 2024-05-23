@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <a href="{{ route('add.club') }}" class="btn btn-outline-primary px-5"
                        style="border-radius: 0; background-color: #FFCCCC; color: black;">Add Service</a>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">All Services</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Service Name</th>
                            <th>image ULR</th>
                            <th>Description</th>
                            <th>Starting Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($club as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->street_name }}</td>
                            <td>{{ $item->street_number }}</td>
                            <td>{{ $item->city }}</td>
                            <td>{{ $item->post_code }}</td>
                            <td>{{ $item->number }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->representative_id }}</td>
                            <td>{{ $item->balance }}</td>
                            <td>{{ $item->totalMembers }}</td>
                            <td>{{ $item->discount }}</td>
                            <td>
                                <a href="{{ route('edit.club', $item->id) }}"
                                    class="btn btn-warning px-3 radius-30">Edit</a>
                                <a href="{{ route('club.delete', $item->id) }}"
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