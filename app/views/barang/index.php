<?= Message::show_message() ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Barang</h1>

    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal"
               data-target="#createbarang"><span
                        class="icon text-white-50"><i class="fas fa-plus"></i></span><span
                        class="text">Tambah</span></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Keterangan</th>
                        <th>Satuan</th>
                        <th>Diubah Oleh</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data['barang'] as $barang) :
                        $pengguna = $this->model("PenggunaModel")->getDataById('pengguna', 'idPengguna', $barang['idPengguna']);
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $barang['namaBarang']; ?></td>
                            <td><?= $barang['keterangan']; ?></td>
                            <td><?= $barang['satuan']; ?></td>
                            <td><?= $pengguna[0]['namaDepan']; ?> <?= $pengguna[0]['namaBelakang']; ?></td>
                            <td>
                                <a href="#" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal"
                                   data-target="#updatebarang<?= $barang['idBarang']; ?>"><span
                                            class="icon text-white-50"><i class="fas fa-pen"></i></span><span
                                            class="text">Edit</span></a>
                                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal"
                                   data-target="#deletebarang<?= $barang['idBarang']; ?>"><span
                                            class="icon text-white-50"><i class="fas fa-trash"></i></span><span
                                            class="text">Delete</span></a>
                            </td>
                        </tr>

                        <!-- modal update -->
                        <div id="updatebarang<?= $barang['idBarang']; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Barang - <?= $barang['namaBarang']; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASE_URL. 'Barang/edit_barang' ?>" method="post" role="form">
                                            <input type="hidden" name="idBarang" value="<?= $barang['idBarang']; ?>">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Nama Barang <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="namaBarang" placeholder="Nama Barang" value="<?= $barang['namaBarang']; ?>" required></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Keterangan <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="<?= $barang['keterangan']; ?>" required></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Satuan <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <select name="satuan" id="satuan" class="form-control">
                                                            <option disabled>Pilih Satuan</option>
                                                                <option value="Unit" name="satuan" <?php if ($barang['satuan'] == 'Unit'): echo 'selected'; endif;?>>Unit</option>
                                                                <option value="Lembar" name="satuan" <?php if ($barang['satuan'] == 'Lembar'): echo 'selected'; endif;?>>Lembar</option>
                                                                <option value="Buah" name="satuan" <?php if ($barang['satuan'] == 'Buah'): echo 'selected'; endif;?>>Buah</option>
                                                                <option value="Pasang" name="satuan" <?php if ($barang['satuan'] == 'Pasang'): echo 'selected'; endif;?>>Pasang</option>
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
                        <div class="modal fade" id="deletebarang<?= $barang['idBarang']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Barang - <?= $barang['namaBarang']; ?></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASE_URL. 'Barang/delete_barang' ?>" method="post" role="form">
                                            <input type="hidden" name="idBarang" value="<?= $barang['idBarang']; ?>">
                                        Apakah anda yakin ingin menghapus data barang <b><?= $barang['namaBarang']; ?></b>
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
        <div id="createbarang" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Barang Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASE_URL. 'Barang/insert_barang' ?>" method="post" role="form">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Nama Barang <span class="text-danger">*</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="namaBarang" placeholder="Nama Barang" required></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Keterangan <span class="text-danger">*</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="keterangan" placeholder="Keterangan" required></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Satuan <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="satuan" id="satuan" class="form-control">
                                            <option disabled>Pilih Satuan</option>
                                            <option value="Unit" name="satuan">Unit</option>
                                            <option value="Lembar" name="satuan">Lembar</option>
                                            <option value="Buah" name="satuan">Buah</option>
                                            <option value="Pasang" name="satuan">Pasang</option>
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