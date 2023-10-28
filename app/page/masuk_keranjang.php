<?php
if (empty($_SESSION['user'])) {
	?>
<div id="modalu" class="modal" style="display:block">
  <div class="modal-content">
    <div class="modal-header">
      <h2>Anda harus Login terlebih dahulu !</h2>
    </div>
    <div class="modal-body">
     <a href="?masukkan=signin"> <button class="btn-cari bg-blue" style="font-size: 20px;margin:10px auto;color:#fff;padding: 10px;">Login &#187;</button></a>
    </div>
  </div>
</div>
	<?php
}else{
$data_produk =mysqli_fetch_array(mysqli_query($l,"SELECT * FROM produk where id_pk=".$_POST['pk']." "));
$masukan = mysqli_query($l,"INSERT INTO keranjang SET pk_kr=".$_POST['pk'].", user_kr=".$_SESSION['user'].", subtotal_kr=".$data_produk['harga_pk']." ");
if ($masukan) {
?>
<div id="modalt" class="modal" style="display:block">
  <div class="modal-content">
    <div class="modal-header">
      <h2>Barang Sudah dimasukan ke Keranjang !</h2>
    </div>
    <div class="modal-body">
     <a href="?page=keranjang"> <button class="btn-cari bg-blue" style="font-size: 20px;margin:10px auto;color:#fff;padding: 10px;">Keranjang &#187;</button></a>
     <a href="?"><button class="btn-cari bg-yellow" style="font-size: 20px;margin:10px auto;color:#000;padding: 10px;">Lanjut Belanja &#187;</button></a>
    </div>
  </div>
</div>
<?php
	}
}
?>