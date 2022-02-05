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
                                <li class="breadcrumb-item"><a href="/home/dashboard/{{Auth::user()->id}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">My referrals
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
                                <h4 class="card-title">Referral User Lists</h4>


                                @include('frontend.modals.add_user')
                            </div>


                        </div>
                        <div class="table-responsive">
                            <table id="example" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>User Name</th>
                                    <th>Sponsor User Name</th>
                                    <th>Package Name</th>
                                    <th>Purchased Amount</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)

                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$user->name ?? ''}}</td>
                                        <td>{{$user->user_name ?? ''}}</td>
                                        <td>{{(isset($user->sponsors)) ? $user->sponsors->user_name : ''}}</td>

                                        <td>{{$user->packages->package_name ?? ''}}</td>
                                        <td>{{$user->packages->price ?? ''}}</td>

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
@push('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            selectToMe('');
        });
        $("#successMessage").delay(10000).slideUp(300);
        $('#sponsor').on('change', function (e) {
            $('#placement_id').val('');
            $("#position").select2("val", "");
        });

        $('#position').on('change', function (e) {
            var position = $(this).val();
            if (position == '') {
                return false;
            }
            var sponsor = $('#sponsor').val();
            if (sponsor == '') {
                $(this).val('');
                return alert('select a sponsor');
            }
            //var position=  $('#position').val();
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
                    $('#placement_id').val(data);
                    //location.reload();
                },
                error: function (data) {
                    console.log(data);
                }
            });

        });

        $('#registeruser').on('submit', function (e) {
            e.preventDefault();
            //disable the submit button
            $("#btnSubmit").attr("disabled", true);
            $('form').find('small').remove();
            $('form').find('input').removeClass('is-invalid');
            var registerForm = $("#registeruser");
            var formData = registerForm.serialize();

            $.ajaxSetup({
                header: $('meta[name="_token"]').attr('content')
            })
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
                error: function (error_response,e) {
                    $('#btnSubmit').attr("disabled", false);
                    if (error_response.responseJSON.message === "Insufficient Balance"){
                        alert("Insufficient Balance");
                    }
                    $.each(error_response.responseJSON.errors, function(key,value) {
                        $('#' + key ).after('<small class="text-danger">' + value + '</small>').closest('input').removeClass('is-invalid').addClass('is-invalid');

                    });
                }
            });
        });
    </script>
@endpush
