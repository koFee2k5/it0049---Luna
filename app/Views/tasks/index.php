<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section><p class="eyebrow">Planning board</p><h1>All tasks</h1><p class="intro">Every task in the system, arranged by date.</p><div class="task-list"><?php foreach ($tasks as $task): ?><article class="task-item"><span class="task-date"><?= esc(date('M j', strtotime($task['task_date']))) ?></span><div class="task-content"><h3><?= esc($task['title']) ?></h3><p><?= esc($task['description']) ?></p></div><span class="status status-<?= strtolower(str_replace(' ', '-', $task['status'])) ?>"><?= esc($task['status']) ?></span></article><?php endforeach ?></div></section>
<?= $this->endSection() ?>
