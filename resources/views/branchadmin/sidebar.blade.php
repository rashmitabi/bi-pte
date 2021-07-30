  <!-- Sidebar  -->
<div>
  <nav id="sidebar">
      <ul class="list-unstyled components">         
         <li class="{{ $pageActive == 'dashboard' ? 'active' : ''  }}">
            <a href="{{ route('branchadmin-dashboard') }}" > <img src="{{ asset('assets/images/icons/dashboard.svg') }}" class=""> <span> Dashboard </span> </a>
         </li>
         @if(checkPermission('manage_student') || checkPermission('view_student') || checkPermission('add_student'))
         <li class="{{ $pageActive == 'users' ? 'active' : ''  }}">
            <a href="#Usersubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/user.svg') }}" class=""> <span> Manage Students </span></a>
            <ul class="collapse list-unstyled" id="Usersubmenu">
               <li>
                  <a href="{{ route('branchadmin-students.index') }}">List Students</a>
               </li>
               @if(checkPermission('add_student'))
               <li>
                  <a href="{{ route('branchadmin-students.create') }}">Add New Student</a>
               </li>
               @endif
            </ul>
         </li>
         @endif
         @if(checkPermission('manage_mock_test') || checkPermission('mock_test') || checkPermission('manage_practice_test') || checkPermission('practice_test') || checkPermission('add_mock_test') || checkPermission('add_practice_test'))
         <li class="{{ $pageActive == 'tests' ? 'active' : ''  }}">
            <a href="#Testsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/test.svg') }}" class=""> <span> Manage Test </span></a>
            <ul class="collapse list-unstyled" id="Testsubmenu">
               @if(checkPermission('add_mock_test') || checkPermission('add_practice_test'))
               <li>
                  <a href="{{ route('branchadmin-tests.create') }}">Add Test</a>
               </li>
               @endif
               <li>
               <a href="{{ route('branchadmin-tests.index') }}">List Tests</a>
               </li>
            </ul>
         </li>
         @endif
         @if(checkPermission('test_result'))
         <li class="{{ $pageActive == 'results' ? 'active' : ''  }}">
            <a href="{{ route('branchadmin-results.index') }}"> <img src="{{ asset('assets/images/icons/result.svg') }}" class=""><span> Manage Test Result </span></a>
         </li>     
         @endif
         @if(checkPermission('manage_video') || checkPermission('video') || checkPermission('add_video'))   
         <li class="{{ $pageActive == 'videos' ? 'active' : ''  }}">
            <a href="#Videossubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/video.svg') }}" class=""> <span> Manage Videos </span></a>
            <ul class="collapse list-unstyled" id="Videossubmenu">
               @if(checkPermission('add_video'))
               <li>
                  <a href="{{ route('branchadmin-videos.create') }}">Add Video</a>
               </li>
               @endif
               <li>
                  <a href="{{ route('branchadmin-videos.index') }}">List Videos</a>
               </li>
            </ul>
         </li>
         @endif
         @if(checkPermission('manage_prediction_file') || checkPermission('prediction_file') || checkPermission('add_prediction_file')) 
         <li class="{{ $pageActive == 'predictionfiles' ? 'active' : ''  }}">
            <a href="#Predictionsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/questions.svg') }}" class=""> <span> Manage Prediction Files </span></a>
            <ul class="collapse list-unstyled" id="Predictionsubmenu">
               @if(checkPermission('add_prediction_file'))
               <li>
                  <a href="{{ route('branchadmin-predictionfiles.create') }}">Add Prediction file</a>
               </li>
               @endif
               <li>
                  <a href="{{ route('branchadmin-predictionfiles.index') }}">List Prediction files</a>
               </li>
            </ul>
         </li>
         @endif
         @if(checkPermission('manage_email_templates') || checkPermission('add_email_templates'))
         <li class="{{ $pageActive == 'email' ? 'active' : ''  }}">
            <a href="#Emailsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/email.svg') }}" class=""><span> Email Templates </span></a>
            <ul class="collapse list-unstyled" id="Emailsubmenu">
               @if(checkPermission('add_email_templates'))
               <li>
                  <a href="{{ route('branchadmin-email.create')}}">Add Email Template</a>
               </li>
               @endif
               <li>
                  <a href="{{ route('branchadmin-email.index')}}">List Email Templates</a>
               </li>
            </ul>
         </li>
         @endif
         @if(checkPermission('add_test_reports') || checkPermission('test_reports'))
         <li class="{{ $pageActive == 'certificates' ? 'active' : ''  }}">
            <a href="{{ route('branchadmin-certificates.index') }}"> <img src="{{ asset('assets/images/icons/certificates.svg') }}" class=""><span> Certificate </span></a>
         </li>  
         @endif    
         @if(checkPermission('device_log'))  
          <li class="{{ $pageActive == 'device' ? 'active' : ''  }}">
            <a href="{{ route('branchadmin-device.index') }}"> <img src="{{ asset('assets/images/icons/devices.svg') }}" class=""><span> Manage Devices Logs </span></a>
         </li> 
         @endif
         @if(checkPermission('activity_log'))  
         <li class="{{ $pageActive == 'activities' ? 'active' : ''  }}">
            <a href="{{ route('branchadmin-activities.index') }}"> <img src="{{ asset('assets/images/icons/subject.svg') }}" class=""><span> Activity Logs </span></a>
         </li>
         @endif
         <li class="{{ $pageActive == 'notifications' ? 'active' : ''  }}">
            <a href="{{ route('branchadmin-notifications') }}"> <img src="{{ asset('assets/images/icons/devices.svg') }}" class=""><span> Notifications </span></a>
         </li>
      </ul>
   </nav>
</div>