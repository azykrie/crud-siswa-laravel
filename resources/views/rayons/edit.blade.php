<!-- Edit Modal -->
@foreach ($rayons as $data)
    <div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog"
        aria-labelledby="editModalLabel{{$data->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{$data->id}}">Edit Rayons</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm{{$data->id}}" method="POST" action="{{ route('rayons.update', $data->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="form-group">
                            <label for="edit-rombels-{{$data->id}}">Rayon Name</label>
                            <input type="text" class="form-control" id="edit-rombels-{{$data->id}}" name="rayons"
                                value="{{$data->rayons}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach