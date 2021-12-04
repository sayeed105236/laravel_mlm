@extends('frontend.master')
@section('frontend.content')
    <style type="text/css">
        .green_tree * {
            color: #008911 !important;
            font-size: 12px
        }

        .red_tree * {
            color: #ff363b !important;
            font-size: 12px
        }

        .popover .arrow {
            display: none !important
        }

        .popover-body {
            color: #0c4b85 !important;
        }

        .popover-body span {
            font-weight: 400;
            color: #0070d7
        }

        .popover-header {
            background-color: #1d72f3 !important;
            color: #fff !important;
            border-radius: 0px !important;
            font-weight: bold;
            text-align: center
        }

        .tree-table * {
            text-align: center !important;
        }

        .tree img {
            max-width: 60px !important;
            height: auto
        }

        .tree.table thead tr th, .table tbody tr td {
            border: 0
        }

        .tree .line {
            width: 100%;
            max-width: 50% !important;
        }

        .tree-table {
            width: 100%;
            min-width: 800px
        }

        .card i {
            color: rgba(235, 177, 0, 0.95);
            font-weight: bold;
            font-size: 16px
        }
    </style>
    <div class="app-content content" style="margin-bottom: 20px">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">My Team</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a>
                                </li>
                                <li class="breadcrumb-item active">My Team
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Content start -->
                <div class="tree">
                    <div class="table-responsive">
                        <table class="border-0 tree-table">
                            <tr>
                                <td colspan="8">
                                    <a class="text-center green_tree" href="{{isset($user) ?$user->id : ''}}" data-toggle="popover" title="DM10000"
                                       data-content="<span>Name:</span> Company User<br/><span>Sponsor:</span> DM0<br/><span>Registration Date:</span> 2020-09-07<br/><span>Package:</span> sahilkajle<br/><span>Own Investment:</span> ₹ 36951.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                       data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                   src="https://downassam.com/demo/public/images/green_user.png"
                                                                                   alt="Company User"><br/><strong> {{isset($user) ?$user->user_name : ''}}</strong><br/><span
                                            class="text-sm-center"></span></a><br/>
                                    <img class="img-fluid line" src="https://downassam.com/demo/public/images/line.png"
                                         alt="">
                                </td>
                            </tr>

                                @php
                                    $child_left = $user->placements->where('position',1)->first();

                                    $child_right = $user->placements->where('position',2)->first();
                                    $lev_two_left_l=$lev_two_left_r=$lev_two_right_l=$lev_two_right_r=null;
                                    if ($child_left){
                                        $lev_two_left_l = $child_left->placements->where('position',1)->first();
                                    $lev_two_left_r = $child_left->placements->where('position',2)->first();
                                    }
                                    if ($child_right){
                                        $lev_two_right_l = $child_right->placements->where('position',1)->first();
                                    $lev_two_right_r = $child_right->placements->where('position',2)->first();
                                    }
                                    //dd($lev_three_left_l,$lev_three_left_r,$lev_three_right_l,$lev_three_right_r);
                                $lev_three_left_l_l=$lev_three_left_l_r=$lev_three_left_r_l=$lev_three_left_r_r = null;
                                $lev_three_right_l_l=$lev_three_right_l_r=$lev_three_right_r_l=$lev_three_right_r_r = null;
                                if ($lev_two_left_l){
                                $lev_three_left_l_l = $lev_two_left_l->placements->where('position',1)->first();
                                $lev_three_left_l_r = $lev_two_left_l->placements->where('position',2)->first();
                                }
                                if ($lev_two_left_r){
                                $lev_three_left_r_l = $lev_two_left_r->placements->where('position',1)->first();
                                $lev_three_left_r_r = $lev_two_left_r->placements->where('position',2)->first();
                                }
                                if ($lev_two_right_l){
                                    $lev_three_right_l_l = $lev_two_right_l->placements->where('position',1)->first();
                                    $lev_three_right_l_r = $lev_two_right_l->placements->where('position',2)->first();
                                }
                                if ($lev_two_right_r){
                                    $lev_three_right_r_l = $lev_two_right_r->placements->where('position',1)->first();
                                $lev_three_right_r_r = $lev_two_right_r->placements->where('position',2)->first();
                                }

                                @endphp
                                <tr>
                                    @if($child_left)
                                        <td colspan="4">
                                            <a class="text-center green_tree"
                                               href="{{$child_left->id}}"
                                               data-toggle="popover" title="DM159278"
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                           src="https://downassam.com/demo/public/images/red_user.png"
                                                                                           alt="Mohammed Saleem"><br/><strong>
                                                    {{$child_left->user_name}}
                                                </strong><br/><span class="text-sm-center"> DM159278</span></a><br/>
                                            <img class="img-fluid line"
                                                 src="https://downassam.com/demo/public/images/line.png" alt="">
                                        </td>
                                    @else
                                        <td colspan="4">
                                            <a class="text-center"
                                               href="#"
                                               data-toggle="popover" title="DM159278"
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                           src="https://downassam.com/demo/public/images/red_user.png"
                                                                                           alt="Mohammed Saleem"><br/><strong>

                                                </strong><br/><span class="text-sm-center"></span></a><br/>
                                            <img class="img-fluid line"
                                                 src="https://downassam.com/demo/public/images/line.png" alt="">
                                        </td>
                                    @endif

                                    @if($child_right)
                                        <td colspan="4">
                                            <a class="text-center green_tree"
                                               href="{{$child_right->id}}"
                                               data-toggle="popover" title="DM159278"
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                           src="https://downassam.com/demo/public/images/red_user.png"
                                                                                           alt="Mohammed Saleem"><br/><strong>
                                                    {{$child_right->user_name}}
                                                </strong><br/><span class="text-sm-center"> DM159278</span></a><br/>
                                            <img class="img-fluid line"
                                                 src="https://downassam.com/demo/public/images/line.png" alt="">
                                        </td>
                                    @else
                                        <td colspan="4">
                                            <a class="text-center"
                                               href="#"
                                               data-toggle="popover" title="DM159278"
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                           src="https://downassam.com/demo/public/images/red_user.png"
                                                                                           alt="Mohammed Saleem"><br/><strong>

                                                </strong><br/><span class="text-sm-center"></span></a><br/>
                                            <img class="img-fluid line"
                                                 src="https://downassam.com/demo/public/images/line.png" alt="">
                                        </td>
                                    @endif

                                </tr>
                                <tr>
                                    @if($lev_two_left_l)
                                        <td colspan="2">
                                            <a class="text-center green_tree"
                                               href="{{$lev_two_left_l->id}}"
                                               data-toggle="popover" title="DM159278"
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                           src="https://downassam.com/demo/public/images/red_user.png"
                                                                                           alt="Mohammed Saleem"><br/><strong>
                                                    {{$lev_two_left_l->user_name}}
                                                </strong><br/><span class="text-sm-center"> DM159278</span></a><br/>
                                            <img class="img-fluid line"
                                                 src="https://downassam.com/demo/public/images/line.png" alt="">
                                        </td>
                                    @else
                                        <td colspan="2">
                                            <a class="text-center"
                                               href="#"
                                               data-toggle="popover" title="DM159278"
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                           src="https://downassam.com/demo/public/images/red_user.png"
                                                                                           alt="Mohammed Saleem"><br/><strong>

                                                </strong><br/><span class="text-sm-center"></span></a><br/>
                                            <img class="img-fluid line"
                                                 src="https://downassam.com/demo/public/images/line.png" alt="">
                                        </td>
                                    @endif

                                    @if($lev_two_left_r)

                                        <td colspan="2">
                                            <a class="text-center green_tree"
                                               href="{{$lev_two_left_r->id}}"
                                               data-toggle="popover" title="DM159278"
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                           src="https://downassam.com/demo/public/images/red_user.png"
                                                                                           alt="Mohammed Saleem"><br/><strong>
                                                    {{$lev_two_left_r->user_name}}
                                                </strong><br/><span class="text-sm-center"> DM159278</span></a><br/>
                                            <img class="img-fluid line"
                                                 src="https://downassam.com/demo/public/images/line.png" alt="">
                                        </td>
                                    @else
                                        <td colspan="2">
                                            <a class="text-center"
                                               href="#"
                                               data-toggle="popover" title="DM159278"
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                           src="https://downassam.com/demo/public/images/red_user.png"
                                                                                           alt="Mohammed Saleem"><br/><strong>

                                                </strong><br/><span class="text-sm-center"></span></a><br/>
                                            <img class="img-fluid line"
                                                 src="https://downassam.com/demo/public/images/line.png" alt="">
                                        </td>
                                    @endif

                                    <!--- Lev two Right -->
                                        @if($lev_two_right_l)
                                            <td colspan="2">
                                                <a class="text-center green_tree"
                                                   href="{{$lev_two_right_l->id }}"
                                                   data-toggle="popover" title="DM159278"
                                                   data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                   data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                               src="https://downassam.com/demo/public/images/red_user.png"
                                                                                               alt="Mohammed Saleem"><br/><strong>
                                                        {{$lev_two_right_l->user_name }}
                                                    </strong><br/><span class="text-sm-center"> DM159278</span></a><br/>
                                                <img class="img-fluid line"
                                                     src="https://downassam.com/demo/public/images/line.png" alt="">
                                            </td>
                                        @else
                                            <td colspan="2">
                                                <a class="text-center"
                                                   href="#"
                                                   data-toggle="popover" title="DM159278"
                                                   data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                   data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                               src="https://downassam.com/demo/public/images/red_user.png"
                                                                                               alt="Mohammed Saleem"><br/><strong>

                                                    </strong><br/><span class="text-sm-center"></span></a><br/>
                                                <img class="img-fluid line"
                                                     src="https://downassam.com/demo/public/images/line.png" alt="">
                                            </td>
                                        @endif

                                        @if($lev_two_right_r)
                                            <td colspan="4">
                                                <a class="text-center green_tree"
                                                   href="{{$lev_two_right_r->id}}"
                                                   data-toggle="popover" title="DM159278"
                                                   data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                   data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                               src="https://downassam.com/demo/public/images/red_user.png"
                                                                                               alt="Mohammed Saleem"><br/><strong>
                                                        {{$lev_two_right_r->user_name}}
                                                    </strong><br/><span class="text-sm-center"> DM159278</span></a><br/>
                                                <img class="img-fluid line"
                                                     src="https://downassam.com/demo/public/images/line.png" alt="">
                                            </td>
                                        @else
                                            <td colspan="2">
                                                <a class="text-center"
                                                   href="#"
                                                   data-toggle="popover" title="DM159278"
                                                   data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                   data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                               src="https://downassam.com/demo/public/images/red_user.png"
                                                                                               alt="Mohammed Saleem"><br/><strong>

                                                    </strong><br/><span class="text-sm-center"></span></a><br/>
                                                <img class="img-fluid line"
                                                     src="https://downassam.com/demo/public/images/line.png" alt="">
                                            </td>
                                        @endif

                                </tr>

                                <tr>
                                    <!--left-->
                                    @if($lev_three_left_l_l)
                                        <td>
                                            <a class="text-center green_tree"
                                               href="{{$lev_three_left_l_l->id}}" data-toggle="popover" title="DM572636" data-content="<span>Name:</span> YUSUFF<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-11-26<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00" data-trigger="hover" data-html="true"> <img class="rounded-circle" src="https://downassam.com/demo/public/images/red_user.png" alt="YUSUFF"><br />
                                                <strong>  {{$lev_three_left_l_l->user_name}}</strong><br /><span class="text-sm-center"> DM572636</span ></a> </td>
                                    @else
                                        <td>
                                            <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: DM198299"><img src="https://downassam.com/demo/public/images/new_user.png" alt="New User"></a>
                                        </td>
                                    @endif

                                    @if($lev_three_left_l_r)
                                        <td>
                                            <a class="text-center green_tree" href="{{$lev_three_left_l_r->id}}" data-toggle="popover" title="DM572636" data-content="<span>Name:</span> YUSUFF<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-11-26<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00" data-trigger="hover" data-html="true"> <img class="rounded-circle" src="https://downassam.com/demo/public/images/red_user.png" alt="YUSUFF"><br />
                                                <strong>  {{$lev_three_left_l_r->user_name}}</strong><br /><span class="text-sm-center"> DM572636</span ></a>
                                        </td>
                                    @else
                                        <td>
                                            <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: DM198299"><img src="https://downassam.com/demo/public/images/new_user.png" alt="New User"></a>
                                        </td>
                                    @endif

                                    @if($lev_three_left_r_r)
                                        <td>
                                            <a class="text-center green_tree" href="{{$lev_three_left_r_r->id}}" data-toggle="popover" title="DM572636" data-content="<span>Name:</span> YUSUFF<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-11-26<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00" data-trigger="hover" data-html="true"> <img class="rounded-circle" src="https://downassam.com/demo/public/images/red_user.png" alt="YUSUFF"><br />
                                                <strong> {{$lev_three_left_r_r->user_name}}</strong><br /><span class="text-sm-center"> DM572636</span ></a>
                                        </td>
                                    @else
                                        <td>
                                            <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: DM198299"><img src="https://downassam.com/demo/public/images/new_user.png" alt="New User"></a>
                                        </td>
                                    @endif
                                    @if($lev_three_left_r_r)
                                        <td>
                                            <a class="text-center green_tree" href="{{$lev_three_left_r_r->id}}" data-toggle="popover" title="DM572636" data-content="<span>Name:</span> YUSUFF<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-11-26<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00" data-trigger="hover" data-html="true"> <img class="rounded-circle" src="https://downassam.com/demo/public/images/red_user.png" alt="YUSUFF"><br />
                                                <strong> {{$lev_three_left_r_r->user_name}}</strong><br /><span class="text-sm-center"> DM572636</span ></a>
                                        </td>
                                    @else
                                        <td>
                                            <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: DM198299"><img src="https://downassam.com/demo/public/images/new_user.png" alt="New User"></a>
                                        </td>
                                    @endif

                                <!--right-->
                                    @if($lev_three_right_l_l)
                                        <td>
                                            <a class="text-center green_tree"
                                               href="{{$lev_three_right_l_l->id}}"
                                               data-toggle="popover" title="DM159278"
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                           src="https://downassam.com/demo/public/images/red_user.png"
                                                                                           alt="Mohammed Saleem"><br/><strong>
                                                    {{$lev_three_right_l_l->user_name}}
                                                </strong><br/><span class="text-sm-center"> DM159278</span></a><br/>
                                        </td>
                                    @else
                                        <td>
                                            <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: DM330515"><img src="https://downassam.com/demo/public/images/new_user.png" alt="New User"></a>
                                        </td>
                                    @endif

                                    @if($lev_three_right_l_r)
                                        <td>
                                            <a class="text-center green_tree"
                                               href="{{$lev_three_right_l_r->id}}"
                                               data-toggle="popover" title="DM159278"
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                           src="https://downassam.com/demo/public/images/red_user.png"
                                                                                           alt="Mohammed Saleem"><br/><strong>
                                                    {{$lev_three_right_l_r->user_name}}
                                                </strong><br/><span class="text-sm-center"></span></a><br/>
                                        </td>
                                    @else
                                        <td>
                                            <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: DM330515"><img src="https://downassam.com/demo/public/images/new_user.png" alt="New User"></a>
                                        </td>
                                    @endif

                                    @if($lev_three_right_r_r)
                                        <td>
                                            <a class="text-center green_tree"
                                               href="{{$lev_three_right_r_r->id}}"
                                               data-toggle="popover" title="DM159278"
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                           src="https://downassam.com/demo/public/images/red_user.png"
                                                                                           alt="Mohammed Saleem"><br/><strong>
                                                    {{$lev_three_right_r_r->user_name}}
                                                </strong><br/><span class="text-sm-center"></span></a><br/>
                                        </td>
                                    @else
                                        <td>
                                            <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: DM330515"><img src="https://downassam.com/demo/public/images/new_user.png" alt="New User"></a>
                                        </td>
                                    @endif
                                    @if($lev_three_right_r_r)
                                        <td>
                                            <a class="text-center green_tree"
                                               href=" {{$lev_three_right_r_r->id}}"
                                               data-toggle="popover" title="DM159278"
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> DM10000<br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                           src="https://downassam.com/demo/public/images/red_user.png"
                                                                                           alt="Mohammed Saleem"><br/><strong>
                                                    {{$lev_three_right_r_r->user_name}}
                                                </strong><br/><span class="text-sm-center"> DM159278</span></a><br/>
                                        </td>
                                    @else
                                        <td>
                                            <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: DM330515"><img src="https://downassam.com/demo/public/images/new_user.png" alt="New User"></a>
                                        </td>
                                    @endif
                                </tr>
                        </table>
                    </div>


                </div>


                <!-- Content End -->


            </div>
        </div>
@endsection
