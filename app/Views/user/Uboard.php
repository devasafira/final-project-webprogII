<?= $this->extend('user_layout'); ?>

<?= $this->section('user-content'); ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uboard - User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tambahkan gaya khusus sesuai kebutuhan Anda */
        body {
            background: #1d232b;
        }

        #userHomeDashboard {
            margin-left: 100px;
            color: white;
        }

        .top-userhome {
            margin: 2rem;
        }

        .top-userhome a {
            font-size: 1.2rem;
            font-weight: 600;
            color: white;
        }

        .top-userhome a:hover {
            color: #23832f;
        }

        .title-box {
            background: #12171e;
            padding: 5px;
            border-radius: 5px;
            text-align: center;
        }

        .menu-section .row {
            margin: 1rem 0 1rem 1.5rem;
        }

        .menu-section .card {
            margin: 1.5rem 0 1.5rem 0;
        }
    </style>
</head>

<body>
    <div id="userHomeDashboard">
        <div class="top-userhome">
            <nav>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#sushi">Sushi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sashimi">Sashimi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#chinmi">Chinmi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#udon">Udon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#drinks">Drinks</a>
                    </li>
                </ul>
            </nav>
        </div>

        <?php if (empty($sushiMenus) && empty($sashimiMenus) && empty($chinmiMenus) && empty($udonMenus) && empty($drinksMenus)) : ?>
            <p>Tidak ada menu yang tersedia.</p>
        <?php else : ?>
            <?php if (!empty($sushiMenus)) : ?>
                <section id="sushi" class="menu-section">
                    <div class="container">
                        <div class="title-box">
                            <h4>Sushi</h4>
                        </div>
                        <div class="row">
                            <?php foreach ($sushiMenus as $menu) : ?>
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= $menu['gambar']; ?>" class="card-img-top" alt="Menu Image">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $menu['nama_produk']; ?></h5>
                                            <p class="card-text"><?= $menu['keterangan']; ?></p>
                                            <a href="#" class="btn btn-success">Pesan</a>
                                            <span class="badge bg-info text-dark"><?= $menu['stok']; ?> tersisa</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (!empty($sashimiMenus)) : ?>
                <section id="sashimi" class="menu-section">
                    <div class="container">
                        <div class="title-box">
                            <h4>Sashimi</h4>
                        </div>
                        <div class="row">
                            <?php foreach ($sashimiMenus as $menu) : ?>
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= $menu['gambar']; ?>" class="card-img-top" alt="Menu Image">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $menu['nama_produk']; ?></h5>
                                            <p class="card-text"><?= $menu['keterangan']; ?></p>
                                            <a href="#" class="btn btn-success">Pesan</a>
                                            <span class="badge bg-info text-dark"><?= $menu['stok']; ?> tersisa</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (!empty($chinmiMenus)) : ?>
                <section id="chinmi" class="menu-section">
                    <div class="container">
                        <div class="title-box">
                            <h4>Chinmi</h4>
                        </div>
                        <div class="row">
                            <?php foreach ($chinmiMenus as $menu) : ?>
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= $menu['gambar']; ?>" class="card-img-top" alt="Menu Image">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $menu['nama_produk']; ?></h5>
                                            <p class="card-text"><?= $menu['keterangan']; ?></p>
                                            <a href="#" class="btn btn-success">Pesan</a>
                                            <span class="badge bg-info text-dark"><?= $menu['stok']; ?> tersisa</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (!empty($udonMenus)) : ?>
                <section id="udon" class="menu-section">
                    <div class="container">
                        <div class="title-box">
                            <h4>Udon</h4>
                        </div>
                        <div class="row">
                            <?php foreach ($udonMenus as $menu) : ?>
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= $menu['gambar']; ?>" class="card-img-top" alt="Menu Image">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $menu['nama_produk']; ?></h5>
                                            <p class="card-text"><?= $menu['keterangan']; ?></p>
                                            <a href="#" class="btn btn-success">Pesan</a>
                                            <span class="badge bg-info text-dark"><?= $menu['stok']; ?> tersisa</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (!empty($drinksMenus)) : ?>
                <section id="drinks" class="menu-section">
                    <div class="container">
                        <div class="title-box">
                            <h4>Drinks</h4>
                        </div>
                        <div class="row">
                            <?php foreach ($drinksMenus as $menu) : ?>
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= $menu['gambar']; ?>" class="card-img-top" alt="Menu Image">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $menu['nama_produk']; ?></h5>
                                            <p class="card-text"><?= $menu['keterangan']; ?></p>
                                            <a href="#" class="btn btn-success">Pesan</a>
                                            <span class="badge bg-info text-dark"><?= $menu['stok']; ?> tersisa</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?= $this->endSection('user-content'); ?>