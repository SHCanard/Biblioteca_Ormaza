<?php
function mailing($to,$body,$subject)
        {
        $dest=explode(", ",$to);
        $body=utf8_decode($body);
        $subject=utf8_decode($subject);
        require 'PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Host = 'smtp.exchange.cht.intra';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'ceres@cht.nc';                 // SMTP username
        $mail->Password = '!s3ng4rd2012';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted, or false
        $mail->Port = 587;                                    // TCP port to connect to, tls 587
        $mail->setFrom('ceres@cht.nc', 'CeRes');
        $mail->addAddress($dest[0]);     // Add a recipient
        $mail->addReplyTo('noreply@cht.nc');
        if(isset($dest[1]))
                {
                for($i=1;$i<count($dest);$i++)
                        {
                        $mail->addCC($dest[$i]);
                        }
                }
        //$mail->addCC('cc@example.com');
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
//      $mail->AltBody = convert_html_to_text($body);
        if(!$mail->send()) {
            return($mail->ErrorInfo);
        } else {
            return 0;
        }

        }
?>
