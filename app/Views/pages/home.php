<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="hero">
    <div class="hero-copy">
        <p class="eyebrow">Daily workspace</p>
        <h1>Good morning.<br><span>Here’s what’s on today.</span></h1>
        <p class="intro">A focused view of the tasks scheduled for <?= date('F j, Y', strtotime($today)) ?>.</p>
    </div>
    <div class="today-card">
        <span class="today-count"><?= count($tasks) ?></span>
        <span>tasks today</span>
    </div>
</section>

<section class="section-heading">
    <div>
        <p class="eyebrow">Today’s list</p>
        <h2>Keep moving forward</h2>
    </div>
    <a class="text-link" href="/tasks">View all tasks &rarr;</a>
</section>

<section class="task-list" aria-label="Today's tasks">
    <?php if ($tasks === []): ?>
        <div class="empty-state">No tasks are scheduled for today.</div>
    <?php else: ?>
        <?php foreach ($tasks as $task): ?>
            <article class="task-item">
                <span class="task-check <?= strtolower(str_replace(' ', '-', $task['status'])) ?>"><?= $task['status'] === 'Completed' ? '✓' : '' ?></span>
                <div class="task-content">
                    <h3><?= esc($task['title']) ?></h3>
                    <p><?= esc($task['description']) ?></p>
                </div>
                <span class="status status-<?= strtolower(str_replace(' ', '-', $task['status'])) ?>"><?= esc($task['status']) ?></span>
            </article>
        <?php endforeach ?>
    <?php endif ?>
</section>

<div class="actions">
    <a class="button" href="/tasks">Open task list</a>
    <div class="actions">
        <a class="button button-secondary" href="/profile">View profile</a>
    </div>
</div>
<?= $this->endSection() ?>
