
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


                              @if(Session::has('package_added'))
                            <div class="alert alert-success" role="alert">
                                           <h4 class="alert-heading">Success</h4>
                                           <div class="alert-body">
                                                {{Session::get('package_added')}}
                                           </div>
                            </div>

                                @endif


                          </div>
                          <div class="table-responsive">
                              <table id="example" class="table table-hover">
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
                                    @foreach($packages as $row)
                                      <tr>
                                        <td>{{$loop->index+1}}</td>
                                          <td>

                                              <span class="font-weight-bold">{{$row->package_name}}</span>
                                          </td>
                                          <td>{{$row->price}}$</td>
                                          <td>
                                            {{$row->no_of_pairs}}
                                          </td>
                                          <td>{{$row->return_percentage}}%</td>
                                          <td>{{$row->duration}} days</td>
                                          <td>{{$row->except_day}}</td>
                                          <td>
                                            @if($row->status=="Active")
                                              <span class="badge badge-pill badge-light-primary mr-1">Active</span>
                                            @else
                                          <span class="badge badge-pill badge-light-danger mr-1">Inactive</span>
                                            @endif

                                          </td>
                                          <td>
                                              <a href="#" data-toggle="modal" data-target="#PackageEditModal{{$row->id}}"><i data-feather='edit'></i></a>
                                              <a href="/admin/package/delete/{{$row->id}}"><i data-feather='trash-2'></i></a>
                                          </td>
                                          @include('admin.modals.package_editmodal')
                                      </tr>
                                      @endforeach

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
