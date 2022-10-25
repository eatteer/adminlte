<!-- Imports -->
<?php require_once "controllers/components/AsideController.php"; ?>

<!-- Controller -->
<?php
$asideController = new AsideController();
$asideController->handleOnRender();
$asideComponentData = $asideController->getViewData();
?>

<!-- View -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link">
    <img src="/adminlte/dist/img/logo.webp" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/adminlte/dist/img/giorno.jpg" class="img-circle elevation-2" alt="User Image"
             style="aspect-ratio: 1/1; width: 34px; height: 34px; object-fit: cover;">
      </div>
      <div class="info">
        <?php [$userFirstName] = explode(" ", $asideComponentData["user"]["name"]); ?>
        <?php [$userFirstLastName] = explode(" ", $asideComponentData["user"]["surname"]); ?>
        <a href="" class="d-block text-truncate"><?= "$userFirstName $userFirstLastName"; ?></a>
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
        <li class="nav-item">
          <a href="<?= DOMAIN . "/adminlte/home" ?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= DOMAIN . "/adminlte/account-settings" ?>" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>
              Account settings
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= DOMAIN . "/adminlte/contact" ?>" class="nav-link">
            <i class="nav-icon fas fa-phone"></i>
            <p>Contact</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>