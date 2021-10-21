
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
                    <h2 class="content-header-title float-left mb-0">Deposit Requests</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Deposit Requests
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
                              <h4 class="card-title">Request Lists</h4>


                          </div>


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
                                          <th>User Name</th>
                                          <th>Requested Amount</th>
                                          <th>Method</th>
                                          <th>Transaction Id</th>
                                          <th>Status</th>

                                          <th>Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($deposit as $row)
                                      <tr>
                                        <td>{{$loop->index+1}}</td>
                                          <td>

                                              <span class="font-weight-bold">{{$row->user->name}}</span>
                                           </td>
                                          <td>{{$row->amount}}$</td>
                                          <td>{{$row->method}}</td>
                                          <td>{{$row->txn_id}}</td>
                                          <td>
                                            <span class="badge badge-pill badge-success">{{ $row->status }}</span>
                                            @if($row->status=='pending')
                                            <a href="{{ url('/admin/add-money-approve/'.$row->id) }}" class="btn btn-sm btn-primary">Approve Now</a>
                                            @endif
                                          </td>


                                          <td>

                                              <a href="/admin/add-money-delete/{{$row->id}}"><i data-feather='trash-2'></i></a>
                                          </td>

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
