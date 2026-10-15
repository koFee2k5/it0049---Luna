<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="section-heading account-heading"><div><p class="eyebrow">POS accounts</p><h1>User Accounts</h1><p class="intro">System user records loaded from the MySQL database.</p></div><div><span class="today-card"><strong class="today-count"><?= count($users) ?></strong>users</span><a class="button" href="<?= esc(base_url('users/new')) ?>">New user</a></div></section>
<section class="account-list" aria-label="User accounts">
<?php if ($users === []): ?><div class="empty-state">No user accounts found.</div><?php else: ?>
<?php foreach ($users as $user): ?><article class="account-item"><img class="avatar avatar-image" src="<?= esc(! empty($user['avatar']) ? base_url('uploads/' . $user['avatar']) : base_url('images/avatar-placeholder.svg')) ?>" alt="<?= esc($user['full_name']) ?> profile picture"><div class="account-content"><h2><?= esc($user['full_name']) ?></h2><p>@<?= esc($user['username']) ?></p></div><a class="text-link" href="<?= esc(base_url('users/' . $user['id'] . '/edit')) ?>">Edit</a><time datetime="<?= esc($user['created_at']) ?>"><?= esc(date('M j, Y', strtotime($user['created_at']))) ?></time></article><?php endforeach ?>
<?php endif ?>
</section>
<?= $this->endSection() ?>
