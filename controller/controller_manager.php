<?php
include_once 'model/model.php';

if (!isset($_SESSION))
    session_start();

if (isset($_SESSION['ID']) && !empty($_SESSION['ID']))
    $reservation = unserialize($_SESSION['ID']);

else
    $reservation = new Reservation();

$dbname='Data';
try
{
    $bdd = new PDO('mysql:host=localhost','root','');
    $bdd->query("CREATE DATABASE IF NOT EXISTS $dbname");
    $bdd->query("use $dbname");
    $bdd->query  ("CREATE TABLE IF NOT EXISTS Reservation(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Destination TEXT(30) NOT NULL,
Assurance BOOLEAN NOT NULL,
Total TEXT(50),
nl2br(Prenom) TEXT(50),
nl2br(Nom) TEXT(50),
nl2br(Age) TEXT(50)
)");
}

catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM Reservation');

if(empty($_POST))
    include('view/manager.php');

if(!empty($_POST)){
    while($donnees = $reponse->fetch()){
        if(isset($_POST[$donnees['id']])){
            $reservation->setDestination($donnees['Destination']);
            $reservation->setStateUpdate(True);
            $reservation->setIdUpdate($donnees['id']);
            $str1=$donnees["Prenom"];
            $str2=$donnees["Nom"];
            $str3=$donnees["Age"];
            $firstname=explode("\n", $str1);
            $lastname=explode("\n", $str2);
            $age=explode("\n", $str3);
            $reservation->setPlace(count($firstname));
            $a1=$reservation->setFirstName($firstname);
            $a2=$reservation->setLastName($lastname);
            $a3=$reservation->setAge($age);

            if($donnees["Assurance"]==1){
                $reservation->setCheckBox(True);
            }
            else{
                $reservation->setCheckBox(False);
            }
            include 'view/firstpage.php';
        }

        elseif(!empty($_POST["Suppress".$donnees['id']])){
            $id=$donnees['id'];
            $sql = "DELETE FROM Reservation WHERE id=$id";
            $bdd->exec($sql);
            include 'view/manager.php';
        }
    }

    if(!empty($_POST['Nouvelle_reservation'])) {
        include 'controller/controller.php';
    }
}

$_SESSION['ID'] = serialize($reservation);

?>