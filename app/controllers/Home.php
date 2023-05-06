<?php

class Home extends Controller
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
        $data['title'] = "Home";
        $data['role'] = $this->model("PenggunaModel")->getDataById('hak_akses', 'idAkses', $_SESSION['login']['idAkses']);
        $data["rugi_laba"] = $this->model("BarangModel")->rugiLaba();
        $data["paket_penjualan"] = $this->model("PenjualanModel")->paketPenjualan();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('home/index', $data);
        $this->view('templates/wrapper');
        $this->view('templates/footer');
    }
}
