<?php
// Karena konten sifatnya dinamis, maka dibuat jadi dinamis juga
// Dimana data konten diambil dari variabel ISI yg ada di controller

if($isi) {
	$this->load->view($isi);
}