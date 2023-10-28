<?php
mysqli_query($l,"DELETE FROM keranjang where id_kr=".$_POST['id_kr']." ");
?>
<script type="text/javascript">
	document.location = '?page=keranjang';
</script>