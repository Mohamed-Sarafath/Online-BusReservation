<html>
    <head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
    </html>




<?php
    include_once "../src/database.php";

    if(isset($_GET['acc'])) {
        $bk_id = $_GET['acc'];
        $query = "SELECT * FROM book WHERE bk_id = $bk_id";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $bu_no = $row['bu_no'];
            $name = $row['name'];
            $depart = $row['depart'];
            $arrive = $row['arrive'];
            $email = $row['email'];
            $tprice = $row['tprice'];

            // Insert the values into the payment table
            $insertQuery = "INSERT INTO payment (bno, name, depart, arrive, tamnt) VALUES ('$bu_no', '$name', '$depart', '$arrive', '$tprice')";
            $insertResult = mysqli_query($con, $insertQuery);

            if($insertResult) {
                $bk_id = $_GET['acc'];
                $delQuery = "DELETE FROM book WHERE bk_id = $bk_id ";
                $delResult = mysqli_query($con, $delQuery);
                echo "<script>
                        Swal.fire({
                            title: 'Success',
                            text: 'Payment record added successfully.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        }).then(() => {
                            window.location.href = '../admin/request.php';
                        });
                      </script>";
                      
            } else {
                echo "<script>
                        Swal.fire({
                            title: 'Error',
                            text: 'Error adding payment record: " . mysqli_error($con) . "',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 3000
                        }).then(() => {
                            window.location.href = '../admin/request.php';
                        });
                      </script>";
            }
        } else {
            echo "<script>
                    Swal.fire({
                        title: 'Error',
                        text: 'Booking record not found.',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 3000
                    }).then(() => {
                        window.location.href = '../admin/request.php';
                    });
                  </script>";
        }
    }
?>






<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

 require '../PHPMailer/src/Exception.php';
 require '../PHPMailer/src/PHPMailer.php';
 require '../PHPMailer/src/SMTP.php';


 if(isset($_GET['acc'])) {
    $bk_id = $_GET['acc'];
         
         $message = "Subject: Your Request Has Been Accepted<br><br>

         Dear ".$name."',<br>
         
         We hope this message finds you well. We wanted to inform you that your request has been accepted by our administration team.<br> We are pleased to accommodate your needs and provide the service you requested.
         
         Your satisfaction is our utmost priority, and we are committed to delivering the highest quality experience. Our team is now working diligently to fulfill your request within the specified timeframe. We will keep you updated on the progress and inform you of any further developments.<br>
         
         If you have any questions or require additional information, please do not hesitate to reach out to our customer support team. We are here to assist you and ensure your experience with us is smooth and enjoyable.<br>
         
         Thank you for choosing our services, and we appreciate your patience. We look forward to serving you and exceeding your expectations.<br><br>
         
         Sarafath,<br>
         CEO,<br>
         HopON";

         $mail = new PHPMailer(true);

         $mail->isSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->Username = 'saraf4545@gmail.com';
         $mail->Password = 'ckptpvzpddhbpszx';
         $mail->Port = 465;
         $mail->SMTPSecure = 'ssl';
         $mail->isHTML(true);
         $mail->setFrom($email, $name); // email gets from user
         $mail->addAddress($email);
         $mail->Subject = ("$email");
         $mail->Body = $message;
         $mail->send();

         echo "<script>
         Swal.fire({
             title: 'sent',
             text: 'Email Sent To Customer.',
             icon: 'success',
             showConfirmButton: false,
             timer: 3000
         }).then(() => {
             window.location.href = '../admin/request.php';
         });
       </script>";


     }
?>




