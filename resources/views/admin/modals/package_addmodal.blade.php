<div class="modal-size-default d-inline-block">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade text-left" id="PackageAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Add Package</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                      <form id="jquery-val-form" method="post">
                          <div class="form-group">
                              <label class="form-label" for="basic-default-name">Package Name</label>
                              <input type="text" class="form-control" id="basic-default-name" name="package_name" placeholder="John Doe" />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-email">Price</label>
                              <input type="number" id="basic-default-email" name="price" class="form-control" placeholder="Enter Price ($)" />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-password">No of Pairs</label>
                              <input type="number" id="basic-default-password" name="no_of_pairs" class="form-control" placeholder="Enter number of pairs" />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="confirm-password">Daily Return Percentage</label>
                              <input type="number" id="confirm-password" name="return_percentage" class="form-control" placeholder="Enter Daily Return Percentage" />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="dob">Duration in Days</label>
                              <input type="number" class="form-control" name="dob" id="dob" />
                          </div>

                          <div class="form-group">
                              <label for="select-country">Except Day</label>
                              <select class="form-control select2" id="select-country" name="except_day">
                                  <option selected>Sunday</option>
                                  <option value="Saturday">Saturday</option>
                                
                                  <option value="Monday">Monday</option>
                                  <option value="Tuesday">Tuesday</option>
                                  <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                      <option value="Friday">Friday</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="select-country">Status</label>
                              <select class="form-control select2" id="select-country" name="status">
                                  <option value="">Select Status</option>
                                  <option value="Active">Active</option>
                                  <option value="Inactive">Inactive</option>

                              </select>
                          </div>







                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="Submit" class="btn btn-primary" data-dismiss="modal">Save</button>
                </div>
                  </form>
            </div>
        </div>
    </div>
</div>
