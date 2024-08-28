@foreach ($students as $data)
    <div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel{{$data->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel{{$data->id}}">Edit Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Form Edit dengan Action Mengirimkan ID Student -->
                <form action="{{ route('students.update', ['student' => $data->id]) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name"
                                value="{{ old('name', $data->name) }}"> <!-- Isi default dengan data yang ada -->
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label for="exampleInputEmail1">Nim</label>
                            <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter NIM"
                                value="{{ old('nim', $data->nim) }}">
                            @error('nim')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            <label for="exampleInputEmail1">Gender</label>
                            <select class="custom-select @error('gender') is-invalid @enderror" name="gender" id="gender">
                                <option value="" disabled {{ old('gender', $data->gender) ? '' : 'selected' }}>Choose...
                                </option>
                                <option value="male" {{ old('gender', $data->gender) == 'male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="female" {{ old('gender', $data->gender) == 'female' ? 'selected' : '' }}>Female
                                </option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            <label for="exampleInputEmail1">Rayons</label>
                            <select class="custom-select @error('rayons_id') is-invalid @enderror" name="rayons_id"
                                id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                @foreach ($rayons as $rayon)
                                    <option value="{{$rayon->id}}" {{ old('rayons_id', $data->rayons_id) == $rayon->id ? 'selected' : '' }}>{{$rayon->rayons}}</option>
                                @endforeach
                            </select>
                            @error('rayons_id')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            <label for="exampleInputEmail1">Rombels</label>
                            <select class="custom-select @error('rombels_id') is-invalid @enderror" name="rombels_id"
                                id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                @foreach ($rombels as $rombel)
                                    <option value="{{$rombel->id}}" {{ old('rombels_id', $data->rombels_id) == $rombel->id ? 'selected' : '' }}>{{$rombel->rombels}}</option>
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
@endforeach
