<div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <!-- <div class="image">
            <img src="<?=base_url()?>favicon.ico" class="img-circle elevation-2" alt="User Image">
          </div> -->
          <div class="info">
            <a href="#" class="d-block"><?= $this->session->userdata('nama');?></a>
            <h5 style="color: white"><?= $this->session->userdata('role');?></h5>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?=base_url('home')?>" ng-class="{'nav-link active': header=='Home', 'nav-link': header!='Home'}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Home
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('periode')?>" ng-class="{'nav-link active': header=='Petugas', 'nav-link': header!='Petugas'}">
                <i class="nav-icon fas fa-calendar"></i>
                <p>
                  Periode
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('pelanggan')?>" ng-class="{'nav-link active': header=='Pelanggan', 'nav-link': header!='Pelanggan'}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Pelanggan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('pelanggan')?>" ng-class="{'nav-link active': header=='Pelanggan', 'nav-link': header!='Pelanggan'}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Motode WP
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('laporan')?>" ng-class="{'nav-link active': header=='Laporan', 'nav-link': header!='Laporan'}">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  History
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>