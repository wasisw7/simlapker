<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-book"></i>
				</div>
				<div class="sidebar-brand-text mx-3">SIMPALKER <sup>V2</sup></div>
			</a>
			<hr class="sidebar-divider my-0">
			<li class="nav-item <?= $aktif == 'dashboard' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('dashboard') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>
			<?php if ($this->session->login['role'] == 'admin'): ?>
			<hr class="sidebar-divider">

			<div class="sidebar-heading">
				Master
			</div>

			<li class="nav-item <?= $aktif == 'barang' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('barang') ?>">
					<i class="fas fa-fw fa-box"></i>
					<span>Master Aplikasi</span></a>
			</li>

			<li class="nav-item <?= $aktif == 'customer' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('customer') ?>">
					<i class="fas fa-fw fa-user"></i>
					<span>Master Kalender</span></a>
			</li>

			<li class="nav-item <?= $aktif == 'petugas' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('petugas') ?>">
					<i class="fas fa-fw fa-users"></i>
					<span>Master Pegawai</span></a>
			</li>
			<?php endif; ?>
			<!-- Divider -->
			<hr class="sidebar-divider">
	
			<div class="sidebar-heading">
				Laporan
			</div>

			<li class="nav-item <?= $aktif == 'lapker' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('lapker') ?>">
					<i class="fas fa-fw fa-file-invoice"></i>
					<span>Lapker</span></a>
			</li>
			<li class="nav-item <?= $aktif == 'lembur' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('lembur') ?>">
					<i class="fas fa-fw fa-file-invoice"></i>
					<span>Lembur</span></a>
			</li>
		<?php if ($this->session->login['role'] == 'admin'): ?>
			<hr class="sidebar-divider">
			
				<!-- Heading -->
				<div class="sidebar-heading">
					Pengaturan
				</div>

				<li class="nav-item <?= $aktif == 'pengguna' ? 'active' : '' ?>">
					<a class="nav-link" href="<?= base_url('pengguna') ?>">
						<i class="fas fa-fw fa-users"></i>
						<span>Manajemen Admin</span></a>
				</li>

				<li class="nav-item <?= $aktif == 'profile' ? 'active' : '' ?>">
					<a class="nav-link" href="<?= base_url('profile') ?>">
						<i class="fas fa-fw fa-building"></i>
						<span>Profil</span></a>
				</li>
				<!-- Divider -->
			
			<hr class="sidebar-divider d-none d-md-block">
			<?php endif; ?>
			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>
		</ul>