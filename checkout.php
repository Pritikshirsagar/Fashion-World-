<!--
-->
<?php include('connection.php');
session_start();
if (isset($_SESSION['user_id']))
{
	$id = $_SESSION['user_id'];
}

else
{
	$id = "";
}
 ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Fashion World</title>
<!--css-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<!-- Bootstrap css -->
	<link href="css/style_1.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="css/fontawesome-all_1.css">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
<!--css-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!--search jQuery-->
	<script src="js/main.js"></script>
<!--search jQuery-->

 <!--mycart-->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
 <!-- cart -->
<script src="js/simpleCart.min.js"></script>
<!-- cart -->
  
</head>
<body>
	<!--header-->
		<?php include("header_log.php"); ?>
				<?php include("header1.php"); ?>
				
				
				<?php			
				$totalquantity = 0;
				$subtotal = 0;
				$totalamount = 0;
				
		$sql="select * from tbl_cart where user_id=$id  and checkout=''"; 
		//echo $sql;
		$result=$con->query($sql);
		if ($result->num_rows > 0) 
		{
			?>
<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>C</span>heckout Details
			</h3>
			<div class="checkout-right">
				
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SR No.</th>
								<th>Product Id</th>
								<th>Product</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
								<th>Delivery Cost</th>
								
							</tr>
						</thead>
						<tbody>
<?php
			while($row = $result->fetch_assoc()) 
			{					
				$i=1;
				$price=$row['price'];
				$qty=$row['quantity'];
				$shipping=$row["shipping"];
				$img=$row['img'];
				$product_id=$row['product_id'];
				$amount = ($qty * $price);
				
				
				$totalquantity = $totalquantity + $qty;
				
				$subtotal = $subtotal + $amount;
				
				//$delivery=300;
				
				$totalamount = ($subtotal + $shipping);
									
		?>
	
	
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $product_id;?></td>
								<td>
										<img src="admin/uploads/<?php echo $row['img'];?>"  width="50px"height="60px" class="img-responsive">
								</td>
								
								<td><?php echo $row['product_name'];?></td>
								<td><?php echo $price;?></td>
								<td><?php echo $qty;?></td>
								<td><?php echo $amount;?></td>
								
								<td><?php echo $shipping;?></td>
								
								
							</tr>
							<tr>
						<td colspan="7"><h1> Grand Total</h1></td>
						<td colspan="2"><?php echo $totalamount;?> </td>
					
					
					</tr>
						
						<?php  
	$i++;
			}
	}
	?></tbody>
					</table>
					</div>
			</div>
</div>
</div>			
				<!---------------------------shipping Address ------------------------------------------>
			<div class="container">
					<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm- mb-3">Shipping Address</h4>
					<form action="processcheckout.php" method="post" class="creditly-card-form agileinfo_form">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
										<input  type="text" name="name" placeholder="Full Name (eg.Pooja Nitin Gore)" required>									
										<input type="text"  maxlength="10"  placeholder="Mobile Number" name="number"  required>
										<input type="text"  placeholder="Landmark" name="landmark" required>											
										<input type="text"  placeholder="Town/City" name="city" required>									
									</div>									
										<select class="option-w3ls" name="1option" required>
											<option >Select Address type</option>
											<option>Office</option>
											<option>Home</option>
											<option>Commercial</option>
										</select>										
									</div>
							</div>
				        </div>
						<input type="submit" name="Submit" value="Submit"><br><br>
						
					</form>
			    </div>
					</div>
			</div>
	
				
				
						<?php include ("footer.php"); ?>
				<!--copy-->
				<?php include ("footer2.php"); ?>
				<!------>
				<!--copy-->
				

</body>
</html>