<?php
namespace App\Service;

use Exception;
use InvalidArgumentException;
use Symfony\Component\Mailer\Mailer; //ili tab3ath bih il mail
use Symfony\Component\Mailer\Transport;//ili tab3ath bih il mail
use Symfony\Component\Mime\Email;//ili bich tcomposi bih il mail

class MailService
{
    public function readHTMLFile($filename) {
        if (empty($filename)) {
            throw new InvalidArgumentException("Filename cannot be empty.");
            //hathi bich ythabit kan 3adid bil shih il file name example "mail/notification/ALERT.html" wala "mail/notification/SUCCESS.html" 
        }
    
        $filePath = realpath(__DIR__ . '/../../public/' . $filename);
        //__DIR__ bich traja3lik il path ili inti fih tawa "fil server mailservice.php

        if (!file_exists($filePath)) {
            throw new Exception("File not found: $filename");
        }//test 3al fichier mawjoud wala le 
        
        $fileContent = file_get_contents($filePath); //bich yjib code html ili f wost "mail/notification/ALERT.html"
        
        if ($fileContent === false) {
            throw new Exception("Failed to read HTML file: $filename");
        }//test kan 9ra il html
        
        return $fileContent; // bich yraja3 code html il kol
    }

    public function sendMail(string $recipient, string $subject, string $body){ 
        //recipient l chkoun bich tab3ath
        //subject = sujet
        //body contenue

        $transport = Transport::fromDsn('smtp://oumaimarais0502@gmail.com:ehyvgqwumlabliws@smtp.gmail.com:587');
        //smtp protocole du mailing
        //smtp://address@gmail.com:mdp d'application@smtp.gmail.com:587
        
        //mdp d'application tjibou min gmail timchi l gerer votre compte gmail timchi l security
        //tithabat il validation en deux etap valider ou non si non t5adamha
        //timchi l bar de research il fou9 tikthib app tatla3lik mdp des application tinzil 3aleha
        //bich yithalik mdp d es application mita3 gmail timchi tahbat louta fil nom d'application tiktib ay haja thib 3aleha
        //tinzil create ta3tik mdp ta5ou il mdp ili 3atahoulik w tnahi les espaces ili f wostou 
        // example: "pnjo rzpb mbsn exwo" trodou "pnjorzpbmbsnexwo"
        
        $mailer = new Mailer($transport);
        $email = (new Email());

        $email->from('oumaimarais0502@gmail.com');
        //il mail from lazmou houwa bidou mita3 transport
        $email->to($recipient);
        //ili bich yousilou il mail
        $email->subject($subject);
        //suject
        $email->html($body);
        //contenu


        $mailer->send($email);
        //ab3ath mail
    }
}
