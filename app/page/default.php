<!--Content-->
<div class="iklan-area" style="margin-bottom: 10px;">
		<div class="iklan-1"><div style="width: 100%"><center><h1>Promo Hari Ini !</h1></center></div></div>
		<div class="iklan-2"><div style="width: 100%"><center><h1>Promo</h1></center></div></div>
		<div class="iklan-3"><div style="width: 100%"><center><h1>Promo</h1></center></div></div>
</div>

<div class="slideshow-area">
<div class="slideshow-container">
<div class="mySlides fade">
  <img class="img-slide" src="img/img_nature_wide.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img class="img-slide" src="img/img_fjords_wide.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img class="img-slide" src="img/img_mountains_wide.jpg" style="width:100%">
</div>
</div>
<br>
<div style="text-align:center;display: none">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
</div>

<button class="accordion">Cara Belanja di E-Comerce &#187;</button>
<div class="panel">
		<ol>
			<li><p align="left">Pilih Produk</p></li>
			<li><p align="left">Klik Beli</p></li>
			<li><p align="left">Alamat Pengiriman</p></li>
			<li><p align="left">Pilih Paket Pengiriman (JNE/Wahana/Tiki/JNT)</p></li>
			<li><p align="left">Pembayaran (BCA/BRI/Mandiri/Permata)</p></li>
			<li><p align="left">Konfirmasi Pembayaran (Beri Waktu)</p></li>
		</ol>
</div>
<br />
<button class="accordion" id="hubungikami">Hubungi Kami &#187;</button>
<div class="panel">
		<ol>
			<li><p align="left">Email = khazim.fikri.9f@gmail.com</p></li>
			<li><p align="left">WA = 085225630031</p></li>
			<li><p align="left">SMS/Telp = 085225630031</p></li>
		</ol>
</div>

<?php
$kategori_area=mysqli_query($l,"SELECT * FROM kategori");
while ($kategori_area_data=mysqli_fetch_array($kategori_area)) {
?>
<div class="cat-area" style="background-color: <?php echo $kategori_area_data['warna_cat']; ?>">
  <div class="text-cat-area">
    <h1>Kategori : <?php echo $kategori_area_data['nama_cat']; ?></h1>
  </div><br />
  <center>
  <div class="produk-area-cat">
  <?php
  if ($kategori_area_data['id_cat']) {
   $produk_cat=mysqli_query($l,"SELECT * FROM produk JOIN kategori ON produk.kategori_pk=kategori.id_cat WHERE id_cat=".$kategori_area_data['id_cat']." ");
   while ($produk_cat_data=mysqli_fetch_array($produk_cat)) {
   
  ?>
    <div class="kotakproduk" title="<?php echo $produk_cat_data['nama_pk']; ?>">
      <div class="container-kp">
      <font class="ket-kotak-produk">Laptop <?php echo $produk_cat_data['nama_pk']; ?></font><br />
      <font class="ket-kotak-produk" style="color: #4CAF50;">Rp <?php echo number_format($produk_cat_data['harga_pk']); ?></font>
        <img src="img/<?php echo $produk_cat_data['foto_pk']; ?>" alt="<?php echo $produk_cat_data['nama_pk']; ?>" class="image-kp">
        <div class="overlay-kp">
          <div class="text-kp"><a href="?page=detailproduk&idx=<?php echo $produk_cat_data['id_pk']; ?>"><button class="btn-kp">Detail &#187;</button></a></div>
        </div>
      </div>
    </div>
  <?php }} ?>
  </div>
  </center>
  <div class="text-cat-area">
  <a href="?page=kategori&key=<?php echo $kategori_area_data['link_cat']; ?>">
    <button class="btn-cari bg-blue" style="padding:10px;font-size: 20px;font-family:comic sans ms;color: #fff;">Lihat Lainnya &#187;</button>
  </a>
  </div>
</div>
<?php
}
?>
<!--End Content-->