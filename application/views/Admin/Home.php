<?php
$admin_info =  $data['admin_info'][0];
$login_his = $data['admin_info'];
?>

<div class="content-wrapper">

    <ol class="breadcrumb m-b-0">
      <li><a href="<?= base_url() ?>">Home</a></li>
      <li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
      <li class="active">Data</li>
    </ol>
    <div class="row">
      <div class="col-md-8">
        <div class="card">

          <div class="card-block center">
            <h5 class="card-title">Annually Registration Graph</h5>
            <p class="card-subtitle">Total Users in system <span id="total_users" class="text-info"></span></p>
            <div id="bar2" style="height: 130px; margin:0 -10px;"></div>

          </div>
        </div>    
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header bg-white center">
            <h5 class="card-title">Top Member</h5>
            <p class="card-subtitle m-b-0"><?= ucwords( $data['top_users'][0]->name ); ?></p> 
          </div>
          <table class="table table-sm m-b-0">
          <?php foreach ($data['top_users'] as $value) { ?>
           
            <tr>
              <td><i class="glyphicon glyphicon-user text-primary"></i> <span class="icon-text"><a href="#"><?= ucwords($value->name) ?></a></span></td>
              <td class="right"><div class="label label-success"><?= number_format($value->user_total_P) ?></div></td>
              <td class="right" width="1"><a href="#" class="btn btn-xs btn-white"><i class="glyphicon glyphicon-arrow-right  md-18"></i></a></td>
            </tr>
            <?php } ?>
          </table>
      </div>
      </div>
    </div>
    <div class="row">
<!--      <hr>-->
      <div class="divider"></div>
<!--      <div class="col-md-6">-->
<!--        <div class="card">-->
<!--          <div class="card-block">-->
<!--            <p class="text-muted pull-xs-right">5 of 10</p>-->
<!--            <h5 class="m-b-1"><i class="glyphicon glyphicon-list">list</i> <span class="icon-text">Tasks</span></h5>-->
<!--            <progress class="progress progress-animated progress-primary m-a-0" value="50" max="100">50%-->
<!--            </progress>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="col-md-6">-->
<!--        <div class="card-primary">-->
<!--          <div class="card-block">-->
<!--            <i class="glyphicon glyphicon-usd pull-xs-right md-48"></i>-->
<!--            <h5 class="m-b-0">$12,129</h5>-->
<!--            <p class="m-a-0">Sales by Reps</p>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-button-wrapper" id="property_chart">
           <!-- property graph here -->

          </div>
          <div class="card-block">
            <h5 class="card-title"><i class="glyphicon glyphicon-calendar"></i> Property history</h5>
            <p class="card-subtitle">Total properties in system <span id="total_property" class="text-info"></span></p>

            <div class="card card-block">
              <div id="bar" style="height: 300px;"></div>
            </div>
          </div>
        </div>
        <div class="card">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" id="history-tab" data-toggle="tab" href="#history">
                <i class="glyphicon glyphicon-bell"> </i><span class="icon-text ajx_alert label label-danger"></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="customers-tab" data-toggle="tab" href="#customers">
                <i class="glyphicon glyphicon-user"></i> <span class="icon-text">Sign Ups</span>
              </a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade in active" id="history">
              <ul class="list-group ajx_result">
                <li class="list-group-item">
                  <div class="media">

                    <div class="media-body">
                      <p class="m-a-0"> Loading.... </p>
                    </div>
                  </div>
                </li>

              </ul>
            </div>
            <div class="tab-pane" id="customers">
              <table class="table  m-b-0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Time</th>
                    <th width="120" class="center">Verified ?</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                    foreach($data['log_history'] as $value){?>
                      <tr>
                        <td><a href="#"><?= ucwords($value->name) ?></a></td>
                        <td><?= ( $value->type == 2)? 'Register' : 'Sig In' ?></td>
                        <td>
                          <small class="text-muted">
                            <i class="glyphicon glyphicon-time md-18"></i> <span class="icon-text"><?= timespan( strtotime( $value->login_date ), time()) . ' ago'; ?></span>
                          </small>
                        </td>
                        <td class="text-xs-center">
                          <p<?= ( $value->is_email_verify == '1' )? ' class="bg-success" > Yes' : ' class="bg-danger" >No' ?></p>
                        </td>
                      </tr>
                 <?php }  ?>
                <tr>
                  <td colspan="4" width="120" class="center"><a href="<?= base_url('admin/login_signup_history') ?>">See all</a></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>