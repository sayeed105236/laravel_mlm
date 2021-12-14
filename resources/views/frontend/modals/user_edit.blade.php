<div class="modal-size-default d-inline-block">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade text-left" id="EditUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Edit Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">


                        <form  class="form-horizontal" method="POST"
                              action="{{ route('user-profile-update') }}" enctype="multipart/form-data">
                            @csrf

                              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <div class="row">
                                  <div class="col-12 col-sm-6">
                                      <div class="form-group">
                                          <label for="account-username">Applicant Name</label>
                                          <input type="text" value="{{Auth::user()->name}}" class="form-control" id="name" name="name" placeholder="Username" value="johndoe" />
                                      </div>
                                  </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account-username">Username</label>
                                            <input type="text" disabled value="{{Auth::user()->user_name}}" class="form-control"  placeholder="Username" value="johndoe" />
                                        </div>
                                    </div>
                                      <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-password">Upload</label>
                                        <input type="file" id="image" name="file" class="form-control-file" />
                                    </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account-username">Applicant National Id</label>
                                            <input type="number" class="form-control" id="national_id" name="national_id" placeholder="National Id" value="************" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account-e-mail">E-mail</label>
                                            <input type="email" disabled value="{{Auth::user()->email}}" class="form-control" placeholder="Email" value="granger007@hogward.com" />
                                        </div>
                                    </div>


                                      <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-email">Phone Number</label>
                                        <input type="number" value="{{Auth::user()->number}}" id="number" name="number" class="form-control"
                                               placeholder="Enter your phone Number" />

                                    </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                      <div class="form-group">
                                          <label for="basicSelect">Gender</label>
                                          <select class="form-control" id="basicSelect" name="gender">
                                              <option label="Choose Gender"></option>


                                              <option value="male">Male</option>
                                              <option value="female">Female</option>

                                          </select>
                                      </div>

                                      </div>
                                        <div class="col-12 col-sm-6">
                                          <div class="form-group">
                                              <label class="form-label" for="basic-default-email">Date Of Birth</label>
                                              <input type="date" id="birth" name="birth" class="form-control" placeholder=""
                                                     required/>

                                          </div>


                                          </div>
                                          <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-email">Personal Address</label>
                                                <input type="text" id="address" name="address" class="form-control" placeholder=""
                                                       required/>

                                            </div>


                                            </div>
                                            <div class="col-12 col-sm-6">
                                              <div class="form-group">
                                                  <label class="form-label" for="basic-default-email">Nominee Name</label>
                                                  <input type="text" id="nominee" name="nominee" class="form-control" placeholder=""
                                                         required/>

                                              </div>


                                              </div>
                                              <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="basic-default-email">Nominee Email</label>
                                                    <input type="email" id="nominee_email" name="nominee_email" class="form-control" placeholder=""
                                                           required/>

                                                </div>


                                                </div>



                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <!--<button type="button" id="submitForm" class="btn btn-primary">Add User</button>-->
                    <button type="submit" class="btn btn-primary" id="btnSubmit">
                        Add User
                    </button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
