<?php

class Barang extends Controller
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
        $data['title'] = "Barang";
        $data['role'] = $this->model("PenggunaModel")->getDataById('hak_akses', 'idAkses', $_SESSION['login']['idAkses']);
        $data["pengguna"] = $this->model("PenggunaModel")->getAllData('pengguna');
        $data["barang"] = $this->model("BarangModel")->getAllData('barang');
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('barang/index', $data);
        $this->view('templates/wrapper');
        $this->view('templates/footer');
    }

    public function insert_barang()
    {
        if (isset($_POST["submit"])) {
            $insert = [
                'namaBarang' => $_POST['namaBarang'],
                'keterangan' => $_POST['keterangan'],
                'satuan' => $_POST['satuan'],
                'idPengguna' => $_SESSION['login']['idPengguna'],
            ];
            Database::insert('barang', $insert, 'Barang/index');
            Message::set_message('Data Berhasil Ditambahkan!');
            header("Location: " . BASE_URL . 'Barang/index');
        }
    }
    public function edit_barang()
    {
        if (isset($_POST["submit"])) {
            $update = [
                'namaBarang' => $_POST['namaBarang'],
                'keterangan' => $_POST['keterangan'],
                'satuan' => $_POST['satuan'],
                'idPengguna' => $_SESSION['login']['idPengguna'],
            ];
            $where = [
                'idBarang' => $_POST['idBarang']
            ];
            Database::update('barang', $update, $where, 'Barang/index');
            Message::set_message('Data Berhasil Diubah!');
            header("Location: " . BASE_URL . 'Barang/index');
        }
    }

    public function delete_barang()
    {
        if (isset($_POST["submit"])) {
            Database::delete('barang', 'idBarang', $_POST['idBarang']);
            Message::set_message('Data Berhasil Dihapus!');
            header("Location: " . BASE_URL . 'Barang/index');
        }
    }
}
