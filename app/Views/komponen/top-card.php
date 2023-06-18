<?= $this->section('top-card'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/style.css">
    <link rel="shortcut icon" href="sushi.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
   <div class="container">

        <div class="row">
            <!-- Jumlah Pesanan Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2 bg-success">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Pesanan</div>
                                <div class="h1 mb-0 font-weight-bold text-white"><?= $this->ModelUser->getUserWhere(['role_id' => 1])->num_rows(); ?></div> 
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('user/anggota'); ?>"><i class="fas fa-users fa-3x text-warning"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jumlah Daftar Menu -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 bg-warning">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">Stok Buku Terdaftar</div>
                                <div class="h1 mb-0 font-weight-bold text-white">
                                    <?php 
                                    $where = ['stok != 0'];
                                    $totalstok = $this->ModelBuku->total('stok',$where);
                                    echo $totalstok;
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('buku'); ?>"><i class="fas fa-book fa-3x text-primary"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Jumlah Transaksi yang Berhasil -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2 bg-danger">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">Buku yang dipinjam</div>
                                <div class="h1 mb-0 font-weight-bold text-white">
                                    <?php
                                        $where = ['dipinjam != 0'];
                                        $totaldipinjam = $this->ModelBuku->total('dipinjam',$where);
                                        echo $totaldipinjam;
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('user'); ?>"><i class="fas fa-user-tag fa-3x text-success"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jumlah (tidak tahu) -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2 bg-danger">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">Buku yang dipinjam</div>
                                <div class="h1 mb-0 font-weight-bold text-white">
                                    <?php
                                        $where = ['dipinjam != 0'];
                                        $totaldipinjam = $this->ModelBuku->total('dipinjam',$where);
                                        echo $totaldipinjam;
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('user'); ?>"><i class="fas fa-user-tag fa-3x text-success"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> 
</body>
</html>
<?= $this->endSection('top-card'); ?>