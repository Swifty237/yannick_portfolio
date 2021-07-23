<?php

function send_email($name, $email, $mailContent, $phoneNumber)
{

  $subject = 'Message de '.$name.' depuis le porfolio';
  $message = '<!DOCTYPE html><html lang="fr"><head><meta charset="UTF-8"></head><body>'.$mailContent.'<br> N° de téléphone:'.$phoneNumber.'</body></html>';

  $header  = 'MIME Version 1.0\r\n';
  $header .= 'Content-type: text/html; charset=UTF-8\r\n';
  $header .= 'From: '.$email.'\r\n'.'Reply-to: '.$email.'\r\n'.'X-Mailer: PHP/'.phpversion();

  mail($email, $subject, $message, $header);
}