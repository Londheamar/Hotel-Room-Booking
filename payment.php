<?php
session_start();
include "database/database.php";
?>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="css/style_header.css">

	<script src="https://use.fontawesome.com/a59f887248.js"></script>
		<script src="https://kit.fontawesome.com/e404e01acb.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<style>
		.pay-cont{width: 80%;background: whitesmoke;margin-left: 10%;margin-top: 30px;}
		.cont{width: 60%;margin-left: 20%;background: #e6e1e1;}
		.add-cont{width: 40%;margin-left: 20px;float: left;}
		.add-cont input, .card-cont input{width: 100%;margin-left: 5px;height: 40px;margin-top: 10px;margin-bottom: 10px;}
		.card-cont{width: 40%;float: left;margin-left: 40px;}
		.expdate input{width: 100%;margin-left: 5px;height: 40px;margin-top: 10px;margin-bottom: 10px;}
		input[type="submit"]{width: 50%;margin-left: 25%; font-size: 20px;padding:5px; background: #76f1f5; border-radius: 10%; outline: none;}
	</style>
</head>
<body>
<!-- header And Navbar start -->
<div class="header"
        style="background-image: url('bg/bg_image.jpg');background-repeat: no-repeat;background-position: center;background-size: 100% 100%;">
        <div class="logo">
            <img src="Image/Maratha_logo.png" alt="maratha logo.png">
        </div>

        <div class="nevbar" id="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="room.php">Room</a></li>
                <li><a href="#">Gallary</a></li>
                <li><a href="#footer">Contact</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Feedback</a></li>

            </ul>
        </div>
    </div>
<!-- header And Navbar end -->

<!-- Loader Start -->
<div id="div1">
	<div style="width: 100%; margin-top: 50px; position: absolute;">
		<div id="div3" style="width: 100%; margin-top: 35px;">
			<div style="background: rgba(112, 250, 244,0.2); margin-left: 30%; width: 40%; opacity: 1; box-shadow: 2px 2px 5px 5px #9fcc9f; border-radius: 10px; outline: none;">

				<img style=" margin-left: 40%;margin-top: 20px; width: 20%; outline: none; border-radius: 40px;" src="icon/25.gif">
				<h1 style="font-size: 20px; margin:30px; padding-bottom: 20px;">Please Wait Generating Your Ticket.........</h1>
<?php
// access the values of url
$roomNumber = $_GET['roomNumber'];
$roomName = $_GET['roomName'];
$checkIn = $_GET['checkIn'];
$checkOut = $_GET['checkOut'];
$adults = $_GET['adts'];
$children = $_GET['chldrn'];
$total = $_GET['amt'];
$imgPath = $_GET['imgPath'];

$name = $_SESSION['$name'];
$mobile = $_SESSION['$mobile'];
 $email = $_SESSION['$email'];
 $addrs = $_SESSION['$addrs'];
 $pin = $_SESSION['$pinCode'];
 $gender = $_SESSION['$gender'];

//  insert ticket information In to table
$sqlQuery = mysqli_query($conn, "INSERT INTO bookedroom(roomNumber, checkIn, checkOut, price, stat, full_name, mobile, email, addrs, gender)
												VALUES ('$roomNumber', '$checkIn', '$checkOut', '$total', 'Booked', '$name', '$mobile', '$email', '$addrs', '$gender' )")



?>			
			</div>
		</div>
	</div>
<!-- end Of Loader -->

<!-- Payment Form -->

	<div class="pay-cont">
		<div class="cont" >
			<h1>Total Amount :- <?php echo $total;  ?></h1>
			<form>
				<div class="add-cont">
					<p style="font-size: 20px;font-family: sans-serif;padding:20px;">Billing Address</p>
					<label for="fname"><i class="fa-lg fa fa-user"></i> Full Name</label>
            		<input type="text" id="fname" name="firstname" placeholder="<?php echo $_SESSION['$name']; ?>">
            		<label for="email"><i class="fa-lg fa fa-envelope"></i> Email</label>
            		<input type="text" id="email" name="email" placeholder="<?php echo $_SESSION['$email']; ?>">
            		<label for="adr"><i class="fa-lg fa fa-address-card-o"></i> Address</label>
            		<input type="text" id="adr" name="address" placeholder="<?php echo $_SESSION['$addrs']; ?>">
            		<label for="city"><i class="fa-lg fa fa-institution"></i> City</label>
            		<input type="text" id="city" name="city" placeholder="New York">
            		<div class="expdate">
                		<table> <tr> <td><label for="state">State</label></td>
                					<td><label for="zip">Zip</label></td> </tr>
              		</div>
              		<div class="expdate">
                		<tr>
                		<td><input type="text" id="state" name="state" placeholder="NY"></td>
                		<td><input type="text" id="zip" name="zip" placeholder="<?php echo $_SESSION['$pinCode']; ?>"></td></tr></table>
              		</div>
				</div>
				<div class="card-cont">
					<p style="font-size: 20px;font-family: sans-serif;padding:20px;">Payment</p>
					<label for="fname">Accepted Cards</label>
            		<div style="margin-top: 17px; margin-bottom: 10px;">
            			<i class="fa-2x fab fa-cc-visa" aria-hidden="true" style="color:navy;"></i>
            			<i class="fa-2x fab fa-cc-amex" aria-hidden="true" style="color:blue;"></i>
            			<i class="fa-2x fab fa-cc-mastercard" style="color:red;"></i>
            			<i class="fa-2x fab fa-cc-discover" aria-hidden="true" style="color:orange;"></i>
            		</div>
            		<label for="cname">Name on Card</label>
            		<input type="text" id="cname" name="cardname" placeholder="xyz">
            		<label for="ccnum">Credit card number</label>
            		<input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            		<label for="expmonth">Exp Month</label>
            		<input type="text" id="expmonth" name="expmonth" placeholder="September">
            		<div class="expdate">
                		<table> <tr> <td><label for="expyear">Exp Year</label></td>
                					<td><label for="cvv">CVV</label></td> </tr>
              		</div>
              		<div class="expdate">
                		<tr>
                		<td><input type="text" id="expyear" name="expyear" placeholder="2019"></td>
                		<td><input type="text" id="cvv" name="cvv" placeholder="352"></td></tr></table>
              		</div>
				</div><br clear="all">
				<input type="submit" name="submit" value="Make A Payment" disabled="disabled">
			</form>
		</div>
	</div>
</div>
    <!-- payment Form End -->

	<!-- Successful Ticket generation -->
<div id="div2">
<div class="alert alert-primary mb-3" role="alert">
  Enjoy Your Holidays....|
</div>

<div class="d-flex justify-content-center p-1">
<div class="card w-25"">
  <img class="card-img-top" src="<?php echo $imgPath ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $roomName; ?><span style="margin-left:20px;">
                                    <?php echo $roomNumber; ?></span></h5>
    <p class="card-text">Check In Date : <b><?php echo $checkIn; ?></b> To
                                <b><?php echo $checkOut; ?></b>
                            </p>
    <p class="card-text">You Piad : <?php echo $total; ?> <span
                                    style="font-size:25px; margin-left:5px;color:cyan" data-toggle="collapse"
                                    href="#collapsePrice" role="button" aria-expanded="false"
                                    aria-controls="collapsePrice">....</span></p>
  </div>
</div>


</div>
</div>
	<!-- Successful Ticket generation end-->

<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
    	
<script>
// hide payment Form And Show Ticket
$('#div2').hide();
setTimeout(function(){ $('#div1').hide(); showDiv2() },4000);
function showDiv2(){
    $('#div2').show();
	alert('Room Booked SuccessFully....|');
}
</script>
<!-- bootstrap CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
