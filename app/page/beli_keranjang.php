<?php
$a=mysqli_query($l,"UPDATE keranjang SET status_kr=2 where user_kr=".$_SESSION['user']." ");
$b=mysqli_query($l, "INSERT INTO pesanan SET user_ps=".$_SESSION['user'].", total_ps=".$_POST['jumlahKeranjang']." ");
if ($a && $b) {
	?>
	<div id="modalt" class="modal" style="display:block">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h2>Barang Sudah diorder !</h2>
	    </div>
	    <div class="modal-body">
	    <h3>Silahkan Transfer sebesar Rp <?php echo number_format($_POST['jumlahKeranjang']) ?> ke Rekening Kami dan lakukan Konfirmasi sesuai Prosedur !</h3>
	     <a href="?page=keranjang"> <button class="btn-cari bg-blue" style="font-size: 20px;margin:10px auto;color:#fff;padding: 10px;">Keranjang &#187;</button></a>
	     <a href="?"><button class="btn-cari bg-yellow" style="font-size: 20px;margin:10px auto;color:#000;padding: 10px;">Lanjut Belanja &#187;</button></a>
	    </div>
	  </div>
	</div>
	<?php
}else{
	?>
	<script type="text/javascript">document.location='?page=keranjang'</script>
	<?php
}
?>
