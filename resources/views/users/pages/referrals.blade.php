
@extends('frontend.master')


@section('frontend.content')



<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-header-left col-md-9 col-12 mb-2">
             <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">My Referrals</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">My referrals
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
          <div class="content-body">
              <!-- Content start -->

              <div class="row" id="table-hover-row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">Add User</h4>
                                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#AddUserModal">Add</a>
                                @include('frontend.modals.add_user')
                          </div>






                          </div>
                          <div class="table-responsive">
                              <table class="table table-hover">
                                  <thead>
                                      <tr>
                                        <th>#</th>
                                          <th>Name</th>
                                          <th>Sponsor Name</th>
                                          <th>Package Name</th>
                                          <th>Purchased Amount</th>
                                          <th>Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                      <tr>
                                        <td>1</td>
                                          <td>

                                              <span class="font-weight-bold">Name</span>
                                          </td>
                                          <td><span class="font-weight-bold">Sponsor Name</span></td>
                                          <td>Package Name</td>

                                          <td>
                                          Purchased Amount

                                          </td>
                                          <td>
                                              <a href="#" data-toggle="modal" data-target="#PaymentMethodEditModal"><i data-feather='edit'></i></a>
                                              <a href="#"><i data-feather='trash-2'></i></a>
                                          </td>


                                      </tr>


                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>


                <!-- Content End -->



          </div>





    </div>
</div>





@endsection
