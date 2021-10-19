@extends('frontend.master')


@section('frontend.content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        <!-- Medal Card -->
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">
                                    <h5>Register Wallet</h5>
                                    <p class="card-text font-small-3">Acitvated Package: No Active Package</p>

                                    <h3 class="mb-75 mt-2 pt-50">




                                      <a href="javascript:void(0);">Available Balance: ${{$data['sum_deposit'] ? $data['sum_deposit'] : '$0.00'}}</a>



                                      


                                    </h3>

                                      <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#DepositModal">Deposit</button>
                                      <button type="button" class="btn btn-primary">Transfer</button>
                                      <button type="button" class="btn btn-primary">Upgrade</button>

                                      @include('frontend.modals.add_moneymodal')

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">
                                    <h5>Cash Wallet</h5>
                                    <p class="card-text font-small-3">Minimum Amount Required for Withdrawal: 10$</p>
                                    <h3 class="mb-75 mt-2 pt-50">
                                          <a href="javascript:void(0);">Available Balance: $0.00</a>
                                    </h3>
                                    <button type="button" class="btn btn-primary">Withdraw</button>
                                    <button type="button" class="btn btn-primary">Transfer</button>
                                    <button type="button" class="btn btn-primary">Purchase</button>

                                </div>
                            </div>
                        </div>
                        <!--/ Medal Card -->

                        <!-- Statistics Card -->

                        <!--/ Statistics Card -->
                    </div>

                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
