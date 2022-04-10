<?php
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Import PHPMailer. This may change if you're not using composer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class PHPEmail extends model
{
    public function send($emailDest, $subject, $message)
    {
        $emailBusiness = 'alenilson@aleevolucoes.com.br';
        // Envio para empresa
       $res = $this->handlerSend($emailBusiness, $subject, $message);

        // Envio para o usuário
        /*$message = 'Você solicitou o orçamento abaixo: <br />'.$message;
        $this->handlerSend($emailDest, $subject, $message);*/

        return $res;
    }

    private function handlerSend($emailDest, $subject, $message) {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0; // Enable verbose debug output
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->Host = 'smtp1.s.ipzmarketing.com';
            $mail->Username = 'qxwmbenlxnkv';
            $mail->Password = 'aa4RiS2URY2ui77h'; // Set your SMTP password here

            $mail->setFrom('alenilson@aleevolucoes.com.br');
            $mail->addAddress('alenilson@aleevolucoes.com.br');
            $mail->addAddress($emailDest);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->send();
            return 'Email enviado com sucesso!';
        } catch (Exception $e) {
            $return = 'Ops! Houve um erro: '. $mail->ErrorInfo;
            return $return;
        }
    }
}
