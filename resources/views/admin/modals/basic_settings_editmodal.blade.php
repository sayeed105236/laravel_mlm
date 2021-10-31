<div class="modal-size-default d-inline-block">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade text-left" id="BSettingsEditModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Edit basic Settings</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">

                      <form action="{{route('basic-settings-update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$row->id}}">
                          <div class="form-group">
                              <label class="form-label" for="basic-default-name">Company Name</label>
                              <input type="text" class="form-control"  value="{{$row->company_name}}" name="company_name"  />
                          </div>
                          <div class="form-group">
                              <label class="form-label" for="basic-default-email">Footer Link</label>
                              <input type="text"  name="footer_link" value="{{$row->footer_link}}" class="form-control"/>
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
