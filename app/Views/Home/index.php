<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Home<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!--  Movie titles display -->
<div class="columns is-centered mt-6">
    <?php foreach ($titles as $title) : ?>
        <div class="column has-text-centered is-3">
            <div style="height: 320px;">
                <img src="<?= base_url("images/" . $title->image) ?>" style="height: 300px; border-radius:5%">
            </div>
            <div style="padding-left: 40px; padding-right: 40px; height: 50px">
                <strong><?= $title->title ?></strong>
            </div>
            <div>
                <a href="<?= site_url("movies/detail/" . $title->id) ?>" class="button is-rounded is-danger mt-2 is-small"><strong>Beli Tiket</strong></a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!--  Movie titles display ends -->

<?= $this->endSection(); ?>