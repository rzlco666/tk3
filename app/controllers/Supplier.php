<?php

class Supplier extends Controller
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
        $data['title'] = "Supplier";
        $data['role'] = $this->model("PenggunaModel")->getDataById('hak_akses', 'idAkses', $_SESSION['login']['idAkses']);
        $data["supplier"] = $this->model("SupplierModel")->getAllData('supplier');
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('supplier/index', $data);
        $this->view('templates/wrapper');
        $this->view('templates/footer');
    }

    public function insert_supplier()
    {
        if (isset($_POST["submit"])) {
            $insert = [
                'namaSupplier' => $_POST['namaSupplier'],
                'alamat' => $_POST['alamat'],
                'noHp' => $_POST['noHp'],
            ];
            Database::insert('supplier', $insert, 'Supplier/index');
            Message::set_message('Data Berhasil Ditambahkan!');
            header("Location: " . BASE_URL . 'Supplier/index');
        }
    }
    public function edit_supplier()
    {
        if (isset($_POST["submit"])) {
            $update = [
                'namaSupplier' => $_POST['namaSupplier'],
                'alamat' => $_POST['alamat'],
                'noHp' => $_POST['noHp'],
            ];
            $where = [
                'idSupplier' => $_POST['idSupplier']
            ];
            Database::update('supplier', $update, $where, 'Supplier/index');
            Message::set_message('Data Berhasil Diubah!');
            header("Location: " . BASE_URL . 'Supplier/index');
        }
    }

    public function delete_supplier()
    {
        if (isset($_POST["submit"])) {
            Database::delete('supplier', 'idSupplier', $_POST['idSupplier']);
            Message::set_message('Data Berhasil Dihapus!');
            header("Location: " . BASE_URL . 'Supplier/index');
        }
    }
}
