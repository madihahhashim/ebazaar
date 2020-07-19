<!DOCTYPE html>
<?php



if(isset($_GET['ORDERID']))
{
  include("connection/connection.php");
  include("secure/encrypt_decrypt.php");
  $ORDERID = urldecode(secured_decrypt($_GET['ORDERID']));
  //echo $ORDERID;
  $sql = "SELECT * FROM orders WHERE ORDERID = $ORDERID";
  //echo $sql;
  $result4 = oci_parse($conn, $sql);
	 oci_execute($result4);
}

function modalTitle($op)
{
	if($op == 'success')
		$title = 'Berjaya!';
	else
		$title = 'Amaran!';

	return $title;
}
function modalMessage($op)
{
	if($op == 'success')
		$msg = 'Your order sucessfully submitted';
	else if($op == 'errkod')
		$msg = 'Please try again';

	return $msg;
}

if(isset($_POST['submit']))
{
  include("connection/connection.php");
  //$CUSTID =$_POST['CUSTID'];
  
  $O_TOTALPRICE =$_POST['O_TOTALPRICE'];
  $PRODUCTID =$_POST['PRODUCTID'];
  //$c_city = $_POST['c_city'];
  
  $biggest_id= oci_parse($conn, "SELECT ORDERID FROM orders");
  oci_execute($biggest_id);
  while($row = oci_fetch_array($biggest_id)){
   $id = $row['ORDERID'];
  
  }

  $query =  "UPDATE orders SET  PRODUCTID = '".$PRODUCTID."',O_TOTALPRICE =  '".$O_TOTALPRICE."'WHERE ORDERID = '".$id."'";
	//echo $query;
	$result = oci_parse($conn, $query);
	 oci_execute($result);


	 if (!$result) 
	{
	echo "<script>
	$(document).ready(function(){
		$('#myModal').modal('show');
	});
		</script>";

	header("Location: temerloh.php?op=errkod");
	} 
	else 
	{
	echo "<script>
	$(document).ready(function(){
		$('#myModal').modal('show');
	});
		</script>";

	header("Location: temerloh.php?op=success");
	}

}

?>

<html lang="zxx">
<head>
	<title>eBazar</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
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

	<script type='text/javascript'>
function Confirm() {
  return confirm('Adakah anda pasti?');
}
</script>
</head>

<body>
	<!-- top-header -->
	<div class="header-most-top">
		<p></p>
	</div>
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="index.php">
						<span>e</span>
						<span>B</span>azar
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
						<a href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In </a>
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal2">
							<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up </a>
					</li>
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
						<form action="checkout.php" method="post" class="last">
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
	<!-- shop locator (popup) -->
	<!-- Button trigger modal(shop-locator) -->
	<div id="small-dialog1" class="mfp-hide">
		<div class="select-city">
			<h3>Please Select Your Location</h3>
			<select class="list_of_cities">
				<optgroup label="Popular Cities">
					<option selected style="display:none;color:#eee;">Select City</option>
					<option>Birmingham</option>
					<option>Anchorage</option>
					<option>Phoenix</option>
					<option>Little Rock</option>
					<option>Los Angeles</option>
					<option>Denver</option>
					<option>Bridgeport</option>
					<option>Wilmington</option>
					<option>Jacksonville</option>
					<option>Atlanta</option>
					<option>Honolulu</option>
					<option>Boise</option>
					<option>Chicago</option>
					<option>Indianapolis</option>
				</optgroup>
				<optgroup label="Alabama">
					<option>Birmingham</option>
					<option>Montgomery</option>
					<option>Mobile</option>
					<option>Huntsville</option>
					<option>Tuscaloosa</option>
				</optgroup>
				<optgroup label="Alaska">
					<option>Anchorage</option>
					<option>Fairbanks</option>
					<option>Juneau</option>
					<option>Sitka</option>
					<option>Ketchikan</option>
				</optgroup>
				
			</select>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //shop locator (popup) -->
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
							Sign In now, Let's start your Grocery Shopping. Don't have an account?
							<a href="#" data-toggle="modal" data-target="#myModal2">
								Sign Up Now</a>
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
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up</h3>
						<p>
							Come join the Grocery Shoppy! Let's set up your Account.
						</p>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Name" name="Name" required="">
							</div>
							<div class="styled-input">
								<input type="email" placeholder="E-mail" name="Email" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" id="password1" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Confirm Password" name="Confirm Password" id="password2" required="">
							</div>
							<input type="submit" value="Sign Up">
						</form>
						<p>
							<a href="#">By clicking register, I agree to your terms</a>
						</p>
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
			<div class="agileits-navi_search">
				<form action="#" method="post">
					<select id="agileinfo-nav_search" name="agileinfo_search" required="">
						<option value="">All Categories</option>
						<option value="Kitchen">Kitchen</option>
						<option value="Household">Household</option>
						<option value="Snacks &amp; Beverages">Snacks & Beverages</option>
						<option value="Personal Care">Personal Care</option>
						<option value="Gift Hampers">Gift Hampers</option>
						<option value="Fruits &amp; Vegetables">Fruits & Vegetables</option>
						<option value="Baby Care">Baby Care</option>
						<option value="Soft Drinks &amp; Juices">Soft Drinks & Juices</option>
						<option value="Frozen Food">Frozen Food</option>
						<option value="Bread &amp; Bakery">Bread & Bakery</option>
						<option value="Sweets">Sweets</option>
					</select>
				</form>
			</div>
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
								<li class="active">
									<a class="nav-stylehead" href="index.php">Home
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<li class="">
									<a class="nav-stylehead" href="about.html">About Us</a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kitchen
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-4 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="product.html">Bakery</a>
													</li>
													<li>
														<a href="product.html">Baking Supplies</a>
													</li>
													<li>
														<a href="product.html">Coffee, Tea & Beverages</a>
													</li>
													<li>
														<a href="product.html">Dried Fruits, Nuts</a>
													</li>
													<li>
														<a href="product.html">Sweets, Chocolate</a>
													</li>
													<li>
														<a href="product.html">Spices & Masalas</a>
													</li>
													<li>
														<a href="product.html">Jams, Honey & Spreads</a>
													</li>
												</ul>
											</div>
											<div class="col-sm-4 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="product.html">Pickles</a>
													</li>
													<li>
														<a href="product.html">Pasta & Noodles</a>
													</li>
													<li>
														<a href="product.html">Rice, Flour & Pulses</a>
													</li>
													<li>
														<a href="product.html">Sauces & Cooking Pastes</a>
													</li>
													<li>
														<a href="product.html">Snack Foods</a>
													</li>
													<li>
														<a href="product.html">Oils, Vinegars</a>
													</li>
													<li>
														<a href="product.html">Meat, Poultry & Seafood</a>
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
								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Household
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-6 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="product2.html">Kitchen & Dining</a>
													</li>
													<li>
														<a href="product2.html">Detergents</a>
													</li>
													<li>
														<a href="product2.html">Utensil Cleaners</a>
													</li>
													<li>
														<a href="product2.html">Floor & Other Cleaners</a>
													</li>
													<li>
														<a href="product2.html">Disposables, Garbage Bag</a>
													</li>
													<li>
														<a href="product2.html">Repellents & Fresheners</a>
													</li>
													<li>
														<a href="product2.html"> Dishwash</a>
													</li>
												</ul>
											</div>
											<div class="col-sm-6 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="product2.html">Pet Care</a>
													</li>
													<li>
														<a href="product2.html">Cleaning Accessories</a>
													</li>
													<li>
														<a href="product2.html">Pooja Needs</a>
													</li>
													<li>
														<a href="product2.html">Crackers</a>
													</li>
													<li>
														<a href="product2.html">Festive Decoratives</a>
													</li>
													<li>
														<a href="product2.html">Plasticware</a>
													</li>
													<li>
														<a href="product2.html">Home Care</a>
													</li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
								<li class="">
									<a class="nav-stylehead" href="faqs.html">Faqs</a>
								</li>
								<li class="dropdown">
									<a class="nav-stylehead dropdown-toggle" href="#" data-toggle="dropdown">Pages
										<b class="caret"></b>
									</a>
									<ul class="dropdown-menu agile_short_dropdown">
										<li>
											<a href="icons.html">Web Icons</a>
										</li>
										<li>
											<a href="typography.html">Typography</a>
										</li>
									</ul>
								</li>
								<li class="">
									<a class="nav-stylehead" href="contact.html">Contact</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->
	<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<h3>Big
							<span>Save</span>
						</h3>
						<p>Get flat
							<span>10%</span> Cashback</p>
							<a class="button2" href="addorder.php">Add more food </a>
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<h3>Healthy
							<span>Saving</span>
						</h3>
						<p>Get Upto
							<span>30%</span> Off</p>
						<a class="button2" href="addorder.php">Add more food </a>
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						<h3>Big
							<span>Deal</span>
						</h3>
						<p>Get Best Offer Upto
							<span>20%</span>
						</p>
						<a class="button2" href="addorder.php">Add more food </a>
					</div>
				</div>
			</div>
			<div class="item item4">
				<div class="container">
					<div class="carousel-caption">
						<h3>Today
							<span>Discount</span>
						</h3>
						<p>Get Now
							<span>40%</span> Discount</p>
							<a class="button2" href="addorder.php">Add more food </a>
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- //banner -->

	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Our Top Products
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- product left -->
			
			<!-- //product left -->
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-20">
				<div class="wrapper">
					<!-- first section (nuts) -->
					<div class="product-sec1">
						<h3 class="heading-tittle">FOODS</h3>
						<div class="col-md-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="..\bazaar\gambar\murtabak.jpg" alt="MURTABAK" width="90%" height="30%">
									<span class="product-new-top">New</span>
								</div>
								<div class="item-info-product ">
									<h4>
										<p>MURTABAK</p>
									</h4>
									<div class="info-product-price">
										<span class="item_price">4.00</span>
										
									</div>
									<div class="rating1">
										<span class="starRating">
											<input id="rating3" type="radio" name="rating" value="3" checked="">
											<label for="rating3">3</label>
											<input id="rating2" type="radio" name="rating" value="2">
											<label for="rating2">2</label>
											<input id="rating1" type="radio" name="rating" value="1">
											<label for="rating1">1</label>
										</span>
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										<form action="temerloh.php" method="post">
											<fieldset>
												<input type="hidden" name="PRODUCTID" value="F94852" />
												<input type="hidden" name="P_NAME" value=" MURTABAK" />
												<input type="hidden" name="O_TOTALPRICE" value="4.00" />
												<input type="submit" name="submit" value="Add to cart" class="button"/>
											</fieldset>
										</form>
									</div>

								</div>
							</div>
						</div>
						<div class="col-md-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="..\bazaar\gambar\satay.jpg" alt="SATAY">
									<span class="product-new-top">New</span>

								</div>
								<div class="item-info-product ">
									<h4>
										<p>SATAY</p>
									</h4>
									<div class="info-product-price">
										<span class="item_price">20.00</span>
										
									</div>
									<div >
										<span class="starRating">
											<input id="rating2" type="radio" name="rating" value="2">
											<label for="rating2">2</label>
											<input id="rating1" type="radio" name="rating" value="1">
											<label for="rating1">1</label>
										</span>
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<form action="temerloh.php" method="post">
											<fieldset>
											    <input type="hidden" name="PRODUCTID" value="F34587" />	
											    <input type="hidden" name="P_NAME" value=" SATAY" />
												<input type="hidden" name="O_TOTALPRICE" value="20.00" />
												<input type="submit" name="submit" value="Add to cart" class="button" />
											</fieldset>
										</form>
									</div>

								</div>
							</div>
						</div>
						<div class="col-md-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="..\bazaar\gambar\lemang.jpg" alt="LEMANG">
									<span class="product-new-top">New</span>

								</div>
								<div class="item-info-product ">
									<h4>
										<p>LEMANG</p>
									</h4>
									<div class="info-product-price">
										<span class="item_price">10.00</span>
										
									</div>
								<div class="rating1">
										<span class="starRating">
											<input id="rating5" type="radio" name="rating" value="5">
											<label for="rating5">5</label>
											<input id="rating4" type="radio" name="rating" value="4">
											<label for="rating4">4</label>
											<input id="rating3" type="radio" name="rating" value="3" checked="">
											<label for="rating3">3</label>
											<input id="rating2" type="radio" name="rating" value="2">
											<label for="rating2">2</label>
											<input id="rating1" type="radio" name="rating" value="1">
											<label for="rating1">1</label>
										</span>
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<form action="temerloh.php" method="post">
											<fieldset>
											<input type="hidden" name="PRODUCTID" value="F78799" />
												<input type="hidden" name="P_NAME" value=" LEMANG" />
												<input type="hidden" name="O_TOTALPRICE" value="10.00" />
												<input type="submit" name="submit" value="Add to cart" class="button"/>
											</fieldset>
										</form>
									</div>

								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<!-- //first section (nuts) -->
					<!-- second section (nuts special) -->
					<!-- //second section (nuts special) -->
					<!-- third section (oils) -->
					<div class="product-sec1">
						<h3 class="heading-tittle">DESSERT</h3>
						<div class="col-md-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="..\bazaar\gambar\karipap.jpg" alt="KARIPAP" width="75%" height="30%">
									<span class="product-new-top">New</span>
								</div>
								<div class="item-info-product ">
									<h4>
									<p>KARIPAP</p>
										
									</h4>
									<div class="info-product-price">
									<span class="item_price">3.00</span>
										
									</div>
									<div class="rating1">
										<span class="starRating">
											<input id="rating2" type="radio" name="rating" value="2">
											<label for="rating2">2</label>
											<input id="rating1" type="radio" name="rating" value="1">
											<label for="rating1">1</label>
										</span>
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<form action="temerloh.php" method="post">
											<fieldset>
											<input type="hidden" name="PRODUCTID" value="F59533" />
												<input type="hidden" name="P_NAME" value=" KARIPAP" />
												<input type="hidden" name="O_TOTALPRICE" value="3.00" />
												<input type="submit" name="submit" value="Add to cart" class="button"/>
											</fieldset>
										</form>
									</div>

								</div>
							</div>
						</div>
						<div class="col-md-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="..\bazaar\gambar\donut.jpg" alt="DONUT">
									<span class="product-new-top">New</span>

								</div>
								<div class="item-info-product ">
									<h4>
										<p>DONUT</p>
									</h4>
									<div class="info-product-price">
										<span class="item_price">3.00</span>
									
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<form action="temerloh.php" method="post">
											<fieldset>
											<input type="hidden" name="PRODUCTID" value="F15626" />
												<input type="hidden" name="P_NAME" value=" DONUT" />
												<input type="hidden" name="O_TOTALPRICE" value="3.00" />
												<input type="submit" name="submit" value="Add to cart" class="button"/>
											</fieldset>
										</form>
									</div>

								</div>
							</div>
						</div>
						<div class="col-md-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="..\bazaar\gambar\pelita.jpg" alt="KUIH PELITA">
									<span class="product-new-top">New</span>

								</div>
								<div class="item-info-product ">
									<h4>
										<p">KUIH PELITA</p>
									</h4>
									<div class="info-product-price">
										<span class="item_price">5.00</span>
										
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										<form action="temerloh.php" method="post">
											<fieldset>
											<input type="hidden" name="PRODUCTID" value="F75324" />
												<input type="hidden" name="P_NAME" value=" KUIH PELITA" />
												<input type="hidden" name="O_TOTALPRICE" value="5.00" />
												<input type="submit" name="submit" value="Add to cart" class="button"/>
											</fieldset>
										</form>
									</div>

								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<!-- //third section (oils) -->
					<!-- fourth section (noodles) -->
					<div class="product-sec1">
						<h3 class="heading-tittle">DRINKS</h3>
						<div class="col-md-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="..\bazaar\gambar\tebu.jpg" alt="AIR TEBU">
									
								</div>
								<div class="item-info-product ">
									<h4>
									<p>AIR TEBU</p>
									</h4>
									<div class="info-product-price">
									<span class="item_price">3.00</span>
										
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<form action="temerloh.php" method="post">
											<fieldset>
											<input type="hidden" name="PRODUCTID" value="D45963" />
												<input type="hidden" name="P_NAME" value=" MURTABAK" />
												<input type="hidden" name="O_TOTALPRICE" value="1.50" />
												<input type="submit" name="submit" value="Add to cart" class="button"/>
											</fieldset>
										</form>
									</div>

								</div>
							</div>
						</div>
						<div class="col-md-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="..\bazaar\gambar\kelapa.jpg" alt="AIR KELAPA">
									<span class="product-new-top">New</span>

								</div>
								<div class="item-info-product ">
									<h4>
										<p>AIR KELAPA</p>
									</h4>
									<div class="info-product-price">
									<span class="item_price">3.00</span>
										
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<form action="temerloh.php" method="post">
											<fieldset>
											<input type="hidden" name="PRODUCTID" value="D43635" />
												<input type="hidden" name="P_NAME" value=" AIR KELAPA" />
												<input type="hidden" name="O_TOTALPRICE" value="3.00" />
												<input type="submit" name="submit" value="Add to cart" class="button"/>
											</fieldset>
										</form>
									</div>

								</div>
							</div>
						</div>
						<div class="col-md-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="..\bazaar\gambar\cendol.jpg" alt="CENDOL">
									<span class="product-new-top">New</span>

								</div>
								<div class="item-info-product ">
									<h4>
									
									<div class="info-product-price">
										<span class="item_price">3.00</span>
								
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<form action="temerloh.php" method="post">
											<fieldset>
											<input type="hidden" name="PRODUCTID" value="D54920" />
												<input type="hidden" name="P_NAME" value=" CENDOL" />
												<input type="hidden" name="O_TOTALPRICE" value="3.00" />
												<input type="submit" name="submit" value="Add to cart" class="button"/>
											</fieldset>
										</form>
									</div>

								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<!-- //fourth section (noodles) -->
				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>
	<!-- //top products -->
	<!-- special offers -->
	<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Special Offers
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="content-bottom-in">
				<ul id="flexiselDemo1">
					<li>
						<div class="w3l-specilamk">
							<div class="speioffer-agile">
								<a href="single.html">
									<img src="images/s1.jpg" alt="">
								</a>
							</div>
							<div class="product-name-w3l">
								<h4>
									<a href="single.html">Aashirvaad, 5g</a>
								</h4>
								<div class="w3l-pricehkj">
									<h6>$220.00</h6>
									<p>Save $40.00</p>
								</div>
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<form action="#" method="post">
										<fieldset>
										<input type="hidden" name="PRODUCTID" value="1" />
												<input type="hidden" name="P_NAME" value=" MURTABAK" />
												<input type="hidden" name="O_TOTALPRICE" value="1.50" />
												<input type="submit" name="submit" value="Add to cart" class="button"/>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="w3l-specilamk">
							<div class="speioffer-agile">
								<a href="single.html">
									<img src="images/s4.jpg" alt="">
								</a>
							</div>
							<div class="product-name-w3l">
								<h4>
									<a href="single.html">Kissan Tomato Ketchup, 950g</a>
								</h4>
								<div class="w3l-pricehkj">
									<h6>$99.00</h6>
									<p>Save $20.00</p>
								</div>
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<form action="#" method="post">
										<fieldset>
											<input type="hidden" name="cmd" value="_cart" />
											<input type="hidden" name="add" value="1" />
											<input type="hidden" name="business" value=" " />
											<input type="hidden" name="item_name" value="Kissan Tomato Ketchup, 950g" />
											<input type="hidden" name="amount" value="99.00" />
											<input type="hidden" name="discount_amount" value="1.00" />
											<input type="hidden" name="currency_code" value="USD" />
											<input type="hidden" name="return" value=" " />
											<input type="hidden" name="cancel_return" value=" " />
											<input type="submit" name="submit" value="Add to cart" class="button" />
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="w3l-specilamk">
							<div class="speioffer-agile">
								<a href="single.html">
									<img src="images/s2.jpg" alt="">
								</a>
							</div>
							<div class="product-name-w3l">
								<h4>
									<a href="single.html">Madhur Pure Sugar, 1g</a>
								</h4>
								<div class="w3l-pricehkj">
									<h6>$69.00</h6>
									<p>Save $20.00</p>
								</div>
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<form action="bentong.php" method="post">
										<fieldset>
										<input type="hidden" name="PRODUCTID" value="1" />
												<input type="hidden" name="P_NAME" value=" MURTABAK" />
												<input type="hidden" name="O_TOTALPRICE" value="1.50" />
												<input type="submit" name="submit" value="Add to cart" class="button"/>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="w3l-specilamk">
							<div class="speioffer-agile">
								<a href="single2.html">
									<img src="images/s3.jpg" alt="">
								</a>
							</div>
							<div class="product-name-w3l">
								<h4>
									<a href="single2.html">Surf Excel Liquid, 1.02L</a>
								</h4>
								<div class="w3l-pricehkj">
									<h6>$187.00</h6>
									<p>Save $30.00</p>
								</div>
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<form action="#" method="post">
										<fieldset>
											<input type="hidden" name="cmd" value="_cart" />
											<input type="hidden" name="add" value="1" />
											<input type="hidden" name="business" value=" " />
											<input type="hidden" name="item_name" value="Surf Excel Liquid, 1.02L" />
											<input type="hidden" name="amount" value="187.00" />
											<input type="hidden" name="discount_amount" value="1.00" />
											<input type="hidden" name="currency_code" value="USD" />
											<input type="hidden" name="return" value=" " />
											<input type="hidden" name="cancel_return" value=" " />
											<input type="submit" name="submit" value="Add to cart" class="button" />
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="w3l-specilamk">
							<div class="speioffer-agile">
								<a href="single.html">
									<img src="images/s8.jpg" alt="">
								</a>
							</div>
							<div class="product-name-w3l">
								<h4>
									<a href="single.html">Cadbury Choclairs, 655.5g</a>
								</h4>
								<div class="w3l-pricehkj">
									<h6>$160.00</h6>
									<p>Save $60.00</p>
								</div>
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<form action="#" method="post">
										<fieldset>
										<input type="hidden" name="PRODUCTID" value="1" />
												<input type="hidden" name="P_NAME" value=" MURTABAK" />
												<input type="hidden" name="O_TOTALPRICE" value="1.50" />
												<input type="submit" name="submit" value="Add to cart" class="button"/>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="w3l-specilamk">
							<div class="speioffer-agile">
								<a href="single2.html">
									<img src="images/s6.jpg" alt="">
								</a>
							</div>
							<div class="product-name-w3l">
								<h4>
									<a href="single2.html">Fair & Lovely, 80 g</a>
								</h4>
								<div class="w3l-pricehkj">
									<h6>$121.60</h6>
									<p>Save $30.00</p>
								</div>
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<form action="#" method="post">
										<fieldset>
											<input type="hidden" name="cmd" value="_cart" />
											<input type="hidden" name="add" value="1" />
											<input type="hidden" name="business" value=" " />
											<input type="hidden" name="item_name" value="Fair & Lovely, 80 g" />
											<input type="hidden" name="amount" value="121.60" />
											<input type="submit" name="submit" value="Add to cart" class="button" />
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="w3l-specilamk">
							<div class="speioffer-agile">
								<a href="single.html">
									<img src="images/s5.jpg" alt="">
								</a>
							</div>
							<div class="product-name-w3l">
								<h4>
									<a href="single.html">Sprite, 2.25L (Pack of 2)</a>
								</h4>
								<div class="w3l-pricehkj">
									<h6>$180.00</h6>
									<p>Save $30.00</p>
								</div>
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<form action="#" method="post">
										<fieldset>
											<input type="hidden" name="cmd" value="_cart" />
											<input type="hidden" name="add" value="1" />
											<input type="hidden" name="business" value=" " />
											<input type="hidden" name="item_name" value="Sprite, 2.25L (Pack of 2)" />
											<input type="hidden" name="amount" value="180.00" />
											<input type="hidden" name="discount_amount" value="1.00" />
											<input type="hidden" name="currency_code" value="USD" />
											<input type="hidden" name="return" value=" " />
											<input type="hidden" name="cancel_return" value=" " />
											<input type="submit" name="submit" value="Add to cart" class="button" />
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="w3l-specilamk">
							<div class="speioffer-agile">
								<a href="single2.html">
									<img src="images/s9.jpg" alt="">
								</a>
							</div>
							<div class="product-name-w3l">
								<h4>
									<a href="single2.html">Lakme Eyeconic Kajal, 0.35 g</a>
								</h4>
								<div class="w3l-pricehkj">
									<h6>$153.00</h6>
									<p>Save $40.00</p>
								</div>
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<form action="#" method="post">
										<fieldset>
											<input type="hidden" name="cmd" value="_cart" />
											<input type="hidden" name="add" value="1" />
											<input type="hidden" name="business" value=" " />
											<input type="hidden" name="item_name" value="Lakme Eyeconic Kajal, 0.35 g" />
											<input type="hidden" name="amount" value="153.00" />
											<input type="hidden" name="discount_amount" value="1.00" />
											<input type="hidden" name="currency_code" value="USD" />
											<input type="hidden" name="return" value=" " />
											<input type="hidden" name="cancel_return" value=" " />
											<input type="submit" name="submit" value="Add to cart" class="button" />
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //special offers -->
	<hr>
	<footer>
		<div class="container">
			
				<!-- //footer categories -->
				<!-- quick links -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids"><center>
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
						</ul><center>
					</div>
					<div class="col-xs-6 footer-grids">
						<h3>Get in Touch</h3>
						<ul>
							<li>
								<i class="fa fa-map-marker"></i> 123 Sebastian, USA.</li>
							<li>
								<i class="fa fa-mobile"></i> 333 222 3333 </li>
							<li>
								<i class="fa fa-phone"></i> +222 11 4444 </li>
							<li>
								<i class="fa fa-envelope-o"></i>
								<a href="mailto:example@mail.com"> mail@example.com</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- //quick links -->
				<!-- social icons -->
				<div class="col-sm-2 footer-grids  w3l-socialmk">
					<h3>Follow Us on</h3>
					<div class="social">
						<ul>
							<li>
								<a class="icon fb" href="#">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<li>
								<a class="icon tw" href="#">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
							<li>
								<a class="icon gp" href="#">
									<i class="fa fa-google-plus"></i>
								</a>
							</li>
						</ul>
					</div>
					<div class="agileits_app-devices">
						<h5>Download the App</h5>
						<a href="#">
							<img src="images/1.png" alt="">
						</a>
						<a href="#">
							<img src="images/2.png" alt="">
						</a>
						<div class="clearfix"> </div>
					</div>
				</div>
				<!-- //social icons -->
				
			</div>
			<!-- //footer fourth section (text) -->
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
		// ************************************************
	// Shopping Cart API
	// ************************************************

	var shoppingCart = (function() {
	  // =============================
	  // Private methods and propeties
	  // =============================
	  cart = [];
	  
	  // Constructor
	  function Item(name, price, count) {
		this.name = name;
		this.price = price;
		this.count = count;
	  }
	  
	  // Save cart
	  function saveCart() {
		sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
	  }
	  
		// Load cart
	  function loadCart() {
		cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
	  }
	  if (sessionStorage.getItem("shoppingCart") != null) {
		loadCart();
	  }
	  

	  // =============================
	  // Public methods and propeties
	  // =============================
	  var obj = {};
	  
	  // Add to cart
	  obj.addItemToCart = function(name, price, count) {
		for(var item in cart) {
		  if(cart[item].name === name) {
			cart[item].count ++;
			saveCart();
			return;
		  }
		}
		var item = new Item(name, price, count);
		cart.push(item);
		saveCart();
	  }
	  // Set count from item
	  obj.setCountForItem = function(name, count) {
		for(var i in cart) {
		  if (cart[i].name === name) {
			cart[i].count = count;
			break;
		  }
		}
	  };
	  // Remove item from cart
	  obj.removeItemFromCart = function(name) {
		  for(var item in cart) {
			if(cart[item].name === name) {
			  cart[item].count --;
			  if(cart[item].count === 0) {
				cart.splice(item, 1);
			  }
			  break;
			}
		}
		saveCart();
	  }

	  // Remove all items from cart
	  obj.removeItemFromCartAll = function(name) {
		for(var item in cart) {
		  if(cart[item].name === name) {
			cart.splice(item, 1);
			break;
		  }
		}
		saveCart();
	  }

	  // Clear cart
	  obj.clearCart = function() {
		cart = [];
		saveCart();
	  }

	  // Count cart 
	  obj.totalCount = function() {
		var totalCount = 0;
		for(var item in cart) {
		  totalCount += cart[item].count;
		}
		return totalCount;
	  }

	  // Total cart
	  obj.totalCart = function() {
		var totalCart = 0;
		for(var item in cart) {
		  totalCart += cart[item].price * cart[item].count;
		}
		return Number(totalCart.toFixed(2));
	  }

	  // List cart
	  obj.listCart = function() {
		var cartCopy = [];
		for(i in cart) {
		  item = cart[i];
		  itemCopy = {};
		  for(p in item) {
			itemCopy[p] = item[p];

		  }
		  itemCopy.total = Number(item.price * item.count).toFixed(2);
		  cartCopy.push(itemCopy)
		}
		return cartCopy;
	  }

	  // cart : Array
	  // Item : Object/Class
	  // addItemToCart : Function
	  // removeItemFromCart : Function
	  // removeItemFromCartAll : Function
	  // clearCart : Function
	  // countCart : Function
	  // totalCart : Function
	  // listCart : Function
	  // saveCart : Function
	  // loadCart : Function
	  return obj;
	})();


	// *****************************************
	// Triggers / Events
	// ***************************************** 
	// Add item
	$('.add-to-cart').click(function(event) {
	  event.preventDefault();
	  var name = $(this).data('name');
	  var price = Number($(this).data('price'));
	  shoppingCart.addItemToCart(name, price, 1);
	  displayCart();
	});

	// Clear items
	$('.clear-cart').click(function() {
	  shoppingCart.clearCart();
	  displayCart();
	});


	function displayCart() {
	  var cartArray = shoppingCart.listCart();
	  var output = "";
	  for(var i in cartArray) {
		output += "<tr>"
		  + "<td>" + cartArray[i].name + "</td>" 
		  + "<td>(" + cartArray[i].price + ")</td>"
		  + "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name=" + cartArray[i].name + ">-</button>"
		  + "<input type='number' class='item-count form-control' data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "'>"
		  + "<button class='plus-item btn btn-primary input-group-addon' data-name=" + cartArray[i].name + ">+</button></div></td>"
		  + "<td><button class='delete-item btn btn-danger' data-name=" + cartArray[i].name + ">X</button></td>"
		  + " = " 
		  + "<td>" + cartArray[i].total + "</td>" 
		  +  "</tr>";
	  }
	  $('.show-cart').html(output);
	  $('.total-cart').html(shoppingCart.totalCart());
	  $('.total-count').html(shoppingCart.totalCount());
	}

	// Delete item button

	$('.show-cart').on("click", ".delete-item", function(event) {
	  var name = $(this).data('name')
	  shoppingCart.removeItemFromCartAll(name);
	  displayCart();
	})


	// -1
	$('.show-cart').on("click", ".minus-item", function(event) {
	  var name = $(this).data('name')
	  shoppingCart.removeItemFromCart(name);
	  displayCart();
	})
	// +1
	$('.show-cart').on("click", ".plus-item", function(event) {
	  var name = $(this).data('name')
	  shoppingCart.addItemToCart(name);
	  displayCart();
	})

	// Item count input
	$('.show-cart').on("change", ".item-count", function(event) {
	   var name = $(this).data('name');
	   var count = Number($(this).val());
	  shoppingCart.setCountForItem(name, count);
	  displayCart();
	});

	displayCart();
	
</script>

	<!-- //cart-js -->

	<!-- price range (top products) -->
	<script src="js/jquery-ui.js"></script>
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
	</script>
	<!-- //price range (top products) -->

	<!-- flexisel (for special offers) -->
	<script src="js/jquery.flexisel.js"></script>
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
	</script>
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