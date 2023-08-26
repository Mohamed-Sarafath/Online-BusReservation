<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/available.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-6Qk8fU7ww6+0f/5HSFb9JvW1+LPQG72OPOy4J6MhoM6feN4CCO4kuFhqV5Z1XWSr" crossorigin="anonymous">
    <script src="script.js"></script>

 <style>
        h2{
  font-family:'Roboto', sans-serif;
  text-align: center;
  margin-top:8rem;
}
</style> 

    <title>Available BusSeat</title>

</head>






<body>

<?php

include("../src/database.php");

?>

    <script src="https://kit.fontawesome.com/23e0fa26bb.js" crossorigin="anonymous"></script>

    <!-- header section with logo start -->
    <header class="header">
        <div class="logo">
            <a href="../src/index.php"><img style="cursor: pointer;" src="../images/sar.png" alt="HopON"></a>
        </div>
    </header>

    <div class="head" style="background-color: #FCF8E3; text-align: center; font-family: 'Roboto', sans-serif; color: #4D4D4D; margin-bottom:3rem;">
        <h4>from-to | Date</h4>
    </div>


<?php
// if data not equal message
if(isset($_GET['message'])){
  $message = $_GET['message'];

  // if data not equal message
  if($message === "not_available") {
    echo "<h2>Bus is not available for the selected route and date.</h2>";
  }
}
?>





<?php
// Retrieve the parameters from index page
$from = $_GET['from'];
$to = $_GET['to'];
$date = $_GET['date'];


// Construct the SQL query
$query = "SELECT * FROM buses WHERE fromb = '$from' AND too = '$to' AND date = '$date'";

// Execute the query
$result = mysqli_query($con, $query);


if (mysqli_num_rows($result) > 0) {
  // loop la podtrukan
  while ($row = mysqli_fetch_assoc($result)) {
    $tName = $row['T_name'];
    $busNo = $row['b_no'];
    $departurePlace = $row['fromb'];
    $destinationPlace = $row['too'];
    $busID = $row['b_id'];
    
    // show the retrieved data
    echo '<div class="container">
            <div class="bus-container">
              <div class="bus-details">
                <span class="travel-name">' . $tName . '</span>
                <span class="bus-number">' . $busNo . '</span>
              </div>
              <div class="from-to">
                <span style="font-family: \'Roboto\', sans-serif; font-size: 20px;">' . $departurePlace . '</span>
                <span>&nbsp&nbsp-&nbsp&nbsp</span>
                <span style="font-family: \'Roboto\', sans-serif; font-size: 20px;">' . $destinationPlace . '</span>
              </div>
              <div class="features">
                <p style="text-align: center; font-family: \'Roboto\', sans-serif; font-weight: bolder; font-size: 20px;">Features</p><br>
                <span class="feature-icon" title="Air Conditioner">&#x1F321;</span>
                <span class="feature-icon" title="Adjusting Seat">&#x1F4BA;</span>
                <span class="feature-icon" title="Charging Point">&#x1F50B;</span>
                <span class="feature-icon" title="Movie">&#x1F3AC;</span>
                <span class="feature-icon" title="Music">&#x1F3B5;</span>
              </div>
              <a href="booking.php?bus_id=' . $busID . '" class="view-seats-btn" style="text-decoration: none;">View Seats</a> 
              
            </div>
          </div>';
  }
} else {
  echo "No buses available for the selected criteria.";
}


mysqli_close($con);
?>





 

    <!-- Footer section -->

    <div class="footer">
        <footer style="display: flex; width: 100%; margin-top:2.1rem;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4" >
                        <h3>About Us</h3>
                        <p>Welcome to our online bus reservation system! Our mission is to make bus travel in Sri Lanka
                            easier, more convenient, and more enjoyable for everyone.<br><br> We understand the
                            challenges of planning and booking bus trips, which is why we've created an intuitive and
                            user-friendly platform that lets you book your bus tickets with just a few clicks.</p>
                    </div>
                    <div class="col-md-4">
                        <h3>Contact Us</h3>
                        <ul>
                            <li>12 Main Street.</li>
                            <li>Sainthamaruthu, State 31280</li>
                            <li>Phone: +947 765 760 556</li>
                            <li>Email: saraf4545@.com</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>Connect With Us</h3>
                        <ul class="social-media">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</body>

</html>