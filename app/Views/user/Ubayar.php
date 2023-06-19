<?= $this->extend('user_layout'); ?>

<?= $this->section('user-content'); ?>

<body style="background: #1d232b;">

  <section id="userHome">

    <div class="row noTable">
      <div class="col textTable">
        <h5>No. Meja</h5>
      </div>
      <div class="col textTable">
        <p>Table 01</p>
      </div>
    </div>

    <div class="row payTable ">
      <table class="table table-striped table-hover table-bayar ">
        <thead>
          <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Harga dan Jumlah</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#</td>
            <td>Doe</td>
            <td>30000 x 2</td>
          </tr>
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
          <li>60000</li>
        </ul>
      </div>
    </div>

    <div class="tombol">
      <a type="submit" class="btn btn-outline-success" href="">Pesan</a>
    </div>

  </section>

</body>
<?= $this->endSection('user-content'); ?>