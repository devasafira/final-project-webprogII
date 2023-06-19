<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>

    <link rel="stylesheet" href="/assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body style="background: #12171e; overflow:hidden;">

    <div class="box">
        <div class="center" style="background: #12171b;">
            <h1>Edit Menu</h1>

            <form action="/editmenu/updateMenu/{id}" method="POST" enctype="multipart/form-data">
                <!-- Ganti {id} dengan id menu yang akan diedit -->

                <div class="text-field">
                    <input type="text" name="nama_produk" id="nama_produk" value="<?= $menu['nama_produk']; ?>" required>
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
                <div class="textfield">
                    <label for="stok">Stok</label>
                    <span></span>
                    <input type="number" name="stok" id="stok" min="0" value="<?= $menu['stok']; ?>" required onkeydown="return event.keyCode !== 18;">
                    <span></span>
                </div>
                <div class="textfield">
                    <label for="gambar">Gambar Menu :</label>
                    <input type="file" id="gambar" name="gambar" placeholder="Link Gambar">
                    <span></span>
                </div>
                <input type="submit" value="Edit">
                <a class="addmenu-table" href="/menuadmin">back</a>
            </form>
        </div>
    </div>
</body>

</html>