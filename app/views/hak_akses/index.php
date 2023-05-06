<?= Message::show_message() ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Hak Akses</h1>

    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal"
               data-target="#createakses"><span
                        class="icon text-white-50"><i class="fas fa-plus"></i></span><span
                        class="text">Tambah</span></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Akses</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data['hakAkses'] as $hak_akses) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $hak_akses['namaAkses']; ?></td>
                            <td><?= $hak_akses['keterangan']; ?></td>
                            <td>
                                <a href="#" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal"
                                   data-target="#updateakses<?= $hak_akses['idAkses']; ?>"><span
                                            class="icon text-white-50"><i class="fas fa-pen"></i></span><span
                                            class="text">Edit</span></a>
                                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal"
                                   data-target="#deleteakses<?= $hak_akses['idAkses']; ?>"><span
                                            class="icon text-white-50"><i class="fas fa-trash"></i></span><span
                                            class="text">Delete</span></a>
                            </td>
                        </tr>

                        <!-- modal update -->
                        <div id="updateakses<?= $hak_akses['idAkses']; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Hak Akses - <?= $hak_akses['namaAkses']; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASE_URL. 'HakAkses/edit_akses' ?>" method="post" role="form">
                                            <input type="hidden" name="idAkses" value="<?= $hak_akses['idAkses']; ?>">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Nama Akses <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="namaAkses" placeholder="Nama Akses" value="<?= $hak_akses['namaAkses']; ?>" required></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Keterangan <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="<?= $hak_akses['keterangan']; ?>" required></div>
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
                        <div class="modal fade" id="deleteakses<?= $hak_akses['idAkses']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Hak Akses - <?= $hak_akses['namaAkses']; ?></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASE_URL. 'HakAkses/delete_akses' ?>" method="post" role="form">
                                            <input type="hidden" name="idAkses" value="<?= $hak_akses['idAkses']; ?>">
                                        Apakah anda yakin ingin menghapus data hak akses <b><?= $hak_akses['namaAkses']; ?></b>
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
        <div id="createakses" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hak Akses Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASE_URL. 'HakAkses/insert_akses' ?>" method="post" role="form">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Nama Akses <span class="text-danger">*</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="namaAkses" placeholder="Nama Akses" required></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Keterangan <span class="text-danger">*</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="keterangan" placeholder="Keterangan" required></div>
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