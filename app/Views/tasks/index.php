<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section>
    <div class="section-heading">
        <div>
            <p class="eyebrow">BPLS task management</p>
            <h1>All tasks</h1>
            <p class="intro">Assign work to customers and track their submitted files.</p>
        </div>
        <a class="button" href="<?= esc(base_url('tasks/new')) ?>">New task</a>
    </div>

    <div class="task-list">
        <?php if ($tasks === []): ?>
            <div class="empty-state">No tasks have been created yet.</div>
        <?php else: ?>
            <?php foreach ($tasks as $task): ?>
                <article class="task-item">
                    <span class="task-date">
                        <?= esc(date('M j', strtotime($task['task_date']))) ?>
                    </span>
                    <div class="task-content">
                        <h3><?= esc($task['title']) ?></h3>
                        <p>
                            <?= esc($task['customer_name'] ?? 'Unassigned') ?>
                            <?php if (! empty($task['attachment'])): ?>
                                &middot;
                                <a
                                    class="text-link"
                                    href="<?= esc(base_url('uploads/tasks/' . $task['attachment'])) ?>"
                                    target="_blank"
                                    rel="noopener"
                                >View file</a>
                            <?php endif ?>
                        </p>
                    </div>
                    <span class="status status-<?= esc(strtolower(str_replace(' ', '-', $task['status']))) ?>">
                        <?= esc(ucwords($task['status'])) ?>
                    </span>
                    <a class="text-link" href="<?= esc(base_url('tasks/' . $task['id'] . '/edit')) ?>">Edit</a>
                </article>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</section>
<?= $this->endSection() ?>
