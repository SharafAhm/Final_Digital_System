@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <!--    <a href="{{ route('add.task') }}" class="btn btn-outline-primary px-5"
                       style="border-radius: 0; background-color: #FFCCCC; color: black;">Add Task</a> -->
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">My Task</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Description</th>
                            <th>Assigned User ID</th>
                            <th>Customer ID </th>
                            <th>Customer Name</th>
                            <th>Other Description</th>
                            <th>Due Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($task as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->description }}</td>
                            {{-- <td>{{ $item->description }}</td> --}}
                            <td>{{ $item->assigneduser_id }}</td>
                            <td>{{ $item->assignedteam_id }}</td>
                            <td>{{ $item->user_info }}</td>
                            <td>{{ $item->other_description }}</td>
                            <td>{{ $item->due }}</td>
                            <td>{{ $item->completed }}</td>
                            <td>
                                <a href="{{ route('edit.task', $item->id) }}"
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