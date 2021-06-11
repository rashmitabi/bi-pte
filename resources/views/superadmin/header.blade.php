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
               <div class="budge-notificaiton-wrap">
                  <i class="fas fa-bell"> </i> <span class="badge budge-notificaiton">2</span>
               </div>
               <div class="dropdown-toggle-wrap">
                  <span class="heading"> Notifications </span>
                  <div class="notifications-main-wrap">
                     <ul>
                        <li> A new institute with name "ABC" has been
                           registered. Please check for approval. <span>Now </span>
                        </li>
                        <li> Institute "XYZ" has renewed his subscription.<span> 4h ago </span>
                        </li>
                        <li>Institute "ABC" subscription has been expired.<span> 6h ago </span>
                        </li>
                        <li> Institute "XYZ" has renewed his subscription.<span> 10h ago </span>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="profile-user-wrap">
               <a href="#" class="profile-name">
                  {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} 
                  <i class="fas fa-chevron-down"></i> 
                  <img src="{{ asset('assets/images/Userprofile.png') }}" class="">
               </a>
               <div class="logout-dropdown">
                  <div class="notifications-main-wrap">
                     <ul>
                        <li> 
                           <a href="#"> <i class="fas fa-cog"></i> Settings </a>
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