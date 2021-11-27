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
                        <h2 class="content-header-title float-left mb-0">Income Report</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a>
                                </li>
                                <li class="breadcrumb-item active">My Income Report
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
                                    <th>Income</th>
                                    <th>Method</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($incomeData as $key=>$income)

                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>{{$income->user->user_name}}</td>
                                        <td>{{$income->bonus_amount ?? ''}}</td>
                                        <td>{{$income->method ?? ''}}</td>
                                        <td>{{$income->created_at}}</td>
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
