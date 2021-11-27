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

                                      <a href="javascript:void(0);">Available Balance: {{$data['sum_deposit'] ? '$'.number_format((float)$data['sum_deposit'], 2, '.', '') : '$00.00'}}</a>

                                    </h3>

                                      <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#DepositModal">Deposit</button>
                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TransferModal" >Transfer</button>
                                    <!--  <button type="button" class="btn btn-primary">Upgrade</button>-->

                                      @include('frontend.modals.add_moneymodal')
                                      @include('frontend.modals.transfermoney_modal')

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">
                                    <?php
                                    $bonus_amount=App\Models\CashWallet::where('user_id',\Auth::id())->get()->sum('bonus_amount');

                                    ?>
                                    <h5>Cash Wallet</h5>
                                    <p class="card-text font-small-3">Minimum Amount Required for Withdrawal: 10$</p>
                                    <h3 class="mb-75 mt-2 pt-50">
                                          <a href="javascript:void(0);">Available Balance: {{isset($bonus_amount) ? '$'.number_format((float)$bonus_amount, 2, '.', '') : '$00.00'}}</a>
                                    </h3>
                                    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#walletWithdraw">Withdraw</button>
                                    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#walletTransfer">Transfer</button>
                                  <!--  <button type="button" class="btn btn-primary">Purchase</button>-->
                                        @include('frontend.modals.wallet_withdraw')
                                        @include('frontend.modals.wallet_transfer')

                                </div>
                            </div>
                        </div>
                        <?php
                          $payment=App\Models\PaymentMethod::where('status','Active')->get();

                         ?>
                         @foreach($payment as $row)
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="card card-congratulation-medal">

                                <div class="card-body">
                                    <h5>Payment Method : {{$row->name}} </h5>
                                    <p class="card-text font-small-3">Account Name: {{$row->acc_name}}</p>
                                    <h3 class="mb-75 mt-2 pt-50">
                                          <a class="btn btn-primary" href="javascript:void(0);">Wallet Id: {{$row->wallet_id}}</a>
                                    </h3>


                                </div>


                            </div>
                        </div>
                        @endforeach
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">

                                    <h5>Users</h5>
                                    <p class="card-text font-small-3"></p>
                                    <h3 class="mb-75 mt-2 pt-50">
                                      <?php
                                      $users=App\Models\User::all();

                                       ?>
                                          <a class="btn btn-primary" href="javascript:void(0);">Total Users:   {{count($users)}}</a>
                                    </h3>


                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">

                                    <h5>Earnings</h5>
                                    <p class="card-text font-small-3"></p>
                                    <h3 class="mb-75 mt-2 pt-50">
                                      <?php
                                      $bonus_amount=App\Models\CashWallet::where('user_id',\Auth::id())->get()->sum('bonus_amount');

                                      ?>
                                          <a class="btn btn-primary" href="javascript:void(0);">Total Earnings:  {{isset($bonus_amount) ? '$'.number_format((float)$bonus_amount, 2, '.', '') : '$00.00'}}</a>
                                    </h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">

                                    <h5>Withdrwal</h5>
                                    <p class="card-text font-small-3"></p>
                                    <h3 class="mb-75 mt-2 pt-50">
                                      <?php
                                      $bonus_amount=App\Models\CashWallet::where('user_id',\Auth::id())->get()->sum('bonus_amount');

                                      ?>
                                          <a class="btn btn-primary" href="javascript:void(0);">Total Withdrwal:  $00.00</a>
                                    </h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">

                                    <h5>Packages</h5>
                                    <p class="card-text font-small-3"></p>
                                    <h3 class="mb-75 mt-2 pt-50">
                                      <?php
                                      $packages=App\Models\Package::where('status','Active')->get();

                                       ?>
                                          <a class="btn btn-primary" href="javascript:void(0);">No of Package: {{count($packages)}} </a>
                                    </h3>

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
