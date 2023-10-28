<?php
if (isset($_POST['masukkan'])) {
	$signup=mysqli_query($l,"INSERT INTO user SET fullname_user='".$_POST['fullname']."',kontak_user='".$_POST['kontak']."',username_user='".$_POST['username']."',password_user=md5('".$_POST['password']."') ") OR DIE(mysql_error());
	if ($signup) {
		?>
	<script type="text/javascript">
		alert('Berhasil Membuat Akun ! Ayo Login Dahulu !');
		document.location = '?masukkan=signin';
	</script>
		<?php
	}else{
		?>
	<script type="text/javascript">
		alert('Gagal Menambahkan User ! Harap Mengisi Lengkap !');
		document.location = '?masukkan=signup';
	</script>
		<?php
	}
}
?>