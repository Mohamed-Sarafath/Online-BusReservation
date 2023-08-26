<?php 
    include_once "../src/database.php";
?>

<?php 

    if (isset($_GET['del'])){
        $sid = $_GET['del'];
        mysqli_query($con,"DELETE FROM admin WHERE a_id=$sid");
        $_SESSION['message'] = "Address deleted...!";
        header('location: ../admin/manage_admin.php');
    }

?>