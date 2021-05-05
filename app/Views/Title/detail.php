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

<?= $this->endSection(); ?>