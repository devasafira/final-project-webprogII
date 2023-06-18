<?= $this->extend('public_layout'); ?>

<?= $this->section('content'); ?>


<body style="background: #1d232b;">

    <div class="container">
    
        <div class="row" style="margin-top: 5.5rem; margin-left: 4.8rem;">
            <!-- Jumlah Pesanan Card -->
            <div class="col-xl-3 col-md-6 mb-5">
                <div class="card border-left-primary shadow h-100 py-2" style="border-color: green; border-width:2px; background:#12171e;">>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">Stok Buku Terdaftar</div>
                                <div class="h1 mb-0 font-weight-bold text-white">
                                 5
                                </div>
                            </div>
                            <!-- <div class="col-auto">
                                <a href="<?= base_url('buku'); ?>"><i class="fas fa-book fa-3x text-primary"></i></a>
                            </div> -->
                        </div>    
                    </div>
                </div>
            </div>
            <!-- Jumlah Daftar Menu -->
            <div class="col-xl-3 col-md-6 mb-5">
                <div class="card border-left-primary shadow h-100 py-2" style="border-color: green; border-width:2px; background:#12171e;">>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">Stok Buku Terdaftar</div>
                                <div class="h1 mb-0 font-weight-bold text-white">
                                5
                                </div>
                            </div>
                            <!-- <div class="col-auto">
                                <a href="<?= base_url('buku'); ?>"><i class="fas fa-book fa-3x text-primary"></i></a>
                            </div> -->
                        </div>    
                    </div>
                </div>
            </div>
            <!-- Jumlah Transaksi yang Berhasil -->
            <div class="col-xl-3 col-md-6 mb-5">
                <div class="card border-left-success shadow h-100 py-2" style="border-color: green; border-width:2px; background:#12171e;">>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">Buku yang dipinjam</div>
                                <div class="h1 mb-0 font-weight-bold text-white">
                                    8
                                </div>
                            </div>
                            <!-- <div class="col-auto">
                                <a href="<?= base_url('user'); ?>"><i class="fas fa-user-tag fa-3x text-success"></i></a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jumlah (tidak tahu) -->
            <div class="col-xl-3 col-md-6 mb-5">
                <div class="card border-left-success shadow h-100 py-2" style="border-color: green; border-width:2px; background:#12171e;">>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">Buku yang dipinjam</div>
                                <div class="h1 mb-0 font-weight-bold text-white">
                                10
                                </div>
                            </div>
                            <!-- <div class="col-auto">
                                <a href="<?= base_url('user'); ?>"><i class="fas fa-user-tag fa-3x text-success"></i></a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <section id="content">
        <div class="top-pesan">
            <p>Pesanan</p>
        </div>
        
        <div class="table-pesan">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Table</th>
                        <th scope="col">Product</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                   <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                   </tr>
                   <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                   </tr>
                   <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                   </tr>
                   <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                   </tr>
                </tbody>
            </table>
        </div>
        
    </section>

</body>
<?= $this->endSection(); ?>