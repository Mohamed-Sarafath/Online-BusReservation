<?php
// Include database file
require_once '../src/database.php';

// Retrieve data bus  provided admin ID
if (isset($_GET['upd'])) {
    $busId = $_GET['upd'];

    // Retrieve the bus data from the database
    $query = "SELECT * FROM buses WHERE b_id = $busId";
    $result = mysqli_query($con, $query);
    $adminData = mysqli_fetch_assoc($result);
}


if (isset($_POST['update'])) {
    $busId = $_POST['b_id'];
    $busNo = $_POST['b_no'];
    $trname = $_POST['T_name'];
    $seats = $_POST['seat'];
    $Fromm = $_POST['from'];
    $too = $_POST['to'];
    $Sprice = $_POST['sprice'];
    $Date = $_POST['date'];

    // Update bus data in database
    $query = "UPDATE buses SET b_no='$busNo', T_name='$trname', seat='$seats', fromb='$Fromm',too='$too', price='$Sprice', date='$Date' WHERE b_id = $busId";
    mysqli_query($con, $query);

  
    header("Location: bus_route.php");
    exit();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bus_route.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <title>Admin-Dashboard</title>
    
    <style>
    .container {
      background-color: #221221221;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.7);
      margin-top: 100px;
      width:75%;
      border-radius:1rem;
    }
  </style>

    

</head>
</body>



 <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <div class="Toggler">
            <i class="fas fa-bars"></i>
        </div>
        </label>
        <label class="logo"><a href="../admin/bus_route.php">Bus Routes</a></label>
        <ul>
            <li><a href="../admin/dashboard.php">Dashboard</a></li>
            <li><a href="../admin/manage_admin.php">Manage Admin</a></li>
            <li><a class="active" href="../admin/bus_route.php">Bus Route</a></li>
            <li><a href="../admin/request.php">Request</a></li>
            <li><a href="paymentt.php">Payment</a></li>
            <li><a href="../admin/logout.php">Logout</a></li>
        </ul>
    </nav>



    <div class="container">
    <h1 style="text-align:center; margin-bottom:2rem;">Add Bus Details</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


    <input type="hidden" name="b_id" value="<?php echo $busId; ?>">

      <div class="form-group">
        <label for="busNo">Bus No:</label>
        <input type="text" class="form-control" id="busNo" name="b_no" value="<?php echo $adminData['b_no']; ?>"required>
      </div>

      <div class="form-group">
        <label for="travelsName">Travels Name:</label>
        <input type="text" class="form-control" id="travelsName" name="T_name" value="<?php echo $adminData['T_name']; ?>" required>
      </div>

      <div class="form-group">
        <label for="seats">Seats:</label>
        <input type="number" class="form-control" id="seats" name="seat" value="<?php echo $adminData['seat']; ?>" required>
      </div>

      <div class="form-group">
        <label for="from">From:</label>
        <select class="form-control" id="from" name="from"  value="">
         <option value=""><?php echo $adminData['fromb']; ?></option> 
          <option value="kalmunai">kalmunai</option>
          <option value="colombo">colombo</option>
          <option value="galle">galle</option>
          
        </select>
      </div>
      <div class="form-group">
        <label for="to">To:</label>
        <select class="form-control" id="to" name="to" value="">
           <option value=""><?php echo $adminData['too']; ?></option> 
           <option value="kalmunai">kalmunai</option>
           <option value="colombo">colombo</option>
           <option value="galle">galle</option>
        </select>

      <div class="form-group mt-3">
        <label for="sprice">Seat Price</label>
        <input type="text" class="form-control" id="sprice" name="sprice" value="<?php echo $adminData['price']; ?>" required>
      </div>

      <div class="form-group mt-3">
        <label for="date">Date:</label>
        <input type="date" class="form-control" id="date" name="date" value="<?php echo $adminData['date']; ?>" required>
      </div>

      <button type="submit" name="update" value="Update" class="btn btn-primary mb-5">Update</button>
    </form>
  </div>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

 





</body>
</html>


