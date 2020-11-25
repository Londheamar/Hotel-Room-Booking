<?php

declare(strict_types=1);
session_start();
include "database/database.php";
// if room id is available 

if(isset($_GET['roomId'])){
$roomNumber = $_GET['roomNumber'];
$roomName = $_GET['roomName'];
$checkIn = $_GET['checkIn'];
$checkOut = $_GET['checkOut'];
$adults = $_GET['adts'];
$children = $_GET['chldrn'];




$sql  = "SELECT * FROM room_detail WHERE room_number = '$roomNumber' and room_name = '$roomName'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$MT = $row['room_price'] * $adults;

$GST_Amount = ( $MT * 18 ) / 100 ;
$total = $GST_Amount+$MT;

}else{
    // if room id not available
    $roomNumber = $_GET['roomNumber'];
$roomName = $_GET['roomName'];
$checkIn = $_GET['checkIn'];
$checkOut = $_GET['checkOut'];
$adults = $_GET['adts'];
$children = $_GET['chldrn'];


$sql  = "SELECT * FROM room_detail WHERE room_number = '$roomNumber' and room_name = '$roomName'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$MT = $row['room_price'] * $adults;

$GST_Amount = ( $MT * 18 ) / 100 ;
$total = $GST_Amount+$MT;
}
// personal info form data
if(isset($_POST['submitForm'])){
    if(isset($_POST['childName'])){
        $childName = $_POST['childName'];
    }
        function myFun(){
            $fName = $_POST['fName'];
            $mobile = $_POST['mobile'];
            $emailId = $_POST['emailId'];
            $addrs = $_POST['addrs'];
            $pinCode = $_POST['pinCode'];
            $gender = $_POST['customRadio'];
            return array($fName, $mobile, $emailId, $addrs, $pinCode, $gender);
        }
        function infoCheck(){
            echo '<h5 style="color:green;">Check Your Information<br> & Make Payment</h5>';
        }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style_header.css">
<!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Room Booking</title>
    <style>
    * {
        margin: 0;
        padding: 0;
    }
/* sticky navbar on scrolling */
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1;
    }

    .pesonalForm {
        background-image: url('bg/bg.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100% 100%;
        background-attachment: fixed;
    }

    .pesonalFormInner {
        background: rgba(99, 255, 250, 0.4);
    }

    html {
        scroll-behavior: smooth;
    }
    </style>
</head>

<body>
<!-- header and navbar start -->
    <div class="header"
        style="background-image: url('bg/bg_image.jpg');background-repeat: no-repeat;background-position: center;background-size: 100% 100%;">
        <div class="logo">
            <img src="Image/Maratha_logo.png" alt="maratha logo.png">
        </div>

        <div class="nevbar" id="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="room.php">Room</a></li>
                <li><a href="gallary.html">Gallary</a></li>
                <li><a href="#footer">Contact</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="feedback.html">Feedback</a></li>

            </ul>
        </div>
    </div>
    <!-- header and navbar end -->

    <!-- display search room if available -->
    <div class="container mt-2  ">
        <div class="d-flex justify-content-center">
            <div class="card mb-5" style="max-width: 80%; max-height: 77vh;">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="<?php echo $row['room_image']; ?>" class="card-img h-100" alt="...">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $roomName; ?><span style="margin-left:20px;">
                                    <?php echo $row['room_number']; ?></span></h5>
                            <p class="card-text">Room Available on This Date : <b><?php echo $checkIn; ?></b> To
                                <b><?php echo $checkOut; ?></b>
                            </p>
                            <p class="card-text">Adults : <b><?php echo $adults; ?></b>, Children :
                                <b><span id="childNum"><?php echo $children; ?></span></b>
                            </p>
                            <p class="card-text">Total Price : <?php echo $total; ?> <span
                                    style="font-size:25px; margin-left:5px;color:cyan" data-toggle="collapse"
                                    href="#collapsePrice" role="button" aria-expanded="false"
                                    aria-controls="collapsePrice">....</span></p>
                            <?php
                            // calling fuction after form filling 
                                if(function_exists('infoCheck')){
                                    infoCheck();
                                }else{
                            ?>

                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseForm" role="button"
                                aria-expanded="false" aria-controls="collapseform">
                                Book Now
                            </a>
                            <?php } ?>
                            <!-- total price show and hide -->
                            <div class="collapse" id="collapsePrice" style="float:right; margin-top:-80px">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Adults(<?php echo $adults; ?>) *
                                                <?php echo $row['room_price']; ?></th>
                                            <td scope="col"><?php echo $MT; ?></td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">18% GST</th>
                                            <td><?php echo $GST_Amount; ?></td>

                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td scope="row">Total</td>
                                            <th><?php echo $total; ?></th>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php 
        // after fillign form display information by calling function created in top of the page
                            if(function_exists('myFun')){
        
                                $name = myFun()[0];
                                $mobile = myFun()[1];
                                $email = myFun()[2];
                                $addrs = myFun()[3];
                                $pinCode = myFun()[4];
                                $gender = myFun()[5];
                                $_SESSION['$name'] = $name;
                                $_SESSION['$mobile'] = $mobile;
                                $_SESSION['$email'] = $email;
                                $_SESSION['$addrs'] = $addrs;
                                $_SESSION['$pinCode'] = $pinCode;
                                $_SESSION['$gender'] = $gender;
                                $paymentURL = 'roomNumber=' . urlencode($roomNumber) . '&roomName=' . urlencode($roomName) . '&imgPath=' . urlencode($row['room_image']) . '&checkIn=' . urlencode($checkIn) . '&checkOut=' . urlencode($checkOut) . '&adts=' . urlencode($adults) . '&chldrn=' . urldecode($children) . '&amt=' . $total;

                                if(isset($childName)){
                                        
                        ?>
         <!-- after fillign form display information by calling function created in top of the page -->

        <div class="container pesonalForm">
            <div class="d-flex flex-column justify-content-center p-1 w-50"
                style="margin-left:25%; background:rgba(255,255,255,1)">
                <fieldset>
                    <legend>Personal Detail</legend>
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="text-center text-info" scope="col" colspan="3">Personal Info</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="1">Name</td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $childName; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">Gender</td>
                                <td><?php echo $gender; ?></td>
                            </tr>
                            <tr>
                                <th class="text-center text-info" colspan="3">Contact Info</th>
                            </tr>
                            <tr>
                                <td colspan="2">Mobile</td>
                                <td><?php echo $mobile; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">email</td>
                                <td><?php echo $email; ?></td>
                            </tr>
                            <tr>
                                <th class="text-center text-info" colspan="3">Address</th>
                            </tr>
                            <tr>
                                <td colspan="2">Address</td>
                                <td><?php echo $addrs . " " . $pinCode; ?></td>
                            </tr>
                            <tr>
                                <td id="text" colspan="2"><input type="checkbox" checked id="myCheck"
                                        onclick="myFunction()"> agree terms & Conditions
                                </td>
                                <td>
                                    <p style="display:none"></p>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center text-info" scope="col" colspan="3"><a href="payment.php?<?php echo $paymentURL; ?>" ><button type="button"
                                        class="btn btn-primary btn-lg btn-block">Make A Payment</button></a></th>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>


        <?php 
       
    }
}  
                                    ?>



<!-- peronal info form start -->

        <div class="collapse pesonalForm" id="collapseForm">

            <div class="d-flex justify-content-center p-1 pesonalFormInner">

                <fieldset class="border border-info pl-5 pr-5 pb-5">
                    <legend style="width:auto;margin-left:5px;">Personal Detail:</legend>
                    <div class="formBody float-left ml-3">
                        <h4>Add Adults</h4>

                        <form method="post">

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Full Name</label>
                                <input type="text" name="fName" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Full name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Full Name</label>
                            </div>
                            <div class="custom-control custom-radio float-left" style="margin-top:-15px;">
                                <input type="radio" id="customRadio1" name="customRadio" value="Male"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">Male</label>
                            </div>
                            <div class="custom-control custom-radio float-right " style="margin-top:-15px;">
                                <input type="radio" id="customRadio2" name="customRadio" value="Male"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">Female</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Mobile Number</label>
                                <input type="text" name="mobile" class="form-control" id="exampleFormControlInput1"
                                    placeholder="0000000000">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email address</label>
                                <input type="email" name="emailId" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Address</label>
                                <input type="text" name="addrs" class="form-control" id="exampleFormControlInput1"
                                    placeholder="street, city, dist, state ">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Pin Code</label>
                                <input type="text" name="pinCode" class="form-control" id="exampleFormControlInput1"
                                    placeholder="street, city, dist, state ">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submitForm" class="form-control bg-primary text-warning"
                                    id="exampleFormControlInput1" value="Submit">
                            </div>

                    </div>

                    <div class="formBody childrenForm float-left ml-3" id="childrenForm">
                        <h4>Add Children</h4>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Full Name</label>
                            <input type="text" name="childName" class="form-control" id="exampleFormControlInput1"
                                placeholder="Full name">
                        </div>

                        </form>
                    </div>
                </fieldset>

            </div>
        </div>
    </div>
    <!-- personal info form end -->
    <!-- display similar room that search by user -->
    <?php

    $query  = mysqli_query($conn, "SELECT * FROM room_detail WHERE NOT room_number='$roomNumber' LIMIT 3");
?>
    <div class="container">
        <div class="d-flex">
            <h3 class="" style="margin-left:130px;">Rooms Related Your Search...</h2>
        </div>
        <div class="d-flex justify-content-center">
            <?php 
            while($row = mysqli_fetch_array($query)){

        ?>
            <div class="card float-left ml-2" style="width: 18rem;">
                <img src="<?php echo $row['room_image']; ?>" class="card-img-top"
                    alt="<?php echo $row['room_image']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['room_name']; ?></h5>
                    <p class="card-text">Person <?php echo $row['room_seats']; ?> <span class="ml-5">Price
                            <?php echo $row['room_price']; ?></span></p>
                    <p class="card-text">Available on <?php echo $checkIn; ?></p>
                    <?php
    $query_string1 = 'roomId=' . urlencode($row['id']) . '&roomNumber=' . urlencode($row['room_number']) . '&roomName=' . urlencode($row['room_name']) . '&checkIn=' . urlencode($checkIn) . '&checkOut=' . urlencode($checkOut) . '&adts=' . urlencode($adults) . '&chldrn=' . urldecode($children);

                    ?>
                    <a href="checkRoom.php?<?php echo $query_string1; ?>" class="btn btn-primary">Book Now</a>
                </div>
            </div>
            <?php
            }
        ?>
        </div>
    </div>
    </div>
<!-- footer start -->
    <div class="footer" id="footer">
        <div class="contact" id="contact">
            <h3> Contact Us</h3>
            <p>
                <span class="cont-info">Address : *************</span></br>
                </br>
                <span class="cont-info">Name : ********</span></br>
                <span class="cont-info"> Whatsapp No. : 9405042907</span></br>
                <span class="cont-info"> Email :<a
                        href="mailto:itsmryrfrnds@gmail.com?subject=Mail Me&body=londheamar143@gmail.com">itsmryrfrnds@gmail.com</a></span>
            </p>
        </div>

        <div class="map">
            <div class="gmap">
                <h1> Location</h1>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3752.2106236742493!2d75.32635811438898!3d19.873326231590582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdb986fcec188ef%3A0x6de7ef9596b863e8!2sKranti+Chowk%2C+Aurangabad%2C+Maharashtra+431005!5e0!3m2!1sen!2sin!4v1548546288003"
                    width="580" height="260" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <br clear="all">

    <div class="foot">
        <p>© 2019 The Maratha Hotels... All Rights Reserved..</p>
    </div>
    </div>
<!-- footer end -->

    <script type="text/javascript">
    let childNum = document.getElementById('childNum').innerHTML;
    console.log(childNum)

    if (childNum == 1) {
        document.getElementById('childrenForm').setAttribute("style", "display:block;");
        console.log(childNum)
    } else {
        document.getElementById('childrenForm').style.display = 'none';
        console.log(childNum)

    }


    window.onscroll = function() {
        myFunction()
    };

    // Get the navbar
    var navbar = document.getElementById("navbar");

    // Get the offset position of the navbar
    var sticky = navbar.offsetTop;

    // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }

    function myFunction() {
        var checkBox = document.getElementById("myCheck");
        var text = document.getElementById("text");
        if (checkBox.checked == true) {
            text.style.color = "black";
        } else {
            text.style.color = "red";
        }
    }

    window.history.forward();
    </script>



<!-- bootstrap CDN -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>
