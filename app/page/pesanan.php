<?php
if (!$_SESSION['user']=='1') {
	?>
	<script type="text/javascript">document.location='?masukkan=signin'</script>
	<?php
}

?>
<div style="margin:10px 30px">
	<h1 style="font-family: comic sans ms">ADMIN <sub class="mylink">Page</sub></h1>
<?php
if (1+2==3) {
	$data_kosong = mysqli_fetch_array(mysqli_query($l, "SELECT * FROM pesanan"));
}
?>
<div style="overflow-x:auto">
	<table style="margin-top: 30px" class="table">
		<tr class="tr">
			<th class="th">Produk & Jumlah</th>
			<th class="th">Total</th>
			<th class="th">Verifikasi</th>
		</tr>
<?php
if (empty($data_kosong['id_ps'])) {
	?>
		<tr class="tr">
			<td class="td" colspan="5" style="text-align: center">Pesanan Masih Kosong</td>
		</tr>
	<?php
}else{
	$stat_pesanan = mysqli_query($l,"SELECT * FROM pesanan p JOIN user u ON p.user_ps=u.id_user GROUP BY user_ps");
	while ($data_pesanan=mysqli_fetch_array($stat_pesanan)) {
	?>
	<tr class="tr">
		<td class="td" colspan="5"><?php echo $data_pesanan['fullname_user']; ?></td>
	</tr>
	<?php
	
	?>
	<tr class="tr">
		<td class="td">
		<?php
		$stat_pesanan_p = mysqli_query($l,"SELECT * FROM keranjang k JOIN user u ON k.user_kr=u.id_user JOIN produk p ON k.pk_kr=p.id_pk WHERE user_kr=".$data_pesanan['user_ps']." AND status_kr=2 ");
		while ($data_pesanan_p=mysqli_fetch_array($stat_pesanan_p)) {
		?>
			
		<ol><?php echo $data_pesanan_p['nama_pk'] ?>  &#187; jumlah :  <?php echo $data_pesanan_p['jumlah_kr'] ?></ol>
		<?php } ?>
		</td>
	<?php
	$stat_pesanan_u = mysqli_query($l,"SELECT *, SUM(total_ps) as totalPs FROM pesanan p JOIN user u ON p.user_ps=u.id_user WHERE user_ps=".$data_pesanan['user_ps']." ");
	while ($data_pesanan_u=mysqli_fetch_array($stat_pesanan_u)) {
	?>
		<td class="td">
		<?php echo "Rp ".number_format($data_pesanan_u['totalPs']) ?>
		</td>

		<td class="td">
			<form action="?fungsi=selesaiorder" method="POST">
				<input type="text" name="user_ps" value="<?php echo $data_pesanan['user_ps'] ?>" style="display: none;">
				<input class="btn-cari bg-blue" style="font-size: 20px;margin:10px auto;color:#fff;padding: 10px;" value="Selesai &#187;" type="submit">
			</form>
		</td>

	</tr>
	<?php
}
}
}
?>

	</table>
</div>

</div>
<br />
<br />