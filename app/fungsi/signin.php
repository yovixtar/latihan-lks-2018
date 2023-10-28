<?php
if (isset($_POST['masukkan'])) {
	$signin=mysqli_query($l,"SELECT * FROM user WHERE username_user='".$_POST['username']."' AND password_user=md5('".$_POST['password']."') ");
	$signin_data=mysqli_fetch_array($signin);
	if ($signin_data) {
		$_SESSION['user'] = $signin_data['id_user'];
		?>
		<script type="text/javascript">
			alert('SELAMAT DATANG <?php echo $signin_data['fullname_user'] ?>');
			document.location='?'
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert('Username || Password, Salah !');
			document.location='?masukkan=signin'
		</script>
		<?php
	}
}
?>