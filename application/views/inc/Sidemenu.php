

	<div class="list-group">
		<a class="list-group-item <?= ($this->uri->segment(2) == 'profile')? ' list-group-item-success': ''; ?>" href="<?= base_url('user_panel/profile'); ?>"> Edit Profile </a>
		<a class="list-group-item <?= ($this->uri->segment(2) == 'dashboard')? ' list-group-item-success': ''; ?>"  href="<?= base_url('user_panel/dashboard'); ?>"> Active Properties <span class="badge act_count"><?= $data['active_property'] ?></span></a>
		<a class="list-group-item <?= ($this->uri->segment(2) == 'inactive')? ' list-group-item-success': ''; ?>" href="<?= base_url('user_panel/inactive'); ?>"> Inactive Properties <span class="badge inact_count"><?= $data['inactive_property'] ?> </span></a>
		<a class="list-group-item <?= ($this->uri->segment(2) == 'pending')? ' list-group-item-success': ''; ?>" href="<?= base_url('user_panel/pending'); ?>"> Pending Approval<span class="badge del_count"><?= $data['pending_property'] ?> </span></a>
	</div>
