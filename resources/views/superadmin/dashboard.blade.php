@extends('layouts.appSuperAdmin')
@section('content')
<nav class="navbar navbar-expand-lg">
   <div class="container-fluid">
      <button type="button" id="sidebarCollapse" class="btn btn-toggle">
         <i class="fas fa-align-center"></i>
      </button>
      <div class="main-content-heading">
           <h3> Australian Academy </h3> 

      </div>
      <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <i class="fas fa-align-justify"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <div class="right-navbar-wrap">
            <div class="notificaiton-main">
               <i class="fas fa-bell"></i>
            </div>
            <div class="profile-user-wrap">
                     <a href="#">   Marten Alex <i class="fas fa-chevron-down"></i> <img src="{{ asset('assets/images/Userprofile.png') }}" class="">
                   </a>
                   
            </div>
         </div>
      </div>
   </div>
</nav>
<div class="wrapper">
   <!-- Sidebar  -->

   <nav id="sidebar">
      <ul class="list-unstyled components">
         <li class="active">
            <a href="#dashboardsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">  <img src="{{ asset('assets/images/icons/dashboard.svg') }}" class=""> <span> Dashboard </span> </a>
            <ul class="collapse list-unstyled" id="dashboardsubmenu">
               <li>
                  <a href="#">Home 1</a>
               </li>
               <li>
                  <a href="#">Home 2</a>
               </li>
               <li>
                  <a href="#">Home 3</a>
               </li>
            </ul>
         </li>
         
         <li>
            <a href="#Usersubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/dashboard.svg') }}" class=""> <span>  Manage User </span></a>
            <ul class="collapse list-unstyled" id="Usersubmenu">
               <li>
                  <a href="#">Page 1</a>
               </li>
               <li>
                  <a href="#">Page 2</a>
               </li>
               <li>
                  <a href="#">Page 3</a>
               </li>
            </ul>
         </li>
         <li>
         <li>
            <a href="#Testsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/dashboard.svg') }}" class=""> <span> Manage Test </span></a>
            <ul class="collapse list-unstyled" id="Testsubmenu">
               <li>
                  <a href="#">Page 1</a>
               </li>
               <li>
                  <a href="#">Page 2</a>
               </li>
               <li>
                  <a href="#">Page 3</a>
               </li>
            </ul>
         </li>
         <li>
            <a href="#"> <img src="{{ asset('assets/images/icons/dashboard.svg') }}" class=""><span>  Manage Test Result </span></a>
         </li>
         <li>
            <a href="#Subjetsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/dashboard.svg') }}" class=""> <span> Manage Subjet </span> </a>
            <ul class="collapse list-unstyled" id="Subjetsubmenu">
               <li>
                  <a href="#">Page 1</a>
               </li>
               <li>
                  <a href="#">Page 2</a>
               </li>
               <li>
                  <a href="#">Page 3</a>
               </li>
            </ul>
         </li>
         
         <li>
            <a href="#Questionssubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/dashboard.svg') }}" class=""> <span> Practice Questions </span></a>
            <ul class="collapse list-unstyled" id="Questionssubmenu">
               <li>
                  <a href="#">Page 1</a>
               </li>
               <li>
                  <a href="#">Page 2</a>
               </li>
               <li>
                  <a href="#">Page 3</a>
               </li>
            </ul>
         </li>
         <li>
            <a href="#Videossubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/dashboard.svg') }}" class=""> <span> Manage Videos </span></a>
            <ul class="collapse list-unstyled" id="Videossubmenu">
               <li>
                  <a href="#">Page 1</a>
               </li>
               <li>
                  <a href="#">Page 2</a>
               </li>
               <li>
                  <a href="#">Page 3</a>
               </li>
            </ul>
         </li>
         <li>
            <a href="#Predictionsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/dashboard.svg') }}" class=""> <span> Manage Prediction Files </span></a>
            <ul class="collapse list-unstyled" id="Predictionsubmenu">
               <li>
                  <a href="#">Page 1</a>
               </li>
               <li>
                  <a href="#">Page 2</a>
               </li>
               <li>
                  <a href="#">Page 3</a>
               </li>
            </ul>
         </li>
         <li>
            <a href="#Voucherssubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/dashboard.svg') }}" class=""><span> Vouchers </span></a>
            <ul class="collapse list-unstyled" id="Voucherssubmenu">
               <li>
                  <a href="#">Page 1</a>
               </li>
               <li>
                  <a href="#">Page 2</a>
               </li>
               <li>
                  <a href="#">Page 3</a>
               </li>
            </ul>
         </li>
         <li>
            <a href="#Emailsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/dashboard.svg') }}" class=""><span> Email Templates </span></a>
            <ul class="collapse list-unstyled" id="Emailsubmenu">
               <li>
                  <a href="#">Page 1</a>
               </li>
               <li>
                  <a href="#">Page 2</a>
               </li>
               <li>
                  <a href="#">Page 3</a>
               </li>
            </ul>
         </li>
         <li>
            <a href="#"> <img src="{{ asset('assets/images/icons/dashboard.svg') }}" class=""> <span>Transactions</span></a>
         </li>
         <li>
            <a href="#"> <img src="{{ asset('assets/images/icons/dashboard.svg') }}" class=""><span> Certificate </span></a>
         </li>
         <li>
            <a href="#Subscriptionsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/dashboard.svg') }}" class=""> <span> Manage Subscription </span> </a>
            <ul class="collapse list-unstyled" id="Subscriptionsubmenu">
               <li>
                  <a href="#">Page 1</a>
               </li>
               <li>
                  <a href="#">Page 2</a>
               </li>
               <li>
                  <a href="#">Page 3</a>
               </li>
            </ul>
         </li>
         <li>
            <a href="#"> <img src="{{ asset('assets/images/icons/dashboard.svg') }}" class=""><span> Manage Devices Log </span></a>
         </li>
      </ul>
   </nav>

   <!-- Page Content  -->
   <div id="content">



      <h2>Main Content</h2>
      
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
   </div>
</div>
@endsection