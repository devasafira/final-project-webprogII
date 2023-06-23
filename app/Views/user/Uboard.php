<?= $this->extend('user_layout'); ?>

<?= $this->section('user-content'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uboard - User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Tambahkan gaya khusus sesuai kebutuhan Anda */
        body {
            background: #1d232b;
        }

        .menu-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
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

        .quantity {
            display: flex;
            align-items: si;
        }

        .btn-quantity {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            font-size: 18px;
            border-radius: 50%;
            border: none;
            color: #fff;
            background-color: #6c757d;
            cursor: pointer;
        }

        .btn-quantity:hover {
            background-color: #5a6268;
        }

        .quantity-input {
            width: 40px;
            height: 30px;
            padding: 0;
            text-align: center;
            border: none;
            border-radius: 0;
            background-color: transparent;
            color: #000;
        }

        .btn-success {
            margin-top: 10px;
        }

        .badge {
            margin-top: 10px;
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

        <?php if (empty($sushiMenus) && empty($sashimiMenus) && empty($chinmiMenus) && empty($udonMenus) && empty($drinkMenus)) : ?>
            <div class="text-center">
                <h2>Tidak ada menu yang tersedia</h2>
            </div>
        <?php endif; ?>

        <?php if (!empty($sushiMenus)) : ?>
            <section id="sushi" class="menu-section">
                <div class="container">
                    <div class="title-box">
                        <h2>Sushi</h2>
                    </div>
                    <div class="row">
                        <?php foreach ($sushiMenus as $menu) : ?>
                            <div class="col">
                                <div class="card" style="width: 18rem;">
                                    <img src="<?= base_url('uploads/' . $menu['gambar']); ?>" class="card-img-top" alt="Menu Image">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $menu['nama_produk']; ?></h5>
                                        <p class="card-text"><?= $menu['keterangan']; ?></p>
                                        <form action="/uboard" method="post">
                                            <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                                            <div class="input-group mb-3">
                                                <button class="btn btn-success" type="submit" name="submit">Pesan</button>
                                                <input type="number" class="form-control" name="quantity" min="0" max="<?= $menu['stok']; ?>">
                                            </div>
                                        </form>
                                        <span class="badge bg-info text-dark"><?= $menu['stok']; ?> tersisa</span>
                                        <span class="badge bg-info text-dark"><?= $menu['harga']; ?> harga</span>
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
                                    <img src="uploads/<?= $menu['gambar']; ?>" class="card-img-top" alt="Menu Image">
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
                                    <img src="uploads/<?= $menu['gambar']; ?>" class="card-img-top" alt="Menu Image">
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
                                    <img src="uploads/<?= $menu['gambar']; ?>" class="card-img-top" alt="Menu Image">
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
                                    <img src="uploads/<?= $menu['gambar']; ?>" class="card-img-top" alt="Menu Image">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <script>
        function incrementQuantity(btn) {
            var input = btn.parentNode.querySelector('.quantity-input');
            var currentValue = parseInt(input.value);
            var maxValue = parseInt(input.max);

            if (currentValue < maxValue) {
                input.value = currentValue + 1;
            }
        }

        function decrementQuantity(btn) {
            var input = btn.parentNode.querySelector('.quantity-input');
            var currentValue = parseInt(input.value);

            if (currentValue > 0) {
                input.value = currentValue - 1;
            }
        }
    </script>
</body>

<?= $this->endSection('user-content'); ?>






// Mendapatkan data pesanan dari database berdasarkan nama_pembeli dan table_number
    $nama_pembeli = session()->get('nama_pembeli');
    $table_number = session()->get('selectedTable');
    $orderItems = $modelPesanan->where('nama_pembeli', $nama_pembeli)->where('table_number', $table_number)->findAll();
    $totalHarga = array_sum(array_column($orderItems, 'total'));

    return view('user/Ubayar', [
        'nama_pembeli' => $nama_pembeli,
        'table_number' => $table_number,
        'orderItems' => $orderItems,
        'totalHarga' => $totalHarga,
    ]);