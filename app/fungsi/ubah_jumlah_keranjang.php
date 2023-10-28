<?php
$subtotal = $_POST['jumlah'] * $_POST['harga_kr'];
mysqli_query($l,"UPDATE keranjang SET jumlah_kr=".$_POST['jumlah'].", subtotal_kr=".$subtotal." where id_kr=".$_POST['id_kr']." ");
?>
<script type="text/javascript">
	document.location = '?page=keranjang';
</script>