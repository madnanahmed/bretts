<br><br>
<br><br>

<!-- start my properties list -->
<section class="genericSection">
	<div class="container-fluid">
		<div class="col-md-2">
			<h3>Menu</h3>
			<div class="divider"></div>
			<?php
			$user =	$data['user_info'][0];
			if( $user->profile_pic ){
//				print_r($user);
				?>
				<img class="agentImgPro" src="<?= base_url('assets/images/uploads/agents/').$user->profile_pic ?>" alt="" />
			<?php } else{ ?>
				<img class="agentImgPro" src="<?= base_url('assets/images/uploads/agents/agent.png') ?>" alt="" />
			<?php }	?>
			<?php include_once 'inc/Sidemenu.php';?>
		</div>
		<div class="col-md-5">
			<h3>MY Profile</h3>
			<div class="divider"></div>
			<?php if($this->session->flashdata('success_msg')){ ?>
				<div class="alert alert-success alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Success! </strong>Profile updated successfully
				</div>
			<?php }elseif($this->session->flashdata('error')){?>
					<div class="alert alert-danger alert-dismissable">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<?php foreach($this->session->flashdata('error') as $value){
							echo '<strong>Error! </strong>'.$value;
						} ?>
					</div>
			<?php } ?>
			<form method="post" enctype="multipart/form-data" action="<?= base_url('user_panel/edit_profile') ?>" class="form-group profile_form">
				<table class="myProperties table-bordered">
					<tr class="myPropertiesHeader">
						<td class="myPropertyImg">Image <small class="text-danger"> * </small> </td>
						<td><input type="file" name="photo" class="form-control" <?php if(!$user->profile_pic){echo ' required'; } ?>></td>
					</tr>
					<tr class="myPropertiesHeader">
						<td class="myPropertyImg">Name <small class="text-danger"> * </small> </td>
						<td><input value="<?= $user->name ?>" type="text" name="name"  class="form-control" required ></td>
					</tr>
					<tr class="myPropertiesHeader">
						<td class="myPropertyImg">Email <small class="text-danger"> * </small> </td>
						<td><input value="<?= $user->email ?>" type="text" readonly disabled value="asdf" class="form-control" required></td>
					</tr>
					<tr class="myPropertiesHeader">
						<td class="myPropertyImg">Phone <small class="text-danger"> * </small> </td>
						<td><input value="<?= $user->phone ?>" type="text" name="phone" class="form-control" required></td>
					</tr>
					<tr class="myPropertiesHeader">
						<td class="myPropertyImg">About</td>
						<td><textarea class="form-control" name="about"> <?= $user->about ?></textarea></td>
					</tr>
					<tr class="myPropertiesHeader">
						<td></td>
						<td><button type="submit" class="btn btn-default">Submit</button></td>
					</tr>
				</table>
			</form>
		</div>
	<div class="col-md-5">
		<h3> Change Password </h3>
		<div class="divider"></div>
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
		<form class="profile_form" id="reset_password" method="post" action="<?= base_url('user_panel/reset_password')?>" onsubmit="return reset_password()">
			<table class="myProperties table-bordered">
				<tr class="myPropertiesHeader">
					<td class="myPropertyImg">Old Password <small class="text-danger"> * </small></td>
					<td> <input type="password" value="<?php if($this->session->flashdata('old_pass')) echo $this->session->flashdata('old_pass');  ;?>" name="old_pass" placeholder="Enter old password"  > <small class="text-danger old_perr"></small> </td>
				</tr>
				<tr class="myPropertiesHeader">
					<td class="myPropertyImg">New Password <small class="text-danger"> * </small></td>
					<td> <input type="password" value="<?php if($this->session->flashdata('new_pass')) echo $this->session->flashdata('new_pass'); ?>" name="new_pass" placeholder="Enter old password"  > <small class="text-danger new_perr"></small> </td>
				</tr>
				<tr class="myPropertiesHeader">
					<td class="myPropertyImg">Confirm Password <small class="text-danger"> * </small></td>
					<td> <input type="password" value="<?php if($this->session->flashdata('new_pass')) echo $this->session->flashdata('new_pass'); ?>" name="conf_pass" placeholder="confirm old password"  > <small class="text-danger conf_perr"></small> </td>
				</tr>
				<tr class="myPropertiesHeader">
					<td class="myPropertyImg"></td>
					<td><button type="submit" class="btn btn-default">Submit</button></td>
				</tr>
			</table>
		</form>
	</div>
	</div>
	</div>
	<!-- end container -->
</section>
