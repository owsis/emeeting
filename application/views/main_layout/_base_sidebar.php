<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <?php if ($this->session->userdata('status') == 1) {?>
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="user-wrapper">
          <?php if ($this->session->userdata('name')) {?>
          <div class="profile-image">
            <img src="<?=base_url("assets/images/logo-kemendesa.png")?>" alt="profile image">
            <!-- <span class="mdi mdi-account-circle"></span> -->
          </div>
          <div class="text-wrapper">
            <p class="profile-name"><?php echo $this->session->userdata('name') ?></p>
            <div>
              <small class="designation text-muted">
                <?php echo $this->session->userdata('nip')?>
              </small>
              <span class="status-indicator online"></span>
            </div>
          </div>
        <?php } else { ?>
          <div class="profile-image">
            <img src="<?=base_url("assets/images/logo-kemendesa.png")?>" alt="profile image">
            <!-- <span class="mdi mdi-account-circle"></span> -->
          </div>
          <div class="text-wrapper">
            <p class="profile-name"><?php echo $this->session->userdata('user') ?></p>
            <div>
              <small class="designation text-muted">
                <?php echo $this->session->userdata('nip')?>
              </small>
              <span class="status-indicator online"></span>
            </div>
          </div>
        <?php } ?>
        </div>
        <!-- <a href="javascript::void" class="btn btn-success btn-block" data-target="#tambahModal">
          <i class="menu-icon mdi mdi-paper"></i>
          Buat Jadwal
          <i class="mdi mdi-plus"></i>
        </a> -->
      </div>
    </li>
    <?php // make_menu_left()?>
    <!-- <li class="nav-item">
      <a class="nav-link" href="<?php echo site_url('dashboard') ?>">
        <i class="menu-icon mdi mdi-monitor"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo site_url('calendar') ?>">
        <i class="menu-icon mdi mdi-calendar"></i>
        <span class="menu-title">Calendar</span>
      </a>
    </li> -->
    <?php if ($this->session->userdata('name')) {?>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo site_url('') ?>">
        <i class="menu-icon mdi mdi-home"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo site_url('ruangan') ?>">
        <i class="menu-icon mdi mdi-home-account"></i>
        <span class="menu-title">Ruangan</span>
      </a>
    </li>
  <?php } else { ?>

    <!-- Admin Menu -->
    <li class="nav-item">
      <a class="nav-link" href="<?php echo site_url('admin') ?>">
        <i class="menu-icon mdi mdi-home"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo site_url('admin/list_jadwal') ?>">
        <i class="menu-icon mdi mdi-table-of-contents"></i>
        <span class="menu-title">List Jadwal</span>
      </a>
    </li>
    <!-- End Admin Menu -->

  <?php }?>
    <!-- <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-content-copy"></i>
        <span class="menu-title">Basic UI Elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
          </li>
        </ul>
      </div>
    </li> -->
  </ul>
  <div class="nav-link" style="margin-top: 25px">
    <a href="<?=site_url('user/logout')?>" class="btn btn-success btn-block">
      <i class="menu-icon mdi mdi-paper"></i>
      Keluar
      <i class="mdi mdi-logout"></i>
    </a>
  </div>
<?php } else { 
  echo ''; 
}?>
</nav>