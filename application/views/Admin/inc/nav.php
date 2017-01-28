  <!-- Navbar -->

  <nav class="navbar navbar-light bg-white navbar-full navbar-fixed-top left-md-sidebar">
    <button class="navbar-toggler pull-xs-left hidden-md-up" type="button" data-toggle="sidebar" data-target="#sidebarLeft" data-transition="false">
      <span class="glyphicon glyphicon-menu-hamburger"></span>
    </button>

    <a style="margin-top: 18px" class="navbar-brand hidden-sm hidden-md" href="<?= base_url('admin/dashboard') ?>">Dashboard</a>
          <?php  if($this->uri->segment(2) == 'dashboard'): ?>
            <select class="c-select" onchange="property_chart(this.value)">
              <?php
              $getYear = $this->session->userdata('propChartYear');
              if(isset($getYear)){
                $Y = $getYear;
              }else{
                  $Y = date('Y');
              }
              foreach($data['year'] as $value){?>
                <option value="<?= $value->year?>" <?= ( $Y == $value->year)? 'selected':'' ?>><?= $value->year ?></option>
             <?php } ?>
            </select>
            <span class="refresh"><a href="<?=base_url().'admin/refresh' ?>"><i class="glyphicon glyphicon-refresh"></i></span>
          <?php endif; ?>  
    <div class="pull-xs-right hidden-sm-down">
        <ul class="nav navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-caret="false" data-toggle="dropdown" role="button" aria-haspopup="false">
                    <i class=" text-success"><?= ucwords( $admin_name ) ?></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right dropdown-menu-list" aria-labelledby="Preview">
                    <a class="dropdown-item" href="#"><i class="glyphicon glyphicon-lock md-18"></i> <span class="icon-text">Edit Account</span></a>
                    <a class="dropdown-item" href="#"><i class="glyphicon glyphicon-lock md-18"></i> <span class="icon-text">Public Profile</span></a>
                    <a class="dropdown-item" href="<?=base_url("signout")?>">Logout</a>
                </div>


            </li>
            <li class="nav-item">
                    <img src="<?= base_url(). $admin_pic ?>" alt="Avatar" class="img-circle" width="40">
            </li>
        </ul>
    </div>
  </nav>

  