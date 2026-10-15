<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="modal-backdrop">
    <section class="panel form-panel">
        <p class="eyebrow">BPLS task management</p>
        <h1><?= esc($title) ?></h1>
        <p class="intro">Assign a task to a customer and attach their supporting file.</p>
        <?php if ($errors !== []): ?><div class="form-errors"><strong>Please correct the following:</strong><ul><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach ?></ul></div><?php endif ?>
        <form method="post" enctype="multipart/form-data" action="<?= esc(current_url()) ?>">
            <label>Task title <input name="title" value="<?= esc(old('title', $task['title'] ?? '')) ?>" required maxlength="150"></label>
            <label>Customer
                <select name="customer_id">
                    <?php foreach ($customers as $customer): ?><option value="<?= esc($customer['id']) ?>" <?= (string) old('customer_id', $task['customer_id'] ?? '') === (string) $customer['id'] ? 'selected' : '' ?>><?= esc($customer['full_name']) ?></option><?php endforeach ?>
                </select>
            </label>
            <label>Status
                <select name="status" required>
                    <?php foreach (['pending', 'in progress', 'completed', 'approved', 'expired', 'rejected'] as $status): ?><option value="<?= esc($status) ?>" <?= old('status', $task['status'] ?? 'pending') === $status ? 'selected' : '' ?>><?= esc(ucwords($status)) ?></option><?php endforeach ?>
                </select>
            </label>
            <label>Task date <input type="date" name="task_date" value="<?= esc(old('task_date', $task['task_date'] ?? date('Y-m-d'))) ?>" required></label>
            <label>Customer file <input type="file" name="attachment" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx"><small>PDF, JPG, PNG, DOC, or DOCX up to 5MB.</small></label>
            <?php if (! empty($task['attachment'])): ?><small>Current file: <?= esc($task['attachment']) ?></small><?php endif ?>
            <div class="actions"><button class="button" type="submit"><?= $isEdit ? 'Save changes' : 'Create task' ?></button><a class="button button-secondary" href="<?= esc(base_url('tasks')) ?>">Cancel</a></div>
        </form>
    </section>
</div>
<?= $this->endSection() ?>
