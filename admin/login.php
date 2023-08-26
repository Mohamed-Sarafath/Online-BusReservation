<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Roboto:wght@100&display=swap" rel="stylesheet">  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-6Qk8fU7ww6+0f/5HSFb9JvW1+LPQG72OPOy4J6MhoM6feN4CCO4kuFhqV5Z1XWSr" crossorigin="anonymous">
  <title>Admin Login</title>
</head>

<body>




        <!-- Login form content -->
    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">

            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="../images/admin_log.jpg"
                class="img-fluid" alt="Phone image">
            </div>


            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                
                <p class="text-center h2 fw-bold mb-5">Admin Login</p>

                
                
                <form method="post">             
                <!-- Username input -->
                <div class="form-outline mb-3 mt-5 mb-4 ">
                  <input type="text" name="username" class="form-control form-control-lg " placeholder="Username" required />
                  
                </div>


                <!-- Password input -->
                <div class="form-outline mb-4 w-100 ">
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required />
                  
                </div>



                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-lg btn-block w-50 mb-5 ml-5"  name="sub"><a href="../admin/dashboard.php" style="color: white; text-decoration: none;">Login</a></button>


                </form>
            </div>
          </div>
        </div>
      </section>




</body>
</html>


<?php
include('../src/database.php');  

// inform sent from form username and password 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    // username and password sent from form 

    $myusername = mysqli_real_escape_string($con, $_POST['username']);
    $mypassword = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT a_id FROM admin WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {

        $_SESSION['admin'] = $myusername;

        header("location: dashboard.php");
    } else {
        echo '<script>alert("Your Login Name or Password is invalid") </script>';
    }
}
?>