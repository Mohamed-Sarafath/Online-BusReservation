<?php


// $bu_no = "";
// $depart = "";
// $arrive = "";
// $name = "";
// $Tprice = "";

// Retrieve bk_id from the booking.php page    
// if (isset($_GET['bk_id'])) {
//   $bk_id = $_GET['bk_id'];

//   // Retrieve data from the book table
//   $selectQuery = "SELECT * FROM book WHERE bk_id = '$bk_id'";
//   $result = mysqli_query($con, $selectQuery);

//   // Fetch the data from the result
//   if ($result && mysqli_num_rows($result) > 0) {
//     $bookData = mysqli_fetch_assoc($result);

//     // Store the retrieved data in variables
//     $bu_no = $bookData['bu_no'];
//     $depart = $bookData['depart'];
//     $arrive = $bookData['arrive'];
//     $name = $bookData['name'];
//     $Tprice = $bookData['tprice'];
//   } else {
//     // Handle the case when no data is found
//   }
// }

// echo '<form action="" method="post">';

// echo '<input type="hidden" name="bu_no" value="' . $bu_no . '">';
// echo '<input type="hidden" name="depart" value="' . $depart . '">';
// echo '<input type="hidden" name="arrive" value="' . $arrive . '">';
// echo '<input type="hidden" name="name" value="' . $name . '">';
// echo '<input type="hidden" name="Tprice" value="' . $Tprice . '">';

// echo '<input type="hidden" name="PayBtn" value="Pay">'; 

// echo '</form>';



include("../src/database.php");

if (isset($_GET["bk_id"])) {
  $bk_id = $_GET["bk_id"];
} else {
  
  echo "bk_id is not provided in the URL.";
 
}

// Fetch data 
$query = "SELECT bu_no, name, depart, arrive, tprice FROM book WHERE bk_id = '$bk_id'";
$result = mysqli_query($con, $query);

if ($result) {
  // Check i
  if (mysqli_num_rows($result) > 0) {
      // Data found
      $row = mysqli_fetch_assoc($result);
      $bu_no = $row['bu_no'];
      $name = $row['name'];
      $depart = $row['depart'];
      $arrive = $row['arrive'];
      $Tprice = $row['tprice'];

  
  } else {
      
      echo "No data found for bk_id: " . $bk_id;
  }
} else {
  // Error query
  echo "Error executing query: " . mysqli_error($con);
}

if (isset($_POST['terms'])) {
// Get the form input values
$cname = $_POST['cname'];
$ccv = $_POST['ccv'];


//sql injection a prevent
$cname = mysqli_real_escape_string($con, $cname);
$ccv = mysqli_real_escape_string($con, $ccv);


// Perform the database query to check for a match
$query = "SELECT COUNT(*) AS count FROM bank WHERE bn_id = 1 AND cnumber = '$cname' AND ccv = '$ccv'";
$result = mysqli_query($con, $query);

// Check if the query was successful
if (!$result) {
    echo "Error executing query: " . mysqli_error($con);
    exit();
}

$row = mysqli_fetch_assoc($result);
$count = $row['count'];

// Check the count and return the appropriate value
if ($count > 0) {
    // Values match
    $returnValue = 1;
} else {
    // Values do not match
    $returnValue = 0;
}



if ($returnValue == 1 && isset($_POST['PayBtn'])) {
  // Get the data variables
  $bu_no = $_POST['bu_no'];
  $depart = $_POST['depart'];
  $arrive = $_POST['arrive'];
  $name = $_POST['name'];
  $Tprice = $_POST['tprice'];

  // Escape the data variables to prevent SQL injection
  $bu_no = mysqli_real_escape_string($con, $bu_no);
  $depart = mysqli_real_escape_string($con, $depart);
  $arrive = mysqli_real_escape_string($con, $arrive);
  $name = mysqli_real_escape_string($con, $name);
  $Tprice = mysqli_real_escape_string($con, $Tprice);

  // Prepare and execute the SQL query to insert data into the payment table
  $query = "INSERT INTO payment (bno, depart, arrive, name, tamnt) VALUES ('$bu_no', '$depart', '$arrive', '$name', '$Tprice')";
  $result = mysqli_query($con, $query);

  // Check if the insertion was successful
  if ($result) {
      echo "Data inserted successfully into the payment table!";
  } else {
      echo "Failed to insert data into the payment table: " . mysqli_error($con);
  }
}


}



// Pay button click to add data to the payment table
// if (isset($_POST['PayBtn'])) {

//   // Retrieve the form data
//     $cname = $_POST['cname'];
//     $ccv = $_POST['ccv'];
//     $date = $_POST['date'];

//   // Query the bank table to check if the values match
//   $query = "SELECT cnumber, ccv, Edate FROM bank WHERE bn_id = 2";
//   $result = mysqli_query($connection, $query);
//   $row = mysqli_fetch_assoc($result);

//   $dbCname = $row['cnumber'];
//   $dbCcv = $row['ccv'];
//   $dbDate = $row['Edate'];
  


  
    // Check if the query returned a matching row
 // if ($cname == $dbCname && $ccv == $dbCcv && $date == $dbDate) {
    // Values match, display a confirmation box using SweetAlert
    // echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
    // echo "<script>";
    // echo "swal({
    //   title: 'Are you sure to Pay?',
    //   text: 'This action cannot be undone.',
    //   icon: 'warning',
    //   buttons: ['Cancel', 'OK'],
    // }).then((confirmed) => {
    //   if (confirmed) {
    //     // Insert the data into the payment table
    //     \$insertQuery = \"INSERT INTO payment (bu_no, depart, arrive, name, Tprice) VALUES ('$bu_no', '$depart', '$arrive', '$name', '$Tprice')\";
    //     \$result = mysqli_query(\$con, \$insertQuery);

    //     // Check if the insertion was successful
    //     if (\$result) {
    //       swal('Payment successful!', '', 'success');
    //     } else {
    //       swal('Failed to add payment.', '', 'error');
    //     }
    //   } else {
    //     // User clicked Cancel, do nothing or take appropriate action
    //     swal('Payment canceled!', '', 'info');
    //   }
    // });";
    // echo "</script>";

//     echo "successfully complete";

//   } 
//   else {
//     // Values do not match, display an error message or take appropriate action
//     echo "Invalid card details. Please check again.";
//   }

//   // Close the database connection
//   mysqli_close($con);
// }
?>





<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/payment.css?v=<?php echo time(); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-6Qk8fU7ww6+0f/5HSFb9JvW1+LPQG72OPOy4J6MhoM6feN4CCO4kuFhqV5Z1XWSr" crossorigin="anonymous">
    <script src="script.js"></script>
  <title>Payment Page</title>


<style>
 
  input[type="checkbox"] {
    width: 18px;
    height: 18px;
    vertical-align: middle;
    margin-right: 5px;
   cursor: pointer;
  }
</style>




</head>
<body>


<script src="https://kit.fontawesome.com/23e0fa26bb.js" crossorigin="anonymous"></script>

<!-- header section with logo start -->
<header class="header">
    <div class="logo">
        <a href="../src/index.php"><img style="cursor: pointer;" src="../images/logo-invert.png" alt=""></a>
    </div>
</header>




<div class="container">
    <!-- <div class="book-details">
    <h2>Booking Details</h2> -->

    <form medhod="POST" action="payment.php">

        <!-- <div class="form-group">
          <label for="bu_no">Bus-Number:</label>
          <input type="text" id="bu_no" name="bu_no" value="<php echo $bu_no; ?>">
        </div>
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" value="<php echo $name; ?>">
        </div>
        <div class="form-group">
          <label for="mobile">Mobile Number:</label>
          <input type="tel" id="mobile" name="mobile" value="<php echo $mobile; ?>">
        </div>
        <div class="form-group">
          <label for="email">Email Address:</label>
          <input type="email" id="email" name="email" value="<php echo $email; ?>">
        </div>
        <div class="form-group">
          <label for="boarding">Boarding Place:</label>
          <input type="text" id="boarding" name="boarding" value="<php echo $depart; ?>">
        </div>
        <div class="form-group">
          <label for="destination">Destination Place:</label>
          <input type="text" id="destination" name="destination" value="<php echo $arrive; ?>">
        </div>
        <div class="form-group">
          <label for="SEprice">Price Per Seat:</label>
          <input type="text" id="SEprice" name="SEprice" value="<php echo $SEprice; ?>">
        </div>
        <div class="form-group">
          <label for="Tprice">Total Price:</label>
          <input type="text" id="Tprice" name="Tprice" value="<php echo $Tprice; ?>">
        </div>

        <hr style="weight:1rem; margin-top:5rem; margin-bottom:-3rem;"> -->


    <div class="payment-details">
      <h2>Payment Here</h2>

      <div class="form-group">
          <label for="cname">Card number:</label>
          <input type="text" id="cname" name="cname" required>
        </div>
        <div class="form-group">
          <label for="ccv">CCV:</label>
          <input type="password" id="ccv" name="ccv" required>
        </div>


       <button class="pay-btn" name="PayBtn">PayBill</button>

       <div class="form-group">
       <label style="margin-top:1.5rem;">
        <input type="checkbox" id="terms" name="terms" required>
        I agree to the <span style="color:green; font-weight:bold; cursor:pointer;"> terms </span> and <span style="color:green; font-weight:bold; cursor:pointer;">conditions</span>
        </label>
        </div>

      </form>
    </div>
</div>




          <!-- Footer section -->

        <!-- <div class="footer">
        <footer style="display: flex; width: 35%;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>About Us</h3>
                        <p>Welcome to our online bus reservation system! Our mission is to make bus travel in Sri Lanka
                            easier, more convenient, and more enjoyable for everyone.<br><br> We understand the
                            challenges of planning and booking bus trips, which is why we've created an intuitive and
                            user-friendly platform that lets you book your bus tickets with just a few clicks.</p>
                    </div>
                    <div class="col-md-4 ml-5">
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
    </div>  -->





</body>
</html>
