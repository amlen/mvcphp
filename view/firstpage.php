<!DOCTYPE html>
<html lang="fr">
<head>
    <title>RESERVATION</title>
    <meta content-type="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='view/css/style.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<form method="POST" action="index.php">
    <div class="w3-padding w3-display-middle">
        <div class="container">
            <div class="w3-container">
                <p class="w3-jumbo w3-animate-fading" > Reservation</p>
            </div>
            <h2>Prix des places </h2>
            <ul>
                <li> Moins de 12 ans = 10 euros </li>
                <li> Plus de 12 ans = 15 euros</li>
            </ul>
            <h4>L'assurance vous reviens à 20 euros quel que soit le nombre de voyageurs</h4>
            <br/>
            <form class="w3-container w3-card-4" action="/action_page.php">
                    <label class="w3-text-blue"><b>Destination</b></label>
                    <input class="w3-input w3-border" type="text" value='<?php if(isset($reservation)) echo $reservation->getDestination()?>'
                           onkeydown="if(event.keyCode==32) return false;" name="destination" placeholder = 'Entrer la destination'/>

                    <?php
                    if(isset($reservation)){
                        if($reservation->getError() && $reservation->getDestinationError($reservation->getDestination()))
                            echo "<code> Veuillez entrer une destination valide</code>";
                    }
                    ?>
                <br/><br/>

                    <label class="w3-text-blue"><b>Number Places</b></label>
                    <input class="w3-input w3-border" type="text" value='<?php if(isset($reservation)) echo $reservation->getPlace() ?>'
                           onkeydown="if(event.keyCode==32) return false;" name="number_places" placeholder = 'Entrer le nombre de places'/>

                    <?php
                    if(isset($reservation)){
                        if($reservation->getError() && ($reservation->getPlaceError($reservation->getPlace())))
                            echo "<code> Il faut qu'il y ait minimum une place et maximum 10 places</code>";
                    }
                    ?>

                <p>
            </form>
            <br/>
            Assurance
            <?php
            echo "<input class=\"w3-radio\" type=\"checkbox\" name=\"case\" value=\"case\"";
            if(isset($reservation) && $reservation->getCheckBox())
                echo "checked";
            echo "/>";
            ?>
            <br /><br />
            <br />

            <div class="btn-group">
                <input type="submit" class="btn btn-primary" name="next" value="suivant">
                <input type="submit" class="btn btn-primary" name="cancel" value="annuler"/>
            </div>
        </div>
    </div>

</form>
</body>
</html>
