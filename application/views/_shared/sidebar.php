<div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel">
          <!-- <div class="image">
            <img src="<?=base_url()?>favicon.ico" class="img-circle elevation-2" alt="User Image">
          </div> -->
          <div class="info">
            <a href="#" class="d-block"><?= $this->session->userdata('nama');?></a>
          </div>
          <h5 style="color: #c2c7d0; font-size: 17px;"><marquee behavior="scroll" direction="left" scrollamount="5">Peride Aktif <strong>{{periode.periode}}</strong></marquee></h5>
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
              <a href="<?=base_url('kriteria')?>" ng-class="{'nav-link active': header=='Kriteria', 'nav-link': header!='Kriteria'}">
                <i class="nav-icon fas fa-check-square"></i>
                <p>
                  Kriteria
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('periode')?>" ng-class="{'nav-link active': header=='Periode', 'nav-link': header!='Periode'}">
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
              <a href="<?=base_url('Seleksi')?>" ng-class="{'nav-link active': header=='Seleksi', 'nav-link': header!='Seleksi'}">
                <i class="nav-icon fas fa-spinner"></i>
                <p>
                  Seleksi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('History')?>" ng-class="{'nav-link active': header=='History', 'nav-link': header!='History'}">
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