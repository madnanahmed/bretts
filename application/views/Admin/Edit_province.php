<!--  Content -->


<div class="content-wrapper">
	<ol class="breadcrumb m-b-0">
		<li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
		<li class="active">Edit Province</li>
	</ol>
		<div class="card">
			<div class="card-block">
				<h2 class="page-heading"> <i class="glyphicon glyphicon-save"> </i> Edit Province </h2>
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
				<form method="post" action="<?= base_url()?>admin/save_edit_province">
					<div class="form-group col-md-6 ">
						<label>Title</label>
						<input class="form-control" value="<?= $data['province']->title ?>" type="text" name="title">
					</div>
					<div class="clearfix"></div>
					<div class="form-group col-md-6">
						<select name="country" class="form-control">
							<option value="">Select Country</option>
							<?php foreach( $data['country'] as $value ){?>
								<option <?php if($value->id == $data['province']->country_id){ echo 'selected';} ?> value="<?= $value->id ?>"><?= ucwords( $value->title) ?></option>
						<?php	} ?>
						</select>
					</div>

					<div class="clearfix"></div>
					<div class="btn-toolbar col-md-6">
						<button type="submit" class="btn pull-left btn-primary">Submit </button>
						<input type="hidden" name="id" value="<?= $data['province']->id?>">
						<button type="button" onclick="javascript:history.back(1) " class="btn pull-left btn-primary">Back</button>
					</div>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>




