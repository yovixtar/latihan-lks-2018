<?php
$a=mysqli_query($l,"DELETE FROM keranjang WHERE user_kr=".$_POST['user_ps']." AND status_kr=2 ");
$b=mysqli_query($l, "DELETE FROM pesanan WHERE user_ps=".$_POST['user_ps']."");
if ($a && $b) {
	?>
	<script type="text/javascript">alert('Berhasil !');document.location='?page=pesanan'</script>
	<?php
}else{
	?>
	<script type="text/javascript">alert('Gagal !');document.location='?page=pesanan'</script>
	<?php
}
?>
