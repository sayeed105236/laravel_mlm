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
                        <h2 class="content-header-title float-left mb-0">Transfer Cash Report</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/home/dashboard/{{Auth::user()->id}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">My Transfer Cash Report
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
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Receiver Name</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transferData as $key=>$transfer)

                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>{{$transfer->user->user_name}}</td>
                                          <td></td>
                                        <td>{{$transfer->amount ?? ''}}</td>

                                        <td>{{$transfer->method ?? ''}}</td>
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
@push('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            selectToMe('');
        });

    </script>
@endpush
