@extends('layouts.appBranchAdmin')
@section('content')
   <!-- Page Content  -->
   <div id="content">
      <div class="dashboard-heading mb-3">
          <h4>Admin DashBoard</h4>
      </div>
      <div class="row custom-row">
           <div class="col-12 col-md-3 col-xl-3 col-sm-3 common-wrap-col student-col">
              <div class="dashboard-common-wrap">
                    <div class="icon">
                      <img src="{{ asset('assets/images/icons/reading.svg') }}">
                   </div>
                   <div class="title">
                      <h4>Student</h4>
                   </div>
               </div>
               <div class="text-wrap"> 
                       <h3>Total</h3>
                       <h2>{{$data['students']}}</h2>
               </div> 
           </div>
           <div class="col-12 col-md-3 col-xl-3 col-sm-3 common-wrap-col mocktest-col">
               <div class="dashboard-common-wrap">
                    <div class="icon">
                      <img src="{{ asset('assets/images/icons/exam.svg') }}">
                    </div>
                    <div class="title">
                      <h4>Mock Tests</h4>
                    </div>
               </div>
               <div class="text-wrap"> 
                    <h3>Total</h3>
                     <h2>{{$data['mock_tests']}}</h2>
               </div>
            </div>
            <div class="col-12 col-md-3 col-xl-3 col-sm-3 common-wrap-col practicetest-col">
                <div class="dashboard-common-wrap">
                    <div class="icon">
                      <img src="{{ asset('assets/images/icons/exam.svg') }}">
                    </div>
                   <div class="title">
                      <h4>Practice Tests</h4>
                   </div>
               </div>
               <div class="text-wrap"> 
                    <h3>Total</h3>
                    <h2>{{$data['practice_tests']}}</h2>
               </div>
            </div>
            <div class="col-12 col-md-3 col-xl-3 col-sm-3  common-wrap-col institute-col">
                <div class="dashboard-common-wrap">
                    <div class="icon">
                      <img src="{{ asset('assets/images/icons/request.svg') }}">
                   </div>
                   <div class="title">
                      <h4>Total Prediction files</h4>
                   </div>
               </div>
               <div class="text-wrap"> 
                    <h3>Total</h3>
                    <h2>{{$data['prediction']}}</h2>
               </div>
           </div>
        </div>
        <!-- graph -->
        <div class="row graph-wrap-row ">
           <div class="col-12 col-md-6 col-xl-6 col-sm-12 mt-5 mb-4 graph-common-2 white-bg">
               <div class="col-12 col-md-8 col-xl-8 col-sm-8 mt-1 left">
                  <h5 class="table-head head-text">User Session</h5>
                </div>                
                @php 
                  $time = [];
                  $num = [];
                @endphp  
                @if (count($data['userSession']) > 0)
                  @foreach ($data['userSession'] as $sess)
                    @php
                    array_push($time, $sess['time']);
                    array_push($num, $sess['count']);  
                    @endphp                     
                  @endforeach
                @endif
             <canvas id="userSession" width="50%" hight="500px" data-label='{{ json_encode($time) }}' data-values='{{ json_encode($num) }}'></canvas>
           </div>
        </div>

         <!-- tables -->
        <div class="row">
          <div class="col-12 col-md-12 col-xl-12 col-sm-12 table-col pl-0 custom-wrap-p">
               <section class="top-title-button white-bg common-wrap mb-3">
                   <div class="col-12 col-md-8 col-xl-8 col-sm-8 left">
                     <h1 class="table-head head-text">Activity Log</h1>
                   </div>                   
                   <div class="row mx-0 align-items-center">
                      <div class="col-12 col-md-12 col-xl-12 col-sm-12 left p-0">
                           <table id="activitylog" class="table  table-bordered dt-responsive nowrap" style="width:100%">
                               <thead>
                                   <tr>
                                      <th>Sr No</th>
                                      <th>Subject</th>
                                      <th>Activity Created By</th>
                                      <th>Created Date & Time</th>
                                   </tr>
                               </thead>
                               
                            </table>
                        </div>
                        <div class="col-12 right">
                          <a href="{{ route('branchadmin-activities.index') }}">
                           View All Activity Logs
                         </a>
                         </div>
                    </div>
                </section>
          </div>
            <!-- <div class="col-12 col-md-12 col-xl-6 col-sm-12 table-col pl-0 common-p custom-wrap-p">
                <section class="top-title-button white-bg common-wrap mb-3">
                   <div class="col-12 col-md-6 col-xl-6 col-sm-7 float-left left">
                     <h1 class="table-head">Transactions</h1>
                   </div>
                   <div class="col-6 datapicker">
                          <input type="text" id="from_date" class="form-control ml-4" placeholder="Form" autocomplete="off">
                          <input type="text" id="to_date" class="form-control" placeholder="To" autocomplete="off">
                      </div>
                   <div class="row mx-0 align-items-center">
                      <div class="col-12 col-md-12 col-xl-12 col-sm-12 left p-0">
                           <table id="transaction" class="table  table-bordered dt-responsive nowrap" style="width:100%">
                               <thead>
                                   <tr>
                                      <th>Sr No</th>
                                      <th>Transaction Id</th>
                                      <th>Full Name</th>
                                      <th>Amount</th>
                                      <th>Transaction Date</th>
                                   </tr>
                               </thead>
                                                
                            </table>                            
                        </div>
                        <div class="col-12 right">
                          <a href="{{ route('transactions.index') }}">
                           View All Transactions
                         </a>
                         </div>
                    </div>
                </section>
            </div>

            <div class="col-12 col-md-12 col-xl-6 col-sm-12 table-col pl-0 custom-wrap-p">
               <section class="top-title-button white-bg common-wrap mb-3">
                   <div class="col-12 col-md-12 col-xl-8 col-sm-8 left float-left">
                     <h4 class="table-head">Institute Subscriptions</h4>
                   </div>
                   <div class="col-12 col-md-12 col-xl-4 col-sm-7 expired-btn">
                       <div id="myDIV" class="btn-group" role="group" aria-label="First group">
                           <button type="button" id="expiredSub" class="btn btn-secondary active expired-btn">Expired</button>
                           <button type="button" id="nearToExpireSub" class="btn btn-secondary near-expired ">Near to Expire</button>
                       </div>
                   </div>
                   <div class="row mx-0 align-items-center">
                      <div class="col-12 col-md-12 col-xl-12 col-sm-12 left p-0">
                           <table id="expired" class="table  table-bordered dt-responsive nowrap" style="width:100%">
                               <thead>
                                   <tr>
                                      <th>Sr No</th>
                                      <th>Name</th>
                                      <th>Status</th>
                                      <th>Price</th>
                                      <th>Institute</th>
                                      <th>Date</th>
                                   </tr>
                               </thead>
                                                         
                            </table>
                            <table id="near-to-expire" class="table table-bordered dt-responsive nowrap" style="width:100%;">
                               <thead>
                                   <tr>
                                      <th>Sr No</th>
                                      <th>Name</th>
                                      <th>Status</th>
                                      <th>Price</th>
                                      <th>Institute</th>
                                      <th>Date</th>
                                   </tr>
                               </thead>
                               
                            </table>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-12 col-md-12 col-xl-6 col-sm-12 table-col pl-0 common-p custom-wrap-p">
                <section class="top-title-button white-bg common-wrap mb-3">
                   <div class="col-12 col-md-8 col-xl-8 col-sm-7 left">
                     <h1 class="table-head">Top Ranking Institute</h1>
                   </div>
                   <div class="row mx-0 align-items-center">
                      <div class="col-12 col-md-12 col-xl-12 col-sm-12 left pt-1 p-0">
                           <table id="ranking" class="table  table-bordered dt-responsive nowrap" style="width:100%">
                               <thead>
                                   <tr>
                                      <th>Sr No</th>
                                      <th>Institute Name</th>
                                      <th>Number of Students</th>
                                      <th>Mobile Number</th>                                  
                                   </tr>
                               </thead>
                               
                            </table>
                        </div>
                    </div>
                </section>
            </div> -->
      </div>
   </div>

   
@endsection
@section('js-hooks')
<script type="text/javascript" defer>
  var activityurl="{{ route('branchadmin-dashboard-activitylogs') }}";
  var expiredSubscriptionurl="{{ route('dashboard-expired-subscriptions') }}";
  var neartoexpiresubscriptionurl = "{{ route('dashboard-near-to-expire-subscriptions') }}";
  var toprankinginstitutesurl = "{{ route('dashboard-top-ranking-institutes') }}";
</script>
<script src="{{ asset('assets/js/branchadmin/dashboard.js') }}" defer></script>
@endsection