<?php
if (empty($_SESSION['user'])) {
	?>
	<script type="text/javascript">document.location='?masukkan=signin'</script>
	<?php
}
if (1+1==2) {
	$data_user = mysqli_fetch_array(mysqli_query($l,"SELECT * FROM user where id_user=".$_SESSION['user']." "));
}
?>
<div style="margin:10px 30px">
	<h1 style="font-family: comic sans ms">Keranjang <sub class="mylink"><?php echo $data_user['fullname_user'] ?></sub></h1>
<?php
if (1+2==3) {
	$data_kosong = mysqli_fetch_array(mysqli_query($l, "SELECT * FROM keranjang where user_kr=".$_SESSION['user']." AND status_kr=1 "));
}
?>
<div style="overflow-x:auto">
	<table class="table" style="margin-top: 30px">
		<tr class="tr">
			<th class="th">Nama</th>
			<th class="th">Jumlah</th>
			<th class="th">Harga</th>
			<th class="th">SubTotal</th>
			<th class="th">Hapus ?</th>
		</tr>
<?php
if (empty($data_kosong['id_kr'])) {
	?>
		<tr class="tr">
			<td class="td" colspan="5" style="text-align: center">Keranjang Masih Kosong</td>
		</tr>
	<?php
}else{
	$stat_keranjang = mysqli_query($l,"SELECT * FROM keranjang k join produk p on k.pk_kr=p.id_pk where user_kr=".$_SESSION['user']." AND status_kr=1 ");
	while ($data_keranjang=mysqli_fetch_array($stat_keranjang)) {
	?>
	<tr class="tr">
		<td class="td"><?php echo $data_keranjang['nama_pk'] ?></td>
		<td class="td">
		<form action="?fungsi=ubahjumlahkeranjang" method="POST">
			<input type="text" style="width:100px" name="jumlah" class="searchbar" value="<?php echo $data_keranjang['jumlah_kr'] ?>">
			<input type="text" name="id_kr" value="<?php echo $data_keranjang['id_kr'] ?>" style="display: none">
			<input type="text" name="harga_kr" value="<?php echo $data_keranjang['harga_pk'] ?>" style="display: none">
			<input type="submit" name="ubahjumlah" class="btn-cari bg-blue" style="font-size: 15px;margin:0px auto;color:#fff;padding: 10px;" value="Ubah">
		</form>
		</td>
		<td class="td">Rp <?php echo number_format($data_keranjang['harga_pk']) ?></td>
		<td class="td">Rp <?php echo number_format($data_keranjang['subtotal_kr']) ?></td>
		<td class="td">
		<form action="?fungsi=hapuskeranjang" method="POST">
		<input type="text" name="id_kr" value="<?php echo $data_keranjang['id_kr'] ?>" style="display: none">
		<input class="btn-cari bg-red" style="font-size: 15px;margin:0px auto;color:#fff;padding: 10px;" value="Hapus" type="submit" name="hapuskeranjang">
		</form>
		</td>
	</tr>
	<?php
}
}
?>
	<tr class="tr" style="background: #3399ff;color:#fff">
		<td class="td">Jumlah Belanja</td>
		<td class="td" colspan="4"> Rp
			<?php
			$data_jumlah = mysqli_fetch_array(mysqli_query($l,"SELECT *, SUM(subtotal_kr) as jumlahKeranjang FROM keranjang where user_kr=".$_SESSION['user']." AND status_kr=1 "));
			$jumlahKeranjang = $data_jumlah['jumlahKeranjang'];
			echo number_format($jumlahKeranjang);
			?>
		</td>
	</tr>
	</table>
</div>
<?php
if (empty($data_kosong['id_kr'])) {
}else{
?>
<form action="?page=belikeranjang" method="POST">
<input type="text" name="jumlahKeranjang" value="<?php echo $jumlahKeranjang ?>" style="display: none">
	<input class="btn-cari bg-blue" style="font-size: 20px;margin:10px auto;color:#fff;padding: 10px;" value="Pembayaran &#187;" type="submit">
</form>
<?php } ?>

<br />
<?php
$stat_tagihan = mysqli_query($l, "SELECT *, SUM(total_ps) as jumlahTagihan FROM pesanan where user_ps=".$_SESSION['user']." ");
$data_tagihan = mysqli_fetch_array($stat_tagihan);
if (empty($data_tagihan['id_ps'])) {
	
}else{
	?>
<h3>Tagihan yang belum dibayar : Rp <?php echo number_format($data_tagihan['jumlahTagihan']) ?></h3>
<h3>Cara Melakukan Transaksi ? <a onclick="document.getElementById('caraTransfer').style.display='block' " class="mylink">Disini &#187;</a> </h3>

<div id="caraTransfer" class="modal" style="">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close" onclick="document.getElementById('caraTransfer').style.display='none' ">&times;</span>
        <h2>Cara Transfer</h2>
      </div>
      <div class="modal-body">
       <h1>Cara Transfer</h1>
      </div>
    </div>
  </div>
	<?php
}
?>
</div>
<br />
<br />