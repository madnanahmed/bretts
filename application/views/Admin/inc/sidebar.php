
  <!-- Sidebar -->

  <div class="sidebar sidebar-left sidebar-dark bg-primary" id="sidebarLeft">
    <a href="<?= base_url('admin/dashboard') ?>" class="sidebar-brand">
        <i class="glyphicon glyphicon-plus-sign"></i> <span class="icon-text">Admin Panel</span>
    </a>
    <a href="<?= base_url('admin/dashboard') ?>" class="sidebar-user">
        <img src="<?= base_url(). $admin_pic ?>" alt="Avatar" class="img-circle">
       <?= ucwords( $admin_name ) ?>

    </a>
    <ul class="nav" id="mainMenu">
      <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('admin/dashboard') ?>"><i class="glyphicon glyphicon-home"></i><span class="icon-text">Dashboard</span></a>
      </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('admin/profile') ?>"><i class="glyphicon glyphicon-user"></i><span class="icon-text">My Account</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('admin/settings') ?>"><i class="glyphicon glyphicon-cog"></i><span class="icon-text">Settings</span></a>
        </li>
    <div class="sidebar-header">Management Tool</div>
    <ul class="sidebar-activity">

      <li class="media <?php if($this->uri->segment(2) == 'slider'){ echo 'active'; } ?>">
        <div class="media-left">
          <div class="sidebar-activity-icon">
            <i class="glyphicon glyphicon-modal-window"></i>
          </div>
        </div>
        <div class="media-body">
          <a href="<?= base_url('admin/slider'); ?>">Home Slider</a>
        </div>
      </li>
      <li class="media <?php if($this->uri->segment(2) == 'property'){ echo 'active'; } ?>">
        <div class="media-left">
          <div class="sidebar-activity-icon">
            <i class="glyphicon glyphicon-home "></i>
          </div>
        </div>
        <div class="media-body">
          <a href="<?= base_url('admin/property') ?>">Property</a>
        </div>
      </li>
      <li class="media <?php if($this->uri->segment(2) == 'users'){ echo 'active'; } ?>">
        <div class="media-left">
          <div class="sidebar-activity-icon">
            <i class="glyphicon glyphicon-user"></i>
          </div>
        </div>
        <div class="media-body">
          <a href="<?= base_url('admin/users')?>">Users / Agents</a>
        </div>
      </li> 
    </ul>
        <div class="sidebar-header">Forms</div>
        <ul class="sidebar-activity">
            <li class="media <?php if($this->uri->segment(2) == 'add_slider'){ echo 'active'; } ?>">
                <div class="media-left">
                    <div class="sidebar-activity-icon">
                        <i class="glyphicon glyphicon-expand"></i>
                    </div>
                </div>
                <div class="media-body">
                    <a href="<?= base_url('admin/add_slider') ?>">Add Slider</a>
                </div>
            </li>
            <li class="media <?php if($this->uri->segment(2) == 'add_country'){ echo 'active'; } ?>">
                <div class="media-left">
                    <div class="sidebar-activity-icon">
                        <i class="glyphicon glyphicon-home"></i>
                    </div>
                </div>
                <div class="media-body">
                    <a href="<?= base_url('admin/add_country') ?>">Add Country</a>
                </div>
            </li>
            <li class="media <?php if($this->uri->segment(2) == 'add_province'){ echo 'active'; } ?>">
                <div class="media-left">
                    <div class="sidebar-activity-icon">
                        <i class="glyphicon glyphicon-home"></i>
                    </div>
                </div>
                <div class="media-body">
                    <a href="<?= base_url('admin/add_province') ?>">Add Province</a>
                </div>
            </li>
            <li class="media <?php if($this->uri->segment(2) == 'add_city'){ echo 'active'; } ?>">
                <div class="media-left">
                    <div class="sidebar-activity-icon">
                        <i class="glyphicon glyphicon-map-marker"></i>
                    </div>
                </div>
                <div class="media-body">
                    <a href="<?= base_url('admin/add_city') ?>">Add City</a>
                </div>
            </li>

        </ul>

  </div>
  
  <!--  end sidebar -->

  