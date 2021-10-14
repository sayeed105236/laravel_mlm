<div class="modal-size-default d-inline-block">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade text-left" id="PackageEditModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Edit {{$row->package_name}} Package</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">

                      <form action="{{route('package-update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$row->id}}">
                          <div class="form-group">
                              <label class="form-label" for="basic-default-name">Package Name</label>
                              <input type="text" class="form-control"  value="{{$row->package_name}}" name="package_name" placeholder="Package name" />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-email">Price</label>
                              <input type="number"  name="price" value="{{$row->price}}" class="form-control" placeholder="Enter Price ($)"/>
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-password">No of Pairs</label>
                              <input type="number" name="no_of_pairs" value="{{$row->no_of_pairs}}" class="form-control" placeholder="Enter number of pairs"/>
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="confirm-password">Daily Return Percentage</label>
                              <input type="round"  name="return_percentage" class="form-control" value="{{$row->return_percentage}}" placeholder="Enter Daily Return Percentage"/>
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="dob">Duration in Days</label>
                              <input type="number" class="form-control" name="duration" value="{{$row->duration}}" />
                          </div>

                          <div class="form-group">
                              <label for="select-country">Except Day</label>
                              <select class="form-control select2"  value="{{$row->except_day}}" name="except_day">
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
                              <select class="form-control select2" name="status">
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
