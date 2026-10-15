<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="modal-backdrop">
    <section class="panel form-panel">
        <p class="eyebrow">BPLS permit records</p>
        <h1><?= esc($title) ?></h1>
        <p class="intro">Enter the registered business and permit information.</p>

        <?php if ($errors !== []): ?>
            <div class="form-errors">
                <strong>Please correct the following:</strong>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <form method="post" action="<?= esc(current_url()) ?>">
            <label>
                Business name
                <input name="business_name" value="<?= esc(old('business_name', $business['business_name'] ?? '')) ?>" required maxlength="150">
            </label>
            <label>
                Owner name
                <input name="owner_name" value="<?= esc(old('owner_name', $business['owner_name'] ?? '')) ?>" required maxlength="150">
            </label>
            <label>
                Permit number
                <input name="permit_number" value="<?= esc(old('permit_number', $business['permit_number'] ?? '')) ?>" required maxlength="50">
            </label>
            <label>
                Business address
                <textarea name="address" rows="3" required maxlength="255"><?= esc(old('address', $business['address'] ?? '')) ?></textarea>
            </label>
            <label>
                Permit status
                <select name="permit_status" required>
                    <?php foreach ($statuses as $status): ?>
                        <option value="<?= esc($status) ?>" <?= old('permit_status', $business['permit_status'] ?? 'Pending') === $status ? 'selected' : '' ?>><?= esc($status) ?></option>
                    <?php endforeach ?>
                </select>
            </label>
            <label>
                Expiration date
                <input type="date" name="expiration_date" value="<?= esc(old('expiration_date', $business['expiration_date'] ?? '')) ?>" required>
            </label>
            <div class="actions">
                <button class="button" type="submit"><?= $isEdit ? 'Save changes' : 'Create permit' ?></button>
                <a class="button button-secondary" href="<?= esc(base_url('businesses')) ?>">Cancel</a>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>
