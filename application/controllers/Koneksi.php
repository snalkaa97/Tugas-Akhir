<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koneksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $db = "tugas-akhir";

        $koneksi = mysqli_connect("localhost", "root", "");
        if (!$koneksi) {
            die("koneksi ke database Gagal..");
        }
        //else echo "koneksi Berhasil";

        $cek = mysqli_select_db($db, $koneksi);
        if (!$cek) {
            die("<br>Database Gagal di Temukan ");
        }
    }
}
