<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= site_url('/css/mystyles.css') ?>">
    <title><?= $this->renderSection('title'); ?></title>
</head>


<body>
    <!--  Display session messages -->
    <?php if (session()->has('warning')) : ?>
        <div class="warning">
            <?= session('warning'); ?>
        </div>
    <?php endif; ?>

    <?php if (session()->has('info')) : ?>
        <div class="info">
            <?= session('info'); ?>
        </div>
    <?php endif; ?>
    <!--  Display session messages end-->

    <!--  Navbar -->
    <nav class="navbar has-shadow is-white px-2">
        <!--  logo / brand -->
        <div class="navbar-brand">
            <a href="<?= site_url("/") ?>" class="navbar-item">
                <img src="<?= base_url("images/logo.png") ?>" alt="site logo" style="max-height: 70px" class="py-2 px-2">
            </a>
            <a class="navbar-burger" id="burger">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>

        <div class="navbar-menu" id="nav-links">
            <div class="navbar-end">

                <div class="navbar-item">Hello Ari</div>
                <a class="navbar-item" href="<?= site_url("/profile/show") ?>">Profile</a>
                <a class="navbar-item" href="<?= site_url("/movies") ?>">Movies</a>
                <a class="navbar-item" href="<?= site_url("/logout") ?>">Log out</a>

            </div>
        </div>
    </nav>
    <!--  Navbar ends -->

    <!--  Breadcrumbs -->
    <div class="section pt-4 pb-0">
        <nav class="breadcrumb" aria-label="breadcrumbs">
            <ul>
                <li><a href="<?= site_url("/") ?>">Home</a></li>
                <li><a href="<?= site_url("/movies") ?>" aria-current="page">Movies</a></li>
            </ul>
        </nav>
    </div>
    <!--  Breadcrumbs ends -->

    <?= $this->renderSection('content'); ?>

    <script src="<?= site_url('/js/display.js') ?>"></script>

</body>

</html>