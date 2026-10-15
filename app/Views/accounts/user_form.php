<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="modal-backdrop">
    <section class="panel form-panel">
        <p class="eyebrow">BPLS user accounts</p>
        <h1><?= esc($title) ?></h1>
        <p class="intro">Manage the account name, login username, and profile picture.</p>

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

        <form method="post" enctype="multipart/form-data" action="<?= esc(current_url()) ?>">
            <label>
                Username
                <input name="username" value="<?= esc(old('username', $user['username'] ?? '')) ?>" required maxlength="50">
            </label>
            <label>
                Full name
                <input name="full_name" value="<?= esc(old('full_name', $user['full_name'] ?? '')) ?>" required maxlength="100">
            </label>
            <label>
                Profile picture <strong class="upload-label">(User avatar)</strong>
                <input type="file" name="avatar" accept="image/jpeg,image/png">
                <small>JPG or PNG, maximum 2MB. Images are resized to a 400×400 display copy.</small>
            </label>

            <?php if (! empty($user['avatar'])): ?>
                <img class="form-avatar" src="<?= esc(base_url('uploads/' . $user['avatar'])) ?>" alt="Current profile picture">
            <?php endif ?>

            <div class="actions">
                <button class="button" type="submit"><?= $isEdit ? 'Save changes' : 'Create user' ?></button>
                <a class="button button-secondary" href="<?= esc(base_url('user-accounts')) ?>">Cancel</a>
            </div>
        </form>
    </section>
</div>
<?= $this->endSection() ?>
