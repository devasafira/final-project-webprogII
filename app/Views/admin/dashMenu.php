<?= $this->extend('public_layout'); ?>

<?= $this->section('content'); ?>
<body style="background: #1d232b;">
    
    <section id="content">
            <div class="top-pesan">
                <p>Menu</p>
            </div>
            <div class="add-btn">
                <a href="/addMenu" class="btn-add">
                    <!-- <i class='bx bx-add-to-queue'> <p>Add New Menu</p></i> -->
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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     
                    </tbody>
                </table>
            </div>
            
    </section>

</body>
<?= $this->endSection(); ?>