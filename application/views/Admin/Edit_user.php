<!--  Content -->
<?php $user =  $data[0]; ?>
<div class="content-wrapper">
	<ol class="breadcrumb m-b-0">
		<li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
		<li class="active">User</li>
	</ol>

		<div class="card">
			<div class="card-block">

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
				<?php
				if($this->session->flashdata('alert')):?>
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<strong>Alert! </strong>
						<?= $this->session->flashdata('alert') ?>
					</div>
				<?php endif;?>


				<form method="post" action="<?= base_url()?>admin/store_user">
					<div class="form-group ">
						<label>Name</label>
						<input class="form-control" type="text" name="name" value="<?= $user->name ?>">
					</div>
					<div class="form-group ">
						<label>Email</label>
						<input class="form-control" type="email" name="email" value="<?= $user->email ?>">
					</div>
					<div class="form-group ">
						<label>Phone</label>
						<input class="form-control" type="text" name="phone" value="<?= $user->phone ?>">
					</div>
					<div class="input-group">
						<input id="password" type="password" name="password" class="form-control" value="<?= $user->password?>" >
					  <span class="input-group-btn">
						<button onclick="show_password()" class="btn" type="button"><i class="glyphicon glyphicon-lock"></i></button>
					  </span>
					</div>
					<input type="hidden" name="id" value="<?= $user->id ?>">
					<div class="btn-toolbar">
						<br>

						<button type="submit" class="btn pull-left btn-primary">Submit </button>
						<button type="button" onclick="javascript:history.back(1) " class="btn pull-left btn-primary">Back</button>
						<br>
					</div>
				</form>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>




