<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Tasks<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<?= form_open(site_url("/title/updateseats/" . $movies->id)) ?>
<?= $movies->id; ?>

<?php foreach ($seats as $seat) : ?>
    <?php $seats = $seat->seats_code; ?>
    <label for="<?= $seats; ?>" class="<?= $seats; ?>" style="display: block"><?= $seats; ?></label>
    <input type="checkbox" class="<?= $seats; ?>" id="<?= $seats; ?>" name="seats_code[]" value="<?= $seats; ?>">
<?php endforeach; ?>

<button>Submit</button>

</form>

<?= $this->endSection(); ?>