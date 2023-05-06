<?= Message::show_message() ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Selamat Datang, <?= $_SESSION['login']['namaDepan'].' '.$_SESSION['login']['namaBelakang'] ?>
                </div>
                <div class="card-body">
                    Ini merupakan halaman <b><?= $data['role'][0]['namaAkses']; ?></b>, semua menu yang dapat diakses sudah dibatasi oleh hak akses sesuai role yang kamu miliki.
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard Laporan Rugi Laba
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Total Harga Beli</th>
                            <th>Total Harga Jual</th>
                            <th>Keuntungan</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['rugi_laba'] as $laporan) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $laporan['namaBarang']; ?></td>
                            <td><?= "Rp " . number_format($laporan['totalHargaBeli'],2,',','.'); ?></td>
                            <td><?= "Rp " . number_format($laporan['totalHargaJual'],2,',','.'); ?></td>
                            <td><?= "Rp " . number_format($laporan['keuntungan'],2,',','.'); ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Kombinasi Paket Penjualan
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Barang Pertama</th>
                            <th>Harga Pertama</th>
                            <th>Barang Kedua</th>
                            <th>Harga Kedua</th>
                            <th>Total Harga Jual</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['paket_penjualan'] as $paket) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $paket['namaPaket']; ?></td>
                                <td><?= $paket['namaBarang1']; ?></td>
                                <td><?= "Rp " . number_format($paket['hargaJual1'],2,',','.'); ?></td>
                                <td><?= $paket['namaBarang2']; ?></td>
                                <td><?= "Rp " . number_format($paket['hargaJual2'],2,',','.'); ?></td>
                                <td><?= "Rp " . number_format($paket['totalHargaJual'],2,',','.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>