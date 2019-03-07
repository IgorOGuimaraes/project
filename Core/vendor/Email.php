<?php
/**
 * Created by PhpStorm.
 * User: fz388
 * Date: 06/03/2019
 * Time: 22:01
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once ('PHPMAiler/src/Exception.php');
require_once ('PHPMAiler/src/PHPMailer.php');
require_once ('PHPMAiler/src/SMTP.php');

class Email
{

    private $_mail;

    public function __construct($exception = false, $smtp = array())
    {

        //New PHPMailer instance
        $this->_mail = new PHPMailer($exception);

        //SMTP setup
        if(!empty($smtp)) {
            $this->_mail->SMTPDebug = $smtp['debug'];
            $this->_mail->isSMTP();
            $this->_mail->Host = $smtp['host'];
            $this->_mail->SMTPAuth = $smtp['auth'];
            $this->_mail->Username = $smtp['username'];
            $this->_mail->Password = $smtp['password'];
            $this->_mail->SMTPSecure = $smtp['secure'];
            $this->_mail->Port = $smtp['port'];
        }

    }

    public function mail($to = array(), $subject, $html, $from = array(), $plaintext = false, $cc = array(), $bcc = array(), $attachments = array())
    {

        if(empty($to) || empty($subject) || empty($html) || empty($from)) {
            die ('Missing a parameter');
        }

        // Sender
        $this->_mail->setFrom($from['email'], $from['name']);
        $this->_mail->addReplyTo($from['email'], $from['name']);

        // Recipients
        if(!empty($to)) {
            foreach ($to as $recipients) {
                $this->_mail->addAddress($recipients['email']);
            }
        }

        // CC
        if(!empty($cc)) {
            foreach ($cc as $recipients) {
                $this->_mail->addCC($recipients);
            }
        }

        // BCC
        if(!empty($bcc)) {
            foreach ($bcc as $recipients) {
                $this->_mail->addBCC($recipients);
            }
        }

        // Attachements
        if(!empty($attachments)) {
            foreach ($attachments as $attachment) {
                $this->_mail->addAttachment($attachment);
            }
        }

        // HTML email
        $this->_mail->isHTML(true);
        $this->_mail->Subject = $subject;
        $this->_mail->Body = $html;

        // Plain text version
        if(!empty($plaintext)){
            $this->_mail->AltBody = $plaintext;
        }

        // Send the email
        try {
            $this->_mail->send();
            echo 'Message sent successfully';
        } catch(Exception $e){
            echo 'Message could not be sent. Mailer Error: ', $this->_mail->ErrorInfo;
        }

    }

}