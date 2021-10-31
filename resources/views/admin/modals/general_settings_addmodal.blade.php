<div class="modal-size-default d-inline-block">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade text-left" id="GSettingsAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Add General Settings</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">

                      <form id="jquery-val-form" action="{{route('general-settings-store')}}" method="post">
                        @csrf
                          <div class="form-group">
                              <label class="form-label" for="basic-default-name">Referral Percentage</label>
                              <input type="number" class="form-control" id="basic-default-name" name="referral_percentage" placeholder="Enter Referral Percentage" required/>
                              @error('package_name')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-email">Pair Amount</label>
                              <input type="number" id="basic-default-email" name="pair_amount" class="form-control" placeholder="Enter Pair Amount" />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-password">Pair Percentage</label>
                              <input type="number" id="basic-default-password" name="pair_percentage" class="form-control" placeholder="Enter percentage amount" />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-password">Minimum Withdrwal Amount</label>
                              <input type="number" id="basic-default-password" name="min_withdraw" class="form-control" placeholder="Enter minimum Withdrwal amount" />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-password">Activation Charge</label>
                              <input type="number" id="basic-default-password" name="activation_charge" class="form-control" placeholder="Enter Activation Charge" />
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
