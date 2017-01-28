<!--  Content -->
<div class="content-wrapper">
	<ol class="breadcrumb m-b-0">
		<li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
		<li class="active">Property</li>
	</ol>
	<div class="card table-responsive">
		<div class="card-header">
			<h5 class="card-title">Property <a class="btn btn-info" href="<?= base_url('admin/deleted_properties'); ?>">Inactive Properties</a></h5>
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
		<table id="property" class="table table-striped table-hover table-sm">
			<thead>
			<tr>
				<th>#</th>
				<th>title</th>
				<th>Image</th>
				<th>Date</th>
				<th>Description</th>
				<th width="100">Price <small>R.s</small></th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php

			foreach($data as $value){?>
				<tr>
					<td><?= $value->id ?></td>
					<td><a href="<?= base_url('admin/single_property/'.$value->id.'') ?>"><?= ucfirst($value->title) ?></a></td>
					<td>
						<ul>
						<?php if( !empty($value->image_1) ){ ?>
							<li class="pull-left"><img class="img-responsive" width="60" src="<?= base_url('assets/images/uploads/thumbnail/'). $value->image_1 ?>" ></li>
						<?php }else{ echo '..'; } if( !empty($value->image_2) ){ ?>
							<li class="pull-left"><img class="img-responsive" width="60" src="<?= base_url('assets/images/uploads/thumbnail/'). $value->image_2 ?>" ></li>
						<?php }else{ echo '..'; } if( !empty($value->image_3) ){?>
							<li class="pull-left"><img class="img-responsive" width="60" src="<?= base_url('assets/images/uploads/thumbnail/'). $value->image_3 ?>" ></li>
						<?php }else{ echo '..'; } if( !empty($value->image_4) ){?>
							<li class="pull-left"><img class="img-responsive" width="60" src="<?= base_url('assets/images/uploads/thumbnail/'). $value->image_4 ?>" ></li>
						<?php }else{ echo '..'; } if( !empty($value->image_5) ){?>
							<li class="pull-left"><img class="img-responsive" width="60" src="<?= base_url('assets/images/uploads/thumbnail/'). $value->image_5 ?>" ></li>
						<?php }else{ echo '..'; } if( !empty($value->image_6) ){?>
							<li class="pull-left"><img class="img-responsive" width="60" src="<?= base_url('assets/images/uploads/thumbnail/'). $value->image_6 ?>" ></li>
						<?php }else{ echo '..'; } if( !empty($value->image_7) ){?>
							<li class="pull-left"><img class="img-responsive" width="60" src="<?= base_url('assets/images/uploads/thumbnail/'). $value->image_7 ?>" ></li>
						<?php }else{ echo '..'; } if( !empty($value->image_8) ){?>
							<li class="pull-left"><img class="img-responsive" height="60" src="<?= base_url('assets/images/uploads/thumbnail/'). $value->image_8 ?>" ></li>
						<?php } ?>
						</ul>
					</td>
					<td><?= $value->date ?></td>
					<td><?= ucfirst( $value->desc) ?></td>
					<td class="text-center"><?= $value->price?></td>
					<td>
						<?= ($value->status == 1)? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Deactive</span>' ?>
					</td>
					<td>
						<?= ($value->status != 1)? '<a href="'.base_url('admin/slider_action/'.$value->id.'/ac/property/property').'" class="btn btn-xs btn-success">Activate</a>' : '<a href="'.base_url('admin/slider_action/'.$value->id.'/de/property/property').'" class="btn btn-xs btn-danger">Deactive</a>' ?>
						<a class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete property permanently? ')" href="<?= base_url('admin/delete_property/'.$value->id.'') ?>"> Delete</a>
					</td>

				</tr>
			<?php }  ?>
			</tbody>
		</table>
		<div class="clearfix"></div>
	</div>
</div>



