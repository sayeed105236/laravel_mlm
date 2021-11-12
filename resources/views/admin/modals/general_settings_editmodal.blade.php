<div class="modal-size-default d-inline-block">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade text-left" id="GSettingsEditModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Edit General Settings</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">

                      <form action="{{route('general-settings-update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$row->id}}">
                          <div class="form-group">
                              <label class="form-label" for="basic-default-name">Referral Percentage</label>
                              <input type="number" class="form-control"  value="{{$row->referral_percentage}}" name="referral_percentage"  />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-email">Pair Amount</label>
                              <input type="number"  name="pair_amount" value="{{$row->pair_amount}}" class="form-control"/>
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-password">Pair Percentage</label>
                              <input type="number" name="pair_percentage" value="{{$row->pair_percentage}}" class="form-control" />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-password">Royality Bonus</label>
                              <input type="number" id="basic-default-password" name="royality_bonus"  value="{{$row->royality_bonus}}" class="form-control" placeholder="Enter royality bonus amount" />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-password">Minimum Withdrwal</label>
                              <input type="number" name="min_withdraw" value="{{$row->min_withdraw}}" class="form-control" />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-password">Activation Charge</label>
                              <input type="number" name="activation_charge" value="{{$row->activation_charge}}" class="form-control" />
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
