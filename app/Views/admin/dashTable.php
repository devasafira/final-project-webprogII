<!-- app/Views/admin/manage_tables.php -->
<?= $this->extend('public_layout'); ?>

<?= $this->section('content'); ?>

<body style="background: #1d232b;">

    <section id="content">
        <div class="top-pesan">
            <p>Table</p>
        </div>
        <div class="add-btn">
            <a href="/addtable" class="btn-add">
                Add New Table
            </a>
        </div>

        <div class="table-MenuTable">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id Table</th>
                        <th scope="col">Table Name</th>
                        <th scope="col">Status</th> <!-- Tambahkan kolom "Status" -->
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tables as $table) : ?>
                        <tr>
                            <td><?= $table['id'] ?></td>
                            <td><?= $table['table_number'] ?></td>
                            <td>
                                <?php if ($table['status']) : ?>
                                    Active <!-- Ubah status menjadi "Active" -->
                                <?php else : ?>
                                    Dead <!-- Ubah status menjadi "Dead" -->
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($table['status']) : ?>
                                    <a href="/admin/deactivate-table/<?= $table['id'] ?>">Deactivate</a>
                                <?php else : ?>
                                    <a href="/admin/activate-table/<?= $table['id'] ?>">Activate</a>
                                <?php endif; ?>
                                <a href="/admin/delete-table/<?= $table['id'] ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
<?= $this->endSection(); ?>
