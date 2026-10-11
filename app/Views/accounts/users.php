<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="section-heading account-heading"><div><p class="eyebrow">POS accounts</p><h1>User Accounts</h1><p class="intro">System user records loaded from the MySQL database.</p></div><span class="today-card"><strong class="today-count"><?= count($users) ?></strong>users</span></section>
<section class="account-list" aria-label="User accounts">
<?php if ($users === []): ?><div class="empty-state">No user accounts found.</div><?php else: ?>
<?php foreach ($users as $user): ?><article class="account-item"><div class="avatar"><?= esc(strtoupper(substr($user['full_name'], 0, 1))) ?></div><div class="account-content"><h2><?= esc($user['full_name']) ?></h2><p>@<?= esc($user['username']) ?></p></div><time datetime="<?= esc($user['created_at']) ?>"><?= esc(date('M j, Y', strtotime($user['created_at']))) ?></time></article><?php endforeach ?>
<?php endif ?>
</section>
<?= $this->endSection() ?>
