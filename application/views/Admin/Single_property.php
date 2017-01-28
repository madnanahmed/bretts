<?php
extract($data);
?>
<!--  Content -->
<div class="content-wrapper">
	<ol class="breadcrumb m-b-0">
		<li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
		<li class="active">Single Property</li>
	</ol>
	<div class="card table-responsive">
		<div class="card-header">
			<h5 class="card-title">Single Property <a class="btn btn-info" href="<?= base_url('admin/deleted_properties'); ?>">Inactive Properties</a></h5>
		</div>
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
		<table class="table table-striped table-hover table-sm">
				<tr>
					<td><strong> # </strong></td>
					<td><?= $property->id ?></td>
				</tr>
				<tr>
					<td><strong>Title</strong></td>
					<td><a href="<?= base_url('admin/single_property/'.$property->id.'') ?>"><?= ucfirst($property->title) ?></a></td>
				</tr>
				<tr>
					<td><strong>Property Type</strong></td>
					<td><?= ucwords( $property_type->title ) ?></td>
				</tr>
				<tr>
					<td><strong> Images</strong></td>
					<td>
						<ul class="">
						<?php if( !empty($property->image_1) ){ ?>
							<li class="pull-left"><img class="img-responsive" width="60" src="<?= base_url('assets/images/uploads/thumbnail/'). $property->image_1 ?>" ></li>
						<?php }else{ echo '..'; } if( !empty($property->image_2) ){ ?>
							<li class="pull-left"><img class="img-responsive" width="60" src="<?= base_url('assets/images/uploads/thumbnail/'). $property->image_2 ?>" ></li>
						<?php }else{ echo '..'; } if( !empty($property->image_3) ){?>
							<li class="pull-left"><img class="img-responsive" width="60" src="<?= base_url('assets/images/uploads/thumbnail/'). $property->image_3 ?>" ></li>
						<?php }else{ echo '..'; } if( !empty($property->image_4) ){?>
							<li class="pull-left"><img class="img-responsive" width="60" src="<?= base_url('assets/images/uploads/thumbnail/'). $property->image_4 ?>" ></li>
						<?php }else{ echo '..'; } if( !empty($property->image_5) ){?>
							<li class="pull-left"><img class="img-responsive" width="60" src="<?= base_url('assets/images/uploads/thumbnail/'). $property->image_5 ?>" ></li>
						<?php }else{ echo '..'; } if( !empty($property->image_6) ){?>
							<li class="pull-left"><img class="img-responsive" width="60" src="<?= base_url('assets/images/uploads/thumbnail/'). $property->image_6 ?>" ></li>
						<?php }else{ echo '..'; } if( !empty($property->image_7) ){?>
							<li class="pull-left"><img class="img-responsive" width="60" src="<?= base_url('assets/images/uploads/thumbnail/'). $property->image_7 ?>" ></li>
						<?php }else{ echo '..'; } if( !empty($property->image_8) ){?>
							<li class="pull-left"><img class="img-responsive" height="60" src="<?= base_url('assets/images/uploads/thumbnail/'). $property->image_8 ?>" ></li>
						<?php } ?>
						</ul>
					</td>
				</tr>
				<tr>
					<td><strong>Description</strong></td>
					<td><?= ucfirst( $property->desc) ?></td>
				</tr>
				<tr>
					<td><strong> Price </strong></td>
					<td><?= $property->price ?></td>
				</tr>
				<tr>
					<td><strong>Address</strong></td>
					<td><?= ucfirst( $property->address) ?></td>
				</tr>
				<tr>
					<td><strong>Country</strong></td>
					<td><?= ucfirst( $country->title) ?></td>
				</tr>
				<tr>
					<td><strong>Province</strong></td>
					<td><?= ucfirst( $province->title) ?></td>
				</tr>
				<tr>
					<td><strong>City</strong></td>
					<td><?= ucfirst( $city->title) ?></td>
				</tr>
				<tr>
					<td bgcolor="#f0f8ff"><Strong>User name</Strong></td>
					<td bgcolor="#f0f8ff"><?= ucwords( $user->name )?></td>
				</tr>
				<tr>
					<td bgcolor="#f0f8ff"><Strong>User Email</Strong></td>
					<td bgcolor="#f0f8ff"><?= $user->email ?></td>
				</tr>
				<tr>
					<td bgcolor="#f0f8ff"><Strong>User Phone</Strong></td>
					<td bgcolor="#f0f8ff"><?= $user->phone ?></td>
				</tr>

				<tr>
					<td><strong> Post Date</strong></td>
					<td><?= date('l, jS M , Y', strtotime( $property->date )); ?></td>
				</tr>
				<tr>
					<td><strong>status</strong></td>
					<td>
						<?= ($property->status == 1)? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Deactive</span>' ?>
					</td>
				</tr>
				<tr>
					<td><strong>Action</strong></td>
					<td>
						<?= ($property->status != 1)? '<a href="'.base_url('admin/slider_action/'.$property->id.'/ac/property/property').'" class="btn btn-xs btn-success">Activate</a>' : '<a href="'.base_url('admin/slider_action/'.$property->id.'/de/property/property').'" class="btn btn-xs btn-danger">Deactive</a>' ?>
						<a class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete property permanently? ')" href="<?= base_url('admin/delete_property/'.$property->id.'') ?>"> Delete</a>
					</td>
				</tr>
				</tr>

			</tbody>
		</table>
		<div class="clearfix"></div>
	</div>
</div>



