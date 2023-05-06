<?= Message::show_message() ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Penjualan</h1>

    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal"
               data-target="#createpenjualan"><span
                        class="icon text-white-50"><i class="fas fa-plus"></i></span><span
                        class="text">Tambah</span></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Jumlah Penjualan</th>
                        <th>Harga Jualan</th>
                        <th>Barang</th>
                        <th>Diubah Oleh</th>
                        <th>Pelanggan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data['penjualan'] as $penjualan) :
                        $pengguna = $this->model("PenggunaModel")->getDataById('pengguna', 'idPengguna', $penjualan['idPengguna']);
                        $barang = $this->model("BarangModel")->getDataById('barang', 'idBarang', $penjualan['idBarang']);
                        $pelanggan = $this->model("PelangganModel")->getDataById('pelanggan', 'idPelanggan', $penjualan['idPelanggan']);
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $penjualan['jumlahPenjualan']; ?></td>
                            <td><?= "Rp " . number_format($penjualan['hargaJual'],2,',','.'); ?></td>
                            <td><?= $barang[0]['namaBarang']; ?></td>
                            <td><?= $pengguna[0]['namaDepan']; ?> <?= $pengguna[0]['namaBelakang']; ?></td>
                            <td><?= $pelanggan[0]['NamaDepan']; ?> <?= $pelanggan[0]['NamaBelakang']; ?></td>
                            <td>
                                <a href="#" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal"
                                   data-target="#updatepenjualan<?= $penjualan['idPenjualan']; ?>"><span
                                            class="icon text-white-50"><i class="fas fa-pen"></i></span><span
                                            class="text">Edit</span></a>
                                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal"
                                   data-target="#deletepenjualan<?= $penjualan['idPenjualan']; ?>"><span
                                            class="icon text-white-50"><i class="fas fa-trash"></i></span><span
                                            class="text">Delete</span></a>
                            </td>
                        </tr>

                        <!-- modal update -->
                        <div id="updatepenjualan<?= $penjualan['idPenjualan']; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Penjualan - <?= $penjualan['idPenjualan']; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASE_URL. 'Penjualan/edit_penjualan' ?>" method="post" role="form">
                                            <input type="hidden" name="idPenjualan" value="<?= $penjualan['idPenjualan']; ?>">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Jumlah Penjualan <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="number" class="form-control" name="jumlahPenjualan" placeholder="Jumlah Penjualan" value="<?= $penjualan['jumlahPenjualan']; ?>" required></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Harga Jual <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="number" class="form-control" name="hargaJual" placeholder="Harga Jual" value="<?= $penjualan['hargaJual']; ?>" required></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Barang <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <select name="idBarang" id="idBarang" class="form-control">
                                                            <option disabled>Pilih Barang</option>
                                                            <?php foreach ($data['barang'] as $barang) : ?>
                                                                <option value="<?= $barang['idBarang']; ?>" name="idBarang" <?php if ($penjualan['idBarang'] == $barang['idBarang']): echo 'selected'; endif;?>><?= $barang['namaBarang']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Pelanggan <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <select name="idPelanggan" id="idPelanggan" class="form-control">
                                                            <option disabled>Pilih Pelanggan</option>
                                                            <?php foreach ($data['pelanggan'] as $pelanggan) : ?>
                                                                <option value="<?= $pelanggan['idPelanggan']; ?>" name="idPelanggan" <?php if ($penjualan['idPelanggan'] == $pelanggan['idPelanggan']): echo 'selected'; endif;?>><?= $pelanggan['NamaDepan'].' '.$pelanggan['NamaBelakang']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal update close -->
                        <!-- modal delete -->
                        <div class="modal fade" id="deletepenjualan<?= $penjualan['idPenjualan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Penjualan - <?= $penjualan['idPenjualan']; ?></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASE_URL. 'Penjualan/delete_penjualan' ?>" method="post" role="form">
                                            <input type="hidden" name="idPenjualan" value="<?= $penjualan['idPenjualan']; ?>">
                                        Apakah anda yakin ingin menghapus data penjualan <b><?= $penjualan['idPenjualan']; ?></b>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                <input type="submit" name="submit" class="btn btn-primary" value="Hapus">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal delete close -->

                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- modal insert -->
        <div id="createpenjualan" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Penjualan Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASE_URL. 'Penjualan/insert_penjualan' ?>" method="post" role="form">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Jumlah Penjualan <span class="text-danger">*</span></label>
                                    <div class="col-sm-8"><input type="number" class="form-control" name="jumlahPenjualan" placeholder="Jumlah Penjualan" required></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Harga Jual <span class="text-danger">*</span></label>
                                    <div class="col-sm-8"><input type="number" class="form-control" name="hargaJual" placeholder="Harga Jual" required></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Barang <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="idBarang" id="idBarang" class="form-control">
                                            <option disabled selected>Pilih Barang</option>
                                            <?php foreach ($data['barang'] as $barang) : ?>
                                                <option value="<?= $barang['idBarang']; ?>" name="idBarang"><?= $barang['namaBarang']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Pelanggan <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="idPelanggan" id="idPelanggan" class="form-control">
                                            <option disabled selected>Pilih Pelanggan</option>
                                            <?php foreach ($data['pelanggan'] as $pelanggan) : ?>
                                                <option value="<?= $pelanggan['idPelanggan']; ?>" name="idPelanggan"><?= $pelanggan['NamaDepan'].' '.$pelanggan['NamaBelakang']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- modal insert close -->
</div>