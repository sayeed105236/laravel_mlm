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
                    <h2 class="content-header-title float-left mb-0">Royality Bonus History</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home/dashboard/{{Auth::user()->id}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">royality bonus history
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
                              <h4 class="card-title">Royality Bonus History</h4>
                          </div>
                          </div>
                          <div class="table-responsive">
                              <table id="example" class="table table-hover">
                                  <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Date</th>


                                          <th>Amount</th>





                                      </tr>
                                  </thead>
                                  <tbody>



                                    @foreach($incomeData as $row)
                                      <tr>
                                        <td>{{$loop->index+1}}</td>
                                          <td>{{$row->created_at}}</td>


                                          <td>{{$row->bonus_amount}}</td>






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
