<?= $this->extend("layouts/default"); ?>

<?= $this->section("title"); ?>Detail<?= $this->endSection(); ?>

<?= $this->section("content"); ?>

<div class="container ml-2 mt-6">
    <div class="columns">
        <div class="column is-3">
            <img src="<?= base_url("images/" . $titles->image) ?>">
        </div>
        <div class="column is-5">
            <h1>
                <strong class="is-size-3 mb-2"><?= $titles->title; ?></strong>
                <p class="mt-4 is-size-6">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Et laudantium corporis ipsam officiis tenetur laboriosam soluta. Itaque dicta adipisci nam facilis ex aspernatur cupiditate voluptate earum reprehenderit. Quod, ab quae!
                    Aut velit minus non consequatur voluptate facilis accusantium adipisci ut itaque? Voluptate numquam, tempore quia tenetur, nisi ea rerum perferendis, culpa eum aut earum. Excepturi earum ex doloribus non officiis.
                </p>
            </h1>
        </div>
    </div>
</div>

<div class="container ml-2">
    <div class="columns">
        <div class="ml-2 mt-4 mb-0">
            <a href="https://www.youtube.com/watch?v=wGsOsciMoG0&ab_channel=DaikuMediaAnime" target="_blank" class="button is-link mt-4 mb-6">Tonton trailer</a>
        </div>
    </div>
</div>

<!-- tabs -->
<?= form_open(site_url("/title/seats/" . $titles->id)); ?>
<div class="container ml-2 mb-6">
    <div class="tabs is-boxed mb-4">
        <ul>
            <?php
            $counter = 0;
            $show  = array();  ?>
            <?php foreach ($schedules as $schedule) : ?>
                <?php if (!in_array($schedule->show_date, $show)) : ?>
                    <li class="<?= $counter >= 0 ? "px-1" : "is-active px-1"; ?>" data-target="<?= $schedule->show_date; ?>">
                        <a><?= $schedule->show_date; ?></a>
                        <?php $counter++;
                        array_push($show, $schedule->show_date); ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="px-2" id="tab-content">
        <?php $counter2 = 0;
        $show2  = array();
        ?>
        <?php foreach ($schedules as $schedule) : ?>
            <?php $babi = $schedule->show_date; ?>
            <?php $cinema = str_replace(' ', '', $schedule->cinema_name) ?>

            <div id="<?= $babi; ?>" class="<?= $counter2 >= 0 ? "is-hidden px-0" : "px-0"; ?>">

                <?php if (!in_array($schedule->cinema_name . $schedule->show_date, $show2)) : ?>

                    <div class="accordion accordion-flush w-25" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading<?= $cinema; ?>">
                                <button class="accordion-button collapsed" type="button" data-cinema="<?= $schedule->cinema_name; ?>" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?= $cinema; ?>" aria-expanded="false" aria-controls="flush-collapse<?= $cinema; ?>">
                                    <?= $schedule->cinema_name; ?>
                                </button>
                            </h2>
                            <div id="flush-collapse<?= $cinema; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?= $cinema; ?>" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <button class="button is-link" data-time="<?= $schedule->show_time; ?>"><?= $schedule->show_time; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php elseif (in_array($schedule->cinema_name . $schedule->show_date, $show2)) : ?>

                    <div class="accordion accordion-flush w-25" id="accordionFlushExample">
                        <div class="accordion-item">
                            <div id="flush-collapse<?= $cinema; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?= $cinema; ?>" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <button class="button is-link" data-time="<?= $schedule->show_time; ?>"><?= $schedule->show_time; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

            </div>
            <?php $counter2++;
            $ngehe = $schedule->cinema_name . $schedule->show_date;
            if (!in_array($ngehe, $show2)) {
                array_push($show2, $ngehe);
            }
            ?>
        <?php endforeach; ?>
    </div>
</div>
<div class="container ml-2 mb-6">
    <input type="hidden" id="date" name="show_date" value="date">
    <input type="hidden" id="time" name="show_time" value="time">
    <input type="hidden" id="cinema" name="cinema_name" value="cinema">
    <input type="hidden" id="movie" name="movie_id" value="<?= $titles->id; ?>">
</div>
</form>
<!-- tabs ends-->


<?= $this->endSection(); ?>