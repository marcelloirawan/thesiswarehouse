
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard/dashboard'); ?>">
                <div class="sidebar-brand-icon">
					<i class="fas fa-warehouse"></i>
                </div>
                <div class="sidebar-brand-text mx-3">
					SAE DALLETA
				</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $sidebar_active == "Dashboard" ? "active" : ""; ?>">
                <a class="nav-link" href="<?= base_url('dashboard/dashboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

			<?php if( $user['id_roles'] == 1 ) : ?>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= $sidebar_active == "Admin" ? "active" : ""; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>Admin</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= $sub_sidebar_active == "Accounts" ? "active bg-primary text-white" : ""; ?>" href="<?= base_url('admin/accounts'); ?>">Accounts</a>
                    </div>
                </div>
            </li>

			<!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= $sidebar_active == "Master" ? "active" : ""; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= $sub_sidebar_active == "Supplier" ? "active bg-primary text-white" : ""; ?>" href="<?= base_url('master/supplier'); ?>">Supplier</a>
                        <a class="collapse-item <?= $sub_sidebar_active == "Customer" ? "active bg-primary text-white" : ""; ?>" href="<?= base_url('master/customer'); ?>">Customer</a>
                        <a class="collapse-item <?= $sub_sidebar_active == "Category" ? "active bg-primary text-white" : ""; ?>" href="<?= base_url('master/category'); ?>">Category</a>
                        <a class="collapse-item <?= $sub_sidebar_active == "Product" ? "active bg-primary text-white" : ""; ?>" href="<?= base_url('master/product'); ?>">Product</a>
                    </div>
                </div>
            </li>

			<?php endif; ?>

			<!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= $sidebar_active == "Inventory" ? "active" : ""; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>Inventory</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= $sub_sidebar_active == "Barang Masuk" ? "active bg-primary text-white" : ""; ?>" href="<?= base_url('inventory/barang_masuk'); ?>">Barang Masuk</a>
                        <a class="collapse-item <?= $sub_sidebar_active == "Barang Keluar" ? "active bg-primary text-white" : ""; ?>" href="<?= base_url('inventory/barang_keluar'); ?>">Barang Keluar</a>
                    </div>
                </div>
            </li>

			<!-- Divider -->
            <hr class="sidebar-divider my-0">

			<!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= $sidebar_active == "History" ? "active" : ""; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-fw fa-history"></i>
                    <span>History</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= $sub_sidebar_active == "History Masuk" ? "active bg-primary text-white" : ""; ?>" href="<?= base_url('history/history_masuk'); ?>">History Masuk</a>
                        <a class="collapse-item <?= $sub_sidebar_active == "History Keluar" ? "active bg-primary text-white" : ""; ?>" href="<?= base_url('history/history_keluar'); ?>">History Keluar</a>
                    </div>
                </div>
            </li>

			<?php if( $user['id_roles'] == 1 ) : ?>

			<!-- Divider -->
            <hr class="sidebar-divider my-0">

			<!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= $sidebar_active == "Request" ? "active" : ""; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                    aria-expanded="true" aria-controls="collapseFive">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Request</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= $sub_sidebar_active == "Request Material" ? "active bg-primary text-white" : ""; ?>" href="<?= base_url('request/request_material'); ?>">Request Material</a>
                    </div>
                </div>
            </li>

			<?php endif; ?>

			<!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
