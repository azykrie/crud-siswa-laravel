<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('students.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Nim</label>
                        <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter rombel"
                            value="{{ old('nim') }}">
                        @error('nim')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <label for="exampleInputEmail1">Gender</label>
                        <select class="custom-select @error('gender') is-invalid @enderror" name="gender" id="gender">
                            <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Choose...</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <label for="exampleInputEmail1">Rayons</label>
                        <select class="custom-select @error('rayons_id') is-invalid @enderror" name="rayons_id"
                            id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            @foreach ($rayons as $data)
                                <option value="{{$data->id}}">{{$data->rayons}}</option>
                            @endforeach
                        </select>
                        @error('rayons_id')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <label for="exampleInputEmail1">Rombels</label>
                        <select class="custom-select @error('rombels_id') is-invalid @enderror" name="rombels_id"
                            id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            @foreach ($rombels as $data)
                                <option value="{{$data->id}}">{{$data->rombels}}</option>
                            @endforeach
                        </select>
                        @error('rombels_id')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>