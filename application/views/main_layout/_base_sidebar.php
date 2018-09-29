<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <!-- <div class="user-wrapper">
          <div class="profile-image">
            <img src="<?=base_url("assets/images/faces/face1.jpg")?>" alt="profile image">
            <span class="mdi mdi-account-circle"></span>
          </div>
          <div class="text-wrapper">
            <p class="profile-name"><?php echo $this->session->userdata('namapeg') ?></p>
            <div>
              <small class="designation text-muted">
                <?php 
                $str = (strlen($this->session->userdata('njab')) > 15) ? substr($this->session->userdata('njab'), 0, 18).' ...' : $str;
                echo $str;
                ?>
              </small>
              <span class="status-indicator online"></span>
            </div>
          </div>
        </div> -->
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
</nav>