<?= Message::show_message() ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pelanggan</h1>

    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal"
               data-target="#createpelanggan"><span
                        class="icon text-white-50"><i class="fas fa-plus"></i></span><span
                        class="text">Tambah</span></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data['pelanggan'] as $pelanggan) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $pelanggan['NamaDepan']; ?></td>
                            <td><?= $pelanggan['NamaBelakang']; ?></td>
                            <td><?= $pelanggan['alamat']; ?></td>
                            <td><?= $pelanggan['noHp']; ?></td>
                            <td>
                                <a href="#" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal"
                                   data-target="#updatepelanggan<?= $pelanggan['idPelanggan']; ?>"><span
                                            class="icon text-white-50"><i class="fas fa-pen"></i></span><span
                                            class="text">Edit</span></a>
                                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal"
                                   data-target="#deletepelanggan<?= $pelanggan['idPelanggan']; ?>"><span
                                            class="icon text-white-50"><i class="fas fa-trash"></i></span><span
                                            class="text">Delete</span></a>
                            </td>
                        </tr>

                        <!-- modal update -->
                        <div id="updatepelanggan<?= $pelanggan['idPelanggan']; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Pelanggan - <?= $pelanggan['NamaDepan'].' '.$pelanggan['NamaBelakang']; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASE_URL. 'Pelanggan/edit_pelanggan' ?>" method="post" role="form">
                                            <input type="hidden" name="idPelanggan" value="<?= $pelanggan['idPelanggan']; ?>">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Nama Depan <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="NamaDepan" placeholder="Nama Depan" value="<?= $pelanggan['NamaDepan']; ?>" required></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Nama Belakang <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="NamaBelakang" placeholder="Nama Belakang" value="<?= $pelanggan['NamaBelakang']; ?>" required></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Alamat <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?= $pelanggan['alamat']; ?>" required></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">No HP <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="number" class="form-control" name="noHp" placeholder="No HP" value="<?= $pelanggan['noHp']; ?>" required></div>
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
                        <div class="modal fade" id="deletepelanggan<?= $pelanggan['idPelanggan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Pelanggan - <?= $pelanggan['NamaDepan'].' '.$pelanggan['NamaBelakang']; ?></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASE_URL. 'Pelanggan/delete_pelanggan' ?>" method="post" role="form">
                                            <input type="hidden" name="idPelanggan" value="<?= $pelanggan['idPelanggan']; ?>">
                                        Apakah anda yakin ingin menghapus data pelanggan <b><?= $pelanggan['NamaDepan'].' '.$pelanggan['NamaBelakang']; ?></b>
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
        <div id="createpelanggan" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pelanggan Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASE_URL. 'Pelanggan/insert_pelanggan' ?>" method="post" role="form">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Nama Depan <span class="text-danger">*</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="NamaDepan" placeholder="Nama Depan" required></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Nama Belakang <span class="text-danger">*</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="NamaBelakang" placeholder="Nama Belakang" required></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Alamat <span class="text-danger">*</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="alamat" placeholder="Alamat" required></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">No HP <span class="text-danger">*</span></label>
                                    <div class="col-sm-8"><input type="number" class="form-control" name="noHp" placeholder="No HP" required></div>
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