
<style>
    #sidenav-main {
    background-color: #2196F3 !important; /* Light blue */
    
}

#sidenav-scrollbar {
    overflow: hidden !important;
}


</style>
<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
                <img src="{{ asset('img/cao_logo.jpg') }}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-2 font-weight-bold text-white">Culture and Arts Office</span>
            </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
           
            
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <!-- Clubs Section Header -->
<li class="nav-item mt-3">
    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
        Clubs
    </h6>
</li>

<!-- Manage Clubs -->
<li class="nav-item">
    <a class="nav-link text-white {{ Route::currentRouteName() == 'clubs.index' ? ' active bg-gradient-primary' : '' }}"
       href="{{ route('clubs.index') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">groups</i>
        </div>
        <span class="nav-link-text ms-1">Club Directory</span>
    </a>
</li>

<!-- Club Directory
<li class="nav-item">
<a class="nav-link text-white {{ Route::currentRouteName() == 'Club-directory' ? ' active bg-gradient-primary' : '' }}"
   href="{{ route('Club-directory') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">groups</i>
        </div>
        <span class="nav-link-text ms-1">Club Directory</span>
    </a>
</li> -->

<!-- Documents -->
<li class="nav-item">
    <a class="nav-link text-white {{ Route::currentRouteName() == 'documents.index' ? ' active bg-gradient-primary' : '' }}"
       href="{{ route('documents.index') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">description</i>
        </div>
        <span class="nav-link-text ms-1">Documents</span>
    </a>
</li>

<!-- Announcements -->
<li class="nav-item">
    <a class="nav-link text-white {{ Route::currentRouteName() == 'announcements.index' ? ' active bg-gradient-primary' : '' }}"
       href="{{ route('announcements.index') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">campaign</i>
        </div>
        <span class="nav-link-text ms-1">Announcements</span>
    </a>
</li>

<!-- Membership Applications -->
<li class="nav-item">
    <a class="nav-link text-white {{ Route::currentRouteName() == 'member-applications.index' ? ' active bg-gradient-primary' : '' }}"
       href="{{ route('member-applications.index') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">person_add</i>
        </div>
        <span class="nav-link-text ms-1">Membership Applications</span>
    </a>
</li>


<!-- Club Reports -->
<li class="nav-item">
    <a class="nav-link text-white {{ Route::currentRouteName() == 'club-reports' ? ' active bg-gradient-primary' : '' }}"
        href="#">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">bar_chart</i>
        </div>
        <span class="nav-link-text ms-1">Reports & Analytics</span>
    </a>
</li>

<li class="nav-item mt-3">
    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
        Settings
    </h6>
</li>
<li class="nav-item">
    <a class="nav-link text-white bg-transparent w-100 text-start {{ Route::currentRouteName() == 'login' ? 'active bg-gradient-primary' : '' }}"
       href="{{ route('login') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">logout</i>
        </div>
        <span class="nav-link-text ms-1">Log out</span>
    </a>
</li>


        </ul>
    </div>
    
</aside>
