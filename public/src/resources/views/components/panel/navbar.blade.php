<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    {{-- Sidebar - Brand --}}
    <div class="d-sm-block d-none">
        <a class="sidebar-brand d-flex align-items-center justify-content-center my-5 py-5" href="{{ route('dashboard') }}">
            <div class="sidebar-brand-text mx-3">
                <img src="{{ asset('favicon/android-chrome-192x192.png') }}" alt="SRC Logo" class="my-5">
            </div>
        </a>
    </div>

    {{-- Divider --}}
    <hr class="sidebar-divider my-0">

    {{-- Nav Item - Dashboard --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    @role('admin')
    <div class="sidebar-heading">
        SETUP
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('contact-me.index') }}">
            <i class="fas fa-fw fa-phone"></i>
            <span>Contact Me</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('location-event.index') }}">
            <i class="fas fa-fw fa-map-marker"></i>
            <span>Location Event</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('organized.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Organized</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-users-cog"></i>
            <span>User</span>
        </a>
    </li>

    {{-- Divider --}}
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        CHAMPIONSHIP
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('category.index') }}">
            <i class="fas fa-fw fa-filter"></i>
            <span>Category</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('faq.index') }}">
            <i class="fas fa-fw fa-question"></i>
            <span>Faq</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('directive.index') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Directive</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('race.index') }}">
            <i class="fas fa-fw fa-cubes"></i>
            <span>Race</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('invoice.index') }}">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span>Invoice</span>
        </a>
    </li>
    @endrole

    @role('participant')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('participant.race.index') }}">
            <i class="fas fa-fw fa-cubes"></i>
            <span>Race</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('participant.invoice.index') }}">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span>Invoice</span>
        </a>
    </li>
    @endrole

    {{-- Sidebar Toggler (Sidebar) --}}
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
