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
                     <a href="#">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <i class="fas fa-chevron-down"></i> <img src="{{ asset('assets/images/Userprofile.png') }}" class="">
                   </a>
                   
            </div>
         </div>
      </div>
   </div>
</nav>