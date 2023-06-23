<?= $this->extend('user_layout'); ?>

<?= $this->section('user-content'); ?>

<body style="background: #1d232b;">
    <section id="userHome">
        <div class="row noTable">
            <div class="col textTable">
                <h5>No. Meja</h5>
            </div>
            <div class="col textTable">
                <p><?= session('table_number') ?></p>
            </div>
        </div>
        <div class="row payTable">
            <table class="table table-striped table-hover table-bayar">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderItems as $item) : ?>
                        <tr>
                            <td><?= $item['gambar'] ?></td>
                            <td><?= $item['nama_produk'] ?></td>
                            <td><?= $item['harga'] ?></td>
                            <td><?= $item['jumlah'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="row user-row totalTable">
            <div class="col">
                <ul>
                    <li>Total harga</li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <li><?= $totalHarga ?></li>
                </ul>
            </div>
        </div>
        <form action="/ubayar" method="post">

            <input type="hidden" name="nama_pembeli" value="<?= session('nama_pembeli') ?>">
            <input type="hidden" name="table_number" value="<?= session('table_number') ?>">
            <button type="submit" class="btn btn-success">Pesan</button>
            <!-- Tombol Cancel -->
        </form>
        <a href="/cancelOrder" class="btn btn-danger">Cancel</a>
        </div>
    </section>
</body>

<?= $this->endSection('user-content'); ?>php s