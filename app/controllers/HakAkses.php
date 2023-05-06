<?php

class HakAkses extends Controller
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
        $data['title'] = "Hak Akses";
        $data['role'] = $this->model("PenggunaModel")->getDataById('hak_akses', 'idAkses', $_SESSION['login']['idAkses']);
        $data["hakAkses"] = $this->model("HakAksesModel")->getAllData('hak_akses');
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('hak_akses/index', $data);
        $this->view('templates/wrapper');
        $this->view('templates/footer');
    }

    public function insert_akses()
    {
        if (isset($_POST["submit"])) {
            $insert = [
                'namaAkses' => $_POST['namaAkses'],
                'keterangan' => $_POST['keterangan'],
            ];
            Database::insert('hak_akses', $insert, 'HakAkses/index');
            Message::set_message('Data Berhasil Ditambahkan!');
            header("Location: " . BASE_URL . 'HakAkses/index');
        }
    }
    public function edit_akses()
    {
        if (isset($_POST["submit"])) {
            $update = [
                'namaAkses' => $_POST['namaAkses'],
                'keterangan' => $_POST['keterangan'],
            ];
            $where = [
                'idAkses' => $_POST['idAkses']
            ];
            Database::update('hak_akses', $update, $where, 'HakAkses/index');
            Message::set_message('Data Berhasil Diubah!');
            header("Location: " . BASE_URL . 'HakAkses/index');
        }
    }

    public function delete_akses()
    {
        if (isset($_POST["submit"])) {
            Database::delete('hak_akses', 'idAkses', $_POST['idAkses']);
            Message::set_message('Data Berhasil Dihapus!');
            header("Location: " . BASE_URL . 'HakAkses/index');
        }
    }
}
