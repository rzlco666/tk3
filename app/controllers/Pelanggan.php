<?php

class Pelanggan extends Controller
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
        $data['title'] = "Pelanggan";
        $data['role'] = $this->model("PenggunaModel")->getDataById('hak_akses', 'idAkses', $_SESSION['login']['idAkses']);
        $data["pelanggan"] = $this->model("PelangganModel")->getAllData('pelanggan');
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('pelanggan/index', $data);
        $this->view('templates/wrapper');
        $this->view('templates/footer');
    }

    public function insert_pelanggan()
    {
        if (isset($_POST["submit"])) {
            $insert = [
                'NamaDepan' => $_POST['NamaDepan'],
                'NamaBelakang' => $_POST['NamaBelakang'],
                'alamat' => $_POST['alamat'],
                'noHp' => $_POST['noHp'],
            ];
            Database::insert('pelanggan', $insert, 'Pelanggan/index');
            Message::set_message('Data Berhasil Ditambahkan!');
            header("Location: " . BASE_URL . 'Pelanggan/index');
        }
    }
    public function edit_pelanggan()
    {
        if (isset($_POST["submit"])) {
            $update = [
                'NamaDepan' => $_POST['NamaDepan'],
                'NamaBelakang' => $_POST['NamaBelakang'],
                'alamat' => $_POST['alamat'],
                'noHp' => $_POST['noHp'],
            ];
            $where = [
                'idPelanggan' => $_POST['idPelanggan']
            ];
            Database::update('pelanggan', $update, $where, 'Pelanggan/index');
            Message::set_message('Data Berhasil Diubah!');
            header("Location: " . BASE_URL . 'Pelanggan/index');
        }
    }

    public function delete_pelanggan()
    {
        if (isset($_POST["submit"])) {
            Database::delete('pelanggan', 'idPelanggan', $_POST['idPelanggan']);
            Message::set_message('Data Berhasil Dihapus!');
            header("Location: " . BASE_URL . 'Pelanggan/index');
        }
    }
}
