<?php
session_start();
include 'base/koneksi.php';

$sw_default = isset($_GET['fungsi']) ? $_GET['fungsi'] : null;
switch ($sw_default) {
  case 'signup':
    include 'app/fungsi/signup.php';
    break;
  case 'signin':
    include 'app/fungsi/signin.php';
    break;
  case 'logout':
    include 'app/fungsi/logout.php';
    break;
  case 'hapuskeranjang':
    include 'app/fungsi/hapus_keranjang.php';
    break;
  case 'ubahjumlahkeranjang':
    include 'app/fungsi/ubah_jumlah_keranjang.php';
    break;
  case 'selesaiorder':
    include 'app/fungsi/selesai_order.php';
    break;
  
  default:
    include 'app/default.php';
    break;
}
?>