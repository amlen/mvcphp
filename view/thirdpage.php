<!DOCTYPE html>
<html lang="fr">
<head>
    <title> Confirmation- Reservation </title>
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
                <p class="w3-jumbo w3-animate-fading" >Validation des réservations</p>
            </div>

            <div class="w3-container">
                <table class="table table-bordered">
                    <table class="table table-condensed">
                        <table class="w3-table-all">

                            <thead>
                            <tr class="w3-blue">
                                <th>Destination</th>
                                <th>Nombre des palces </th>
                                <th>Assuration annulation </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td> <?php echo $reservation->getDestination(); ?></td>
                                <td> <?php echo $reservation->getPlace(); ?></td>
                                <td> <?php
                                    if($reservation->getCheckBox())
                                        echo "OUI";
                                    else
                                        echo 'NON';
                                    ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </table>
                </table>
                </br>
                <div class="w3-container">
                    <p class="w3-jumbo w3-animate-fading" >Validation des passagers</p>
                </div>
                <table class="table table-bordered">
                    <table class="table table-condensed">
                        <table class="w3-table-all">
                            <thead>
                            <tr class="w3-blue">
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Age </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <?php
                                    for ($i = 0; $i < $reservation->getPlace(); $i++)
                                    {
                                        echo $reservation->getLastName()[$i].'<br /><br/>';
                                    }
                                    ?>

                                </td>
                                <td>
                                    <?php
                                    for ($i = 0; $i < $reservation->getPlace(); $i++)
                                    {
                                        echo $reservation->getFirstName()[$i].'<br /><br/>';
                                    }
                                    ?>

                                </td>
                                <td>

                                    <?php
                                    for ($i = 0; $i < $reservation->getPlace(); $i++)
                                    {
                                        echo $reservation->getAge()[$i].'<br /><br/>';
                                    }
                                    ?>

                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </table>
                </table>
            </div>
            <br />
            <div class="btn-group">
                <input type='submit' class="btn btn-primary" name='previous_page2' value='page précedente'/>
                <input type='submit' class="btn btn-primary" name='confirm' value='confirmer'/>
                <input type='submit' class="btn btn-primary" name='cancel' value='annuler'/>

            </div>
        </div>
    </div>
</form>
</body>
</html>
