<div class="modal-size-default d-inline-block">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade text-left" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">


                      <form id="registeruser" class="form-horizontal" method="POST" action="{{ route('referrals-useradd') }}">
                        @csrf

                          <div class="form-group">
                          <label class="form-label" for="basic-default-email">Name</label>
                          <input type="text"  id="name" name="name" class="form-control" placeholder="Enter Name" required/>

                        </div>
                        <div class="form-group">
                        <label class="form-label" for="basic-default-email">User Name</label>
                        <input type="text"  id="user_name" name="user_name" class="form-control" placeholder="Enter User Name" required/>

                      </div>


                          <div class="form-group">
                          <label class="form-label" for="basic-default-email">Email</label>
                            <input type="text"  id="email" name="email" class="form-control" placeholder="Enter Email" required/>

                        </div>
                        <?php
                          $packages= App\Models\Package::where('status','Active')->get();
                          //dd($packages);
                          $users= App\Models\User::all();

                         ?>

                        <div class="form-group">
                            <label for="basicSelect">Select Package</label>
                            <select class="form-control" id="basicSelect" name="package_id">
                              <option label="Choose Package"></option>
                              @foreach ($packages as $package)

                                <option value="{{$package->id}}">{{$package->package_name}}</option>
                              @endforeach
                            </select>
                        </div>


                          <div class="form-group">
                          <label for="basicSelect">Select Sponsor</label>
                          <select class="select2Me form-control form-control-lg"  name="sponsor" id="sponsor">
                          <option label="Choose Sponsor"></option>
                          @foreach ($users as $user)

                          <option value="{{ $user->id }}">{{ ucwords($user->user_name) }}</option>
                          @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                      <!--  <label for="basicSelect">Placement ID</label>-->
                            <input type="hidden" name="placement_id" id="placement_id" >
                      </div>

                        <div class="form-group">
                          <label for="basicSelect">Select Position</label>
                          <select class="select2Me form-control" name="position" id="position">
                            <option label="Choose position"></option>
                              <option value="2" >Right</option>
                              <option value="1" >Left</option>
                          </select>
                        </div>



                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                              <div class="form-group">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms"/>

                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                        @endif

                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <!--<button type="button" id="submitForm" class="btn btn-primary">Add User</button>-->
                    <button type="submit" class="btn btn-primary" id="submitForm">
                        Add User
                    </button>
                </div>
                  </form>

            </div>
        </div>
    </div>
</div>
