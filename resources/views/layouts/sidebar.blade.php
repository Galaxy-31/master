<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">Master</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Home -->
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-home"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        COA
    </div>
    
    <!-- Nav Item - Chart of Account -->
    <li class="nav-item{{ request()->is('/charts') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('charts') }}">
            <i class="fas fa-user-cog"></i>
            <span>Chart of Account</span></a>
    </li>

    <!-- Nav Item - Category -->
    <li class="nav-item{{ request()->is('/categorys') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('categorys') }}">
            <i class="fas fa-user-cog"></i>
            <span>Category</span></a>
    </li>
    
    <!-- Nav Item - Transaction -->
    <li class="nav-item{{ request()->is('/transactions') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('transactions') }}">
            <i class="fas fa-user-cog"></i>
            <span>Transaction</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Reports
    </div>
    
    <!-- Nav Item - Chart of Account -->
    <li class="nav-item{{ request()->is('/reports') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('reports') }}">
            <i class="fas fa-user-cog"></i>
            <span>Profit/Loss</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
