<?php

session_start();

$dbhost = 'localhost';
$dbname = 'portfolio';
$dbuser = 'root';
$dbpswd = '';

try {
  $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
}
catch (PDOexception $e) {
  die ('Une erreur est survenue lors de la connexion à la base de donnée');
}

function admin()
{
  if (isset($_SESSION['admin'])) {
    global $db;
    $a = [
        'email' => $_SESSION['admin'],
        'role'  => 'admin'
      ];

      $sql = "SELECT * FROM admins WHERE email = :email AND role = :role";
      $req = $db->prepare($sql);
      $req->execute($a);
      $exist = $req->rowCount();

      return $exist;
  }
  else {
    return 0;
  }
}

function hasnt_password()
{
  global $db;

  $sql = "SELECT * FROM admins WHERE email = '{$_SESSION['admin']}' AND password = ''";
  $req = $db->prepare($sql);
  $req->execute();

  $exist = $req->rowCount();
  return $exist;
}