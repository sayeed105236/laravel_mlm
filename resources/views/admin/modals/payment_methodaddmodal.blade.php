<div class="modal-size-default d-inline-block">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade text-left" id="PaymentMethodAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Add Method</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">

                      <form id="jquery-val-form" action="{{route('payment-method-store')}}" method="post">
                        @csrf
                          <div class="form-group">
                              <label class="form-label" for="basic-default-name">Payment Method Name</label>
                              <input type="text" class="form-control" id="basic-default-name" name="name" placeholder="Enter Method Name" required/>

                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-email">Wallet Id</label>
                              <input type="text" id="basic-default-email" name="wallet_id" class="form-control" placeholder="Enter Wallet Id" required/>
                          </div>
                          
                          <div class="form-group">
                              <label for="select-country">Status</label>
                              <select class="form-control select2" name="status" required>
                                  <option value="">Select Status</option>
                                  <option value="Active">Active</option>
                                  <option value="Inactive">Inactive</option>

                              </select>
                          </div>


                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="Submit" class="btn btn-primary">Save</button>
                </div>
                  </form>
            </div>
        </div>
    </div>
</div>
