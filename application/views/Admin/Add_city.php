<!--  Content -->
<div class="content-wrapper">
	<ol class="breadcrumb m-b-0">
		<li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
		<li class="active">Add City</li>
	</ol>
		<div class="card">
			<div class="card-block">
				<h2 class="page-heading"> <i class="glyphicon glyphicon-plus-sign"> </i> Add City </h2>
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
					<form method="post" action="<?= base_url()?>admin/store_city">

						<div class="form-group col-md-6">
							<label>Country</label>
							<select name="country" class="form-control" onchange="load_province(this.value)">
								<option value="0"> Select Country  </option>
								<?php foreach ($data['country'] as $value) {
									echo '<option value="'.$value->id.'"> '.ucwords($value->title).' </option>';
								} ?>
							</select>
						</div>
						<div class="clearfix"></div>

						<div id="province" class="form-group col-md-6 ">
							<label>Province</label> <span class="province_loader"></span>
							<select name="province" class="form-control">
								<option value="0"> Select Province  </option>

							</select>
						</div>
						<div class="clearfix"></div>
						<div class="form-group col-md-6 ">
							<label>City</label>
							<input class="form-control" placeholder="Add city title" type="text" name="city">
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
				<h2 class="page-heading"> <i class="glyphicon glyphicon-list-alt"> </i> City List </h2>
				<hr>
				<div class="table-responsive">
					<table class="table table-bordered">
						<th>#</th>
						<th>City</th>
						<th>Province</th>
						<th>Date</th>
						<th>Status</th>
						<th>Action</th>
						<?php foreach($data['city'] as $value){ ?>
						<tr>
							<td><?= $value->id ?></td>
							<td><?= ucwords($value->title) ?></td>
							<td><?= ucwords($value->p_title) ?></td>
							<td><?= $value->date ?></td>
							<td><?= ( $value->status == 1 )? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>'; ?></td>
							<td><a class="btn btn-info" href="<?= base_url('admin/edit_city/'.$value->id.'') ?>">Edit</a></td>
							<?php } ?>
					</table>
				</div>

			</div>
		</div>
		<div class="clearfix"></div>
	</div>




