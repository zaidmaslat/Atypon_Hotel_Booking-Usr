<?php
$userID=$_POST['userID'];
$num_rooms=$_POST['num-rooms'];
$hotelID=$_POST['hotelID'];

$con = mysqli_connect("my-mysql.default.svc.cluster.local", "dbuser", "123456", "hotel_management");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " .
        mysqli_connect_error();
}
//checking the availability of rooms: 
$result = mysqli_query($con,"select case when available_rooms >= $num_rooms THEN 'TRUE' ELSE 'FALSE' END isAvailable from hotels where hotelID = $hotelID ");
$isAvailable="FALSE";
while($row = $result->fetch_assoc()){
    $isAvailable=$row['isAvailable'] ; 
}

if ($isAvailable == "FALSE"){
    header("Location: /Users/makeReservation.php?notAvailable&userID=$userID");
    die();
}

//Add into reservation : 
mysqli_query($con,"INSERT INTO reservations (hotelID,userID,num_rooms) values ($hotelID,$userID,$num_rooms)  ");
//Decrease available rooms: 
mysqli_query($con,"update hotels set available_rooms=available_rooms - $num_rooms where hotelID = '$hotelID'");
echo "UserID $userID booked $num_rooms rooms. from hotel $hotelID" ;

?>