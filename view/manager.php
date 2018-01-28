<!DOCTYPE html>
<html lang="fr">
<head>
    <title> Reservation -- Détails </title>
    <meta content-type="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href='view/css/style.css' rel='stylesheet'>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<form method="POST" action="index.php?name=manager">
    <div class="container">
        <div class="w3-container">
            <p class="w3-jumbo w3-animate-fading" >Liste des réservations</p>
        </div>
        <?php
        include 'controller/controller_database.php';

        $reponse=$bdd->query('SELECT * FROM Reservation');
        if (sizeof($reponse->fetch()['id']) == 0)
            echo "<h3>Aucune réservation</h3>";
        ?>
        <div class="w3-container">
            <table class="table table-bordered">
                <table class="table table-condensed">
                    <table class="w3-table-all">
                        <thead>
                        <tr class="w3-blue">
                            <th>Id</th>
                            <th>Destination</th>
                            <th>Assurance</th>
                            <th> Total</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Age</th>
                            <th>Editer</th>
                            <th>Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        <br />
                        <tr>
                            <td>
                                <?php
                                $reponse=$bdd->query('SELECT * FROM Reservation');
                                while($donnees = $reponse->fetch())
                                {
                                    echo $donnees['id'].'<br /><br />';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $reponse=$bdd->query('SELECT * FROM Reservation');
                                while($donnees = $reponse->fetch())
                                {
                                    echo $donnees['Destination'].'<br /><br />';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $reponse=$bdd->query('SELECT * FROM Reservation');
                                while($donnees = $reponse->fetch())
                                {
                                    if($donnees['Assurance']==1)
                                        $assurance='OUI';
                                    else
                                        $assurance='NON';
                                    echo $assurance.'<br /><br />';
                                }
                                ?>
                            </td>
                            <td>

                                <?php
                                $reponse=$bdd->query('SELECT * FROM Reservation');
                                while($donnees = $reponse->fetch())
                                {
                                    echo $donnees['Total']. '<br /><br />';
                                }
                                ?>
                            </td>
                            <td>

                                <?php
                                $reponse=$bdd->query('SELECT * FROM Reservation');
                                while($donnees = $reponse->fetch())
                                {
                                    $list = explode(":", $donnees['Nom']);
                                    for ($i = 0; $i < count($list); $i++)
                                    {
                                        echo  $list[$i]. '<br /><br />' ;

                                        $i = $i + 1;
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $reponse=$bdd->query('SELECT * FROM Reservation');
                                while($donnees = $reponse->fetch())
                                {
                                    $list = explode(":", $donnees['Prenom']);
                                    for ($i = 0; $i < count($list); $i++)
                                    {
                                        echo  $list[$i]. '<br /><br />' ;
                                        $i = $i + 1;
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $reponse=$bdd->query('SELECT * FROM Reservation');
                                while($donnees = $reponse->fetch())
                                {
                                    $list2 = explode(":", $donnees['Age']);
                                    for ($i = 0; $i < count($list); $i++)
                                    {
                                        echo  $list2[$i]. '<br /><br />' ;
                                        $i = $i + 1;
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $reponse=$bdd->query('SELECT * FROM Reservation');
                                while($donnees = $reponse->fetch())
                                {
                                    echo '<input type="submit" class="btn btn-info btn-xs" value="Editer" name="' . $donnees['id'] . '">' . '<br /><br />';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $reponse=$bdd->query('SELECT * FROM Reservation');
                                while($donnees = $reponse->fetch())
                                {
                                    echo '<input type="submit" class="btn btn-info btn-xs" value="Supprimer" name="' . "Suppress" . $donnees['id'] . '">' . '<br /><br />';
                                }
                                ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </table>
            </table>
            </br>
            <div class="btn-group">
                <input type='submit' value='Nouvelle réservation' class="btn btn-primary" name='Nouvelle_reservation'>
            </div>
        </div>
</form>
</body>
</html>
