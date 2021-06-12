  <!-- Sidebar  -->
<div>
  <nav id="sidebar">
      <ul class="list-unstyled components">
         <li class="active">
            <a href="{{ route('dashboard') }}" > <img src="{{ asset('assets/images/icons/dashboard.svg') }}" class=""> <span> Dashboard </span> </a>
         </li>

         <li>
            <a href="#Usersubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/user.svg') }}" class=""> <span> Manage User </span></a>
            <ul class="collapse list-unstyled" id="Usersubmenu">
               <li>
                  <a href="{{ route('users.index') }}">All Users</a>
               </li>
               <li>
                  <a href="{{ route('users.create') }}">Add New User</a>
               </li>
               <li>
                  <a href="{{ route('modules.index') }}">Manage Modules</a>
               </li>
               <li>
                  <a href="{{ route('roles.index') }}">Manage Roles</a>
               </li>
            </ul>
         </li>
         <li>
         <li>
            <a href="#Testsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/test.svg') }}" class=""> <span> Manage Test </span></a>
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
            <a href="#"> <img src="{{ asset('assets/images/icons/result.svg') }}" class=""><span> Manage Test Result </span></a>
         </li>
         <li>
            <a href="#Subjetsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/subject.svg') }}" class=""> <span> Manage Subject </span> </a>
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
            <a href="#Questionssubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/questions.svg') }}" class=""> <span> Practice Questions </span></a>
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
            <a href="#Videossubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/video.svg') }}" class=""> <span> Manage Videos </span></a>
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
            <a href="#Predictionsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/questions.svg') }}" class=""> <span> Manage Prediction Files </span></a>
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
            <a href="#Voucherssubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/vouchers.svg') }}" class=""><span> Vouchers </span></a>
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
            <a href="#Emailsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/email.svg') }}" class=""><span> Email Templates </span></a>
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
            <a href="#"> <img src="{{ asset('assets/images/icons/transaction.svg') }}" class=""> <span>Transactions</span></a>
         </li>
         <li>
            <a href="#"> <img src="{{ asset('assets/images/icons/certificates.svg') }}" class=""><span> Certificate </span></a>
         </li>
         <li>
            <a href="#Subscriptionsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <img src="{{ asset('assets/images/icons/subscription.svg') }}" class=""> <span> Manage Subscription </span> </a>
            <ul class="collapse list-unstyled" id="Subscriptionsubmenu">
               <li>
                  <a href="{{ route('subscription.create')}}">Subscription Create</a>
               </li>
               <li>
                  <a href="{{ route('subscription.index') }}">Subscription List</a>
               </li>
            </ul>
         </li>
         <li>
            <a href="#"> <img src="{{ asset('assets/images/icons/devices.svg') }}" class=""><span> Manage Devices Log </span></a>
         </li>
      </ul>
   </nav>
</div>