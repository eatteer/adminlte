<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link">
    <img src="/adminlte/dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/adminlte/dist/img/dio.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="" class="d-block">Dio Brando</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= DOMAIN . "/adminlte/home" ?>" class="nav-link active">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-clipboard-check"></i>
            <p>
              Forms
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= DOMAIN . "/adminlte/forms/basic-form" ?>" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Basic Form</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= DOMAIN . "/adminlte/forms/advanced-form" ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Advance Form</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="<?= DOMAIN . "/adminlte/contact" ?>" class="nav-link">
            <i class="nav-icon fas fa-phone"></i>
            <p>
              Contact
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>