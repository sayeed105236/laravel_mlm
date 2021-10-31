
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
                    <h2 class="content-header-title float-left mb-0">Basic Settings</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">basic settings
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
                              <h4 class="card-title">Basic Settings</h4>

                                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#BSettingsAddModal">Add</a>

                          </div>
                          @include('admin.modals.basic_settings_addmodal')



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
                              <table class="table table-hover">
                                  <thead>
                                      <tr>
                                        <th>#</th>
                                          <th>Company Name</th>
                                          <th>Footer Link</th>
                                          <th>Image</th>


                                          <th>Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($b_settings as $row)

                                      <tr>
                                        <td>#</td>
                                          <td>

                                              <span class="font-weight-bold">{{$row->company_name}}</span>
                                          </td>
                                          <td>{{$row->footer_link}}</td>
                                          <td>
                                            <img
                                              src="{{asset('storage/Logo/'.$row->image)}}"
                                              alt="image"
                                              height="50"
                                              width="50"

                                            />
                                          </td>


                                          <td>
                                              <a href="#" data-toggle="modal" data-target="#BSettingsEditModal{{$row->id}}"><i data-feather='edit'></i></a>
                                              <a href="/admin/basic-settings/delete/{{$row->id}}"><i data-feather='trash-2'></i></a>
                                          </td>
                                          @include('admin.modals.basic_settings_editmodal')



                                  </tbody>
                                  @endforeach
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
