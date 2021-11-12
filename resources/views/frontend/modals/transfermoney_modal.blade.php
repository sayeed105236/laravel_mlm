<div class="modal-size-default d-inline-block">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade text-left" id="TransferModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Transfer Money</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <form id="jquery-val-form" action="{{route('money-transfer')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="select-country">Transfer User</label>
                              
                                <select class="select2Me form-control form-control-lg" name="user_id" required>
                                    <option label="select a user"></option>

                                    @foreach ( $data['user'] as $row)
                                        <option value="{{$row->id}}">{{$row->user_name}}</option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="form-group">
                                <label class="form-label" for="basic-default-email">Enter Amount</label>
                                <input type="number" min="1" id="basic-default-email" name="amount"
                                       class="form-control" placeholder="Enter Amount ($)" required/>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="Submit" class="btn btn-primary">Transfer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
