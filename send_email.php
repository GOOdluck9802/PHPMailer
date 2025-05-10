<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path_to_phpmailer/PHPMailer.php';
require 'path_to_phpmailer/Exception.php';
require 'path_to_phpmailer/SMTP.php';

function sendConfirmationEmail($toEmail, $toName, $package, $date, $people) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'goodlucklema29@gmail.com';
        $mail->Password = 'your_app_password'; // Badilisha na App Password yako
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('goodlucklema29@gmail.com', 'Tansania Toll Safaris');
        $mail->addAddress($toEmail, $toName);

        $mail->isHTML(true);
        $mail->Subject = 'Uthibitisho wa Booking ya Safari';
        $mail->Body    = "
            Habari $toName,<br><br>
            Asante kwa kufanya booking ya safari yetu. Hapa chini ni maelezo ya booking yako:<br>
            <strong>Kifurushi:</strong> $package<br>
            <strong>Tarehe ya Safari:</strong> $date<br>
            <strong>Idadi ya Watu:</strong> $people<br><br>
            Tutawasiliana nawe hivi karibuni kwa maelezo zaidi.<br><br>
            Asante,<br>
            Tansania Toll Safaris
        ";

        $mail->send();
    } catch (Exception $e) {
        echo "Barua pepe haikutumwa. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
