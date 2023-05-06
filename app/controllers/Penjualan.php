<?php

class Penjualan extends Controller
{
    public function __construct()
    {
        session_start();
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASE_URL . "auth");
            exit;
        }
    }

    public function index()
    {
        $data['title'] = "Penjualan";
        $data['role'] = $this->model("PenggunaModel")->getDataById('hak_akses', 'idAkses', $_SESSION['login']['idAkses']);
        $data["penjualan"] = $this->model("PenjualanModel")->getAllData('penjualan');
        $data["barang"] = $this->model("BarangModel")->getAllData('barang');
        $data["pelanggan"] = $this->model("PelangganModel")->getAllData('pelanggan');
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('penjualan/index', $data);
        $this->view('templates/wrapper');
        $this->view('templates/footer');
    }

    public function insert_penjualan()
    {
        if (isset($_POST["submit"])) {
            $insert = [
                'jumlahPenjualan' => $_POST['jumlahPenjualan'],
                'hargaJual' => $_POST['hargaJual'],
                'idBarang' => $_POST['idBarang'],
                'idPengguna' => $_SESSION['login']['idPengguna'],
                'idPelanggan' => $_POST['idPelanggan'],
            ];
            Database::insert('penjualan', $insert, 'Penjualan/index');
            Message::set_message('Data Berhasil Ditambahkan!');
            header("Location: " . BASE_URL . 'Penjualan/index');
        }
    }
    public function edit_penjualan()
    {
        if (isset($_POST["submit"])) {
            $update = [
                'jumlahPenjualan' => $_POST['jumlahPenjualan'],
                'hargaJual' => $_POST['hargaJual'],
                'idBarang' => $_POST['idBarang'],
                'idPengguna' => $_SESSION['login']['idPengguna'],
                'idPelanggan' => $_POST['idPelanggan'],
            ];
            $where = [
                'idPenjualan' => $_POST['idPenjualan']
            ];
            Database::update('penjualan', $update, $where, 'Penjualan/index');
            Message::set_message('Data Berhasil Diubah!');
            header("Location: " . BASE_URL . 'Penjualan/index');
        }
    }

    public function delete_penjualan()
    {
        if (isset($_POST["submit"])) {
            Database::delete('penjualan', 'idPenjualan', $_POST['idPenjualan']);
            Message::set_message('Data Berhasil Dihapus!');
            header("Location: " . BASE_URL . 'Penjualan/index');
        }
    }
}
