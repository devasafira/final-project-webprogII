<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu</title>

    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body style="background: #12171e; overflow:hidden;">
    
    <div class="box">
        <div class="center" style="background: #12171b;">
            <h1>Add Menu</h1>
            
            <form action=" " method=" ">
                <div class="text-field">
                    <input type="text" name="nama_produk" id="nama_produk" required>
                    <span class="span1"></span>
                    <label for="nama_produk">Nama Produk</label>
                </div>
                <div class="text-field">
                    <input type="text" name="harga" id="harga" required>
                    <span></span>
                    <label for="harga">harga</label>
                </div>
                <div class="text-field">
                    <input type="url" name="gambar" id="gambar" required>
                    <span></span>
                    <label for="gambar">Gambar</label>
                </div>
                <input type="submit" value="Add">
                <a class="addmenu-table" href="/menu">back</a>
            </form>
        </div>
    </div>
</body>
</html>