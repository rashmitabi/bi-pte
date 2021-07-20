<!-- <nav class="navbar navbar-expand-lg">
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
                     <a href="#">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <i class="fas fa-chevron-down"></i> <img src="{{ asset('assets/images/Userprofile.png') }}" class="">
                   </a>
                   
            </div>
         </div>
      </div>
   </div>
</nav> -->

<nav class="navbar navbar-expand-lg">
   <div class="container-fluid">
      <button type="button" id="sidebarCollapse" class="btn btn-toggle">
         <!-- <i class="fas fa-align-center"></i> -->
         <img src="{{ asset('assets/images/icons/menu.svg') }}" class="">
      </button>
      <div class="main-content-heading">
         <h3> Australian Academy </h3>
      </div>
      <button class="btn btn-dark d-inline-block d-lg-none ml-auto responsive-toggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <i class="fas fa-align-justify"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <div class="right-navbar-wrap">
            <div class="notificaiton-main">
               <div class="budge-notificaiton-wrap" id="notify-box">
                  <i class="fas fa-bell"> </i> <span class="badge budge-notificaiton" id="countNotification">0</span>
               </div>
               <div class="dropdown-toggle-wrap" id="notification-list">
                  
               </div>
            </div>
            <div class="profile-user-wrap" id="profile-box">
               <a href="#" class="profile-name">
                  {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} 
                  <i class='fas fa-chevron-down'></i> 
                  @if(Auth::user()->profile_image != '')
                     <img src="{{ asset('assets/images/profile/'.Auth::user()->profile_image) }}" width="50">
                  @else if
                     <img src="{{ asset('assets/images/Userprofile.png') }}">
                  @endif
               </a>
               <div class="logout-dropdown">
                  <div class="notifications-main-wrap">
                     <ul>
                        <li> 
                           <a href="{{ route('branchadmin-profile.index') }}"> <i class="fas fa-user"></i>My Profile</a>
                        </li>                        
                        <li> 
                           <a href="{{ route('branchadmin-transactions.index') }}"> <i class="fas fa-credit-card"></i>My Payments</a>
                        </li>
                        <li> 
                           <a href="{{ route('branchadmin-changepassword') }}"> <i class="fas fa-lock"></i>Change Password</a>
                        </li>
                        <li> 
                           <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i> Sign Out </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                           </form>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</nav>