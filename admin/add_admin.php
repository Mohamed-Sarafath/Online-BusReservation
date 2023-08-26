<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/manage_admin.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJTBZkWWuUHNahSjQZtmeoQYjMvmHe1WYuCTkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rTBZkWWuUHNahSjQZtmeoQYjMvmHe1WYuCTH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/include-html.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>

    <script src="js/jquery-3.6.0.min.js"></script> 
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" /> 
   
    <title>Admin-Dashboard</title>

</head>
</body>

 <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <div class="Toggler">
            <i class="fas fa-bars"></i>
        </div>
        </label>
        <label class="logo"><a href="../admin/manage_admin.php">Manage Admin</a></label>
        <ul>
            <li><a href="../admin/dashboard.php">Dashboard</a></li>
            <li><a class="active" href="../admin/manage_admin.php">Manage Admin</a></li>
            <li><a href="../admin/bus_route.php">Bus Route</a></li>
            <li><a href="../admin/request.php">Request</a></li>
            <li><a href="paymentt.php">Payment</a></li>
            <li><a href="../admin/logout.php">Logout</a></li>
        </ul>
</nav>    



<?php
    include_once "../src/database.php";
    $results = mysqli_query($con,"SELECT * FROM admin");
?>

<div class="container">

  <form method="post">
    <section class="h-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="../images/adregister.jpg"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Admin registration</h3>


                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline w-100%">
                      <input type="text" name="name" placeholder="Full Name" required class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example1m" ></label>
                    </div>
                  </div>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="address" placeholder="Address" required class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example8"></label>
                </div>




                <div class="form-outline mb-4">
                  <input type="text" name="nic"  placeholder="NIC" required class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example9"></label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="email" placeholder="Email" required class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example90" ></label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="username" placeholder="Username" required class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example99" ></label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password" placeholder="Password" required class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example97" ></label>
                </div>

                <div class="d-flex justify-content-end pt-3">
                  <button type="button" class="btn btn-light btn-lg">Reset all</button>
                  <button type="submit" name="save" class="btn btn-warning btn-lg ms-2">Submit form</button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</form>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
    


<?php

include_once "../src/database.php";
if(isset ($_POST['save']))
{
 
    $Name = $_POST['name'];
    $Address = $_POST['address'];
    $Nic = $_POST['nic'];
    $Email=$_POST['email'];
    $Username= $_POST['username'];    
    $Password=$_POST['password'];

    $sql = "INSERT INTO admin(name,Addr,NIC,ema,username,password)Values('$Name','$Address','$Nic','$Email','$Username','$Password')";

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


                

                
