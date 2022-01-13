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
                        <h2 class="content-header-title float-left mb-0">My Payment Method</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/home/dashboard/{{Auth::user()->id}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">My payment method
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                @if(session()->has('success'))
                    <div class="demo-spacing-0">
                        <div class="alert alert-success" role="alert" id="successMessage">
                            <div class="alert-body"><strong>{{ session()->get('success') }}</strong> </div>
                        </div>
                    </div>

                @endif

                <!-- Content start -->



                <div class="row" id="table-hover-row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4 class="card-title">Payment Methods</h4>

                                <a href="#" class="btn btn-primary float-right" data-toggle="modal"
                                   data-target="#UserPaymentMethodAddModal">Add</a>
                                     @include('frontend.modals.user-payment-method')

                            </div>


                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Payment Method Name</th>
                                    <th>Account Name</th>
                                    <th>Wallet Id</th>
                                    <th>Status</th>
                                    <th>Action</th>



                                </tr>
                                </thead>
                                <tbody>

                                  @foreach($payment as $row)
                                    <tr>
                                      <td>{{$loop->index+1}}</td>
                                      
                                        <td>


                                            <span class="font-weight-bold">{{$row->payment->name}}</span>
                                        </td>
                                        <td><span class="font-weight-bold">{{$row->acc_name}}</span></td>
                                        <td>{{$row->wallet_id}}</td>

                                        <td>
                                          @if($row->status=="Active")
                                            <span class="badge badge-pill badge-light-primary mr-1">Active</span>
                                          @else
                                        <span class="badge badge-pill badge-light-danger mr-1">Inactive</span>
                                          @endif

                                        </td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#UserPaymentMethodEditModal{{$row->id}}"><i data-feather='edit'></i></a>
                                            <a href="/home/payment-method/delete/{{$row->id}}"><i data-feather='trash-2'></i></a>
                                        </td>
                                        @include('frontend.modals.edit-user-payment-method')



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
    <!--Toast popup html tag-->

@endsection
