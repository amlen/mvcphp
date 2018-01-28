<!DOCTYPE html>
<html lang="fr">
<head>
    <title> Reservation -- Détails </title>
    <meta content-type="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='view/css/style.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<form method="POST" action="index.php">
    <div class="w3-padding w3-display-middle">
        <div class="container">
            <div class="w3-container">
                <p class="w3-jumbo w3-animate-fading" >Détails des réservations</p>
            </div>
            <form class="w3-container w3-card-4" action="/action_page.php">
                <?php
                for($i=0; $i < $reservation->getPlace(); $i++) {

                    echo "<br /><br /><div><label class='w3-text-blue' for='uname'>Nom</label>"."<input  class='w3-input w3-border' type='text' id='uname' 
                    onkeydown=\"if(event.keyCode==32) return false;\" value='".$reservation->getLastName()[$i]."' name='lastnames[]'
         placeholder = 'Entrer le nom' /> </div>";

                    if (isset($reservation)) {
                        if ($reservation->getError() && $reservation->getNameError($reservation->getLastName()[$i]))
                            echo "<p><code>Veuillez entrer un nom valide</code></p>";
                    }

                    echo "<br /><br /><div><label class='w3-text-blue' for='uname'>Prénom</label>"."<input  class='w3-input w3-border' type='text' id='uname' 
                    onkeydown=\"if(event.keyCode==32) return false;\" value='".$reservation->getFirstName()[$i]."' name='firstnames[]'
         placeholder = 'Entrer le prénom' /> </div>";

                    if (isset($reservation)) {
                        if ($reservation->getError() && $reservation->getNameError($reservation->getFirstName()[$i]))
                            echo "<p><code>Veuillez entrer un prénom valide</code></p>";
                    }

                    echo "<br /><div><label class='w3-text-blue' for='uage'>Age</label>"."<input class='w3-input w3-border' type='text' id='uage'
                    onkeydown=\"if(event.keyCode==32) return false;\" name='ages[]'
         value='".$reservation->getAge()[$i]."' placeholder = 'Entrer l âge' /> </div>";

                    if(isset($reservation)) {
                        if ($reservation->getError() && $reservation->getAgeError($reservation->getAge()[$i]))
                            echo "<p><code>Veuillez entrer un âge valide compris entre 1 et 100 inclus</code></p>";

                        elseif ($reservation->getError() && $reservation->getAge18Error($reservation->getAge()) == 0)
                            echo "<p><code>Un des passagers doit avoir 18 ans</code></p>";

                    }
                }
                echo '<br />';
                ?>

            </form>
            <br />
            <div class="btn-group">
                <input type='submit' class="btn btn-primary" onclick="myFunction()" name='previous_page' value='page précedente'/>
                <input type='submit' class="btn btn-primary" name='continue' value='continuer'/>
                <input type='submit' class="btn btn-primary" onclick="myFunction()" name='cancel' value='annuler'/>
            </div>

        </div>
    </div>
</form>
</body>
</html>
