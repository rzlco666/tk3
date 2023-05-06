<?php

class Pembelian extends Controller
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
        $data['title'] = "Pembelian";
        $data['role'] = $this->model("PenggunaModel")->getDataById('hak_akses', 'idAkses', $_SESSION['login']['idAkses']);
        $data["pembelian"] = $this->model("PembelianModel")->getAllData('pembelian');
        $data["barang"] = $this->model("BarangModel")->getAllData('barang');
        $data["supplier"] = $this->model("SupplierModel")->getAllData('supplier');
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('pembelian/index', $data);
        $this->view('templates/wrapper');
        $this->view('templates/footer');
    }

    public function insert_pembelian()
    {
        if (isset($_POST["submit"])) {
            $insert = [
                'jumlahPembelian' => $_POST['jumlahPembelian'],
                'hargaBeli' => $_POST['hargaBeli'],
                'idBarang' => $_POST['idBarang'],
                'idPengguna' => $_SESSION['login']['idPengguna'],
                'idSupplier' => $_POST['idSupplier'],
            ];
            Database::insert('pembelian', $insert, 'Pembelian/index');
            Message::set_message('Data Berhasil Ditambahkan!');
            header("Location: " . BASE_URL . 'Pembelian/index');
        }
    }
    public function edit_pembelian()
    {
        if (isset($_POST["submit"])) {
            $update = [
                'jumlahPembelian' => $_POST['jumlahPembelian'],
                'hargaBeli' => $_POST['hargaBeli'],
                'idBarang' => $_POST['idBarang'],
                'idPengguna' => $_SESSION['login']['idPengguna'],
                'idSupplier' => $_POST['idSupplier'],
            ];
            $where = [
                'idPembelian' => $_POST['idPembelian']
            ];
            Database::update('pembelian', $update, $where, 'Pembelian/index');
            Message::set_message('Data Berhasil Diubah!');
            header("Location: " . BASE_URL . 'Pembelian/index');
        }
    }

    public function delete_pembelian()
    {
        if (isset($_POST["submit"])) {
            Database::delete('pembelian', 'idPembelian', $_POST['idPembelian']);
            Message::set_message('Data Berhasil Dihapus!');
            header("Location: " . BASE_URL . 'Pembelian/index');
        }
    }
}
