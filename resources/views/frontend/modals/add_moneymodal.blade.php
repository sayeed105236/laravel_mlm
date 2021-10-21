<div class="modal-size-default d-inline-block">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade text-left" id="DepositModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Add Money</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">

                      <form id="jquery-val-form" action="{{route('money-store')}}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                          <div class="form-group">
                              <label class="form-label" for="basic-default-email">Enter Amount</label>
                              <input type="number" min="30" id="basic-default-email" name="amount" class="form-control" placeholder="Enter Amount ($)" required/>
                          </div>


                        <div class="form-group">
                              <label for="select-country">Payment Method</label>
                              <select class="form-control select2" id="select-country" name="method" required>
                                  <option selected>Manual</option>
                                  <option value="pm">Perfect Money (PM)</option>

                                  <option value="btc">Bitcoin (Btc)</option>

                              </select>
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-email">Transaction Id</label>
                              <input type="text"  id="basic-default-email" name="txn_id" class="form-control" placeholder="Enter Transaction Id" required/>
                          </div>



                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="Submit" class="btn btn-primary">Deposit</button>
                </div>
                  </form>
            </div>
        </div>
    </div>
</div>
