<?= Message::show_message() ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pembelian</h1>

    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal"
               data-target="#createpembelian"><span
                        class="icon text-white-50"><i class="fas fa-plus"></i></span><span
                        class="text">Tambah</span></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Jumlah Pembelian</th>
                        <th>Harga Beli</th>
                        <th>Barang</th>
                        <th>Diubah Oleh</th>
                        <th>Supplier</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data['pembelian'] as $pembelian) :
                        $pengguna = $this->model("PenggunaModel")->getDataById('pengguna', 'idPengguna', $pembelian['idPengguna']);
                        $barang = $this->model("BarangModel")->getDataById('barang', 'idBarang', $pembelian['idBarang']);
                        $supplier = $this->model("SupplierModel")->getDataById('supplier', 'idSupplier', $pembelian['idSupplier']);
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $pembelian['jumlahPembelian']; ?></td>
                            <td><?= "Rp " . number_format($pembelian['hargaBeli'],2,',','.'); ?></td>
                            <td><?= $barang[0]['namaBarang']; ?></td>
                            <td><?= $pengguna[0]['namaDepan']; ?> <?= $pengguna[0]['namaBelakang']; ?></td>
                            <td><?= $supplier[0]['namaSupplier']; ?></td>
                            <td>
                                <a href="#" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal"
                                   data-target="#updatepembelian<?= $pembelian['idPembelian']; ?>"><span
                                            class="icon text-white-50"><i class="fas fa-pen"></i></span><span
                                            class="text">Edit</span></a>
                                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal"
                                   data-target="#deletepembelian<?= $pembelian['idPembelian']; ?>"><span
                                            class="icon text-white-50"><i class="fas fa-trash"></i></span><span
                                            class="text">Delete</span></a>
                            </td>
                        </tr>

                        <!-- modal update -->
                        <div id="updatepembelian<?= $pembelian['idPembelian']; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Pembelian - <?= $pembelian['idPembelian']; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASE_URL. 'Pembelian/edit_pembelian' ?>" method="post" role="form">
                                            <input type="hidden" name="idPembelian" value="<?= $pembelian['idPembelian']; ?>">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Jumlah Pembelian <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="number" class="form-control" name="jumlahPembelian" placeholder="Jumlah Pembelian" value="<?= $pembelian['jumlahPembelian']; ?>" required></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Harga Beli <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="number" class="form-control" name="hargaBeli" placeholder="Harga Beli" value="<?= $pembelian['hargaBeli']; ?>" required></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Barang <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <select name="idBarang" id="idBarang" class="form-control">
                                                            <option disabled>Pilih Barang</option>
                                                            <?php foreach ($data['barang'] as $barang) : ?>
                                                                <option value="<?= $barang['idBarang']; ?>" name="idBarang" <?php if ($pembelian['idBarang'] == $barang['idBarang']): echo 'selected'; endif;?>><?= $barang['namaBarang']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Supplier <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <select name="idSupplier" id="idSupplier" class="form-control">
                                                            <option disabled>Pilih Supplier</option>
                                                            <?php foreach ($data['supplier'] as $supplier) : ?>
                                                                <option value="<?= $supplier['idSupplier']; ?>" name="idSupplier" <?php if ($pembelian['idSupplier'] == $supplier['idSupplier']): echo 'selected'; endif;?>><?= $supplier['namaSupplier']; ?></option>
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
                        <div class="modal fade" id="deletepembelian<?= $pembelian['idPembelian']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Pembelian - <?= $pembelian['idPembelian']; ?></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASE_URL. 'Pembelian/delete_pembelian' ?>" method="post" role="form">
                                            <input type="hidden" name="idPembelian" value="<?= $pembelian['idPembelian']; ?>">
                                        Apakah anda yakin ingin menghapus data pembelian <b><?= $pembelian['idPembelian']; ?></b>
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
        <div id="createpembelian" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pembelian Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASE_URL. 'Pembelian/insert_pembelian' ?>" method="post" role="form">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Jumlah Pembelian <span class="text-danger">*</span></label>
                                    <div class="col-sm-8"><input type="number" class="form-control" name="jumlahPembelian" placeholder="Jumlah Pembelian" required></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Harga Beli <span class="text-danger">*</span></label>
                                    <div class="col-sm-8"><input type="number" class="form-control" name="hargaBeli" placeholder="Harga Beli" required></div>
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
                                    <label class="col-sm-3 control-label text-right">Supplier <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="idSupplier" id="idSupplier" class="form-control">
                                            <option disabled selected>Pilih Supplier</option>
                                            <?php foreach ($data['supplier'] as $supplier) : ?>
                                                <option value="<?= $supplier['idSupplier']; ?>" name="idSupplier"><?= $supplier['namaSupplier']; ?></option>
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