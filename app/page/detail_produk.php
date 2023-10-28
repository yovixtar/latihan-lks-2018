<script>
function imageZoom(imgID, resultID) {
  var img, lens, result, cx, cy;
  img = document.getElementById(imgID);
  result = document.getElementById(resultID);
  lens = document.createElement("DIV");
  lens.setAttribute("class", "img-zoom-lens");
  img.parentElement.insertBefore(lens, img);
  cx = result.offsetWidth / lens.offsetWidth;
  cy = result.offsetHeight / lens.offsetHeight;
  result.style.backgroundImage = "url('" + img.src + "')";
  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
  lens.addEventListener("mousemove", moveLens);
  img.addEventListener("mousemove", moveLens);
  lens.addEventListener("touchmove", moveLens);
  img.addEventListener("touchmove", moveLens);
  function moveLens(e) {
    var pos, x, y;
    e.preventDefault();
    pos = getCursorPos(e);
    x = pos.x - (lens.offsetWidth / 2);
    y = pos.y - (lens.offsetHeight / 2);
    if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
    if (x < 0) {x = 0;}
    if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
    if (y < 0) {y = 0;}
    lens.style.left = x + "px";
    lens.style.top = y + "px";
    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    a = img.getBoundingClientRect();
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>

<div class="detail_produk_area">
<?php 
$detail_page=mysqli_query($l,"SELECT * FROM produk p JOIN kategori k On p.kategori_pk=k.id_cat JOIN merek m ON p.merek_pk=m.id_mk WHERE id_pk=".$_GET['idx']." ");
$detail_page_data=mysqli_fetch_array($detail_page);
?>
<table class="tb-detail-gambar">
	<tr>
		<td>
		<h1><?php echo 'Laptop '.$detail_page_data['nama_pk']; ?></h1>
		</td>
		<td class="perbesar-gambar">
		<h2 style="margin-bottom: 1px">Perbesar Gambar &#187;</h2>
		</td>
	</tr>
	<tr>
		<td>
			<div class="img-zoom-container dekstop-img">
			  <img id="myimage" src="img/<?php echo $detail_page_data['foto_pk']; ?>" class="img-detail">
			</div>
      <div class="img-zoom-container mobile-img">
        <img id="myimage" src="img/<?php echo $detail_page_data['foto_pk']; ?>" class="img-detail">
      </div>
		</td>
		<td>
		<div class="perbesar-gambar">
			  <div id="myresult" class="img-zoom-result"></div>
			 </div>
		</td>
	</tr>
</table>

<table class="tb-detail-pk">
	<tr class="tr-detail-pk">
		<td class="td-detail-pk">Ketegori</td>
		<td class="td-detail-pk"><?php echo $detail_page_data['nama_cat'] ?></td>
	</tr>
	<tr class="tr-detail-pk">
		<td class="td-detail-pk">Merek</td>
		<td class="td-detail-pk"><?php echo $detail_page_data['nama_mk'] ?></td>
	</tr>
	<tr class="tr-detail-pk">
		<td class="td-detail-pk">Stok</td>
		<td class="td-detail-pk"><?php echo $detail_page_data['stok_pk'] ?></td>
	</tr>
	<tr class="tr-detail-pk">
		<td class="td-detail-pk">Harga</td>
		<td class="td-detail-pk">Rp <?php echo number_format($detail_page_data['harga_pk']) ?></td>
	</tr>
</table>
<br />
<button class="accordion">Deskripsi Produk &#187;</button>
<div class="panel" style="display: block;">
		<p> <?php echo $detail_page_data['detail_pk']; ?> </p>
</div>
<br />
<button class="accordion">Share &#187;</button>
<div class="panel" style="">
<div style="margin:10px">
<a href="#" style="text-decoration: none;color:#f00">Google+</a> <br />
<a href="#" style="text-decoration: none;color:#f00">Facebook</a> <br />
<a href="#" style="text-decoration: none;color:#f00">Twiter</a> <br />
</div>
</div>
<br />

<form action="?page=masukkeranjang" method="POST">
  <input type="submit" name="kekeranjang" class="btn-beli" value="Beli Sekarang &#187;">
  <input type="text" name="pk" value="<?php echo $detail_page_data['id_pk'] ?>" style="display: none">
</form>
</div>



<script>
imageZoom("myimage", "myresult");
</script>
<br />
<br />