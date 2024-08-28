@extends('layout.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Rombels</h6>
    </div>
    <div class="card-body">
        <nav class="navbar justify-content-between">
            <div class="d-inline-block">
                <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#createModal">
                    Create
                </button>
                <a href="{{url('rombels-pdf')}}" class="btn btn-info mb-2">PDF</a>
            </div>
            <form action="{{ route('rombels.index') }}" method="GET" class="form-inline">
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search Rombels..."
                    aria-label="Search" value="{{ request()->query('search') }}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 50px">No</th>
                        <th>Rombels Name</th>
                        <th style="width: 160px">Action</th>
                    </tr>
                </thead>
                @foreach ($rombels as $data)  
                    <tbody>
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->rombels}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#editModal{{$data->id}}">
                                    Edit
                                </button>
                                <form action="{{ route('rombels.destroy', $data->id) }}" method="POST"
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
            {{$rombels->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
@include('rombels.create')
@include('rombels.edit')
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