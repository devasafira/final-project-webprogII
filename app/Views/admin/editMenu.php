<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>

    <link rel="stylesheet" href="/assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
</head>

<body style="background: #12171e; overflow:hidden;">

    <div class="box">
        <div class="center" style="background: #12171b;">
            <h1>Edit Menu</h1>

            <form action="/menuadmin/updatemenu/<?= $menu['id']; ?>" method="POST" enctype="multipart/form-data">
                <div class="text-field">
                    <input type="text" name="nama_produk" id="nama_produk" value="<?= $menu['nama_produk']; ?>"
                        required>
                    <span class="span1"></span>
                    <label for="nama_produk">Nama Produk</label>
                </div>
                <div class="text-field">
                    <input type="text" name="harga" id="harga" value="<?= $menu['harga']; ?>" required>
                    <span></span>
                    <label for="harga">Harga</label>
                </div>
                <div class="textfield">
                    <label for="kategori">Kategori :</label>
                    <select id="kategori" name="kategori">
                        <option value="Sushi" <?= $menu['kategori'] == 'Sushi' ? 'selected' : ''; ?>>Sushi</option>
                        <option value="Sashimi" <?= $menu['kategori'] == 'Sashimi' ? 'selected' : ''; ?>>Sashimi</option>
                        <option value="Chinmi" <?= $menu['kategori'] == 'Chinmi' ? 'selected' : ''; ?>>Chinmi</option>
                        <option value="Udon" <?= $menu['kategori'] == 'Udon' ? 'selected' : ''; ?>>Udon</option>
                        <option value="Drinks" <?= $menu['kategori'] == 'Drinks' ? 'selected' : ''; ?>>Drinks</option>
                    </select>
                </div>
                <br>
                <div class="textfield">
                    <label for="stok">Stok</label>
                    <div class="stok-input">
                        <button type="button" class="stok-btn" onclick="decrementStok()"><i
                                class="fas fa-minus"></i></button>
                        <input type="number" name="stok" id="stok" min="0" max="999" value="<?= $menu['stok']; ?>" required>
                        <button type="button" class="stok-btn" onclick="incrementStok()"><i
                                class="fas fa-plus"></i></button>
                    </div>
                </div>
                <br>
                <div class="textfield">
                    <label for="gambar">Gambar Menu :</label>
                    <input type="file" id="gambar" name="gambar" placeholder="Link Gambar">
                </div>
                <br>
                <input type="hidden" name="tambah_stok" id="tambah_stok" value="0">
                <input type="hidden" name="kurang_stok" id="kurang_stok" value="0">
                <input type="submit" value="Edit">
                <a class="addmenu-table" href="/menuadmin">Back</a>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        integrity="sha512-AshC6B+UKr89OK/2Mdbs70VhzKBfyDcQ8uKTm12O2+zTeKSt/0sy5P2T6P4m+AfJKaLojU9H4GkwOOukzZ55Ig=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function incrementStok() {
            const stokInput = document.getElementById('stok');
            const tambahStokInput = document.getElementById('tambah_stok');
            const stokValue = parseInt(stokInput.value);
            const tambahStokValue = parseInt(tambahStokInput.value);

            if (tambahStokValue >= 0) {
                const stokBaru = stokValue + 1;
                stokInput.value = stokBaru;
                tambahStokInput.value = tambahStokValue + 1;
            }
        }

        function decrementStok() {
            const stokInput = document.getElementById('stok');
            const kurangStokInput = document.getElementById('kurang_stok');
            const stokValue = parseInt(stokInput.value);
            const kurangStokValue = parseInt(kurangStokInput.value);

            if (kurangStokValue >= 0 && stokValue > 0) {
                const stokBaru = stokValue - 1;
                stokInput.value = stokBaru;
                kurangStokInput.value = kurangStokValue + 1;
            }
        }
    </script>
</body>

</html>
