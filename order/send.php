<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../vendor/Exception.php';
require_once '../vendor/PHPMailer.php';
require_once '../vendor/SMTP.php';

include_once "../controllers/order-controller.php";

$orderId = $_POST['data'];

$orderController = new OrderController();
$order = $orderController->getFullOrder($orderId);
var_dump($order);
$orderItems = $orderController->getOrderItems($orderId);

if($order != null && $orderItems !=null){

    $email = $order['email'];
    $name = $order['first_name']." ".$order['last_name'];
    $mail = new PHPMailer(true);

    try {

echo "hello";

        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Username = 'kaungkhantdev.2002@gmail.com'; // YOUR gmail email
        $mail->Password = 'eags azac mgqu hzjk'; // YOUR gmail password

        // Sender and recipient settings
        $mail->setFrom('kaungkhantdev.2002@gmail.com', 'Kyaw Gyi');
        $mail->addAddress($email, $name);
        // $mail->addReplyTo('example@gmail.com', 'Sender Name'); // to set the reply to

        // Setting the email content
        $mail->IsHTML(true);
        $mail->Subject = "Order Information for orderID : ".$order['order_id'];
        $message = "Thanks for shopping with us.";
        $message .= "<br>The Order detail is as follows";
        $message .= "<br>
        <table>
        <tr>
        <td>".$name."<br>".$email."<br>".$order['phone']."<br>".$order["street"].", ".$order['city'].", ".$order['state']."</td>
        <td>".$order['order_id']."<br>".$order['order_date']."<br>".$order['required_date']."</td>
        </tr>
        </table>";
        $message .= "<br><table>";
        foreach($orderItems as $orderItem){
            $message .="<tr>";
            $message .= "<td>".$orderItem['pname']."</td>";
            $message .= "<td>".$orderItem['list_price']."</td>";
            $message .= "<td>".$orderItem['quantity']."</td>";
            $message .= "<td>".$orderItem['discount']."</td>";
            $message .= "<td>".$orderItem['quantity']*$orderItem['list_price']."</td>";
            $message .="</tr>";
            $total += ($orderItem['quantity']*$orderItem['list_price']);
        }
        $message .= "<tr>";
        $message .= "<td colspan='4'>Total : </td>";
        $message .= "<td>".$total."</td>";
        $message .= "</tr>";
        $message .= "</table>";
        $mail->Body = $message;
        // $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

        if($mail->send()){
            $msg = 'success';
        }else{
            $msg = "Fail";
        }
        echo "hello";


        // echo "Email message sent.";
    } catch (Exception $e) {
        echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
    }

}
else{
    echo "fail";
}

