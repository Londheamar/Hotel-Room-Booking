<?php

include 'database/database.php';
if(isset($_POST['submit'])){
    $roomNumber = $_POST['roomNumber'];
    $roomName = $_POST['roomName'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];

    $query_string = 'roomNumber=' . urlencode($roomNumber) . '&roomName=' . urlencode($roomName) . '&checkIn=' . urlencode($checkIn) . '&checkOut=' . urlencode($checkOut) . '&adts=' . urlencode($adults) . '&chldrn=' . urldecode($children);

    $query = "SELECT * FROM bookedroom where roomNumber = '$roomNumber' and checkIn BETWEEN '$checkIn' AND '$checkOut' 
    and checkOut BETWEEN '$checkIn' AND '$checkOut'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);
    if($row == 0){
        header('location:checkRoom.php?'.$query_string);
    }
    else{
        echo "<script> alert('Room Not Avalable.... Please Select Another Room and Change Data.....');</script>";
    }
}
?>

<html>
<head>
    <title> Room Booking </title>
    <link rel="stylesheet" type="text/css" href="css/style-room.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
          <style>
          
/* DatePicker Container */
.ui-datepicker {
	width: auto;
    height: auto;
	background: skyblue;
    
	margin: 5px auto 0;
	font: 9pt Arial, sans-serif;
	-webkit-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .5);
	-moz-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .5);
	box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .5);
}
.ui-datepicker a {
	text-decoration: none;
}
/* DatePicker Table */
.ui-datepicker table {
	width: 100%;
}
.ui-datepicker-header {
	color: #e0e0e0;
	font-weight: bold;
	-webkit-box-shadow: inset 0px 1px 1px 0px rgba(250, 250, 250, 2);
	-moz-box-shadow: inset 0px 1px 1px 0px rgba(250, 250, 250, .2);
	box-shadow: inset 0px 1px 1px 0px rgba(250, 250, 250, .2);
	text-shadow: 1px -1px 0px #000;
	filter: dropshadow(color=#000, offx=1, offy=-1);
	line-height: 30px;
	border-width: 1px 0 0 0;
	border-style: solid;
	border-color: #111;
}
.ui-datepicker-title {
	text-align: center;
}
.ui-datepicker-prev, .ui-datepicker-next {
	display: inline-block;
	width: 30px;
	height: 30px;
	text-align: center;
	cursor: pointer;
	background-image: url('../img/arrow.png');
	background-repeat: no-repeat;
	line-height: 600%;
	overflow: hidden;
}
.ui-datepicker-prev {
	float: left;
	background-position: center -30px;
}
.ui-datepicker-next {
	float: right;
	background-position: center 0px;
}
.ui-datepicker thead {
	background-color: #f7f7f7;
	background-image: -moz-linear-gradient(top,  #f7f7f7 0%, #f1f1f1 100%);
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f7f7f7), color-stop(100%,#f1f1f1));
	background-image: -webkit-linear-gradient(top,  #f7f7f7 0%,#f1f1f1 100%);
	background-image: -o-linear-gradient(top,  #f7f7f7 0%,#f1f1f1 100%);
	background-image: -ms-linear-gradient(top,  #f7f7f7 0%,#f1f1f1 100%);
	background-image: linear-gradient(top,  #f7f7f7 0%,#f1f1f1 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7f7f7', endColorstr='#f1f1f1',GradientType=0 );
	border-bottom: 1px solid #bbb;
}
.ui-datepicker th {
	text-transform: uppercase;
	font-size: 6pt;
	padding: 5px 0;
	color: #666666;
	text-shadow: 1px 0px 0px #fff;
	filter: dropshadow(color=#fff, offx=1, offy=0);
}
.ui-datepicker tbody td {
	padding: 0;
	border-right: 1px solid #bbb;
}
.ui-datepicker tbody td:last-child {
	border-right: 0px;
}
.ui-datepicker tbody tr {
	border-bottom: 1px solid #bbb;
}
.ui-datepicker tbody tr:last-child {
	border-bottom: 0px;
}
.ui-datepicker td span, .ui-datepicker td a {
	display: inline-block;
	font-weight: bold;
	text-align: center;
	width: 30px;
	height: 30px;
	line-height: 30px;
	color: #666666;
	text-shadow: 1px 1px 0px #fff;
	filter: dropshadow(color=#fff, offx=1, offy=1);
}
.ui-datepicker-calendar .ui-state-default {
	background: #ededed;
	background: -moz-linear-gradient(top,  #ededed 0%, #dedede 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ededed), color-stop(100%,#dedede));
	background: -webkit-linear-gradient(top,  #ededed 0%,#dedede 100%);
	background: -o-linear-gradient(top,  #ededed 0%,#dedede 100%);
	background: -ms-linear-gradient(top,  #ededed 0%,#dedede 100%);
	background: linear-gradient(top,  #ededed 0%,#dedede 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ededed', endColorstr='#dedede',GradientType=0 );
	-webkit-box-shadow: inset 1px 1px 0px 0px rgba(250, 250, 250, .5);
	-moz-box-shadow: inset 1px 1px 0px 0px rgba(250, 250, 250, .5);
	box-shadow: inset 1px 1px 0px 0px rgba(250, 250, 250, .5);
}
.ui-datepicker-calendar .ui-state-hover {
	background: #f7f7f7;
}
.ui-datepicker-calendar .ui-state-active {
	background: #6eafbf;
	-webkit-box-shadow: inset 0px 0px 10px 0px rgba(0, 0, 0, .1);
	-moz-box-shadow: inset 0px 0px 10px 0px rgba(0, 0, 0, .1);
	box-shadow: inset 0px 0px 10px 0px rgba(0, 0, 0, .1);
	color: #e0e0e0;
	text-shadow: 0px 1px 0px #4d7a85;
	filter: dropshadow(color=#4d7a85, offx=0, offy=1);
	border: 1px solid #55838f;
	position: relative;
	margin: -1px;
}
.ui-datepicker-unselectable .ui-state-default {
	background: #f4f4f4;
	color: #b4b3b3;
}
.ui-datepicker-calendar td:first-child .ui-state-active {
	width: 29px;
	margin-left: 0;
}
.ui-datepicker-calendar td:last-child .ui-state-active {
	width: 29px;
	margin-right: 0;
}
.ui-datepicker-calendar tr:last-child .ui-state-active {
	height: 29px;
	margin-bottom: 0;
}
          </style>
</head>

<body>


    <div class="logo">
        <img src="Image/Maratha_logo.png" alt="maratha logo.png">
    </div>

    <div class="nevbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a class="active" href="room.php">Room</a></li>
            <li><a href="gallary.html">Gallary</a></li>
            <li><a href="Contact.html">Contact</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="feedback.html">Feedback</a></li>

        </ul>
    </div>
    <div class="room">
        <?php
include 'database/database.php';
$query = mysqli_query($conn, " SELECT * FROM room_detail ");
while ($rows = mysqli_fetch_array($query)) {
?>
        <div class="roomdetail">
            <img style="    height: 50%;width: 100%;" src="<?php echo $rows['room_image']; ?>" alt="photo1"></a>
            <h1><?php echo $rows['room_name']; ?></h1>
            </br>
            <p> Capacity :<?php echo $rows['room_seats']; ?> person</br> Minimum Cost :
                <?php echo $rows['room_price']; ?></p>
            </br>
            <!-- <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Check Availability</button> -->
            <button class="myBtn">
                <span class="span" style="display: none;"><?php echo $rows['room_number']; ?></span>
                <span class="span" style="display: none;"><?php echo $rows['room_name']; ?></span>Check Availability
            </button>
        </div>
        <?php
}
?>
<!-- check availability form model -->
    </div>
    <div id="id01" class="modal">
        <div class="modal-content animate">

            <div class="heading-reservform">
                <span onclick="document
.getElementById('id01')

.style.display='none'" class="close" title="Close Modal">
                    &times;</span>

                <h2>Reservation Form</h2>
            </div>

            <form class="" method="post" action="">
                <div class="container">
                    <h4> Room Number : <i><span style="color:steelblue;" id="roomNumber"></span></i> , Room Name :
                        <i><span style="color:steelblue;" id="roomName"></span></i></h4>
                    <input type="hidden" name="roomNumber" id="inpRoomNumber" value="" required>
                    <input type="hidden" name="roomName" id="inpRoomName" value="" required><br>
                    <hr>

                    <label><b>check-in date</b></label>
                    <input type="text" name="checkIn" id="checkIn" required autocomplete="off">


                    <label><b>check-out date</b></label>
                    <input type="text" name="checkOut" id="checkOut" required autocomplete="off">

                    <label><b>no. of Adults</b></label>
                    <input type="text" name="adults" maxlength="2" required autocomplete="off">

                    <label><b>no. of Children</b></label>
                    <input type="text" name="children" required maxlength="2" autocomplete="off">

                    <button type="submit" name="submit">Check Availability</button>
                </div>
            </form>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById
 ('id01').style.
 display='none'" class="cancelbtn">
                    Cancel</button>

            </div>
        </div>
    </div>

    <script>
    // Get the modal 

    var modal = document.getElementById('id01');

    // When the user clicks anywhere
    // outside of the modal, close it

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    var buttons = document.getElementsByClassName('myBtn');
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", function(e) {
            let itm = e.target;
            let spnVal = itm.getElementsByClassName('span')
            for (var j = 0; j < spnVal.length; j++) {
                let roomNumber = spnVal[0].innerText;
                let roomName = spnVal[1].innerText;
                // console.log(spnVal[j].innerText);
                document.getElementById('id01').style.display = 'block', " style= width: auto ";
                let inpVal = document.getElementById('roomNumber');
                let inpVal1 = document.getElementById('inpRoomNumber');
                inpVal1.value = roomNumber;
                inpVal.innerText = roomNumber;
                let inpName = document.getElementById('roomName');
                let inpName1 = document.getElementById('inpRoomName');
                inpName1.value = roomName;
                inpName.innerText = roomName;

            }

        })
    }
    // let Abtn = document.getElementById('checkBtn');
    // Abtn.addEventListener('click', function(e) {
    // let span = Abtn.getElementsByClassName('span');
    // let roomNumber = span[0].innerHTML;
    // document.getElementById('id01').style.display = 'block', " style= width: auto ";
    // let inpVal = document.getElementById('roomNumber');
    // inpVal.value = roomNumber;
    // console.log(e);
    // })

// date picker

    var dateToday = new Date();
var dates = $("#checkIn, #checkOut").datepicker({
    defaultDate: "+1w",
    changeMonth: true,
    numberOfMonths: 1,
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "checkIn" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
    }
});
 



    </script>

</body>
</htm>