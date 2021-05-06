<?= $this->extend("layouts/default"); ?>

<?= $this->section("title"); ?>Detail<?= $this->endSection(); ?>

<?= $this->section("content"); ?>


<div class="container mt-6">
    <div class="columns">
        <div class="column is-3">
            <img src="<?= base_url("images/" . $titles->image) ?>">
        </div>
        <div class="column is-5">
            <h1>
                <strong class="is-size-2 mb-2"><?= $titles->title; ?></strong>
                <p class="mt-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Et laudantium corporis ipsam officiis tenetur laboriosam soluta. Itaque dicta adipisci nam facilis ex aspernatur cupiditate voluptate earum reprehenderit. Quod, ab quae!
                    Aut velit minus non consequatur voluptate facilis accusantium adipisci ut itaque? Voluptate numquam, tempore quia tenetur, nisi ea rerum perferendis, culpa eum aut earum. Excepturi earum ex doloribus non officiis.
                </p>
            </h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="columns">
        <div class="ml-2 mt-4 mb-0">
            <a href="https://www.youtube.com/watch?v=wGsOsciMoG0&ab_channel=DaikuMediaAnime" target="_blank" class="button is-danger mt-4 mb-6">Tonton trailer</a>
        </div>
    </div>
</div>

<!-- tabs -->
<div class="container">
    <div class="tabs is-boxed">
        <ul>
            <?php $counter = 0;
            $show  = array();  ?>
            <?php foreach ($schedules as $schedule) : ?>
                <?php if (!in_array($schedule->show_date, $show)) : ?>
                    <li class="<?= $counter > 0 ? "px-1" : "is-active px-1"; ?>" data-target="<?= $schedule->show_date; ?>">
                        <a><?= $schedule->show_date; ?></a>
                        <?php $counter++;
                        array_push($show, $schedule->show_date); ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="px-2" id="tab-content">
        <?php $counter2 = 0 ?>
        <?php foreach ($schedules as $schedule) : ?>
            <div id="<?= $schedule->show_date; ?>" class="<?= $counter2 > 0 ? "is-hidden px-0" : "px-0"; ?>">
                <h3 class="is-size-5 title mb-6"><?= $schedule->cinema_name; ?></h3>
            </div>
            <?php $counter2++; ?>
        <?php endforeach; ?>
    </div>

</div>
<!-- tabs ends-->

<?= $this->endSection(); ?>