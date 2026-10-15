<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="panel">
    <p class="eyebrow">About BPLS</p>
    <h1>Business Permit and Licensing System</h1>

    <p>
        The <strong>Business Permit and Licensing System (BPLS)</strong> is a web-based
        system designed to manage and organize business permit applications and records.
    </p>

    <p>
        It allows authorized users to add, view, update, and delete business information
        and permit details. The system helps make the business permit process faster, more
        organized, and convenient by reducing manual paperwork and improving record tracking.
    </p>

    <h2>Main CRUD Features</h2>

    <ul class="feature-list">
        <li>Add new business permit records</li>
        <li>View registered businesses</li>
        <li>Update business and permit information</li>
        <li>Delete outdated records</li>
        <li>Search for businesses or permit numbers</li>
        <li>Track permit status: Pending, Approved, Expired, or Rejected</li>
    </ul>
</section>
<?= $this->endSection() ?>
