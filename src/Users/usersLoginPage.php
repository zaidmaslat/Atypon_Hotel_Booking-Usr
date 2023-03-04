<?php
        $userID = $_GET['userID'];

?>
<?php
echo "<h1 style=\"text-align:center; font-size:50px;\">Users Page</h1>";
?>
<?php
echo "<h1 style='color:blue; text-align:center; font-size:25px;'><a href='searchHotel.php?userID=$userID'>Search for a Hotel</a></h1>";
?>
<?php
echo "<h1 style='color:blue; text-align:center; font-size:25px;'><a href='monitorReservations.php?userID=$userID'>Monitor My Reservations</a></h1>";
?>
