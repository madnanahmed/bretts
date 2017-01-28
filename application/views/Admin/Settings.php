
<div class="content-wrapper">
	<ol class="breadcrumb m-b-0">
		<li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
		<li class="active">Admin Profile</li>
	</ol>
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-block">
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
					<?php endif; ?>
					<?php
					if($this->session->flashdata('alert')):?>
						<div class="alert alert-warning">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Alert! </strong>
							<?= $this->session->flashdata('alert') ?>
						</div>
					<?php endif;?>
					<form method="post" action="<?= base_url('admin/top_phone_update') ?>">
						<div class="form-group">
							<label for=""> <i class="glyphicon glyphicon-phone"></i> Topbar Phone</label>
							<input type="text" class="form-control" name="phone" value="<?= $data->top_phone ?>">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-info">Update</button>
						</div>
					</form>
					<hr>
					<form method="post" action="<?= base_url('admin/top_email_update') ?>">
						<div class="form-group">
							<label for=""> <i class="glyphicon glyphicon-envelope"></i> Topbar Email</label>
							<input type="email" class="form-control" name="top_email" value="<?= $data->top_email ?>">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-info">Update</button>
						</div>
					</form>
					<hr>
					<form method="post" action="<?= base_url('admin/contact_email_update') ?>">
						<div class="form-group">
							<label for=""> <i class="glyphicon glyphicon-envelope"></i> Contact email</label>
							<input type="email" class="form-control" name="contact_email" value="<?= $data->contact_email ?>">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-info">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-block">
				<?php
					if($this->session->flashdata('success_')){ ?>
						<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Success! </strong><?= $this->session->flashdata('success_'); ?>
						</div>
					<?php
					}elseif($this->session->flashdata('error_')){ ?>
						<div class="alert alert-danger alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<?php foreach( $this->session->flashdata('error_') as $value ){
								echo '<strong>Error! </strong>'.$value;
							} ?>
						</div>
					<?php } ?>
					<form method="post" action="<?= base_url('admin/store_address') ?>">
					<div class="form-group">
						<label for="address"> Address </label>
						<textarea class="form-control" placeholder="Add contact address here" name="address" id="address"><?= ucfirst( settings('contact_address') ); ?> </textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-info">Update</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>




