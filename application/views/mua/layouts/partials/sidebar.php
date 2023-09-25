<!-- Sidebar navigation-->
<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('mua/dashboard') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>

        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Order</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('mua/order') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Daftar Order</span>
            </a>
        </li>

        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Main</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('mua/paket') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Paket</span>
            </a>
        </li>

        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Setting</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('mua/toko') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-settings"></i>
                </span>
                <span class="hide-menu">Toko</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('mua/profile') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Profile</span>
            </a>
        </li>
        
    </ul>
    <a href="<?= site_url('mua/logout') ?>" class="btn btn-danger fs-2 fw-semibold d-block"><i class="ti ti-logout"></i> Sign Out</a>
</nav>
<!-- End Sidebar navigation -->
