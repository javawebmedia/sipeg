<?php
// Proteksi halaman dengan library Simple Login
$this->simple_login->check_login();

// Gabungin semua bagian layout
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');