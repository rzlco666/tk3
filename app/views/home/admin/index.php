<body>
<?= Message::show_message() ?>
<p>Selamat Datang, <?= $_SESSION['login']['namaDepan'].' '.$_SESSION['login']['namaBelakang'] ?> ini merupakan halaman admin</p>
<a href="<?= BASE_URL . 'auth/_logout'; ?>">Logout</a>
</body>