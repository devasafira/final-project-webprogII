<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body style="background-image: linear-gradient(315deg, #80ff72 0%, #529e49 74%); overflow:hidden;">

    <div class="box">
        <div class="center">
            <h1>Register</h1>

            <?php if (session()->has('errors')) : ?>
                <ul>
                    <?php foreach (session('errors') as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if (session()->has('success')) : ?>
                <p><?= session('success') ?></p>
            <?php endif; ?>
            <form action="/register" method="post">
                <div class="text-field">
                    <input type="text" name="username" id="" required>
                    <span class="span1"></span>
                    <label for="username">Username</label>
                </div>
                <div class="text-field">
                    <input type="password" name="password" id="password" required>
                    <span></span>
                    <label for="password">Password</label>
                </div>
                <div class="text-field">
                    <input type="email" name="email" id="email" required>
                    <span></span>
                    <label for="email">Email</label>
                </div>
                <div class="text-field">
                    <input type="text" name="telepon" id="telepon" required>
                    <span></span>
                    <label for="telepon">Telepon</label>
                </div>
                <div class="text-field">
                    <input type="text" name="alamat" id="alamat" required>
                    <span></span>
                    <label for="alamat">Alamat</label>
                </div>
                <input type="submit" value="Register">
                <p class="login">You have an account? <a href="/login">Login</a></p>
            </form>
        </div>
    </div>
</body>

</html>