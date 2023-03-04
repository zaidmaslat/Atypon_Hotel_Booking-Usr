
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
      background-color: magenta;
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


</style>

<?php
echo "<h1 style=\"text-align:center; font-size:50px;\">Monitor My Reservations</h1>";
?>
<?php 
$userID=$_GET['userID'];
$con = mysqli_connect("my-mysql.default.svc.cluster.local", "dbuser", "123456", "hotel_management");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " .
        mysqli_connect_error();
}
echo "<a href=\"/Users/usersLoginPage.php?userID=$userID\" class=\"button\">Back to Home</a>" ; 
// reservationID,hotelName,number-of-rooms,status
$result = mysqli_query($con,"SELECT reservationID,hotelName,r.num_rooms,case when active then 'Active' else 'Not Active' end as Status from reservations r join hotels h on h.hotelID = r.hotelID where r.userID=$userID");
// restuns : hotelID,hotelName,num_rooms,booked_rooms,percentage

echo '<table id="currentoccupancy">'; 
echo '    <tr>'; 
echo '        <th>Reservation ID</td>'; 
echo '        <th>Hotel Name</td>'; 
echo '        <th>Number of rooms</td>'; 
echo '        <th>Status</td>'; 
echo '    </tr>'; 
while($row = $result->fetch_assoc()){
    $reservationID=$row['reservationID'];
    $hotelName=$row['hotelName'];
    $num_rooms=$row['num_rooms'];
    $status=$row['Status'];
    echo '    <tr>'; 
    echo "<td>$reservationID</td>" ;
    echo "<td>$hotelName</td>" ; 
    echo "<td>$num_rooms</td>" ; 
    echo "<td>$status</td>" ; 
    echo '    </tr>'; 
}

echo '    </tr>';
echo '</table>';
?>