
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
                    <h2 class="content-header-title float-left mb-0">Payment Method</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Payement Method
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
                              <h4 class="card-title">Payment Method</h4>
                                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#PaymentMethodAddModal">Add</a>
                                @include('admin.modals.payment_methodaddmodal')
                          </div>






                          </div>
                          <div class="table-responsive">
                              <table class="table table-hover">
                                  <thead>
                                      <tr>
                                        <th>#</th>
                                          <th>Name</th>
                                          <th>Wallet ID</th>
                                          <th>Status</th>
                                          <th>Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($payment as $row)
                                      <tr>
                                        <td>{{$loop->index+1}}</td>
                                          <td>

                                              <span class="font-weight-bold">{{$row->name}}</span>
                                          </td>
                                          <td>{{$row->wallet_id}}</td>

                                          <td>
                                            @if($row->status=="Active")
                                              <span class="badge badge-pill badge-light-primary mr-1">Active</span>
                                            @else
                                          <span class="badge badge-pill badge-light-danger mr-1">Inactive</span>
                                            @endif

                                          </td>
                                          <td>
                                              <a href="#" data-toggle="modal" data-target="#PaymentMethodEditModal{{$row->id}}"><i data-feather='edit'></i></a>
                                              <a href="/admin/payment-method/delete/{{$row->id}}"><i data-feather='trash-2'></i></a>
                                          </td>
                                          @include('admin.modals.payment_methodeditmodal')

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
