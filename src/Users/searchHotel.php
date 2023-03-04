<style type="text/css">
        #currentoccupancy {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #currentoccupancy td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #currentoccupancy tr:nth-child(even){background-color: #f2f2f2;}
    
    #currentoccupancy tr:hover {background-color: #ddd;}
    
    #currentoccupancy th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: skyblue;
      color: white;
    }

    #oldReservations {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  #oldReservations td, #customers th {
    border: 1px solid purple;
    padding: 8px;
  }
  
  #oldReservations tr:nth-child(even){background-color: #f2f2f2;}
  
  #oldReservations tr:hover {background-color: #ddd;}
  
  #oldReservations th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: blue;
    color: white;
  }
  .button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button2 {
  background-color: orangered;
  border: none;
  color: white;
  padding: 15px 32px;
  align-content: center;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<?php
echo "<h1 style=\"text-align:center; font-size:50px;\">Search for a Hotel</h1>";
$userID=$_GET['userID'];
echo '<br>';
echo "<a href=\"/Users/usersLoginPage.php?userID=$userID\" class=\"button\">Back to Home</a>" ; 


$con=mysqli_connect("my-mysql.default.svc.cluster.local","dbuser","123456","hotel_management");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " .
mysqli_connect_error();
}

// Run MySQL query
$sql = 'SELECT * FROM hotels'; 
$result = $con->query($sql); 

// Output table, excluding certain columns and adding Title of each column 
echo "<table id=\"currentoccupancy\"><tr>"; 
echo "<th>Hotel Name</th>";
echo "<th>Hotel Phone</th>";
echo "<th>City</th>";
echo "<th>Number of Available Rooms</th>";
echo "</tr>";

// Retrieve data from database 
while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>" . $row['hotelName'] . "</td>";
    echo "<td>" . $row['hotelPhone'] . "</td>";
    echo "<td>" . $row['city'] . "</td>";
    echo "<td>" . $row['available_rooms'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Close database connection 
$con->close();


?>

<td1><a class="button2" href="/Users/makeReservation.php?userID=<?php echo $_GET['userID']?>">Make a reservation</a></td1>

