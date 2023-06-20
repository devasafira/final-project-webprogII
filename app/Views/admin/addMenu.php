<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu</title>

    <link rel="stylesheet" href="/assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-AshC6B+UKr89OK/2Mdbs70VhzKBfyDcQ8uKTm12O2+zTeKSt/0sy5P2T6P4m+AfJKaLojU9H4GkwOOukzZ55Ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body style="background: #12171e; overflow:hidden;">

    <div class="box">
        <div class="center" style="background: #12171b;">
            <h1>Add Menu</h1>

            <form action="/saveMenu" method="POST" enctype="multipart/form-data">
                <div class="text-field">
                    <input type="text" name="nama_produk" id="nama_produk" required>
                    <span class="span1"></span>
                    <label for="nama_produk">Nama Produk</label>
                </div>
                <div class="text-field">
                    <input type="text" name="harga" id="harga" required>
                    <span></span>
                    <label for="harga">Harga</label>
                </div>
                <div class="textfield">
                    <label for="kategori">Kategori :</label>
                    <select id="kategori" name="kategori">
                        <option value="Sushi">Sushi</option>
                        <option value="Sashimi">Sashimi</option>
                        <option value="Chinmi">Chinmi</option>
                        <option value="Udon">Udon</option>
                        <option value="Drinks">Drinks</option>
                    </select>
                </div>
                <br>
                <div class="textfield">
                    <label for="stok">Stok</label>
                    <div class="stok-input">
                        <button type="button" class="stok-btn" onclick="decrementStok()"><i class="fas fa-minus"></i></button>
                        <input type="number" name="stok" id="stok" min="0" max="999" required>
                        <button type="button" class="stok-btn" onclick="incrementStok()"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <br>
                <div class="textfield">
                    <label for="gambar">Gambar Menu :</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*">
                </div>
                <br>
                <input type="submit" value="Add">
                <a class="addmenu-table" href="/menuadmin">back</a>
            </form>
        </div>
    </div>

    <script>
        function incrementStok() {
            const stokInput = document.getElementById('stok');
            const stokValue = parseInt(stokInput.value);

            if (!isNaN(stokValue)) {
                stokInput.value = stokValue + 1;
            } else {
                stokInput.value = 1;
            }
        }


        function decrementStok() {
            const stokInput = document.getElementById('stok');
            const stokValue = parseInt(stokInput.value);

            if (!isNaN(stokValue) && stokValue > 0) {
                stokInput.value = stokValue - 1;
            }
        }
    </script>
</body>

</html>