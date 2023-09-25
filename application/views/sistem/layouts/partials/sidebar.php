<!-- Sidebar navigation-->
<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('sistem/dashboard') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Transaksi</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('sistem/order') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">List Order</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('sistem/rekening') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Rekening</span>
            </a>
        </li>

        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Setting</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('sistem/about') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">About Us</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('sistem/slider') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-picture-in-picture"></i>
                </span>
                <span class="hide-menu">Slider</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('sistem/setting') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-settings"></i>
                </span>
                <span class="hide-menu">Setting Website</span>
            </a>
        </li>

        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">User Management</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('sistem/admin') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Admin</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('sistem/mua') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Make Up Artist</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?= site_url('sistem/user') ?>" aria-expanded="false">
                <span>
                    <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">User</span>
            </a>
        </li>
        
    </ul>
    <a href="<?= site_url('sistem/authcontroller/logout') ?>" class="btn btn-danger fs-2 fw-semibold d-block"><i class="ti ti-logout"></i> Sign Out</a>
</nav>
<!-- End Sidebar navigation -->
