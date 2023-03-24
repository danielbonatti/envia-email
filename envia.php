<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    //$mail->CharSet    = 'UTF-8';

    /* HOTMAIL / OUTLOOK
    $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'bonattidaniel@hotmail.com';                     //SMTP username
    $mail->Password   = 'anamaria271989';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;*/

    // GMAIL
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'danielcarlosbonatti@gmail.com';                     //SMTP username
    //$mail->Password   = 'angelo03021984*';                               //SMTP password
    $mail->Password   = 'ayiwbownsswqptuz';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients

    // HOTMAIL
    //$mail->setFrom('bonattidaniel@hotmail.com', 'Dani Bonatti'); // Quem envia
    
    // GMAIL
    $mail->setFrom('danielcarlosbonatti@gmail.com', 'Dani'); // Quem envia
    
    $mail->addAddress('daniel@hsist.com.br', 'Daniel');     //Quem recebe
    /*$mail->addAddress('ellen@example.com');               
    $mail->addReplyTo('info@example.com', 'Information'); // Endereço de resposta
    $mail->addCC('cc@example.com'); // Cópia
    $mail->addBCC('bcc@example.com'); // Cópia oculta*/

    //Attachments
    /*
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    */

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Teste WEBSERVICE'; // Assunto
    $mail->Body    = 'Corpo em html <b>negrito!</b>'; // Corpo do e-mail
    $mail->AltBody = 'Corpo em texto'; // Texto limpo, sem html (evita que a msg caia em spam)

    $mail->send();
    echo 'Mensagem enviada';
} catch (Exception $e) {
    echo "Mensagem não pôde ser enviada. Erro do Mailer: {$mail->ErrorInfo}";
}