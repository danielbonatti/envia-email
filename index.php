<?php
    // PHPMailer classes
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Carrega Composer's autoloader
    require 'vendor/autoload.php';

    // ======================================
    
    // O que vier pela URL quebrar na barra
    $path = explode('/', $_GET['path']);

    $method = $_SERVER['REQUEST_METHOD'];

    header('Content-type: application/json');
    $body = file_get_contents('php://input');

    if($method === 'POST'){
        $jsonBody = json_decode($body, true);

        // ======================================

        $result = array("success" => true,"mensage" => "Mensagem enviada");

        try {
            // Cria uma instância
            $mail = new PHPMailer(true);

            $mail->isSMTP();                                        // Send using SMTP
            $mail->CharSet    = 'UTF-8';

            // -----------------------------------------------
        
            $mail->Host       = $jsonBody['host'];                  // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                               // Enable SMTP authentication
            $mail->Username   = $jsonBody['user'];                  // SMTP username
            $mail->Password   = $jsonBody['password'];              // SMTP password
            if ($jsonBody['secure'] == "SMTPS"){
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            } else {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
            }
            $mail->Port       = $jsonBody['port'];                  // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            // Recipients
            $mail->setFrom($jsonBody['user'],$jsonBody['name']);    // Quem envia

            // -----------------------------------------------

            foreach($jsonBody['addres'] as $item) {
                $mail->addAddress($item['email']);                  // Quem recebe
            }

            /*
            $mail->addAddress('ellen@example.com');               
            $mail->addReplyTo('info@example.com', 'Information');   // Endereço de resposta
            $mail->addCC('cc@example.com');                         // Cópia
            $mail->addBCC('bcc@example.com');                       // Cópia oculta*/

            // Attachments
            /*
            $mail->addAttachment('/var/tmp/file.tar.gz');           // Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');      // Optional name
            */
           
            // Content
            if ($jsonBody['html'] == true){
                $mail->isHTML(true);                                // Set email format to HTML
            }                                    
            $mail->Subject = $jsonBody['content']['subject'];       // Assunto
            $mail->Body    = $jsonBody['content']['body'];          // Corpo do e-mail
            $mail->AltBody = $jsonBody['content']['altbody'];       // Texto limpo, sem html (evita que a msg caia em spam)
        
            $mail->send();
            echo json_encode($result);

        } catch (Exception $e) {
            $result['success'] = false;
            $result['mensage'] = "Mensagem não pôde ser enviada. Erro do Mailer: {$mail->ErrorInfo}";
            echo json_encode($result);

        }
    }
?>