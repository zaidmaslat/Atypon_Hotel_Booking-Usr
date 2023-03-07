<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/makeReservation.css">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light paddingHeder ">
			<a class="navbar-brand" href="#">Booking Hotel</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
				aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="/Users/usersLoginPage.php?userID=<?php echo $_GET['userID'] ?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="searchHotel.php?userID=<?php echo $_GET['userID'] ?>">Search for a hotel</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="monitorReservations.php?userID=<?php echo $_GET['userID'] ?>">Reservations</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link" href="http://app.hotel-booking-378919.com/">Sign out</a>
					</li>
				</ul>
			</div> 
		</nav>
    </header>
    <div>
        <h1 class="header">Make Reservation</h1>"
    </div>
    <div class="registration-form">



        <form action="/Users/reserve.php" method="POST">
            <input type="hidden" name="userID" value="<?php echo $_GET['userID'] ?>">

            <div class="form-group displayField arrow">
                <label class="marginLabel">Hotel</label>
                <select name="hotelID" class="form-control item">
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
            </div>



            <div class="form-group displayField">
                <label class="marginLabel">Number of rooms</label>
                <input type="number" name="num-rooms" class="form-control">
<?php
if (isset($_GET['notAvailable'])) {
    echo '<label style="color:red">Number of rooms requested are not available</label>';
  }

?>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary create-account">Submit</button>
                </div>
            </div>

        </form>
    </div>

</body>

</html>