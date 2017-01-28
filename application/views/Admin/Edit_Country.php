<!--  Content -->
<?php $data = $data[0]; ?>

<div class="content-wrapper">
	<ol class="breadcrumb m-b-0">
		<li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
		<li class="active">Edit Country</li>
	</ol>
		<div class="card">
			<div class="card-block">
				<h2 class="page-heading"> <i class="glyphicon glyphicon-save"> </i> Edit Country </h2>
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
				<form method="post" action="<?= base_url()?>admin/save_edit_country">
					<div class="form-group col-md-6 ">
						<label>Title</label>
						<input class="form-control" value="<?= $data->title ?>" type="text" name="title">
					</div>
					<div class="clearfix"></div>
					<div class="btn-toolbar col-md-6">
						<button type="submit" class="btn pull-left btn-primary">Submit </button>
						<input type="hidden" name="id" value="<?= $data->id?>">
						<button type="button" onclick="javascript:history.back(1) " class="btn pull-left btn-primary">Back</button>
					</div>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>




