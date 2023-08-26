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

    <form action="" method="post">

      <div class="form-group">
        <label for="busNo">Bus No:</label>
        <input type="text" class="form-control" id="busNo" name="busNo" required>
      </div>

      <div class="form-group">
        <label for="travelsName">Travels Name:</label>
        <input type="text" class="form-control" id="travelsName" name="travelsName" required>
      </div>

      <div class="form-group">
        <label for="seats">Seats:</label>
        <input type="number" class="form-control" id="seats" name="seats" required>
      </div>

      <div class="form-group">
        <label for="from">From:</label>
        <select class="form-control" id="from" name="from" required>
          <option value="">Select a departure</option>
          <option value="kalmunai">kalmunai</option>
          <option value="colombo">colombo</option>
          <option value="galle">galle</option>
          
        </select>
      </div>
      <div class="form-group">
        <label for="to">To:</label>
        <select class="form-control" id="to" name="to" required>
          <option value="">Select a arrival</option>
          <option value="kalmunai">kalmunai</option>
          <option value="colombo">colombo</option>
          <option value="galle">galle</option>
          
        </select>

      <div class="form-group mt-3">
        <label for="sprice">Seat Price</label>
        <input type="text" class="form-control" id="sprice" name="sprice" required>
      </div>

      <div class="form-group mt-3">
        <label for="date">Date:</label>
        <input type="date" class="form-control" id="date" name="date" required>
      </div>

      <button type="submit" name="submit" class="btn btn-primary mb-5">Submit</button>
    </form>
  </div>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

 





</body>
</html>



<?php

include_once "../src/database.php";
if(isset ($_POST['submit']))
{
 
    $Busno = $_POST['busNo'];
    $Trname = $_POST['travelsName'];
    $Seat = $_POST['seats'];
    $Fromm=$_POST['from'];
    $Too= $_POST['to'];   
    $Sprice= $_POST['sprice'];   
    $Date=$_POST['date'];

    $sql = "INSERT INTO buses(B_no,T_name,Seat,fromb,too,price,date)Values('$Busno','$Trname','$Seat','$Fromm','$Too','$Sprice','$Date')";

    if(mysqli_query($con,$sql))
    {
        echo "New record Added successfuly !";
    }
    else
     {
        echo "Error:".$sql." " .mysqli_error($con);
       
     }
     mysqli_close($con) ;
    }
     
   ?> 
