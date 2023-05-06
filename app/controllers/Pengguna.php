<?php

class Pengguna extends Controller
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
        $data['title'] = "Pengguna";
        $data['role'] = $this->model("PenggunaModel")->getDataById('hak_akses', 'idAkses', $_SESSION['login']['idAkses']);
        $data["hakAkses"] = $this->model("HakAksesModel")->getAllData('hak_akses');
        $data["pengguna"] = $this->model("PenggunaModel")->getAllData('pengguna');
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('pengguna/index', $data);
        $this->view('templates/wrapper');
        $this->view('templates/footer');
    }

    public function insert_pengguna()
    {
        if (isset($_POST["submit"])) {
            $insert = [
                'namaPengguna' => $_POST['namaPengguna'],
                'password' => $_POST['password'],
                'namaDepan' => $_POST['namaDepan'],
                'namaBelakang' => $_POST['namaBelakang'],
                'noHp' => $_POST['noHp'],
                'alamat' => $_POST['alamat'],
                'idAkses' => $_POST['idAkses'],
            ];
            Database::insert('pengguna', $insert, 'Pengguna/index');
            Message::set_message('Data Berhasil Ditambahkan!');
            header("Location: " . BASE_URL . 'Pengguna/index');
        }
    }
    public function edit_pengguna()
    {
        if (isset($_POST["submit"])) {
            $update = [
                'namaPengguna' => $_POST['namaPengguna'],
                'password' => $_POST['password'],
                'namaDepan' => $_POST['namaDepan'],
                'namaBelakang' => $_POST['namaBelakang'],
                'noHp' => $_POST['noHp'],
                'alamat' => $_POST['alamat'],
                'idAkses' => $_POST['idAkses'],
            ];
            $where = [
                'idPengguna' => $_POST['idPengguna']
            ];
            Database::update('pengguna', $update, $where, 'Pengguna/index');
            Message::set_message('Data Berhasil Diubah!');
            header("Location: " . BASE_URL . 'Pengguna/index');
        }
    }

    public function delete_pengguna()
    {
        if (isset($_POST["submit"])) {
            Database::delete('pengguna', 'idPengguna', $_POST['idPengguna']);
            Message::set_message('Data Berhasil Dihapus!');
            header("Location: " . BASE_URL . 'Pengguna/index');
        }
    }
}
