
<div class="content-wrapper">
	<ol class="breadcrumb m-b-0">
		<li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
		<li class="active">Slider</li>
	</ol>

		<div class="card">
			<div class="card-block">
				<div class="page-heading"> Home Slider </div>
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

					<div class="table-responsive">
						<table class="table-bordered table table-hover">
							<thead>
								<th> # </th>
								<th> Title </th>
								<th> Description </th>
								<th> Image </th>
								<th> Date </th>
								<th> Status </th>
								<th> Action </th>
							</thead>
						<tbody>
						<?php foreach( $data as $value): ?>
							<tr>
								<td><?= $value->id ?></td>
								<td><?= $value->title ?></td>
								<td><?= $value->desc ?></td>
								<td><img class="img-responsive" width="100%" src="<?= base_url('assets/images/uploads/slider/'). $value->image ?>" ></td>
								<td><?= $value->date ?></td>
								<td>
									<?= ($value->status == 1)? '<span title="Now slider is active" class="label label-success">Active</span>' : '<span title="Now slider is inactive" class="label label-danger">Inactive</span>' ?>
								</td>
								<td>
									<?= ($value->status != 1)? '<a href="'.base_url('admin/slider_action/'.$value->id.'/ac/home_slider/slider').'" class="btn btn-xs btn-success" title="Active slider">Activate</a>' : '<a href="'.base_url('admin/slider_action/'.$value->id.'/de/home_slider/slider').'" class="btn btn-xs btn-danger" title="Inactive slider">Inactive</a>' ?>
									<a title="Delete slider permanently " class="btn btn-danger btn-xs" href="<?= base_url('delete_slider/'.$value->id.'') ?>">Delete</a>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
					</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>




