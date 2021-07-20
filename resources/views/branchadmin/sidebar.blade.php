  <!-- Sidebar  -->
<div>
  <nav id="sidebar">
      <ul class="list-unstyled components">
         <li class="{{ $pageActive == 'dashboard' ? 'active' : ''  }}">
            <a href="{{ route('branchadmin-dashboard') }}" > <img src="{{ asset('assets/images/icons/dashboard.svg') }}" class=""> <span> Dashboard </span> </a>
         </li>

         <li class="{{ $pageActive == 'users' ? 'active' : ''  }}">
            <a href="#Usersubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/user.svg') }}" class=""> <span> Manage Students </span></a>
            <ul class="collapse list-unstyled" id="Usersubmenu">
               <li>
                  <a href="{{ route('branchadmin-students.index') }}">List Students</a>
               </li>
               <li>
                  <a href="{{ route('branchadmin-students.create') }}">Add New Students</a>
               </li>
            </ul>
         </li>

         <li class="{{ $pageActive == 'device' ? 'active' : ''  }}">
            <a href="{{ route('branchadmin-device.index') }}"> <img src="{{ asset('assets/images/icons/devices.svg') }}" class=""><span> Manage Devices Logs </span></a>
         </li>

         <li class="{{ $pageActive == 'tests' ? 'active' : ''  }}">
            <a href="#Testsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/test.svg') }}" class=""> <span> Manage Test </span></a>
            <ul class="collapse list-unstyled" id="Testsubmenu">
               <li>
                  <a href="{{ route('branchadmin-tests.create') }}">Create Test</a>
               </li>
               <li>
               <a href="{{ route('branchadmin-tests.index') }}">List Tests</a>
               </li>
            </ul>
         </li>

         <li class="{{ $pageActive == 'results' ? 'active' : ''  }}">
            <a href="{{ route('branchadmin-results.index') }}"> <img src="{{ asset('assets/images/icons/result.svg') }}" class=""><span> Manage Test Result </span></a>
         </li>        
         <li class="{{ $pageActive == 'videos' ? 'active' : ''  }}">
            <a href="#Videossubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/video.svg') }}" class=""> <span> Manage Videos </span></a>
            <ul class="collapse list-unstyled" id="Videossubmenu">
               <li>
                  <a href="{{ route('branchadmin-videos.create') }}">Create Video</a>
               </li>
               <li>
                  <a href="{{ route('branchadmin-videos.index') }}">List Videos</a>
               </li>
            </ul>
         </li>
         <li class="{{ $pageActive == 'predictionfiles' ? 'active' : ''  }}">
            <a href="#Predictionsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/questions.svg') }}" class=""> <span> Manage Prediction Files </span></a>
            <ul class="collapse list-unstyled" id="Predictionsubmenu">
               <li>
                  <a href="{{ route('branchadmin-predictionfiles.create') }}">Create Prediction file</a>
               </li>
               <li>
                  <a href="{{ route('branchadmin-predictionfiles.index') }}">List Prediction files</a>
               </li>
            </ul>
         </li>
         <li class="{{ $pageActive == 'email' ? 'active' : ''  }}">
            <a href="#Emailsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/email.svg') }}" class=""><span> Email Templates </span></a>
            <ul class="collapse list-unstyled" id="Emailsubmenu">
               <li>
                  <a href="{{ route('branchadmin-email.create')}}">Create Email Template</a>
               </li>
               <li>
                  <a href="{{ route('branchadmin-email.index')}}">List Email Templates</a>
               </li>
            </ul>
         </li>
         <li class="{{ $pageActive == 'certificates' ? 'active' : ''  }}">
            <a href="{{ route('branchadmin-certificates.index') }}"> <img src="{{ asset('assets/images/icons/certificates.svg') }}" class=""><span> Certificate </span></a>
         </li>
         
      </ul>
   </nav>
</div>