<?php 
include "config/koneksi.php";
include 'obat/f_obat.php';
session_start();
if (!isset($_SESSION["submit"])) {
    echo "
        <script>
        	alert('Login Terlebih Dahulu :');
    		document.location.href = 'login.php';
        </script>";
}
if (isset($_POST["simpan"])) {
    add($_POST);
}

$id_barang=$_GET['id_barang'];
$query="SELECT * FROM obat WHERE id_barang='$id_barang'";
$sql=mysqli_query($conn, $query);
$data=mysqli_fetch_array($sql);

$jumlah = 1;
$hasil = $data['harga'] * $jumlah;
?>
<!DOCTYPE html>
<html>
<head>
<title>Apotik Store Online </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- js -->
   <script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<!--- start-rate---->
<script src="js/jstarbox.js"></script>
	<link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>

</head>
<body>
<div class="header">

		<div class="container">
			
			<div class="logo">
				<h1 ><a href="index.html">Apotik Store<span>The Best Market</span></a></h1>
			</div>
			<div class="head-t">
				<ul class="card">
					<li><a href="login.php" ><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
					<li><a href="register.php" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
					<li><a href="about.html" ><i class="fa fa-file-text-o" aria-hidden="true"></i>About Me</a></li>
					<li><a href="shipping.html" ><i class="fa fa-ship" aria-hidden="true"></i>Shipping</a></li>
				</ul>	
			</div>

				<div class="nav-top">
					<nav class="navbar navbar-default">
					
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						
					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav ">
							<li ><a href="index.php" class="hyper "><span>Home</span></a></li>	
							<li ><a href="obat.php" class="hyper"><span>Obat</span></a></li>
							<li ><a href="perlengkapan.php" class="hyper"><span>Perlengkapan Medis</span></a></li>
							<li><a href="contact.html" class="hyper"><span>Contact Us</span></a></li>
						</ul>
					</div>
					</nav>
					<div class="cart">
						<span class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
					</div>
					<div class="clearfix"></div>
				</div>
					
				</div>			
</div>
<div class="banner-top">
	<div class="container">
		<h3 >Wishlist</h3>
		<h4><a href="index.php">Home</a><label>/</label>Wishlist</h4>
		<div class="clearfix"> </div>
	</div>
</div>

		<div class="check-out">	 
		<div class="container">	 
	<div class="spec ">
		<h3>Wishlist</h3>
			<div class="ser-t">
				<b></b>
				<span><i></i></span>
				<b class="line"></b>
			</div>
			</div>
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cross').fadeOut('slow', function(c){
							$('.cross').remove();
						});
						});	  
					});
				</script>
				<script>$(document).ready(function(c) {
						$('.close2').on('click', function(c){
							$('.cross1').fadeOut('slow', function(c){
								$('.cross1').remove();
							});
							});	  
						});
				</script>	
				<script>$(document).ready(function(c) {
						$('.close3').on('click', function(c){
							$('.cross2').fadeOut('slow', function(c){
								$('.cross2').remove();
							});
							});	  
						});
				</script>
<table class="table ">
		<tr>
			<th class="t-head head-it">Products</th>
			<th class="t-head">Price</th>
			<th class="t-head">Quantity</th>
		</tr>
		<tr class="cross">

		<tr class="cross1">
			<td class="t-data ring-in"><a href="#" class="at-in"><img src="admin/img/<?=$data["foto"]?>" name="foto" class="img-responsive" alt="" width="100" height="50"></a>
				<div class="sed">
					<h5><?= $data['namabarang'] ;?></h5>
				</div>
			</td>
			<td class="t-data">
				<div class="col-lg-6">
				<input type="text" align="center"step="any" min="0" name="harga" id="harga" class="form-control" value="<?= $data['harga'] ;?>" readonly>
				</div>
			</td>
			<td class="t-data">
				<div class="col-lg-4">
					<input type="number" step="any" min="0" name="stok" id="stok" class="form-control" value="1">
				</div>
			</td>
		</tr>
</table>
	
	<br>
	<div class="row">
		<div class="col-md-6">
			<h5>isi Form dibawah ini</h5>
		</div>
	</div>

	<br>
	<form method="POST" enctype="multipart/form-data">
	<input class="form-control" name="id_barang" value="<?= $id_barang ;?>" type='hidden'>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputPassword1">Nama Produk</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Produk" name="namabarang" style="width: 557px;" value="<?= $data['namabarang']; ?>" readonly>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputPassword1">Provinsi</label>
					<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Provinsi" name="prov">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputPassword1">Harga</label>
					<input type="text" class="form-control" id="total" placeholder="Harga Produk" value="<?= $hasil; ?>" name="harga" readonly>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputPassword1">Kota</label>
					<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Kota" name="kota">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputPassword1">Nama Lengkap</label>
					<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Nama Lengkap" name="nama" require>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputPassword1">Kode Pos</label>
					<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Kode Pos" name="pos" require>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputPassword1">Alamat</label>
					<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Alamat Lengkap" name="alamat">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputPassword1">No Telp</label>
					<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan No Telp" name="telp">
				</div>
			</div>
		</div>
		<!-- <a href="berhasil.php?id_barang=<?= $data['id_barang'] ?>" class="btn btn-success" name="simpan"><i class="glyphicon glyphicon-shopping-cart" ></i> Order Sekarang</a> -->
		<button type="submit" class="btn btn-success" name="simpan" onclick="return confirm('Pastikan Data Anda Sudah Benar ?');"><i class="glyphicon glyphicon-shopping-cart" ></i> Order Sekarang</button>
		<a href="index.php" class="btn btn-danger">Lanjut Belanja</a>
	</form>
	<br>

		</div>
			</div>
			
			<script>
			$('.value-plus').on('click', function(){
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
				divUpd.text(newVal);
			});

			$('.value-minus').on('click', function(){
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
				if(newVal>=1) divUpd.text(newVal);
			});
			</script>

<div class="footer">
	<div class="container">
		<div class="col-md-3 footer-grid">
			<h3>About Us</h3>
			<p align="justify">Apotik Store Adalah Market yang menjual segala macam obat-obatan secara online.</p>
		</div>
		<div class="col-md-3 footer-grid ">
			<h3>Menu</h3>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="obat.php">Obat</a></li>
				<li><a href="perlengkapan.php">Perlengkapan Medis</a></li>
			</ul>
		</div>
		<div class="col-md-3 footer-grid ">
			<h3>Customer Services</h3>
			<ul>
				<li><a href="shipping.html">Shipping</a></li>
				<li><a href="terms.html">Terms & Conditions</a></li>
				<li><a href="faqs.html">Faqs</a></li>
				<li><a href="contact.html">Contact</a></li>
				<li><a href="offer.html">Online Shopping</a></li>						 
			</ul>
		</div>
		<div class="col-md-3 footer-grid">
			<h3>My Account</h3>
			<ul>
				<li><a href="login.html">Login</a></li>
				<li><a href="register.html">Register</a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
			<div class="footer-bottom">
				<h2 ><a href="index.html">Apotik Store<span>The Best Market</span></a></h2>
				<!-- <ul class="social-fo">
					<li><a href="#" class=" face"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#" class=" twi"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#" class=" pin"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
					<li><a href="#" class=" dri"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
				</ul> -->
				<div class=" address">
					<div class="col-md-4 fo-grid1">
							<p><i class="fa fa-home" aria-hidden="true"></i>12K Street , 45 Building Road Canada.</p>
					</div>
					<div class="col-md-4 fo-grid1">
							<p><i class="fa fa-phone" aria-hidden="true"></i>+1234 758 839 , +1273 748 730</p>	
					</div>
					<div class="col-md-4 fo-grid1">
						<p><a href="mailto:info@example.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>info@example1.com</a></p>
					</div>
					<div class="clearfix"></div>
					
					</div>
			</div>
		<div class="copy-right">
			<p> &copy; 2022 Apotik Store. All Rights Reserved </p>
		</div>
	</div>
</div>

	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
		<script src="js/bootstrap.js"></script>
<script type='text/javascript' src="js/jquery.mycart.js"></script>
    <script type="text/javascript">
    $(function () {

    var goToCartIcon = function($addTocartBtn){
        var $cartIcon = $(".my-cart-icon");
        var $image = $('<img width="40px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
        $addTocartBtn.prepend($image);
        var position = $cartIcon.position();
        $image.animate({
        top: position.top,
        left: position.left
        }, 500 , "linear", function() {
        $image.remove();
        });
    }

    $('.my-cart-btn').myCart({
    classCartIcon: 'my-cart-icon',
    classCartBadge: 'my-cart-badge',
    affixCartIcon: true,
    checkoutCart: function(products) {
        $.each(products, function(){
        console.log(this);
        });
    },
    clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
    },
    getDiscountPrice: function(products) {
        var total = 0;
        $.each(products, function(){
          total += this.quantity * this.price;
        });
        return total * 1;
    }
    });

});
</script>

</body>
</html>
<script type="text/javascript">
 $("#harga").keyup(function(){   
   var a = parseFloat($("#harga").val());
   var b = parseFloat($("#stok").val());
   var c = a*b;
   $("#total").val(c);
 });
 
 $("#stok").keyup(function(){
   var a = parseFloat($("#harga").val());
   var b = parseFloat($("#stok").val());
   var c = a*b;
   $("#total").val(c);
 });
</script>