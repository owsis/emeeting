<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="<?=base_url("assets/images/faces/face1.jpg")?>" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name"><?php // echo $this->session->userdata('nama') ?></p>
            <div>
              <small class="designation text-muted"><?php // echo $this->session->userdata('nama_role') ?></small>
              <span class="status-indicator online"></span>
            </div>
          </div>
        </div>
        <!-- <a href="<?php //site_url("usulan/individu") ?>" class="btn btn-success btn-block">
          <i class="menu-icon mdi mdi-paper"></i>
          Buat Jadwal
          <i class="mdi mdi-plus"></i>
        </a> -->
      </div>
    </li>
    <?php // make_menu_left()?>
    <li class="nav-item">
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
    </li>
  </ul>
</nav>