<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="section-heading account-heading">
    <div>
        <p class="eyebrow">BPLS permit records</p>
        <h1>Business Permits</h1>
        <p class="intro">Manage registered businesses, permit details, and application status.</p>
    </div>
    <a class="button" href="<?= esc(base_url('businesses/new')) ?>">New permit</a>
</section>

<form class="search-bar" method="get" action="<?= esc(base_url('businesses')) ?>">
    <label for="business-search">Search businesses or permit numbers</label>
    <div>
        <input id="business-search" type="search" name="q" value="<?= esc($query) ?>" placeholder="Business name, owner, or permit number">
        <button class="button" type="submit">Search</button>
        <?php if ($query !== ''): ?><a class="button button-secondary" href="<?= esc(base_url('businesses')) ?>">Clear</a><?php endif ?>
    </div>
</form>

<section class="business-list" aria-label="Business permit records">
    <?php if ($businesses === []): ?>
        <div class="empty-state">No business permit records found.</div>
    <?php else: ?>
        <?php foreach ($businesses as $business): ?>
            <article class="business-card">
                <div class="business-card-content">
                    <p class="eyebrow">Permit <?= esc($business['permit_number']) ?></p>
                    <h2><?= esc($business['business_name']) ?></h2>
                    <p>Owner: <?= esc($business['owner_name']) ?></p>
                    <p><?= esc($business['address']) ?></p>
                    <p>Expires: <?= esc(date('M j, Y', strtotime($business['expiration_date']))) ?></p>
                </div>
                <span class="status status-<?= esc(strtolower($business['permit_status'])) ?>"><?= esc($business['permit_status']) ?></span>
                <div class="business-actions">
                    <a class="text-link" href="<?= esc(base_url('businesses/' . $business['id'] . '/edit')) ?>">Edit</a>
                    <form method="post" action="<?= esc(base_url('businesses/' . $business['id'] . '/delete')) ?>" onsubmit="return confirm('Delete this permit record?');">
                        <button class="delete-link" type="submit">Delete</button>
                    </form>
                </div>
            </article>
        <?php endforeach ?>
    <?php endif ?>
</section>

<?= $this->endSection() ?>
