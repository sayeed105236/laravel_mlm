@extends('frontend.master')


@section('frontend.content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
              @if(Session::has('Money_added'))
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Success</h4>
                <div class="alert-body">
                    {{Session::get('Money_added')}}
                </div>
            </div>

            @elseif(Session::has('Money_Transfered'))
          <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Success</h4>
              <div class="alert-body">
                  {{Session::get('Money_Transfered')}}
              </div>
          </div>
            @endif
                <!-- Dashboard Ecommerce Starts -->

                <section id="dashboard-ecommerce">
                  <h4>"Welcome Mr. {{Auth::user()->name}} to CoinexxPro"</h4>

                        <!-- Medal Card -->
                        <!--/ Medal Card -->
                        <div class="row match-height">
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                        <h4 class="card-title text-white">Register Wallet</h4>
                                        <h4 class="card-text">Available Balance: <strong>{{$data['sum_deposit'] ? '$'.number_format((float)$data['sum_deposit'], 2, '.', '') : '$00.00'}}</strong></h4>
                                        <a class="btn btn-danger" data-toggle="modal" data-target="#DepositModal"><i data-feather='plus-circle'></i></a>
                                        <a class="btn btn-info" data-toggle="modal" data-target="#TransferModal" ><i data-feather='send'></i></a>
                                      <!--  <button type="button" class="btn btn-primary">Upgrade</button>-->

                                        @include('frontend.modals.add_moneymodal')
                                        @include('frontend.modals.transfermoney_modal')
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                      <?php
                                      $bonus_amount=App\Models\CashWallet::where('user_id',\Auth::id())->get()->sum('bonus_amount');

                                      ?>
                                        <h4 class="card-title text-white">Cash Wallet</h4>


                                        <h4 class="card-text">Available Balance: {{isset($bonus_amount) ? '$'.number_format((float)$bonus_amount, 2, '.', '') : '$00.00'}}</h4>
                                        <a class="btn btn-danger" data-toggle="modal" data-target="#walletWithdraw"><i data-feather='arrow-down-circle'></i></a>
                                        <a class="btn btn-info" data-toggle="modal" data-target="#walletTransfer" ><i data-feather='send'></i></a>
                                        @include('frontend.modals.wallet_transfer')
                                          @include('frontend.modals.wallet_withdraw')
                                          <p class="card-text font-small-3">Minimum Withdrawal: 10$</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                      <?php
                                      $current_package = App\Models\User::where('id',Auth::id())->select('package_id')->first();
                                      //dd($current_package->packages->package_name);

                                       ?>
                                        <h4 class="card-title text-white">Current Package</h4>
                                        <p class="card-text">{{$current_package->packages->package_name}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                        <h4 class="card-title text-white">Gross Earnings</h4>
                                        <h2 class="card-text"><strong>{{isset($bonus_amount) ? '$'.number_format((float)$bonus_amount, 2, '.', '') : '$00.00'}}</strong></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                              <?php
                              $withdraw=App\Models\Withdraw::where('user_id',\Auth::id())->where('status','approve')->get()->sum('amount');

                              ?>
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                        <h4 class="card-title text-white">Gross Withdraw</h4>
                                          <h2 class="card-text"><strong>{{isset($withdraw) ? '$'.number_format((float)$withdraw, 2, '.', '') : '$00.00'}}</strong></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                      <?php
                                      $transferData = App\Models\AddMoney::where('user_id',Auth::id())->where('method','Transfer')->get()->sum('amount');
                                      //dd($transferData);

                                       ?>
                                        <h4 class="card-title text-white">Gross Transfer</h4>
                                          <h2 class="card-text"><strong>${{abs($transferData)}}</strong></h2>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                        <h4 class="card-title text-white">My Refferals</h4>
                                        <?php
                                        $refferals = App\Models\User::where('sponsor',Auth::id())->get()->count('id');
                                        //dd($refferals);

                                         ?>
                                        <h2 class="card-text"><strong>{{$refferals}}</strong></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                      <?php
                                      $total_sponsor_bonus = App\Models\CashWallet::where('user_id',Auth::id())->where('method','Sponsor Bonus')->get()->sum('bonus_amount');
                                      //dd($total_level_bonus);

                                       ?>
                                      <h4 class="card-title text-white">Refferal Bonus</h4>
                                      <h2 class="card-text"><strong>${{$total_sponsor_bonus}}</strong></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                      <?php
                                      $total_daily_bonus = App\Models\CashWallet::where('user_id',Auth::id())->where('method','daily bonus')->get()->sum('bonus_amount');
                                      //dd($transferData);

                                       ?>
                                      <h4 class="card-title text-white">Daily Bonus</h4>
                                      <h2 class="card-text"><strong>${{$total_daily_bonus}}</strong></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                      <?php
                                      $total_royality_bonus = App\Models\CashWallet::where('user_id',Auth::id())->where('method','royality sponsor bonus')->get()->sum('bonus_amount');
                                      //dd($total_royality_bonus);

                                       ?>
                                      <h4 class="card-title text-white">Royality Bonus</h4>
                                      <h2 class="card-text"><strong>${{$total_royality_bonus}}</strong></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                      <?php
                                      $total_level_bonus = App\Models\CashWallet::where('user_id',Auth::id())->where('method','Level Bonus')->get()->sum('bonus_amount');
                                      //dd($total_level_bonus);

                                       ?>
                                        <h4 class="card-title text-white">Level Bonus</h4>
                                        <h2 class="card-text"><strong>${{$total_level_bonus}}</strong></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                      <h4 class="card-title text-white">Team Bonus</h4>
                                      <h2 class="card-text"><strong>$00.00</strong></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                      <h4 class="card-title text-white">Club Bonus</h4>
                                      <h2 class="card-text"><strong>$00.00</strong></h2>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                      <h4 class="card-title text-white">Carry Forward</h4>
                                      <h2 class="card-text"><strong>$00.00</strong></h2>
                                    </div>
                                </div>
                            </div>


                          
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                      <h4 class="card-title text-white">Gross Left Sale</h4>
                                      <h2 class="card-text"><strong>$00.00</strong></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                      <h4 class="card-title text-white">Gross Right Sale</h4>
                                      <h2 class="card-text"><strong>$00.00</strong></h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Statistics Card -->

                        <!--/ Statistics Card -->


                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
<script type="text/javascript">

  //alert('success');
  //console.log(this.getAttribute('id'));
  //console.log(e.target.options[e.target.selectedIndex].getAttribute('id'));
//var wallet=  document.getElementById("wallet_id");
//wallet.innerHTML= id.value;
document.getElementById('DestinationOptions').addEventListener('change', function(e) {
    var wallet2= e.target.options[e.target.selectedIndex].getAttribute('id');
    //console.log(wallet2);
    var wallet=  document.getElementById("wallet_id").value=wallet2;
    //console.log(wallet);
    //wallet.innerHTML= wallet2;
});

//  document.getElementById('').value(id.value);



</script>
<script type="text/javascript">

  //alert('success');
  //console.log(this.getAttribute('id'));
  //console.log(e.target.options[e.target.selectedIndex].getAttribute('id'));
//var wallet=  document.getElementById("wallet_id");
//wallet.innerHTML= id.value;
document.getElementById('DestinationOptions2').addEventListener('change', function(e) {
    var wallet3= e.target.options[e.target.selectedIndex].getAttribute('id');
    //console.log(wallet2);
    var wallet4=  document.getElementById("wallet_id").value=wallet3;
    //console.log(wallet);
    //wallet.innerHTML= wallet2;
});

//  document.getElementById('').value(id.value);



</script>
@endsection
