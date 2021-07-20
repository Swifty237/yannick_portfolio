<?php

function email_taken($email)
{
  global $db;

  $e = ['email' => $email];

  $sql = "SELECT * FROM admins WHERE email = :email";
  $req = $db->prepare($sql);
  $req->execute($e);
  $free = $req->rowCount();

  return $free;
}

function token($length)
{
  $chars = 'azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789';

  return substr(str_shuffle(str_repeat($chars, $length)), 0, $length);
}

function add_modo($name, $email, $token, $role)
{
  global $db;

  $m = [
    'name'  => $name,
    'email' => $email,
    'token' => $token,
    'role'  => $role,
  ];

  $sql = "INSERT INTO admins (name, email, token, role) VALUE (:name, :email, :token, :role)";
  $req =$db->prepare($sql);
  $req->execute($m);

  $subject = 'Validation du compte Modérateur';
  $message = '<!DOCTYPE html>
                <html lang="fr">
                  <head>
                    <meta charset="UTF-8">    
                  </head>
                  <body>
                    Voici votre identifiant et code unique à insérer sur <a href="http://localhost/yannick_portfolio/admin/index.php?page=new">cette page</a> :
                    <br> Identifiant : '.$email.'
                    <br> Mot de passe : '.$token.'
                    <br> vous êtes : '.$role.'
                    <br><br> Après avoir inséré ces informations, vous devrez choisir un nouveau mot de passe.
                  </body>
                </html>';

  $header  = 'MIME Version 1.0\r\n';
  $header .= 'Content-type: text/html; charset=UTF-8\r\n';
  $header .= 'From: no-reply@yannick.com'.'\r\n'.'Reply-to: yannickkamdemkouam@yahoo.fr'.'\r\n'.'X-Mailer: PHP/'.phpversion();

  mail($email, $subject, $message, $header);
}

function get_modos()
{
  global $db;
  $req = $db->query("SELECT * FROM admins");

  $results = [];

  while($rows = $req->fetchObject()) {
    $results[] = $rows;
  }
  return $results;
}