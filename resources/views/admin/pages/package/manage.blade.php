
@extends('admin.master')


@section('content')


<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-header-left col-md-9 col-12 mb-2">
             <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Package</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Package
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
                              <h4 class="card-title">Package List</h4>
                                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#PackageAddModal">Add</a>

                          </div>
                            @include('admin.modals.package_addmodal')
                          <div class="card-body">

                          </div>
                          <div class="table-responsive">
                              <table class="table table-hover">
                                  <thead>
                                      <tr>
                                        <th>#</th>
                                          <th>Package Name</th>
                                          <th>Price</th>
                                          <th>No of Pairs</th>
                                          <th>Daily return Percentage</th>
                                          <th>Duration</th>
                                          <th>Except Day</th>
                                          <th>Status</th>
                                          <th>Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                        <td>1</td>
                                          <td>

                                              <span class="font-weight-bold">Active</span>
                                          </td>
                                          <td>30$</td>
                                          <td>
                                            15
                                          </td>
                                          <td>0.55%</td>
                                          <td>30 days</td>
                                          <td>Sunday</td>
                                          <td><span class="badge badge-pill badge-light-primary mr-1">Active</span></td>
                                          <td>
                                              <a href="#"><i data-feather='edit'></i></a>
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
