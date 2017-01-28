

<!--  Content -->

<div class="content-wrapper">
	<ol class="breadcrumb m-b-0">
		<li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
		<li class="active">Sign up & Login History</li>
	</ol>
	<div class="card table-responsive">
		<div class="card-header">
			<h5 class="card-title">Sign up & Login History</h5>
		</div>
		<table id="login_signup" class="table table-striped table-hover table-sm">
			<thead>
			<tr>

				<th>Name</th>
				<th>Type</th>
				<th>hidden time</th>
				<th>Time</th>
				<th width="120" class="center">Verified ?</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach($data['log_history'] as $value){?>
				<tr>
					<td><a href="#"><?= ucwords($value->name) ?></a></td>
					<td><?= ( $value->type == 2)? 'Register' : 'Sig In' ?></td>
					<td><?= strtotime( $value->login_date) ?></td>
					<td>
						<small class="text-muted">
							<i class="glyphicon glyphicon-time md-18"></i> <span class="icon-text"><?= timespan( strtotime( $value->login_date ), time()) . ' ago'; ?></span>
						</small>
					</td>
					<td class="text-xs-center">
						<p<?= ( $value->is_email_verify == '1' )? ' class="bg-success" > Yes' : ' class="bg-danger" >No' ?></p>
					</td>
				</tr>
			<?php }  ?>
			</tbody>
		</table>
		<div class="clearfix"></div>
	</div>
</div>



