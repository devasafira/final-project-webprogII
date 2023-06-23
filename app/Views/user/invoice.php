<!DOCTYPE html>
<html>
    <head>
        <title>Invoice</title>
        <!-- Tambahkan stylesheet atau styling yang diperlukan untuk tampilan invoice -->
    </head>
    <body>
        <h1>Invoice</h1>

        <!-- Tampilkan data invoice sesuai format yang diinginkan -->
        <p>Nama Pembeli: <?= $invoice['nama_pembeli'] ?></p>
        <p>Nomor Meja: <?= $invoice['table_number'] ?></p>
        <p>Metode Pembayaran: <?= $invoice['metode_pembayaran'] ?></p>
        <p>Total Harga: <?= $invoice['total_harga'] ?></p>

        <!-- Tampilkan tombol cetak struk -->
        <button onclick="printStruk()">Cetak Struk</button>

        <script>
            function printStruk() {
                window.open('/printStruk', '_blank');
            }
        </script>
    </body>
</html>
