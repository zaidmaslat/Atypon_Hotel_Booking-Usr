<?php
echo "<h1 style=\"text-align:center; font-size:50px;\">Make Reservation</h1>";
?>
<?php
if (isset($_GET['notAvailable'])) {
    echo '<h3 style="color:red">Number of rooms requested are not available</h3>';
  }

echo "<h1 style=\"text-align:left; font-size:20px;\">Please choose the hotel name:</h1>";
?>
<form action="/Users/reserve.php" method="POST">
    <input type="hidden" name="userID" value="<?php echo $_GET['userID'] ?>" >
    <select name="hotelID">
        <?php
        $con = mysqli_connect("my-mysql.default.svc.cluster.local", "dbuser", "123456", "hotel_management");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " .
                mysqli_connect_error();
        }
        $sql = "SELECT * FROM hotels";
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            echo "<option value=" . $row['hotelID'] . ">"  . $row['hotelName'] .  "</option>";
        }
        ?>
    </select>
    <?php
    echo "<h1 style=\"text-align:left; font-size:20px;\">Please choose the number of rooms:</h1>";
    ?>
    number-of-rooms:<br>
    <input type="number" name="num-rooms" value=""><br>

    <input type="submit" value="Submit">
</form>