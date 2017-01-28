<!--  Content -->
<?php $city = $data['city'][0]; ?>
<div class="content-wrapper">
	<ol class="breadcrumb m-b-0">
		<li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
		<li class="active">Edit City</li>
	</ol>
		<div class="card">
			<div class="card-block">
				<h2 class="page-heading"> <i class="glyphicon glyphicon-pencil"> </i> Edit City </h2>
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
					<form method="post" action="<?= base_url()?>admin/save_edit_city">
						<div class="form-group col-md-6 ">
							<label>Country</label>
							<select name="country" class="form-control" onchange="load_province(this.value)">
								<option value="0"> Select country  </option>
								<?php foreach ($data['country'] as $value) {?>
									<option <?= ($city->province_id == $value->id)? 'selected': ''; ?> value="<?= $value->id ?>"> <?= ucwords($value->title) ?> </option>';
								<?php } ?>
							</select>
							<input type="hidden" name="id" value="<?= $city->id?>">
						</div>
						<div class="clearfix"></div>
						<div id="province" class="form-group col-md-6">
							<label>Province</label> <span class="province_loader"></span>
							<select name="province" class="form-control">
								<option value="0"> Select Province  </option>
								<?php foreach ($data['province'] as $value) {?>
									<option <?= ($city->province_id == $value->id)? 'selected': ''; ?> value="<?= $value->id ?>"> <?= ucwords($value->title) ?> </option>';
							<?php } ?>
							</select>
							<input type="hidden" name="id" value="<?= $city->id?>">
						</div>
						<div class="clearfix"></div>
						<div class="form-group col-md-6 ">
							<label>City</label>
							<input class="form-control" value="<?= $city->title ?>" placeholder="Add city title" type="text" name="city">
						</div>

						<div class="clearfix"></div>
						<div class="btn-toolbar col-md-6">
							<button type="submit" class="btn pull-left btn-primary">Submit </button>
							<button type="button" onclick="javascript:history.back(1) " class="btn pull-left btn-primary">Back</button>
						</div>
						<div class="clearfix"></div>
					</form>

		</div>
		<div class="clearfix"></div>
	</div>




