<!DOCTYPE html>
<?php 
	session_start();
	if(empty($_SESSION))
	{
		header('Location: index.php');
	}
	//include(modalMessage.php);
	if(isset($_GET['productID']))
	{
		include('connection/connection.php');
		//include('encrypt_decrypt.php');
		//urlencode(secured_decrypt)
		$productID = $_GET['PRODUCTID'];
		$sql = "SELECT p_name, p_desc, p_price FROM product WHERE PRODUCTID = '$productID'";
		$qry = oci_parse($conn,$sql);
		$result = oci_fetch_array($qry);

		//oci_execute($qry,OCI_DEFAULT);
	}

	if(isset($_POST['save']))
	{
		include('connection/connection.php');

		$p_name = strtoupper($_POST['p_name']);
		$p_desc = strtoupper($_POST['p_desc']);
		$p_price = $_POST['p_price'];
		$productID = strtoupper($_POST['productID']);
		$f_spicylevel = strtoupper($_POST['f_spicylevel']);
		$d_flavour = strtoupper($_POST['d_flavour']);
		$d_capacity = strtoupper($_POST['d_capacity']);

		$sql = "UPDATE product 
				SET p_name = '$p_name', p_desc = '$p_desc', p_price = '$p_price' 
				WHERE productID = '$productID'";
		$query2 = oci_parse($conn, $sql2);
		oci_execute($query2, OCI_DEFAULT);

		$sql1 = "UPDATE food 
				SET f_spicylevel = '$f_spicylevel' 
				WHERE productID = '$productID'";
		$query2 = oci_parse($conn, $sql2);
		oci_execute($query2, OCI_DEFAULT);

		$sql2 = "UPDATE drink 
				SET d_flavour = '$d_flavour', d_capacity = '$d_capacity' 
				WHERE productID = '$productID'";
		$query2 = oci_parse($conn, $sql2);
		oci_execute($query2, OCI_DEFAULT);
		//echo $query;
		if (oci_execute($query, OCI_DEFAULT) && oci_execute($query1, OCI_DEFAULT) && oci_execute($query2, OCI_DEFAULT)) 
		{
			oci_commit($conn);
			echo "<script language='javascript'> alert('Data has been successfully updated!');window.location='listProduct.php';</script>";
		} 
		else 
		{
			oci_rollback($conn);
			echo "<script language='javascript'> alert('Sorry, data has not been updated.');window.location='listProduct.php';</script>";
		}
	}
	else if(isset($_POST['delete']))
	{
		include('connection/connection.php');

		$p_name = strtoupper($_POST['p_name']);
		$p_desc = strtoupper($_POST['p_desc']);
		$p_price = $_POST['p_price'];
		$productID = strtoupper($_POST['productID']);
		$f_spicylevel = strtoupper($_POST['f_spicylevel']);
		$d_flavour = strtoupper($_POST['d_flavour']);
		$d_capacity = strtoupper($_POST['d_capacity']);

		$sql = "DELETE FROM product WHERE productID = $productID";
		$query = oci_parse($conn, $sql);
		oci_execute($query, OCI_DEFAULT); 

		$sql1 = "DELETE FROM food WHERE productID = $productID";
		$query1 = oci_parse($conn, $sql1);
		oci_execute($query1, OCI_DEFAULT);

		$sql2 = "DELETE FROM drink WHERE productID = $productID";
		$query2 = oci_parse($conn, $sql2);
		oci_execute($query2, OCI_DEFAULT);
		//echo $query;
		if (oci_execute($query, OCI_DEFAULT) && oci_execute($query1, OCI_DEFAULT) && oci_execute($query2, OCI_DEFAULT)) 
		{
			oci_commit($conn);
			echo "<script language='javascript'> alert('Data has been successfully deleted!');window.location='listProduct.php';</script>";
		} 
		else 
		{
			oci_rollback($conn);
			echo "<script language='javascript'> alert('Sorry, data has not been deleted.');window.location='listProduct.php';</script>";
		}
	}

?>
<html lang="en">

<head>
	<title>eBazaar-Edit Product</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
 	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
    <script type='text/javascript'>
        function Confirm() 
		{
        	return confirm('Are you sure you want to continue this process?');
        }
    </script>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<!-- top-header -->
	<div class="header-most-top">
		<p>eBazaar Your First Choice in Ramadan</p>
	</div>
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="index.html">
						<span>e</span>Bazaar
						<img src="images/logo2.png" alt=" ">
					</a>
				</h1>
			</div>
			<!-- header-bot -->
			<div class="col-md-8 header">
				<!-- header lists -->
				<ul>
					<li>
						<a class="play-icon popup-with-zoom-anim" href="#small-dialog1">
							<span class="fa fa-map-marker" aria-hidden="true"></span> Shop Locator</a>
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-truck" aria-hidden="true"></span>Track Order</a>
					</li>
					<li>
						<span class="fa fa-phone" aria-hidden="true"></span> 001 234 5678
					</li>
					<li>
						<a href="logout.php">
							<span class="glyphicon glyphicon-log-out"></span>Logout
						</a>
					<li>
				</ul>
				<!-- //header lists -->
				<!-- search -->
				<div class="agileits_search">
					<form action="#" method="post">
						<input name="Search" type="search" placeholder="How can we help you today?" required="">
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<span class="fa fa-search" aria-hidden="true"> </span>
						</button>
					</form>
				</div>
				<!-- //search -->
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="wthreecartaits wthreecartaits2 cart cart box_1">
						<form action="#" method="post" class="last">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="display" value="1">
							<button class="w3view-cart" type="submit" name="submit" value="">
								<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
							</button>
						</form>
					</div>
				</div>
				<!-- //cart details -->
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- signin Model -->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In </h3>
						<p>
							Sign In now, Let's start your eBazaar Shopping. 
							<!--<a href="#" data-toggle="modal" data-target="#myModal2">
								Sign Up Now</a>-->
						</p>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="User Name" name="Name" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" required="">
							</div>
							<input type="submit" value="Sign In">
						</form>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal1 -->
	<!-- //signin Model -->
	<!-- signup Model -->
	<!-- Modal2 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
                    
                    <!--syarifah-->
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up</h3>
						<p>
							Come join the eBazaar! Let's set up your Account.
						</p>
						<form action="vendorregister.php" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="First Name" name="fname" required="">
							</div>
                            <div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Last Name" name="lname" required="">
							</div>
                            <div class="styled-input">
								<input type="text" placeholder="Phone Number" name="phone" required="">
							</div>
							<div class="styled-input">
								<input type="email" placeholder="E-mail" name="email" required="">
							</div>
                            <div class="styled-input">
								<input type="text" placeholder="Address" name="address" required="">
							</div>
                            
                            <div class="styled-input">
                                <select name="poscode">
                                    <option name="poscode" value=0>Choose your poscode</option>
                                    <option name="poscode" value=28000>28000</option>
                                    <option name="poscode" value=25150>25150</option>
                                    <option name="poscode" value=28700>28700</option>
                                </select>
							</div>
                            <br>
                            <div class="styled-input">
                                <select name="city">
                                    <option name="city" value=0>Choose your city</option>
                                    <option name="city" value=Temerloh>Temerloh</option>
                                    <option name="city" value=Kuantan>Kuantan</option>
                                    <option name="city" value=Bentong>Bentong</option>
                                </select>
							</div>
            
							<input type="submit" value="Sign Up">
						</form>
						<!--<p>
							<a href="#">By clicking register, I agree to your terms</a>
						</p>-->
					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal2 -->
	<!-- //signup Model -->
	<!-- //header-bot -->
	<!-- navigation -->
	<div class="ban-top">
		<div class="container">
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							    aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list">
								<li>
									<a class="nav-stylehead" href="index.html">Home
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<li class="">
									<a class="nav-stylehead" href="about.html">About Us</a>
								</li>
								<li class="dropdown active">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-4 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="addProduct.php">Add Product</a>
													</li>
													<li>
														<a href="listProduct.php">List of Product</a>
													</li>
												</ul>
											</div>
											<div class="col-sm-4 multi-gd-img">
												<img src="images/nav.png" alt="">
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
								<li class="">
									<a class="nav-stylehead" href="faqs.html">Faqs</a>
								</li>
								<li>
									<a class="" href="contact.html">Contact</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->
	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">
		
	</div>
	<!-- //banner-2 -->
	<!--Table for slider-->
	<!--<table>
		<img class="mySlides" src="images\ramadan-kareem-1.jpg" style="width:100%">
	</table>-->
	<!--//Table for slider-->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>Update List Product</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Update List Product
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="new product">
				<div class="new-productInfo">
					<form name="updateProduct" method="post" action="">
						<?php
							include ('connection/connection.php');

							$sqlS = "SELECT p_name, p_desc, p_price
									 FROM product WHERE productID = '".$_GET["PRODUCTID"]."'";
							$queryP = oci_parse($conn, $sqlS);
							$r = oci_execute($queryP);
							$p = oci_fetch_array($queryP);
							
							$sqlF = "SELECT f_spicylevel
									 FROM food WHERE productID = '".$_GET["PRODUCTID"]."'";
							$queryF = oci_parse($conn, $sqlF);
							$r1 = oci_execute($queryF);
							$f = oci_fetch_array($queryF);

							$sqlD = "SELECT d_flavour, d_capacity 
									FROM drink WHERE productID = '".$_GET["PRODUCTID"]."'";
							$queryD = oci_parse($conn, $sqlD);
							$r2 = oci_execute($queryD);
							$d = oci_fetch_array($queryD);

							if(!$p && !$f & !$d){
								echo "Selected data not found";
							}
							else{

							}
						?>
							<div class="form-group">
								<input type="hidden" name="productID" placeholder="Product ID" value="<?php echo $r['PRODUCTID'];?>" required>
							</div>
							<div class="form-group">
								<input type="text" name="p_name" placeholder="Product Name" value="<?php echo $r['P_NAME'];?>" required>
							</div>
							<div class="form-group">
								<textarea type="text" name="p_desc" placeholder="Product Description" value="<?php echo $r['P_DESC'];?>"></textarea>
							</div>
							<div class="form-group">
								<input type="number" name="p_price" placeholder="Product Price (RM)" value="<?php echo $r['P_PRICE'];?>" required>
							</div>
							<div class="form-group">
								<p>Choose Spicy Level (Food):</p>
								<input type="radio" id="Original" name="f_spicylevel" value="<?php if($f_spicylevel=="Original") echo "checked";?>">
								<label for="Original">Original</label><br>
								<input type="radio" id="Medium" name="f_spicylevel" value="<?php if($f_spicylevel=="Medium") echo "checked";?>">
								<label for="Medium">Medium</label><br>
								<input type="radio" id="Hot" name="f_spicylevel" value="<?php if($f_spicylevel=="Hot") echo "checked";?>">
								<label for="Hot">Hot</label><br>
							</div>
							<div class="form-group">
								<input type="text" name="d_flavour" placeholder="Flavour (Drink)" value="<?php echo $r2['D_FLVAOUR'];?>">
							</div>
							<div class="form-group">
								<p>Choose Cup Size (Drink):</p>
								<input type="radio" id="Medium" name="d_capacity" value="<?php if($d_capacity=="Medium") echo "checked";?>">
								<label for="Medium">Medium</label><br>
								<input type="radio" id="Large" name="d_capacity" value="<?php if($d_capacity=="Large") echo "checked";?>">
								<label for="Large">Large</label><br>
							</div>
							<div class="form-group">
								<input type="submit" name="save" value="Update" onclick="return Confirm()"/>
								<input type="submit" name="delete" value="Delete" onclick="return Confirm()"/>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //top products -->
	<!-- footer -->
	<footer>
		<div class="container">
			<!-- footer third section -->
			<div class="footer-info w3-agileits-info">
				<!-- footer categories -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids">
						<h3>Categories</h3>
						<ul>
							<li>
								<a href="food.html">Foods</a>
							</li>
							<li>
								<a href="drink.html">Drinks</a>
							</li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- //footer categories -->
				<!-- quick links -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids">
						<h3>Quick Links</h3>
						<ul>
							<li>
								<a href="about.html">About Us</a>
							</li>
							<li>
								<a href="contact.html">Contact Us</a>
							</li>
							<li>
								<a href="help.html">Help</a>
							</li>
							<li>
								<a href="faqs.html">Faqs</a>
							</li>
							<li>
								<a href="terms.html">Terms of use</a>
							</li>
							<li>
								<a href="privacy.html">Privacy Policy</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- //quick links -->
				<div class="clearfix"></div>
			</div>
			<!-- //footer third section -->
		</div>
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right">
		<div class="container">
			<p>© 2017 Grocery Shoppy. All rights reserved | Design by
				<a href="http://w3layouts.com"> W3layouts.</a>
			</p>
		</div>
	</div>
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
	<script src="js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->

	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		paypalm.minicartk.render(); //use only unique class names other than paypal1.minicart1.Also Replace same class name in css and minicart.min.js

		paypalm.minicartk.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 1) {
				alert('The minimum order quantity is 1. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- price range (top products) -->
	<!--<script src="js/jquery-ui.js"></script>
	<script>
		//<![CDATA[ 
		$(window).load(function () {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [50, 6000],
				slide: function (event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

		}); //]]>
	</script>-->
	<!-- //price range (top products) -->

	<!-- flexisel (for special offers) -->
	<!--<script src="js/jquery.flexisel.js"></script>
	<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
	</script>-->
	<!-- //flexisel (for special offers) -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- smoothscroll -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->

</body>

</html>