<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url().'dashboard' ?>">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-fw fa-wrench"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Maxtune</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url().'dashboard' ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url().'dashboard/profile' ?>">
        <i class="fas fa-solid fa-user"></i>
        <span>Admin</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Antarmuka
</div>

<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span></span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href=" <?php echo base_url().'dashboard/form' ?>">Booking</a>
            <a class="collapse-item" href="<?php echo base_url().'dashboard/contact' ?>">Kontak</a>
            <a class="collapse-item" href="<?php echo base_url().'dashboard/subscribe' ?>">Berlangganan</a>
        </div>
    </div>
</li> -->

<!-- Nav Item - Booking -->
<li class="nav-item mb-2">
    <a class="nav-link collapsed" href="<?php echo base_url().'dashboard/form' ?>">
        <i class="fas fa-calendar-check"></i>
        <span>Booking</span>
    </a>
</li>

<!-- Nav Item - Kontak -->
<li class="nav-item mb-2">
    <a class="nav-link collapsed" href="<?php echo base_url().'dashboard/contact' ?>">
        <i class="fas fa-envelope"></i>
        <span>Kontak</span>
    </a>
</li>

<!-- Nav Item - Berlangganan -->
<li class="nav-item mb-2">
    <a class="nav-link collapsed" href="<?php echo base_url().'dashboard/subscribe' ?>">
        <i class="fas fa-bell"></i>
        <span>Berlangganan</span>
    </a>
</li>

<!-- Nav Item - Pembayaran -->
<li class="nav-item mb-2">
    <a class="nav-link collapsed" href="<?php echo base_url().'dashboard/pembayaran' ?>">
        <i class="fas fa-money-check-alt"></i>
        <span>Pembayaran</span>
    </a>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="modal" data-target="#logoutModal"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-laugh-wink"></i>
        <span>Keluar</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->