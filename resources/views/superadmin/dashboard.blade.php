@extends('layouts.appSuperAdmin')
@section('content')
   <!-- Page Content  -->
   <div id="content">
      <div class="dashboard-heading mb-3">
          <h4>Admin DashBoard</h4>
      </div>
      <div class="row">
         <div class="col student-col">
              <div class="common-wrap">
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
         <div class="col mocktest-col">
         <div class="common-wrap">
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
         <div class="col practicetest-col">
         <div class="common-wrap">
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
         <div class="col institute-col">
         <div class="common-wrap">
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
   </div>
@endsection

<!-- <div class="col student-col">
                <div class="common-wrap">
                    <div class="user-icon">
                      <img src="{{ asset('assets/images/icons/reading.svg') }}">
                   </div>
                   <div class="title">
                      <h4>Student</h4>
                   </div>
               </div>
               <div class="total-wrap"> 
                    <div class="heading-text">
                       <h3>Total</h3>
                    <div>
                    <div class="text-wrap">
                       <h2>81</h2>
                    <div>    
               </div>
            </div>
            <div class="col mocktest-col">
             
            </div>
            <div class="col practicetest-col">

            </div>
            <div class="col institute-col">
               
            </div>
       </div> -->