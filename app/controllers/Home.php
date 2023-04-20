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
        //$data["users"] = $this->model("HomeModel")->getAllData('users');
        $this->view('templates/header', $data);
        if ($_SESSION['login']['idAkses'] == 1) {
            $this->view('home/admin/index', $data);
        }else {
            $this->view('home/pengguna/index', $data);
        }
        $this->view('templates/footer');
    }
}
