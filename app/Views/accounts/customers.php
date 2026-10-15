<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="section-heading account-heading"><div><p class="eyebrow">POS accounts</p><h1>Customer Accounts</h1><p class="intro">Customer records loaded from the MySQL database.</p></div><div><span class="today-card"><strong class="today-count"><?= count($customers) ?></strong>customers</span><a class="button" href="<?= esc(base_url('customers/new')) ?>">New customer</a></div></section>
<section class="account-list" aria-label="Customer accounts">
<?php if ($customers === []): ?><div class="empty-state">No customer accounts found.</div><?php else: ?>
<?php foreach ($customers as $customer): ?><article class="account-item"><div class="avatar"><?= esc(strtoupper(substr($customer['full_name'], 0, 1))) ?></div><div class="account-content"><h2><?= esc($customer['full_name']) ?></h2><p><?= esc($customer['email']) ?><?php if (! empty($customer['phone'])): ?> &middot; <?= esc($customer['phone']) ?><?php endif ?></p></div><a class="text-link" href="<?= esc(base_url('customers/' . $customer['id'] . '/edit')) ?>">Edit</a><time datetime="<?= esc($customer['created_at']) ?>"><?= esc(date('M j, Y', strtotime($customer['created_at']))) ?></time></article><?php endforeach ?>
<?php endif ?>
</section>
<?= $this->endSection() ?>
