

<?php
include("../src/database.php");

if(isset($_POST['search'])){
  $from = $_POST['from'];
  $to = $_POST['to'];
  $date = $_POST['date'];

  //  retrieve nrecords from the database
  $query = "SELECT fromb, too, date FROM buses WHERE fromb = '$from' AND too = '$to' AND date = '$date'";
  $result = mysqli_query($con, $query);

  // If any matching records are found, redirect to available.php
  if(mysqli_num_rows($result) > 0){
    $busFound = false;

    // Loop through the results to find a matching date
    while($row = mysqli_fetch_assoc($result)){
      if($row['date'] == $date){
        $busFound = true;
        break;
      }
    }

    if($busFound){
      // If a matching bus is found, redirect to available.php
      header("Location: available.php");
      exit;
    } else {
      // If no matching date is found, redirect to available.php with an error message
      header("Location: available.php?message=not_available");
      exit;
    }
  } else {
    // If no matching records are found, redirect to available.php with an error message
    header("Location: available.php?message=not_available");
    exit;
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/home.css?v=<?php echo time(); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Roboto:wght@100&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-6Qk8fU7ww6+0f/5HSFb9JvW1+LPQG72OPOy4J6MhoM6feN4CCO4kuFhqV5Z1XWSr" crossorigin="anonymous">
  <title>BusSeat</title>
</head>

<body>
  <div>
    <div>

      <script src="https://kit.fontawesome.com/23e0fa26bb.js" crossorigin="anonymous"></script>

      <!-- Logo section-->
      <div class="logo">
        <a href="../src/index.php"><img src="../images/sar.png" alt="HopON"></a>
      </div>



      <!-- Travelling city -->
      <h1>
        <span style="margin-left: 2rem;">Travel to</span>
        <div class="message">
          <div class>Kalmunai</div>
          <div class>Galle</div>
          <div class>Colombo</div>
        </div>
      </h1>



      <!-- from control -->
      <form action="available.php" method="GET">
      <div class="container" style="margin-left: 8.5rem; ">
        <div class="form-control">
          <h2>The simplest way to book your bus tickets in Sri Lanka</h2>
          <div class="row">
            <div class="col-md-3">
              <label for="from">From:</label>
              <select name="from" id="from" required>
                <option value="">-- Select Departure Destination --</option>
                <option value="colombo">Colombo</option>
                <option value="kalmunai">Kalmunai</option>
                <option value="galle">Galle</option>
              </select>

            </div>
            <div class="col-md-3">
              <label for="to">To:</label>
              <select name="to" id="to" required>
                <option value="">-- Select Arrival Destination --</option>
                <option value="colombo">Colombo</option>
                <option value="kalmunai">Kalmunai</option>
                <option value="galle">Galle</option>
              </select>
            </div>
            <div class="col-md-3">
              <label for="date">Date:</label>
              <input type="date" id="date" name="date" required>
            </div>
            <div class="col-md-3">
              <button type="submit" name="search" value="Search">Search Bus</button>
            </div>
          </div>
          <span class="help-text" style="font-family: 'Roboto', sans-serif; text-align: right; cursor: pointer;">
          <a href="../src/help.php" style="text-decoration: none; color: green; font-weight: bold;">Need Help?</a>
          </span>
        </div>
      </div>
      </form>
</div>  

      <!-- Footer section -->

      <div class="footer">
        <footer style="display: flex; width: 100%;">
          <div class="container">
            <div class="row">
              <div class="col-md-4" >
                <h3>About Us</h3>
                <p>Welcome to our online bus reservation system! Our mission is to make bus travel in Sri Lanka easier,
                  more convenient, and more enjoyable for everyone.<br><br> We understand the challenges of planning and
                  booking bus trips, which is why we've created an intuitive and user-friendly platform that lets you
                  book your bus tickets with just a few clicks.</p>
              </div>
              <div class="col-md-4" style="margin-right: -7rem;">
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
    
  </div>

</body>

</html>




