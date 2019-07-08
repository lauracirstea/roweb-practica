
<div class="modal fade" id="create" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title">Create category</h3>
            </div>
            <div class="modal-body">
                <form method="POST" action="/categories">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} "  name="name" placeholder="Category name...">
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="parent_id" id="parent_id">
                            <option value="0">Main Category</option>
                            @foreach($levels as $val)
                                <option value="{{$val->id}}">{{$val->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>

                    @if($errors->any())
                        <div class="notification alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

