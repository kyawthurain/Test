<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/Exception.php';
require_once __DIR__ . '/vendor/PHPMailer.php';
require_once __DIR__ . '/vendor/SMTP.php';


include("layouts/navbar.php");

if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = ''; // YOUR gmail email
    $mail->Password = ''; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('example@gmail.com', 'Sender Name');
    $mail->addAddress($email, $name);
    // $mail->addReplyTo('example@gmail.com', 'Sender Name'); // to set the reply to

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

    foreach($_FILES['attachments']['name'] as $key=>$value){
        $mail->addAttachment($_FILES['attachments']['tmp_name'][$key],$_FILES['attachments']['name'][$key]);
    }

    if($mail->send()){
        $message = 'success';
    }else{
        $message = "Fail";
    }

    echo $message;


    // echo "Email message sent.";
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
}

 ?>
        <div id="layoutSidenav">
           <?php
           include("layouts/sidebar.php");
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                if(isset($message)){
                                    echo '<span class="alert alert-success" >'.$message.'</span>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="" method="post" enctype="multipart/form-data"  >

            <div class=" mb-3">
                <label for="name" class=" form-label" >Customer Name</label>
                <input type="text" class=" form-control" name="name" id="name">

            </div>
            <div class=" mb-3">

                                <label for="email" class=" form-label" >Customer email</label>
                                <input type="email" class=" form-control" name="email" id="email">

            </div>

            <div class=" mb-3">
                <label for="subject" class=" form-label" >Customer subject</label>
                <input type="text" class=" form-control" name="subject" id="subject">
            </div>


            <div class=" mb-3" >
                <input type="file" name="attachments[]" id="attachments" multiple >
            </div>


            <div class=" mb-3">

                <textarea class=" form-control" name="message" id="message" row="3" cols="50" placeholder="Message here" ></textarea>
            </div>
            <div class=" mb-3">
                <button name="send" class=" btn btn-dark" >send</button>
            </div>
            </form>
        </div>
    </div>
</div>

                </main>
               <?php
               include("layouts/footer.php");
?>



