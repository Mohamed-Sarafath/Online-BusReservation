<?php 
    include("../src/database.php");
?>

<?php 

  if(isset ($_GET['del'])){
        $bid = $_GET['del'];
        
        mysqli_query($con,"DELETE FROM buses WHERE b_id = $bid");
        
        $_SESSION['message'] = "Bus Route Deleted.....!";
        header ('location: ../admin/bus_route.php');
        
  }

?> 