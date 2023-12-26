	  <header class="main-header">
			<a href="<?= base_url('admin');?>">
      </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= base_url('assets/images/profile/'). $user['image'];?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?= $user['username'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown">
										<a href="#!" onclick="changePassword('<?= base_url('admin/changePassword/'. $user['user_id']);?>')" ><i class="fa fa-key"></i> Change Password</a>
										<a href="<?= base_url('auth/logout');?>" ><i class="fa fa-sign-out"></i> Sign out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <aside class="main-sidebar">
        <section class="sidebar">
          <ul class="sidebar-menu">
            <li class="header">MENU UTAMA</li>
            <li class="active treeview"><a href="<?= base_url('admin');?>"><i class="fa fa-home"></i> <span>Dashboard</span></i></a></li>
						<li class="treeview">
              <a href="#">
                <i class="fa fa-institution"></i> <span>Master Data</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= base_url('company');?>"><i class="fa fa-arrow-circle-right"></i> Perusahaan</a></li>
                <li><a href="<?= base_url('estate');?>"><i class="fa fa-arrow-circle-right"></i> Estate</a></li>
                <li><a href="<?= base_url('divisi');?>"><i class="fa fa-arrow-circle-right"></i> Divisi</a></li>
                <li><a href="<?= base_url('areal');?>"><i class="fa fa-arrow-circle-right"></i> Areal</a></li>
              </ul>
						</li>
						<li class="treeview">
              <a href="#">
                <i class="fa fa-database"></i> <span>Transaksi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= base_url('ch');?>"><i class="fa fa-arrow-circle-right"></i> Curah Hujan</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= base_url('ch/rptCh');?>"><i class="fa fa-arrow-circle-right"></i> Curah Hujan</a></li>
              </ul>
            </li>
						<li class="treeview">
              <a href="#">
                <i class="fa fa-gear"></i> <span>Konfigurasi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
            		<li><a href="<?= base_url('admin/user');?>"><i class="fa fa-user"></i> <span>Pengguna</span></a></li>
              </ul>
						</li>
            <li class="header">EXIT</li>
            <li><a href="<?= base_url('auth/logout');?>"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
          </ul>
        </section>
      </aside>
