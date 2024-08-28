@extends('layout.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Students</h6>
    </div>
    <div class="card-body">
        <nav class="navbar justify-content-between">
            <div class="d-inline-block">
                <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#createModal">
                    Create
                </button>
                <a href="{{url('students-pdf')}}" class="btn btn-info mb-2">PDF</a>
            </div>
            <form action="{{ route('students.index') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Search students..."
                        value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </nav>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 50px">No</th>
                        <th>Name</th>
                        <th>Nim</th>
                        <th>Gender</th>
                        <th>Rayon</th>
                        <th>Rombel</th>
                        <th style="width: 160px">Action</th>
                    </tr>
                </thead>
                @foreach ($students as $data)  
                    <tbody>
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->nim}}</td>
                            <td>{{$data->gender}}</td>
                            <td>{{$data->rayons->rayons}}</td>
                            <td>{{$data->rombels->rombels}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#editModal{{$data->id}}">
                                    Edit
                                </button>
                                <form action="{{ route('students.destroy', $data->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-confirm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            {{ $students->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@include('students.create')
@include('students.edit')
@include('sweetalert::alert')
@endsection

@section('scripts')
@if ($errors->any())
    <script type="text/javascript">
        $(document).ready(function () {
            $('#createModal').modal('show');
        });
    </script>
@endif
@endsection