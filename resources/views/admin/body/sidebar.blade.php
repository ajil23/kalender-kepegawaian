<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img src="{{asset('backend/img/poliwangi.png')}}" alt="" style="height: 45px; width: 45px;">
        </div>
        <div class="sidebar-brand-text mx-3">Poliwangi</div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="{{'dashboard' == request()->path() ? 'nav-item active' : 'nav-item'}}">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Cuti
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-cog"></i>
            <span>Cuti</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">Pengajuan Cuti</a>
                <a class="collapse-item" href="cards.html">Rekapitulasi Cuti</a>
            </div>
        </div>
    </li>

     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Kalender
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
             aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-fw fa-folder"></i>
             <span>Kalender</span>
         </a>
         <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Login Screens:</h6>
                 <a class="collapse-item" href="login.html">Login</a>
                 <a class="collapse-item" href="register.html">Register</a>
                 <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                 <div class="collapse-divider"></div>
                 <h6 class="collapse-header">Other Pages:</h6>
                 <a class="collapse-item" href="404.html">404 Page</a>
                 <a class="collapse-item" href="blank.html">Blank Page</a>
             </div>
         </div>
     </li>
     
     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Pengaturan
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
             aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Pengaturan</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="buttons.html">Pengaturan Cuti</a>
                 <a class="collapse-item" href="cards.html">Pengaturan Kalender</a>
             </div>
         </div>
     </li>
    <li class="{{'report/view' == request()->path() ? 'nav-item active' : 'nav-item'}}">
        <a class="nav-link" href="#">
            <i class="fas fa-solid fa-file"></i>
            <span>Report</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    
    </ul>
    <!-- End of Sidebar -->
