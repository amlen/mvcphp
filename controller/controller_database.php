<?php
include_once 'model/model.php';

if (!isset($_SESSION))
    session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['ID']))
    $reservation = unserialize($_SESSION['ID']);

else
    $reservation = new Reservation();

$dbname = 'Data';
try
{
    $bdd = new PDO('mysql:host=localhost','root','');
    $bdd->query("CREATE DATABASE IF NOT EXISTS $dbname");
    $bdd->query("use $dbname");
    $bdd->query("CREATE TABLE IF NOT EXISTS Reservation(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Destination TEXT(30) NOT NULL,
    Assurance BOOLEAN NOT NULL,
    Total TEXT(50),
    Prenom TEXT(50),
    Nom TEXT(50),
    Age TEXT(50)
  )");
}

catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

?>