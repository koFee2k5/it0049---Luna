<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="panel form-panel"><p class="eyebrow">POS accounts</p><h1><?= esc($title) ?></h1><p class="intro">Keep customer contact details up to date.</p>
<?php if ($errors !== []): ?><div class="form-errors"><strong>Please correct the following:</strong><ul><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach ?></ul></div><?php endif ?>
<form method="post" action="<?= esc(current_url()) ?>">
<label>Full name <input name="full_name" value="<?= esc(old('full_name', $customer['full_name'] ?? '')) ?>" required maxlength="100"></label>
<label>Email <input type="email" name="email" value="<?= esc(old('email', $customer['email'] ?? '')) ?>" required maxlength="100"></label>
<label>Phone <input name="phone" value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>" maxlength="20"></label>
<div class="actions"><button class="button" type="submit"><?= $isEdit ? 'Save changes' : 'Create customer' ?></button><a class="button button-secondary" href="<?= esc(base_url('customer-accounts')) ?>">Cancel</a></div>
</form></section>
<?= $this->endSection() ?>
