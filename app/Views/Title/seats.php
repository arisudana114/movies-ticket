<?= form_open(site_url("/title/insertSeats/" . $movies->id)) ?>

<?= $movies->id; ?>

<?php foreach ($seats as $seat) : ?>
    <?php $seats = $seat->seats_code; ?>
    <label for="<?= $seats; ?>" class="<?= $seats; ?>" style="display: block"><?= $seats; ?></label>
    <input type="checkbox" class="<?= $seats; ?>" id="<?= $seats; ?>" name="seats_code[]" value="<?= $seats; ?>">
    <input type="hidden" class="<?= $seats; ?>" id="<?= $seats; ?>" name="is_taken[]" value="<?= $seat->is_taken >= 0 ? 1 : 0; ?>">
<?php endforeach; ?>

<button>Submit</button>

</form>