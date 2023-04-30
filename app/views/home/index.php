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

</div>