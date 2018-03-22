<?php
$connect=mysqli_connect("localhost", "root", "greendayÉ(&&", "colyseum");
$connect->query ("SET NAMES UTF8");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Spectacle</title>
</head>
<body>
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#client" role="tab" aria-controls="client" aria-selected="true">Client</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#type" role="tab" aria-controls="type" aria-selected="false">Type de spectacle</a>
            </li>
  
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#vingt" role="tab" aria-controls="vingt" aria-selected="false">20 premiers clients</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#fidelite" role="tab" aria-controls="fidelite" aria-selected="false">Clients fidélité</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#clientm" role="tab" aria-controls="clientm" aria-selected="false">Clients commençant par M</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#spectacle" role="tab" aria-controls="spectacle" aria-selected="false">Spectacle</a>
            </li>
    
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#infoclient" role="tab" aria-controls="infoclient" aria-selected="false">Information Client</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            
            <div class="tab-pane fade show active" id="client" role="tabpanel" aria-labelledby="home-tab">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $allclient=mysqli_query($connect,"SELECT * FROM clients;");
                            while($client_res=mysqli_fetch_array($allclient)){
                        ?>

                        <tr>
                            <th scope="row"> <?php echo($client_res ['lastName']);?></th>
                            <th scope="row"> <?php echo($client_res ['firstName']);?></th>
                        </tr>
                            <?php } ?>  
                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade" id="type" role="tabpanel" aria-labelledby="profile-tab">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $alltype=mysqli_query($connect,"SELECT type FROM showTypes;");
                            while($type_res=mysqli_fetch_array($alltype)){
                        ?>

                        <tr>
                            <th scope="row"> <?php echo($type_res ['type']);?></th>
                        </tr>
                        <?php } ?>  
                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade" id="vingt" role="tabpanel" aria-labelledby="contact-tab">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $allvingt=mysqli_query($connect,"SELECT * FROM clients LIMIT 20 ;");
                            while($vingt_res=mysqli_fetch_array($allvingt)){
                        ?>

                        <tr>
                            <th scope="row"> <?php echo($vingt_res ['lastName']);?></th>
                            <th scope="row"> <?php echo($vingt_res ['firstName']);?></th>
                        </tr>
                        <?php } ?>  
                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade" id="fidelite" role="tabpanel" aria-labelledby="contact-tab">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $allfidelite=mysqli_query($connect,"SELECT lastName, firstName 
                            FROM cards 
                            INNER JOIN cardTypes ON cards.cardTypesId=cardTypes.id 
                            INNER JOIN clients ON cards.cardNumber=clients.cardNumber 
                            WHERE clients.cardNumber IS NOT null AND type= 'Fidélité';");

                            while($fidelite_res=mysqli_fetch_array($allfidelite)){
                        ?>

                        <tr>
                            <th scope="row"> <?php echo($fidelite_res ['lastName']);?></th>
                            <th scope="row"> <?php echo($fidelite_res ['firstName']);?></th>
                        </tr>
                        <?php } ?>  
                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade" id="clientm" role="tabpanel" aria-labelledby="contact-tab">

                <?php
                    $allclientm=mysqli_query($connect," SELECT lastName, firstName FROM clients 
                    WHERE lastName LIKE 'M%' ORDER BY lastName ASC ;");
                    while($clientm_res=mysqli_fetch_array($allclientm)){
                ?>

                <p> 
                    Nom: <?php echo($clientm_res ['lastName']);?> 
                    Prénom: <?php echo($clientm_res ['firstName']);?>
                </p>
                <?php } ?>
            </div>

            <div class="tab-pane fade" id="spectacle" role="tabpanel" aria-labelledby="contact-tab">
                <?php
                $allspectacle=mysqli_query($connect,"SELECT title, performer, date, startTime 
                FROM shows ORDER BY title ASC ;");
                while($spectacle_res=mysqli_fetch_array($allspectacle)){
                ?>
                    <p>
                        <?php echo($spectacle_res ['title']);?> par 
                        <?php echo($spectacle_res ['performer']);?> le 
                        <?php echo($spectacle_res ['date']);?> à 
                        <?php echo($spectacle_res ['startTime']);?>
                    </p>

                <?php } ?>  

            </div>

            <div class="tab-pane fade" id="infoclient" role="tabpanel" aria-labelledby="contact-tab">
                <?php
                    $allinfoclient=mysqli_query($connect,"SELECT lastName, firstName, birthDate, 'Oui' AS cards, clients.cardNumber 
                    FROM clients INNER JOIN cards ON clients.cardNumber = cards.cardNumber 
                    WHERE cardTypesId = 1 UNION SELECT lastName, firstName, birthDate, 'Non' AS cards, ' ' AS cardNumber 
                    FROM clients INNER JOIN cards ON clients.cardNumber = cards.cardNumber 
                    WHERE cardTypesId > 1 UNION SELECT lastName, firstName, birthDate, 'Non' AS cards, ' ' AS cardNumber 
                    FROM clients WHERE card = 0;");
                    while($infoclient_res=mysqli_fetch_array($allinfoclient)){
                ?>

                <p>
                    Nom: <?php echo($infoclient_res ['lastName']);?> 
                    Prénom: <?php echo($infoclient_res ['firstName']);?> 
                    Date de naissance: <?php echo($infoclient_res ['birthDate']);?> 
                    Carte: <?php echo($infoclient_res ['cards']);?>
                    N° de carte: <?php echo($infoclient_res ['cardNumber']);?>
                </p>

                <?php } ?>  

            </div>
        </div>
    </div>  



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
</body>
</html>