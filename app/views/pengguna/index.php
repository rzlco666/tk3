<?= Message::show_message() ?>
<style>
    .hidetext { -webkit-text-security: disc; /* Default */ }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengguna</h1>

    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal"
               data-target="#createpengguna"><span
                        class="icon text-white-50"><i class="fas fa-plus"></i></span><span
                        class="text">Tambah</span></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Password</th>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Hak Akses</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data['pengguna'] as $pengguna) :
                        $hakAkses = $this->model("PenggunaModel")->getDataById('hak_akses', 'idAkses', $pengguna['idAkses']);
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $pengguna['namaPengguna']; ?></td>
                            <td class="hidetext"><?= $pengguna['password']; ?></td>
                            <td><?= $pengguna['namaDepan']; ?></td>
                            <td><?= $pengguna['namaBelakang']; ?></td>
                            <td><?= $pengguna['noHp']; ?></td>
                            <td><?= $pengguna['alamat']; ?></td>
                            <td><?= $hakAkses[0]['namaAkses']; ?></td>
                            <td>
                                <a href="#" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal"
                                   data-target="#updatepengguna<?= $pengguna['idPengguna']; ?>"><span
                                            class="icon text-white-50"><i class="fas fa-pen"></i></span><span
                                            class="text">Edit</span></a>
                                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal"
                                   data-target="#deletepengguna<?= $pengguna['idPengguna']; ?>"><span
                                            class="icon text-white-50"><i class="fas fa-trash"></i></span><span
                                            class="text">Delete</span></a>
                            </td>
                        </tr>

                        <!-- modal update -->
                        <div id="updatepengguna<?= $pengguna['idPengguna']; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Pengguna - <?= $pengguna['namaPengguna']; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASE_URL. 'Pengguna/edit_pengguna' ?>" method="post" role="form">
                                            <input type="hidden" name="idPengguna" value="<?= $pengguna['idPengguna']; ?>">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Nama Pengguna <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="namaPengguna" placeholder="Nama Pengguna" value="<?= $pengguna['namaPengguna']; ?>" required></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Password <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="password" class="form-control" name="password" placeholder="Password" id="myPassword" value="<?= $pengguna['password']; ?>">
                                                        <input type="checkbox" onclick="myFunction()"> Lihat Password
                                                        <script>
                                                            function myFunction() {
                                                                var x = document.getElementById("myPassword");
                                                                if (x.type === "password") {
                                                                    x.type = "text";
                                                                } else {
                                                                    x.type = "password";
                                                                }
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Nama Depan <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="namaDepan" placeholder="Nama Depan" value="<?= $pengguna['namaDepan']; ?>" required></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Nama Belakang <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="namaBelakang" placeholder="Nama Belakang" value="<?= $pengguna['namaBelakang']; ?>" required></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">No Hp <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="number" class="form-control" name="noHp" placeholder="No Hp" value="<?= $pengguna['noHp']; ?>" required></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Alamat <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?= $pengguna['alamat']; ?>" required></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Hak Akses <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <select name="idAkses" id="idAkses" class="form-control">
                                                            <option disabled>Pilih Hak Akses</option>
                                                            <?php foreach ($data['hakAkses'] as $hak_akses) : ?>
                                                                <option value="<?= $hak_akses['idAkses']; ?>" name="idAkses" <?php if ($pengguna['idAkses'] == $hak_akses['idAkses']): echo 'selected'; endif;?>><?= $hak_akses['namaAkses']; ?></option>
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
                        <div class="modal fade" id="deletepengguna<?= $pengguna['idPengguna']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Pengguna - <?= $pengguna['namaPengguna']; ?></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASE_URL. 'Pengguna/delete_pengguna' ?>" method="post" role="form">
                                            <input type="hidden" name="idPengguna" value="<?= $pengguna['idPengguna']; ?>">
                                        Apakah anda yakin ingin menghapus data pengguna <b><?= $pengguna['namaPengguna']; ?></b>
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
        <div id="createpengguna" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pengguna Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASE_URL. 'Pengguna/insert_pengguna' ?>" method="post" role="form">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Nama Pengguna <span class="text-danger">*</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="namaPengguna" placeholder="Nama Pengguna" required></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Password <span class="text-danger">*</span></label>
                                    <div class="col-sm-8"><input type="password" class="form-control" name="password" placeholder="Password" id="myPassword" value="">
                                        <input type="checkbox" onclick="myFunction()"> Lihat Password
                                        <script>
                                            function myFunction() {
                                                var x = document.getElementById("myPassword");
                                                if (x.type === "password") {
                                                    x.type = "text";
                                                } else {
                                                    x.type = "password";
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Nama Depan <span class="text-danger">*</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="namaDepan" placeholder="Nama Depan" required></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Nama Belakang <span class="text-danger">*</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="namaBelakang" placeholder="Nama Belakang" required></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">No Hp <span class="text-danger">*</span></label>
                                    <div class="col-sm-8"><input type="number" class="form-control" name="noHp" placeholder="No Hp" required></div>
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
                                    <label class="col-sm-3 control-label text-right">Hak Akses <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="idAkses" id="idAkses" class="form-control">
                                            <option disabled selected>Pilih Hak Akses</option>
                                            <?php foreach ($data['hakAkses'] as $hak_akses) : ?>
                                            <option value="<?= $hak_akses['idAkses']; ?>" name="idAkses"><?= $hak_akses['namaAkses']; ?></option>
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