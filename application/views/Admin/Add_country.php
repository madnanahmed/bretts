<!--  Content -->
<div class="content-wrapper">
	<ol class="breadcrumb m-b-0">
		<li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
		<li class="active">Add Country</li>
	</ol>
		<div class="card">
			<div class="card-block">
				<h2 class="page-heading"> <i class="glyphicon glyphicon-plus-sign"> </i> Add Country </h2>
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
					<form method="post" action="<?= base_url()?>admin/store_country">
						<div class="form-group col-md-6 ">
							<label>Title</label>
							<input class="form-control" placeholder="Add country title" type="text" name="title">
						</div>
						<div class="clearfix"></div>
						<div class="btn-toolbar col-md-6">
							<button type="submit" class="btn pull-left btn-primary">Submit </button>
							<button type="button" onclick="javascript:history.back(1) " class="btn pull-left btn-primary">Back</button>
						</div>
						<div class="clearfix"></div>
					</form>
				<br>
				<br>
				<h2 class="page-heading"> <i class="glyphicon glyphicon-list-alt"> </i> Country List </h2>
				<hr>
				<div class="table-responsive">
					<table class="table table-bordered">
						<th>#</th>
						<th>Title</th>
						<th>Date</th>
						<th>Status</th>
						<th>Action</th>
						<?php foreach($data as $value){ ?>
						<tr>
							<td><?= $value->id ?></td>
							<td><?= ucwords($value->title) ?></td>
							<td><?= $value->date ?></td>
							<td><?= ( $value->status == 1 )? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>'; ?></td>
							<td><a class="btn btn-info" href="<?= base_url('admin/edit_country/'.$value->id.'') ?>">Edit</a></td>
							<?php } ?>
					</table>
				</div>

			</div>
		</div>
		<div class="clearfix"></div>
	</div>




