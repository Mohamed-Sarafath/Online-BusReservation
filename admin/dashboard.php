<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dash.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-T2UoSbLOliNcuqjgUV0EaS/VYdF8wz9bGfeX0c0ZN5S0hGnVK6RQpk9zIXfTEmfeOWMdk2uYxmIEUcTmFZWO5A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <title>Admin-Dashboard</title>



<!-- clear status buttin css -->
<style>
  /* Style for the container */
  .container {
    position: relative;
    text-align: center;
  }

  /* Style for the image */
  .container img {
    /* max-width: 100%;
    height: auto; */
    height:593px; 
    width: 1423px; 
    margin-top:-1.1rem;
    margin-left:-4rem;
  
  }

  /* Style for the form */
  .form-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  /* Style for the button */
  .clear-status-button {
    display: inline-block;
    margin-top: 2rem;
    margin-left: 1rem;
    padding: 10px 20px;
    background-color: #4CAF50;
    border-radius: 1rem;
    width:150px;
   
    color: white;
    border: none;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
  }

  .clear-status-button:hover {
    border-radius: 2rem;
    box-shadow: inset 0 -3px 0 0 #4d4d4d;
    transition: 0.5s;
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
        <label class="logo"><a href="../admin/dashboard.php">Admin Dashboard</a></label>
        <ul>
            <li><a class="active" href="../admin/dashboard.php">Dashboard</a></li>
            <li><a href="../admin/manage_admin.php">Manage Admin</a></li>
            <li><a href="../admin/bus_route.php">Bus Route</a></li>
            <li><a href="../admin/request.php">Request</a></li>
            <li><a href="paymentt.php">Payment</a></li>
            <li><a href="../admin/logout.php">Logout</a></li>
        </ul>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- <img src="../images/bg1.jpg" style="height:720px; width: 1404px; margin-top: -1.2rem;">; -->

        <?php
        include("../src/database.php");

        if (isset($_POST['clearStatusBtn'])) {
            $query = "UPDATE seats SET status = 1, b_id = NULL";
            $result = mysqli_query($con, $query);
        
            if ($result) {
                echo "<script>
                        Swal.fire({
                          title: 'Success',
                          text: 'Status updated successfully.',
                          icon: 'success',
                          showConfirmButton: false,
                          timer: 3000
                        });
                      </script>";
            } else {
                echo "<script>
                        Swal.fire({
                          title: 'Error',
                          text: 'Error updating status: " . mysqli_error($con) . "',
                          icon: 'error',
                          showConfirmButton: false,
                          timer: 3000
                        });
                      </script>";
            }
        }
        ?>




<div class="container">
  <img src="../images/bg1.jpg" alt="BGImage">
  <form method="POST" class="form-overlay">
    <button class="clear-status-button" type="submit" name="clearStatusBtn">Clear Status</button>
  </form>
</div>


</body>
</html>