<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="profile-card"><p class="eyebrow">Account</p><div class="profile-heading"><div class="avatar"><?= esc(strtoupper(substr($user['full_name'], 0, 1))) ?></div><div><h1><?= esc($user['full_name']) ?></h1><p>@<?= esc($user['username']) ?></p></div></div><dl class="profile-details"><div><dt>Created</dt><dd><?= esc(date('F j, Y', strtotime($user['created_at']))) ?></dd></div><div><dt>Role</dt><dd>System administrator</dd></div></dl></section>
<?= $this->endSection() ?>
