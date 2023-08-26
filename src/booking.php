<?php

include("../src/database.php");

// Retrieve the bus ID from available
$busID = $_GET['bus_id'];

// Prepare the SELECT query for retrieving bus data
$selectQuery = "SELECT fromb, too, b_no, price FROM buses WHERE b_id = ?";
$selectStatement = mysqli_prepare($con, $selectQuery);

// Bind the bus ID parameter
mysqli_stmt_bind_param($selectStatement, 'i', $busID);

// Execute the SELECT query
mysqli_stmt_execute($selectStatement);

// Get the result
$result = mysqli_stmt_get_result($selectStatement);

// Fetch the data from the result
if ($result && mysqli_num_rows($result) > 0) {
    $busData = mysqli_fetch_assoc($result);
    $depart = $busData['fromb'];
    $arrive = $busData['too'];
    $bname = $busData['b_no'];
    $SEprice = $busData['price'];
} else {
    $depart = "";
    $arrive = "";
    $bname = "";
    $SEprice = "";
}

?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Checking status and passing the values to the next page in payment.php -->
<?php
if (isset($_POST['continuePayBtn'])) {
    $s_id = $_POST['selectedSeat'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $boarding = $_POST['boarding'];
    $destination = $_POST['destination'];
    $Tprice = $_POST['Tprice'];

    // Check selected seat
    $statusQuery = "SELECT status FROM seats WHERE s_id = ?";
    $statusStatement = mysqli_prepare($con, $statusQuery);

    // Bind the seat ID parameter
    mysqli_stmt_bind_param($statusStatement, 'i', $s_id);

    // Execute the status query
    mysqli_stmt_execute($statusStatement);

    // Get the result
    $statusResult = mysqli_stmt_get_result($statusStatement);

    if ($statusResult && mysqli_num_rows($statusResult) > 0) {
        $row = mysqli_fetch_assoc($statusResult);
        $currentStatus = $row['status'];

        if ($currentStatus == 0) {
            echo "Seat is already occupied. Please select another seat.";
        } elseif ($currentStatus == 1) {
            $updateQuery = "UPDATE seats SET status = 0, b_id = ? WHERE s_id = ?";
            $updateStatement = mysqli_prepare($con, $updateQuery);

            // Bind the parameters
            mysqli_stmt_bind_param($updateStatement, 'ii', $busID, $s_id);

            // Execute the update query
            mysqli_stmt_execute($updateStatement);

            if ($updateStatement) {

                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $insertQuery = "INSERT INTO book (bu_no, name, m_no, email, depart, arrive, sprice, tprice, s_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $insertStatement = mysqli_prepare($con, $insertQuery);

                // Bind the parameters
                mysqli_stmt_bind_param($insertStatement, 'ssisssddi', $bname, $name, $mobile, $email, $boarding, $destination, $SEprice, $Tprice, $s_id);

                // Execute the insert query
                mysqli_stmt_execute($insertStatement);

                if ($insertStatement) {
                    echo "<script>
                    Swal.fire({
                        title: 'Success',
                        text: 'Successfully Requested!',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    </script>";
                } else {
                    echo "<script>
                    Swal.fire({
                        title: 'Error',
                        text: 'Cannot Request. Check Information: " . mysqli_error($con) . "',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    </script>";
                }
            } else {
                echo "Error updating status: " . mysqli_error($con);
            }
        }
    } else {
        echo "Invalid seat selection. Please try again.";
    }
}
?>








<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/booking.css?v=<?php echo time(); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-6Qk8fU7ww6+0f/5HSFb9JvW1+LPQG72OPOy4J6MhoM6feN4CCO4kuFhqV5Z1XWSr" crossorigin="anonymous">
    <script src="script.js"></script>
  <title>Booking</title>

  <style>
    .selected {
  background-color: green;
  color:#fff;
}

.occupied {
  background-color: red;
  color:#fff;
}

.occupied:hover{
  background-color: red;
  color:#fff;
}

  </style>

</head>
<body>






<script src="https://kit.fontawesome.com/23e0fa26bb.js" crossorigin="anonymous"></script>

    <!-- header section with logo start -->
    <header class="header">
        <div class="logo">
            <a href="../src/index.php"><img style="cursor: pointer;" src="../images/sar.png" alt=""></a>
        </div>
    </header>





    
<!-- create bus seats square box -->
<div class="container">
    <div class="seat-booking">
      <h2>Seat Booking</h2>
      <div class="seat-container">






<!-- assign each seat for each s_id  -->
      <?php
            $query = "SELECT s_id, status FROM seats";
            $result = mysqli_query($con, $query);
            
            if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
                $s_id = $row['s_id'];
                $status = $row['status'];
                $seatClass = ($status == 0) ? 'seat occupied' : 'seat';
                echo '<div class="' . $seatClass . '" id="sid' . $s_id . '">' . $s_id . '</div>';
              }
              mysqli_free_result($result);
            }
      ?>








<!-- script for selected s_id and store the value in the variable -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {

// Retrieve the price per seat
    var pricePerSeat = <?php echo $busData['price']; ?>;  

    //calculating total price for it
    function updateTotalPrice() {
      var selectedSeats = $('.selected').length;
      var totalPrice = selectedSeats * pricePerSeat;
      $('#Tprice').val(totalPrice);
    }


    //getting all the selected seat s_id's
    $('.seat').click(function() {
      var s_id = $(this).attr('id').split('sid')[1];
      console.log('Selected s_id:', s_id);

      $(this).toggleClass('selected');

     //hidden la irukire s_id field a set pandren
      $('#selectedSeat').val($('.selected').map(function() {
        return $(this).attr('id').split('sid')[1];
      }).get().join(','));

      // Update the total price field
      updateTotalPrice();
    });
  });
</script>

   </div>
    </div>






<!-- customer deatils form -->
    <div class="customer-details">
      <h2>Customer Details</h2>
      
      <form method="POST" >

 <!-- i hidden the s_id cuz it doesn't needed to show -->
      <input type="hidden" id="selectedSeat" name="selectedSeat" value="">  


      <div class="form-group">
          <label for="bname">Bus-Number:</label>
          <input type="text" id="bname" name="bname" value="<?php echo $bname; ?>">
        </div>
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="mobile">Mobile Number:</label>
          <input type="tel" id="mobile" name="mobile" required>
        </div>
        <div class="form-group">
          <label for="email">Email Address:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="boarding">Boarding Place:</label>
          <input type="text" id="boarding" name="boarding" value="<?php echo $depart; ?>">
        </div>
        <div class="form-group">
          <label for="destination">Destination Place:</label>
          <input type="text" id="destination" name="destination" value="<?php echo $arrive; ?>">
        </div>
        <div class="form-group">
          <label for="SEprice">Price Per Seat</label>
          <input type="text" id="SEprice" name="SEprice" value="<?php echo $SEprice; ?>">
        </div>
        <div class="form-group">
          <label for="Tprice">Total Price</label>
          <input type="text" id="Tprice" name="Tprice" value="">
        </div>

        <button class="continue-pay-btn" name="continuePayBtn">Request</button>
      </form>
    </div>
  </div>





      <!-- Footer section -->

      <div class="footer">
        <footer style="display: flex; width: 100%;">
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
    </div>
</body>
</html>
