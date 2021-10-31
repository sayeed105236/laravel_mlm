<div class="modal-size-default d-inline-block">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade text-left" id="BSettingsAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Add Basic Settings</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">

                      <form id="jquery-val-form" action="{{route('basic-settings-store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                              <label class="form-label" for="basic-default-name">Company Name</label>
                              <input type="text" class="form-control" id="basic-default-name" name="company_name" placeholder="Enter Company Name" required/>
                              @error('package_name')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-email">Footer link</label>
                              <input type="text" id="basic-default-email" name="footer_link" class="form-control" placeholder="Enter Footer Link" />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-password">Logo</label>
                              <input type="file" id="image" name="file" class="form-control-file" />
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
