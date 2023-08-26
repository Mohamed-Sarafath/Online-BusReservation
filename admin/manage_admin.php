<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/manage_admin.css?v=<?php echo time(); ?>">
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

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>
</html>



<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJTBZkWWuUHNahSjQZtmeoQYjMvmHe1WYuCTkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rTBZkWWuUHNahSjQZtmeoQYjMvmHe1WYuCTH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/include-html.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>

    <script src="js/jquery-3.6.0.min.js"></script> 
   


     
    
    <!-- <Button style ="background-color:#12A641; text-align:center; border-radius:6px; margin-top:1rem; margin-left:5rem;"><a href="../admin/add_admin.php?edit=<?php echo$row['id']; ?>" style="text-decoration:none; color:#fff;">Add Admin</a></Button> -->

<?php
    include_once "../src/database.php";
    $results = mysqli_query($con,"SELECT * FROM admin");
?>

<div class="container">
</br>
</br>
     <!-- Add Admin Button --> 
    <a href="add_admin.php" class="btn btn-primary" style ="">Add Admin</a>

    <table class="table">
        <thead>
            <tr>
                <th>Admin ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>NIC</th>
                <th>Email</th>
                <th>User Name</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

<?php while($row = mysqli_fetch_array($results)) {?>

    <tr>
        <td><?php echo $row['a_id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['Addr']; ?></td>
        <td><?php echo $row['NIC']; ?></td>
        <td><?php echo $row['ema']; ?></td>
        <td><?php echo $row['username'];?></td>

        <td>
            <a href="upd_add.php?upd=<?php echo $row['a_id']; ?>"  class="btn btn-success">Edit</a>
            <a href="del_add.php?del=<?php echo $row['a_id']; ?>" class="btn btn-danger">Delete</a>
        </td>

    </tr>
    <?php }?>
</table>
</div>



                

                
