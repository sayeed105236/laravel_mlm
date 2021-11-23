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
                        <h2 class="content-header-title float-left mb-0">My Referrals</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a>
                                </li>
                                <li class="breadcrumb-item active">My referrals
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
                                <h4 class="card-title">Referral User Lists</h4>

                                <a href="#" class="btn btn-primary float-right" data-toggle="modal"
                                   data-target="#AddUserModal">Add</a>
                                @include('frontend.modals.add_user')
                            </div>


                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>User Name</th>
                                    <th>Sponsor Name</th>
                                    <th>Package Name</th>
                                    <th>Purchased Amount</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)

                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name ?? ''}}</td>
                                        <td>{{$user->user_name ?? ''}}</td>
                                        <td>{{(isset($user->sponsors)) ? $user->sponsors->name : ''}}</td>

                                        <td>{{$user->packages->package_name ?? ''}}</td>
                                        <td>{{$user->packages->price ?? ''}}</td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#PaymentMethodEditModal"><i
                                                    data-feather='edit'></i></a>
                                            <a href="#"><i data-feather='trash-2'></i></a>
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
@push('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            selectToMe('');
        });

        $('#position').on('change', function (e) {

            var sponsor = $('#sponsor').val();
            if (sponsor == '') {
                $(this).val('');
                return alert('select a sponsor');
            }
            //var position=  $('#position').val();
            var position = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                //url: $(this).attr('action'),
                url: '{{route("referrals-checkposition")}}',
                type: 'POST',
                data: {sponsor: sponsor, position: position},
                //dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $('#placement_id').val(data);
                    //location.reload();
                },
                error: function (data) {

                }
            });
        });

        $('#registeruser').on('submit', function (e) {
            var registerForm = $("#registeruser");
            var formData = registerForm.serialize();

            $.ajaxSetup({
                header: $('meta[name="_token"]').attr('content')
            })
            e.preventDefault(e);

            $.ajax({
                url: $(this).attr('action'),
                // url: '{{route("referrals-useradd")}}',
                type: 'POST',
                data: formData,
                //dataType: 'json',
                success: function (data) {
                    //console.log(data);
                    location.reload();
                },
                error: function (data) {
                    alert(data);

                }
            });
        });
    </script>
@endpush
