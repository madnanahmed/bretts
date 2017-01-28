

<!--  Content -->

<div class="content-wrapper">
	<ol class="breadcrumb m-b-0">
		<li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
		<li class="active">User</li>
	</ol>
	<div class="card table-responsive">
		<div class="card-header">
			<h5 class="card-title">
				<a href="<?= base_url('admin/users')?>" class="btn <?= ($this->uri->segment(2) == 'users')? 'btn-primary': 'btn-default' ?> ">Active Users</a>
				<a href="<?= base_url('admin/inactive_users')?>" class="btn <?= ($this->uri->segment(2) == 'inactive_users')? 'btn-primary': 'btn-default' ?>">Inactive Users</a>
			</h5>
		</div>
		<table id="datatable" class="table table-striped table-hover table-sm">
			<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Email</th>
				<th>phone</th>
				<th>Password</th>
				<th>Time</th>
				<th width="40" class="center" title="is email verified by user">Verify?</th>
				<th width="40" class="center">Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$i = 0;
			foreach($data['user'] as $value){ $i++;
				$time = str_replace('Week','<span class="text-info">W</span>', timespan( strtotime( $value->reg_date ), time()));
				$time = str_replace('Days','<span class="text-success">D</span>', $time);
				$time = str_replace('Hour','<span class="text-danger">H</span>', $time);
				$time = str_replace('Minutes','M', $time);
				?>
				<tr id="row_<?= $i; ?>">
					<td>
						<p><?= $value->id ?></p>
					</td>
					<td>
						<a href="#"><img height="50" src="<?= base_url('assets/images/uploads/agents/').$value->profile_pic?>" alt=""> <?= ucwords($value->name); ?></a>
					</td>
					<td>
						<p><?= $value->email ?></p>
					</td>
					<td>
						<p><?= $value->phone ?></p>
					</td>
					<td id="pass_<?= $i?>">
						<span class="password_hidden"><?= $value->password ?></span><a href="javascript:void (0)" onclick="show_pass('<?= $i ?>')"><b>........</b><i class="glyphicon glyphicon-lock md-18"></i></a>
					</td>
					<td>
						<small class="text-muted">
							<i class="glyphicon glyphicon-time md-18"></i> <span class="icon-text"><?= $time . ' ago'; ?></span>
						</small>
					</td>
					<td class="text-xs-center">
						<p<?= ( $value->is_email_verify == '1' )? ' class="bg-success" > Yes' : ' class="bg-danger" >No' ?></p>
					</td>
					<td class="text-xs-center">
						<div class="dropdown">
							<a href="#" class="card-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-option-horizontal"></i></a>
							<div class="dropdown-menu dropdown-menu-right text-right">
								<a class="dropdown-item" href="<?= base_url('admin/edit_user/').$value->id; ?>" title="">Edit <i class="glyphicon glyphicon-pencil md-18 text-success"></i></a>
								<a class="dropdown-item" href="javascript:void (0)" onclick="active_user('<?= $value->id ?>', '<?= $i; ?>')" title="Delete user">Activate <i class="glyphicon glyphicon-check md-18 text-success"></i></a>

						</div>
					</td>
				</tr>
			<?php }  ?>
			</tbody>
		</table>
		<div class="clearfix"></div>
	</div>
</div>



