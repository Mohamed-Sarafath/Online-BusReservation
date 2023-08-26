<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bus_route.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJTBZkWWuUHNahSjQZtmeoQYjMvmHe1WYuCTkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rTBZkWWuUHNahSjQZtmeoQYjMvmHe1WYuCTH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/include-html.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>

    <script src="js/jquery-3.6.0.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-T2UoSbLOliNcuqjgUV0EaS/VYdF8wz9bGfeX0c0ZN5S0hGnVK6RQpk9zIXfTEmfeOWMdk2uYxmIEUcTmFZWO5A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <label class="logo"><a href="../admin/request.php">Request</a></label>
        <ul>
            <li><a href="../admin/dashboard.php">Dashboard</a></li>
            <li><a href="../admin/manage_admin.php">Manage Admin</a></li>
            <li><a href="../admin/bus_route.php">Bus Route</a></li>
            <li><a class="active" href="../admin/request.php">Request</a></li>
            <li><a  href="../admin/paymentt.php">Payment</a></li>
            <li><a href="../admin/logout.php">Logout</a></li>
        </ul>
    </nav>




<div class="container">
</br>
</br>

    <table class="table">
        <thead>
            <tr>
                <th>BookID</th>
                <th>Bus No</th>                
                <th>Customer Name</th>
                <th>Departure</th>
                <th>Destination</th>
                <th>Email</th>
                <th>Total Amount</th>
                <th>Seat Number</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

<?php
    include_once "../src/database.php";
    $results = mysqli_query($con,"SELECT * FROM book");
?>

<?php while($row = mysqli_fetch_array($results)) {?>

    <tr>
        
        <td><?php echo $row['bk_id']; ?></td>
        <td><?php echo $row['bu_no']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['depart']; ?></td>
        <td><?php echo $row['arrive']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['tprice']; ?></td>
        <td><?php echo $row['s_id']; ?></td>
        

        <td>
        <a href="acc_req.php?acc=<?php echo $row['bk_id']; ?>" class="btn btn-success" name="acc">
        <i class="fas fa-check-circle"></i> Accept
        </a>

        <a href="del_req.php?del=<?php echo $row['bk_id']; ?>&sid=<?php echo $row['s_id']; ?>" class="btn btn-danger">

        <i class="fas fa-times-circle"></i> Cancel
        </a>
        
        </td>

    </tr>
    <?php }?>
</table>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

 





</body>
</html>



