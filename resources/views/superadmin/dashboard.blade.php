@extends('layouts.appSuperAdmin')
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
                       <h2>81</h2>
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
                     <h2>81</h2>
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
                    <h2>81</h2>
               </div>
            </div>
            <div class="col-12 col-md-3 col-xl-3 col-sm-3  common-wrap-col institute-col">
                <div class="dashboard-common-wrap">
                    <div class="icon">
                      <img src="{{ asset('assets/images/icons/request.svg') }}">
                   </div>
                   <div class="title">
                      <h4>Total Institute</h4>
                   </div>
               </div>
               <div class="text-wrap"> 
                    <h3>Total</h3>
                    <h2>81</h2>
               </div>
           </div>
        </div>
        <!-- graph -->
        <div class="row graph-wrap-row ">
           <div class="col-12 col-md-6 col-xl-6 col-sm-12 mt-5 mb-4 graph-common-1 white-bg ">
              <div class="col-12 col-md-8 col-xl-8 col-sm-8 mt-1 left">
                 <h5 class="table-head head-text float-left">Total Subscriptions</h5>
              </div>
              <select class="form-select form-select-sm float-right" aria-label=".form-select-sm example">
                 <option selected>Yearly</option>
                 <option value="1">Weekly</option> 
                 <option value="2">Day</option>
                 <option value="3">Monthly</option>
              </select>
              <canvas id="myChart" width="50%" hight="500px"></canvas>
           </div>
           <div class="col-12 col-md-6 col-xl-6 col-sm-12 mt-5 mb-4 graph-common-2 white-bg">
               <div class="col-12 col-md-8 col-xl-8 col-sm-8 mt-1 left">
                  <h5 class="table-head head-text">User Session</h5>
                </div>
             <canvas id="userSession" width="50%" hight="500px"></canvas>
           </div>
        </div>

         <!-- tables -->
        <div class="row">
           <div class="col-12 col-md-12 col-xl-6 col-sm-12 table-col pl-0 custom-wrap-p">
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
                               <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>new student</td>
                                      <td>Institute</td>
                                      <td>22/05/12:00PM</td>
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td>new student</td>
                                      <td>Student</td>
                                      <td>22/05/12:00PM</td>
                                    </tr>
                                    <tr>
                                      <td>3</td>
                                      <td>new student</td>
                                      <td>Institute</td>
                                      <td>22/05/12:00PM</td>
                                    </tr>
                                    <tr>
                                      <td>4</td>
                                      <td>new student</td>
                                      <td>Student</td>
                                      <td>22/05/12:00PM</td>
                                    </tr>
                                    <tr>
                                      <td>5</td>
                                      <td>new student</td>
                                      <td>Institute</td>
                                      <td>22/05/12:00PM</td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-12 col-md-12 col-xl-6 col-sm-12 table-col pl-0 common-p custom-wrap-p">
                <section class="top-title-button white-bg common-wrap mb-3">
                   <div class="col-12 col-md-6 col-xl-6 col-sm-7 float-left left">
                     <h1 class="table-head">Transactions</h1>
                   </div>
                   <div class="col-3 datapicker">
                          <input type="date" class="form-control ml-4" placeholder="Form">
                          <input type="date" class="form-control" placeholder="To">
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
                               <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>1001</td>
                                      <td>Navneet Kaur</td>
                                      <td>3000</td>
                                      <td>26/06/2021</td>
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td>1001</td>
                                      <td>Navneet Kaur</td>
                                      <td>3000</td>
                                      <td>26/06/2021</td>
                                    </tr>
                                    <tr>
                                      <td>3</td>
                                      <td>1001</td>
                                      <td>Navneet Kaur</td>
                                      <td>3000</td>
                                      <td>26/06/2021</td>
                                    </tr>
                                    <tr>
                                      <td>4</td>
                                      <td>1001</td>
                                      <td>Navneet Kaur</td>
                                      <td>3000</td>
                                      <td>26/06/2021</td>
                                    </tr>
                                    <tr>
                                      <td>5</td>
                                      <td>1001</td>
                                      <td>Navneet Kaur</td>
                                      <td>3000</td>
                                      <td>26/06/2021</td>
                                    </tr>                              
                            </table>
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
                           <button type="button" class="btn btn-secondary active expired-btn ">Expired</button>
                           <button type="button" class="btn btn-secondary near-expired ">Near to Expired</button>
                       </div>
                   </div>
                   <div class="row mx-0 align-items-center">
                      <div class="col-12 col-md-12 col-xl-12 col-sm-12 left p-0">
                           <table id="institute" class="table  table-bordered dt-responsive nowrap" style="width:100%">
                               <thead>
                                   <tr>
                                      <th>Sr No</th>
                                      <th>Name</th>
                                      <th>Status</th>
                                      <th>Price</th>
                                      <th>Type</th>
                                      <th>Date</th>
                                   </tr>
                               </thead>
                               <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>subscription 1</td>
                                      <td>Expired</td>
                                      <td>3000</td>
                                      <td>Student</td>
                                      <td>26/06/2021</td>
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td>subscription 1</td>
                                      <td>Expired</td>
                                      <td>3000</td>
                                      <td>Student</td>
                                      <td>26/06/2021</td>
                                    </tr>
                                    <tr>
                                      <td>3</td>
                                      <td>subscription 1</td>
                                      <td>Expired</td>
                                      <td>3000</td>
                                      <td>Student</td>
                                      <td>26/06/2021</td>
                                    </tr>
                                    <tr>
                                      <td>4</td>
                                      <td>subscription 1</td>
                                      <td>Expired</td>
                                      <td>3000</td>
                                      <td>Student</td>
                                      <td>26/06/2021</td>
                                    </tr>
                                    <tr>
                                      <td>5</td>
                                      <td>subscription 1</td>
                                      <td>Expired</td>
                                      <td>3000</td>
                                      <td>Student</td>
                                      <td>26/06/2021</td>
                                    </tr>
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
                                      <th>Name of Students</th>
                                      <th>Mobile Number</th>                                  
                                   </tr>
                               </thead>
                               <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>Abc Institute</td>
                                      <td>200</td>
                                      <td>9842000106</td>                         
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td>Abc Institute</td>
                                      <td>200</td>
                                      <td>9842000106</td>      
                                    </tr>
                                    <tr>
                                      <td>3</td>
                                      <td>Abc Institute</td>
                                      <td>200</td>
                                      <td>9842000106</td>      
                                    </tr>
                                    <tr>
                                      <td>4</td>
                                      <td>Abc Institute</td>
                                      <td>200</td>
                                      <td>9842000106</td>      
                                    </tr>
                                    <tr>
                                      <td>5</td>
                                      <td>Abc Institute</td>
                                      <td>200</td>
                                      <td>9842000106</td>      
                                    </tr>                              
                            </table>
                        </div>
                    </div>
                </section>
            </div>
      </div>
   </div>
@endsection
@section('js-hooks')
<script src="{{ asset('assets/js/superAdminDashboard.js') }}" defer></script>
@endsection