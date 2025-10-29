 <!-- Header -->
 <header class="header">
     <div class="logo-container">
         <a href="{{ route('admin.dashboard') }}" class="logo">
             <img src="{{ asset('Frontend/images/logo.png') }}" width="75" height="35" alt="" />
         </a>

         <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
             data-fire-event="sidebar-left-opened">
             <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
         </div>

     </div>

     <!-- start: search & user box -->
     <div class="header-right">

         <span class="separator"></span>
         @php
             $id = Auth::user()->id;
             $adminData = App\Models\User::find($id);

         @endphp
         <div id="userbox" class="userbox">
             <a href="#" data-bs-toggle="dropdown">
                 <figure class="profile-picture">
                     <img src="{{ asset($adminData->photo) }}" alt="Joseph Doe" class="rounded-circle"
                         data-lock-picture="img/%21logged-user.jpg" />
                 </figure>
                 <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                     <span class="name">{{ Auth::user()->name }}</span>
                     <span class="role">{{ Auth::user()->role }}</span>
                 </div>

                 <i class="fa custom-caret"></i>
             </a>

             <div class="dropdown-menu">
                 <ul class="list-unstyled mb-2">
                     <li class="divider"></li>
                     <li>
                         <a role="menuitem" tabindex="-1" href="{{ route('profile') }}"><i
                                 class="bx bx-user-circle"></i> My Profile</a>
                     </li>
                     <li>
                         <a role="menuitem" tabindex="-1" href="{{ route('admin.logout') }}"><i
                                 class="bx bx-power-off"></i>
                             Logout</a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
     <!-- end: search & user box -->
 </header>
