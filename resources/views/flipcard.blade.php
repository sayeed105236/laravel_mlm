@extends('frontend.master')
@section('frontend.content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Profile Settings</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/home/dashboard/{{Auth::user()->id}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Settings</a>
                                </li>
                                <li class="breadcrumb-item active"> Profile Settings
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- account setting page -->
            <section id="page-account-settings">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills flex-column nav-left">
                            <!-- general -->
                            <li class="nav-item">
                                <a class="nav-link active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                    <i data-feather="user" class="font-medium-3 mr-1"></i>
                                    <span class="font-weight-bold">Personal Details</span>
                                </a>
                            </li>
                            <!-- change password -->
                            <li class="nav-item">
                                <a class="nav-link" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                    <i data-feather="lock" class="font-medium-3 mr-1"></i>
                                    <span class="font-weight-bold">Change Password</span>
                                </a>
                            </li>
                            <!-- information -->
                          <!--  <li class="nav-item">
                                <a class="nav-link" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                    <i data-feather="info" class="font-medium-3 mr-1"></i>
                                    <span class="font-weight-bold">Information</span>
                                </a>
                            </li>-->
                            <!-- social -->
                        <!--    <li class="nav-item">
                                <a class="nav-link" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                    <i data-feather="link" class="font-medium-3 mr-1"></i>
                                    <span class="font-weight-bold">Social</span>
                                </a>
                            </li>-->
                            <!-- notification -->
                        <!--    <li class="nav-item">
                                <a class="nav-link" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                                    <i data-feather="bell" class="font-medium-3 mr-1"></i>
                                    <span class="font-weight-bold">Notifications</span>
                                </a>
                            </li>-->
                        </ul>
                    </div>
                    <!--/ left menu section -->

                    <!-- right content section -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- general tab -->
                                    <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                        <!-- header media -->
                                          <form  action="{{route('user-profile-update')}}" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <div class="media">
                                            <a href="#" class="mr-25">
                                                <img src="{{asset('app-assets/images/portrait/small/avatar-s-11.jpg')}}" id="image" class="rounded mr-50" alt="profile image" height="80" width="80" />
                                            </a>
                                            <!-- upload and reset button -->
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-password">Upload</label>
                                                <input type="file" id="image" name="filename" class="form-control-file" />
                                            </div>

                                            <!--/ upload and reset button -->
                                        </div>
                                        <!--/ header media -->

                                        <!-- form -->


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




                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mt-2 mr-1">Save changes</button>
                                                    <button type="reset" class="btn btn-outline-secondary mt-2">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ general tab -->

                                    <!-- change password -->
                                    <div class="tab-pane fade" id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                        <!-- form -->
                                        <form class="validate-form">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-old-password">Old Password</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input type="password" class="form-control" id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text cursor-pointer">
                                                                    <i data-feather="eye"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-new-password">New Password</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input type="password" class="form-control" id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text cursor-pointer">
                                                                    <i data-feather="eye"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-retype-new-password">Retype New Password</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input type="password" class="form-control" id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">

                                                    <button submit="updatePassword" class="btn btn-primary mr-1 mt-1">Save changes</button>
                                                    <button type="reset" class="btn btn-outline-secondary mt-1">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ change password -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ right content section -->
                </div>
            </section>
            <!-- / account setting page -->

        </div>
    </div>
</div>






@endsection
