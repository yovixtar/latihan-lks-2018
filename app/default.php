<?php
?>
<!DOCTYPE html>
<html>
<head>
  <title>Khazim Muhamka | LKS Kab Pekalongan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="Shortcut Icon" href="/favicon.ico" type="image/x-icon" />
  <meta name="description" content="Web Latihan LKS 2018 Khazim Fikri Al-Fadhli" />
  <meta name="keywords" content="" />
  <link rel="stylesheet" type="text/css" href="assets/my.css">
  <script type="text/javascript">
    function openNav() {
        document.getElementById("mySidenavmenu").style.width = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenavmenu").style.width = "0";
        document.body.style.backgroundColor = "white";
    }
    function openSearch() {
        document.getElementById("mySidenavsearch").style.width = "100%";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeSearch() {
        document.getElementById("mySidenavsearch").style.width = "0";
        document.body.style.backgroundColor = "white";
    }
    function dropdownSidenav() {
        document.getElementById("cat-sidenav").classList.toggle("show");
    }
  </script>
  <style type="text/css">
  
  </style>
</head>
<body>

<div id="main">
<header>
<div class="navbar">
  <a href="index.php"><h1 class="brand">E-Comerce</h1></a>
  <div class="dropdown" style="padding-left: 2px;">
    <button class="dropbtn">Kategory &#187;
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="?page=kategori&key=laptop">Laptop</a>
    </div>
  </div> 
  <div class="akun-btn">
    <?php
    if (empty($_SESSION['user'])) {
      ?>
      <div class="btn-group">
      <button class="group-next bg-blue" style="float: left;" id="btnSignin">Sign In</button>
      <button class="group-next bg-yellow" style="color: #000;float: left;" id="btnSignup">Sign Up</button>
    </div>
      <?php
    }else{
      ?>
      <div class="btn-group">
      <button class="group-next bg-blue" style="float: left;" id="btnAkun">Akun</button>
    </div>
    <?php
    }
    ?>
  </div>
  <div class="search-div btn-group">
    <form action="index.php?page=search" method="GET">
  <input type="text" name="page" value="search" style="display: none">
      <input class="searchbar" style="float: right;margin-right: 10px;" type="text" placeholder="Mau Belanja Apa Hari ini ?" name="search">
      <button class="btn-cari bg-green" type="submit" style="float:right;">Cari</button>
    </form>
  </div>
  
  <!--Modal Signin & SignUp-->
  <div id="modalSignin" class="modal" style="">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close closeSignin">&times;</span>
        <h2>Sign In</h2>
      </div>
      <div class="modal-body">
        <form action="?fungsi=signin" method="POST">
          <input class="searchbar" type="text" style="width: 100%;padding: 10px;" placeholder="Username" name="username"><br />
          <input class="searchbar" type="password" style="width: 100%;padding: 10px;" placeholder="Password" name="password"><br /><br />
          <input type="text" name="masukkan" value="" style="display: none">
          <button class="btn-cari bg-blue" style="width: 100%;padding: 10px;color:#fff;font-family: comic sans ms;font-size:20px" type="submit">Sign In</button>
        </form><br />
      </div>
    </div>
  </div>
  
  <div id="modalSignup" class="modal" style="">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close closeSignup">&times;</span>
        <h2>Sign Up</h2>
      </div>
      <div class="modal-body">
        <form action="?fungsi=signup" method="POST">
        <br />
        <label>Nama Lengkap</label>
          <input class="searchbar" type="text" style="width: 100%;padding: 10px;" placeholder="Ex : Khazim FIkri Al Fadhli" name="fullname"><br /><br />
        <label>Nomor HP</label>
          <input class="searchbar" type="text" style="width: 100%;padding: 10px;" placeholder="Ex : 085225630031" name="kontak" pattern="\d*" maxlength="13"><br /><br />
        <label>Username</label>
          <input class="searchbar" type="text" style="width: 100%;padding: 10px;" placeholder="Ex : muhamkaquh" name="username"><br /><br />
        <label>Password</label>
          <input class="searchbar" type="password" style="width: 100%;padding: 10px;" placeholder="Ex : KotaBatik" name="password"><br /><br />
          <input type="text" name="masukkan" value="" style="display: none">
          <button class="btn-cari bg-blue" style="width: 100%;padding: 10px;color:#fff;font-family: comic sans ms;font-size:20px" type="submit">Sign Up</button>
        </form><br />
      </div>
    </div>
  </div>
  

  <script>  
  var modalSignin = document.getElementById('modalSignin');
  var btnSignin = document.getElementById("btnSignin");
  var spanSignin = document.getElementsByClassName("closeSignin")[0];

  btnSignin.onclick = function() {
      modalSignin.style.display = "block";
  }
  spanSignin.onclick = function() {
      modalSignin.style.display = "none";
  }
  window.onclick = function(event) {
      if (event.target == modalSignin) {
          modalSignin.style.display = "none";
      }
  }
  
  var modalSignup = document.getElementById('modalSignup');
  var btnSignup = document.getElementById("btnSignup");
  var spanSignup = document.getElementsByClassName("closeSignup")[0];

  btnSignup.onclick = function() {
      modalSignup.style.display = "block";
  }
  spanSignup.onclick = function() {
      modalSignup.style.display = "none";
  }
  window.onclick = function(event) {
      if (event.target == modalSignup) {
          modalSignup.style.display = "none";
      }
  }
  </script>
  
  <?php
  if (isset($_SESSION['user'])) {
    $modalAkun=mysqli_query($l,"SELECT * FROM user where id_user =".$_SESSION['user']." ");
    $modalAkun_Data=mysqli_fetch_array($modalAkun);
  }
  ?>
  <div id="modalAkun" class="modal" style="">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close closeAkun">&times;</span>
        <h2><?php echo "Profile ".$modalAkun_Data['fullname_user']; ?></h2>
      </div>
      <div class="modal-body">
       <a href="?page=pesanan" style="<?php if($_SESSION['user']=='1'){echo "display:block";}else{echo "display:none";} ?>"> <button class="btn-cari bg-blue" style="font-size: 20px;margin:10px auto;color:#fff;padding: 10px;">Pesanan</button></a>
       <a href="?page=keranjang" style="<?php if($_SESSION['user']=='1'){echo "display:none";}else{echo "display:block";} ?>"> <button class="btn-cari bg-blue" style="font-size: 20px;margin:10px auto;color:#fff;padding: 10px;">Keranjang</button></a>
       <a href="?fungsi=logout"> <button class="btn-cari bg-green" id="btnUrutkan" style="font-size: 20px;margin:10px auto;color:#fff;padding: 10px;">Logout</button></a>
      </div>
    </div>
  </div>
  
  <script type="text/javascript">
    var modalAkun = document.getElementById('modalAkun');
  var btnAkun = document.getElementById("btnAkun");
  var spanAkun = document.getElementsByClassName("closeAkun")[0];

  btnAkun.onclick = function() {
      modalAkun.style.display = "block";
  }
  spanAkun.onclick = function() {
      modalAkun.style.display = "none";
  }
  window.onclick = function(event) {
      if (event.target == modalAkun) {
          modalAkun.style.display = "none";
      }
  }
  </script>
</div>

<div class="navbar-mobile">
<span class="btn-menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
<a href="index.php"><h1 class="brand">E-C</h1></a>
<button class="btn-cari bg-blue" onclick="openSearch()" style="float:right;width: 60%;padding: 2px;font-family:comic sans ms;font-size: 25px;color: #fff">Cari Produk</button>
</div>

<div id="mySidenavmenu" class="sidenavmenu">
  <a href="javascript:void(0)" style="position: absolute;;text-decoration: none;font-size: 50px;" class="closebtn" onclick="closeNav()">&times;</a>
<div style="background: #4CAF50;padding: 10px;color: #fff">
  <h1 class="brand" style="margin-right: 5px;">E-Comerce</h1>Menu
</div>
  <a class="menu-sidenav" href="index.php">Home</a>
  <?php
  if (empty($_SESSION['user'])) {
    ?>
    <a class="menu-sidenav" href="#" id="btnSignin-m">Sign In</a>
    <a class="menu-sidenav" href="#" id="btnSignup-m">Sign Up</a>
    <?php
  }else{
    ?>
    <a class="menu-sidenav" href="#" id="btnAkun_m">Akun</a>
    <?php
  }
  ?>
  <a class="menu-sidenav" onclick="dropdownSidenav()">Kategori</a>
  <div class="dropdown-content" id="cat-sidenav" style="margin-left:25px;">
      <a class="menu-sidenav" style="font-size: 20px" href="?page=kategori&key=laptop">Laptop</a>
  </div>
  <a class="menu-sidenav" href="#hubungikami">Bantuan</a>
  
</div>

<div id="modalSignin-m" class="modal" style="<?php if($_GET['masukkan'] == 'signin'){echo "display: block";}else{} ?>">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close closeSignin-m">&times;</span>
        <h2>Sign In</h2>
      </div>
      <div class="modal-body">
        <form action="?fungsi=signin" method="POST">
          <input class="searchbar" type="text" style="width: 100%;padding: 10px;" placeholder="Username" name="username"><br />
          <input class="searchbar" type="password" style="width: 100%;padding: 10px;" placeholder="Password" name="password"><br /><br />
          <input type="text" name="masukkan" value="" style="display: none">
          <button class="btn-cari bg-blue" style="width: 100%;padding: 10px;color:#fff;font-family: comic sans ms;font-size:20px" type="submit">Sign In</button>
        </form><br />
        Belum punya Akun ? <a href="?masukkan=signup" class="mylink">Daftar Sekarang !</a>
        <br />
        <br />
      </div>
    </div>
  </div>
  
  <div id="modalSignup-m" class="modal" style="<?php if($_GET['masukkan'] == 'signup'){echo "display: block";}else{} ?>">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close closeSignup-m">&times;</span>
        <h2>Sign Up</h2>
      </div>
      <div class="modal-body">
        <form action="?fungsi=signup" method="POST">
        <br />
        <label>Nama Lengkap</label>
          <input class="searchbar" type="text" style="width: 100%;padding: 10px;" placeholder="Ex : Khazim FIkri Al Fadhli" name="fullname"><br /><br />
        <label>Nomor HP</label>
          <input class="searchbar" type="text" style="width: 100%;padding: 10px;" placeholder="Ex : 085225630031" name="kontak" pattern="\d*" maxlength="13"><br /><br />
        <label>Username</label>
          <input class="searchbar" type="text" style="width: 100%;padding: 10px;" placeholder="Ex : muhamkaquh" name="username"><br /><br />
        <label>Password</label>
          <input class="searchbar" type="password" style="width: 100%;padding: 10px;" placeholder="Ex : KotaBatik" name="password"><br /><br />
          <input type="text" name="masukkan" value="" style="display: none">
          <button class="btn-cari bg-blue" style="width: 100%;padding: 10px;color:#fff;font-family: comic sans ms;font-size:20px" type="submit">Sign Up</button>
        </form><br />
      </div>
    </div>

  </div>
  <script type="text/javascript">
    
  var modalSignin_m = document.getElementById('modalSignin-m');
  var btnSignin_m = document.getElementById("btnSignin-m");
  var spanSignin_m = document.getElementsByClassName("closeSignin-m")[0];

  btnSignin_m.onclick = function() {
      modalSignin_m.style.display = "block";
  }

  spanSignin_m.onclick = function() {
      modalSignin_m.style.display = "none";
  }

  window.onclick = function(event) {
      if (event.target == modalSignin_m) {
          modalSignin_m.style.display = "none";
      }
  }
  
  var modalSignup_m = document.getElementById('modalSignup-m');
  var btnSignup_m = document.getElementById("btnSignup-m");
  var spanSignup_m = document.getElementsByClassName("closeSignup-m")[0];

  btnSignup_m.onclick = function() {
      modalSignup_m.style.display = "block";
  }

  spanSignup_m.onclick = function() {
      modalSignup_m.style.display = "none";
  }

  window.onclick = function(event) {
      if (event.target == modalSignup_m) {
          modalSignup_m.style.display = "none";
      }
  }
  </script>
    <div id="modalAkun_m" class="modal" style="">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close closeAkun_m">&times;</span>
        <h2><?php echo "Profile ".$modalAkun_Data['fullname_user']; ?></h2>
      </div>
      <div class="modal-body">
       <a href="?page=pesanan" style="<?php if($_SESSION['user']=='1'){echo "display:block";}else{echo "display:none";} ?>"> <button class="btn-cari bg-blue" style="font-size: 20px;margin:10px auto;color:#fff;padding: 10px;">Pesanan</button></a>
       <a href="?page=keranjang" style="<?php if($_SESSION['user']=='1'){echo "display:none";}else{echo "display:block";} ?>"> <button class="btn-cari bg-blue" style="font-size: 20px;margin:10px auto;color:#fff;padding: 10px;">Keranjang</button></a>
       <a href="?fungsi=logout"> <button class="btn-cari bg-green" id="btnUrutkan" style="font-size: 20px;margin:10px auto;color:#fff;padding: 10px;">Logout</button></a>
      </div>
    </div>
  </div>
  
  <script type="text/javascript">
    var modalAkun_m = document.getElementById('modalAkun_m');
  var btnAkun_m = document.getElementById("btnAkun_m");
  var spanAkun_m = document.getElementsByClassName("closeAkun_m")[0];

  btnAkun_m.onclick = function() {
      modalAkun_m.style.display = "block";
  }
  spanAkun_m.onclick = function() {
      modalAkun_m.style.display = "none";
  }
  window.onclick = function(event) {
      if (event.target == modalAkun_m) {
          modalAkun_m.style.display = "none";
      }
  }
  </script>

<div id="mySidenavsearch" class="sidenavmenu">
  <a href="javascript:void(0)" style="position: absolute;;text-decoration: none;font-size: 50px;" class="closebtn" onclick="closeSearch()">&times;</a>
<div style="background: #4CAF50;padding: 10px;color: #fff">
  <h1 class="brand" style="margin-right: 5px;">E-Comerce</h1>Search
</div>
<center>
<form action="index.php?page=search" method="GET">
  <input type="text" name="page" value="search" style="display: none"><br />
  <input type="text" name="search" class="searchbar" style="width: 90%;border:1px solid #888;border-radius:5px;margin-bottom: 5px;" placeholder="Mau Belanja Apa Hari ini ?"><br />
  <input type="submit" class="btn-cari bg-blue" style="padding: 10px;font-size: 20px;font-family: comic sans ms;" value="Cari Produk">
</form>
</center>
</div>
</header>


<?php
$sw=isset($_GET['page']) ? $_GET['page'] : null;
switch ($sw) {
  case 'kategori':
    include 'app/page/kategori.php';
    break;
  case 'search':
    include 'app/page/cari.php';
    break;
  case 'detailproduk':
    include 'app/page/detail_produk.php';
    break;
  case 'masukkeranjang':
    include 'app/page/masuk_keranjang.php';
    break;
  case 'keranjang':
    include 'app/page/keranjang.php';
    break;
  case 'belikeranjang':
    include 'app/page/beli_keranjang.php';
    break;
  case 'pesanan':
    include 'app/page/pesanan.php';
    break;
  
  default:
    include 'app/page/default.php';
    break;
}
?>


</div>
<footer>
  <div class="tabfooter">
  <button class="tablinks" onclick="openTabFooter(event, 'about')" id="footerOpen">About</button>
  <button class="tablinks" onclick="openTabFooter(event, 'contact')">Contact</button>
</div>

<div id="about" class="tabfootercontent">
  <h3>About Us</h3>
  <p>Ini adalah web buatan Khazim STAR</p>
</div>

<div id="contact" class="tabfootercontent">
<h3>Contact Us</h3>
<ol>
      <li><p align="left">Email = khazim.fikri.9f@gmail.com</p></li>
      <li><p align="left">WA = 085225630031</p></li>
      <li><p align="left">SMS/Telp = 085225630031</p></li>
</ol>
</div>

<script>
function openTabFooter(evt, titleFooter) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabfootercontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(titleFooter).style.display = "block";
    evt.currentTarget.className += " active";
}

// default
document.getElementById("footerOpen").click();
</script>
</footer>
<script type="text/javascript">
//accordion
var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active2");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

//slideshow
var slideIndex = 0;
showSlides();
function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // 2 detik
}
</script>
</body>
</html>