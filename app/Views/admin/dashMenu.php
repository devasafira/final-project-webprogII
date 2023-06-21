<?= $this->extend('public_layout'); ?>

<?= $this->section('content'); ?>

<body style="background: #1d232b;">

<section id="content">
        <div class="top-pesan">
            <p>Menu</p>
        </div>
        <div class="add-btn">
            <a href="/addMenu" class="btn-add">
                Add New Menu
            </a>
        </div>
        <div class="table-MenuTable">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Gambar</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Harga</th>  
                        <th scope="col">Stok</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Action</th>
  
                </thead>
                <tbody>
                    <?php foreach ($menus as $menu) : ?>
                        <tr>
                            <td>
                                <?php if (!empty($menu['gambar'])) : ?>
                                    <img src="/uploads/<?= $menu['gambar']; ?>" alt="<?= basename($menu['gambar']); ?>" width="100" height="100">
                                <?php endif; ?>
                            </td>
                            <td><?= $menu['nama_produk']; ?></td>
                            <td>Rp.<?= $menu['harga']; ?></td>
                            <td><?= $menu['stok']; ?></td>
                            <td><?= $menu['kategori']; ?></td>
                            <td>
                                <!-- Tambahkan aksi untuk setiap data menu -->

                                <a href="/editMenu<?= $menu['id']; ?>" class="btn-edit">Edit</a>
                                <a href="/deleteMenu/<?= $menu['id']; ?>" class="btn-delete">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>


</body>
<?= $this->endSection(); ?>