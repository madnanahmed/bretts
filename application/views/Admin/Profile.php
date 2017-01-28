<!--  Content -->

<div class="content-wrapper">
	<ol class="breadcrumb m-b-0">
		<li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
		<li class="active">Admin Profile</li>
	</ol>
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-block">
					<p class="text-muted pull-xs-right"><img class="img-thumbnail" src="<?= base_url().$data->profile_pic; ?>" alt=""></p>
					<h5 class="m-b-1"> <span class="icon-text">Admin Profile</span></h5>
					<hr>
					<?php
					if($this->session->flashdata('error')):
						echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">x</button>';
						foreach($this->session->flashdata('error') as $value ):
							echo '<strong>Error! </strong>'.  $value.'<br>';
						endforeach;
						echo '</div>';
					endif;
					if($this->session->flashdata('success')):?>
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Success! </strong>
							<?= $this->session->flashdata('success') ?>
						</div>
					<?php endif;?>
					<form method="post" action="<?= base_url('admin/store_profile') ?>" enctype="multipart/form-data">
						<div class="form-group">
							<label for=""> Profile Image</label>
							<input type="file" name="photo" class="form-control" accept="image/*">
						</div>
						<div class="form-group">
							<label for="">Name</label>
							<input type="text" name="name" value="<?= ucwords( $data->name )?>" class="form-control">
						</div>
						<div class="form-group">
							<label for=""> Email </label>
							<input type="text" name="email" value="<?= $data->email?>" class="form-control">
						</div>
						<div class="form-group">
							<label for="">  </label>
							<button class="btn btn-info"> Submit </button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-block">
					<h5 class="m-b-0"> Change Password </h5>
					<hr>
					<br>
					<?php
					if($this->session->flashdata('success_alert')){ ?>
						<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Success! </strong><?= $this->session->flashdata('success_alert'); ?>
						</div>
						<?php
					}elseif($this->session->flashdata('pass_set_err')){?>
						<div class="alert alert-danger alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<?php foreach( $this->session->flashdata('pass_set_err') as $value ){
								echo '<strong>Error! </strong>'.$value;
							} ?>
						</div>
					<?php } ?>
					<form class="profile_form" id="reset_password" method="post" action="<?= base_url('admin/change_password') ?>" onsubmit="return reset_password()">
						<div class="form-group">
							<label>Old Password <small class="text-danger"> * </small></label>
							<input class="form-control" type="password" value="" name="old_pass" placeholder="Enter old password"> <small class="text-danger old_perr"></small>
						</div>
						<div class="form-group">
							<label>New Password <small class="text-danger"> * </small></label>
							<input class="form-control" type="password" value="" name="new_pass" placeholder="Enter old password"> <small class="text-danger new_perr"></small>
						</div>
						<div class="form-group">
							<label>Confirm Password <small class="text-danger"> * </small></label>
							<input class="form-control" type="password" value="" name="conf_pass" placeholder="confirm old password"> <small class="text-danger conf_perr"></small>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-info">Submit</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>




