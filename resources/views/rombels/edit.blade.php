<!-- Edit Modal -->
@foreach ($rombels as $data)
    <div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog"
        aria-labelledby="editModalLabel{{$data->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{$data->id}}">Edit Rombels</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm{{$data->id}}" method="POST" action="{{ route('rombels.update', $data->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="form-group">
                            <label for="edit-rombels-{{$data->id}}">Rombels Name</label>
                            <input type="text" class="form-control" id="edit-rombels-{{$data->id}}" name="rombels"
                                value="{{$data->rombels}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach