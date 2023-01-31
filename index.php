<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $hotelFiltrati = $hotels;
    if(isset($_GET['vote']) && $_GET['vote'] !== ''){
        $hotelTemporanei = [];
        foreach($hotels as $hotel){
            if($hotel['vote'] >= $_GET['vote']){ // se il voto hotel è maggiore o uuguale a  get_vote (che andiamo a cambiare con input) lo inseriamo in tempHotels
                $hotelTemporanei [] = $hotel; //qua dico che il nuovo array è uguale all’array di prima
            }
        }

        $hotelFiltrati = $hotelTemporanei;  // poi dopo devo cambiare anche l’array nel foreach in tabella
    }


    if(isset($_GET['parking']) && $_GET['parking'] !== ''){
	    $hotelTemporanei =[];
	    foreach($hotelFiltrati as $hotel){
	        if($hotel['parking'] == $_GET['parking']){
                $hotelTemporanei [] = $hotel;
            }
        }
        $hotelFiltrati = $hotelTemporanei;  
    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>PHP Hotel</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <form method="GET" action="./index.php">
                    <input type="number" name="vote" placeholder="Scegli il voto">
                    <select name="parking">
                        <option value="">Parking</option>
                        <option value="0">No</option>
                        <option value="1">Si</option>
                    </select>
                    <button class="btn btn-primary" type="submit">Filtra</button>
                </form>

            </div>
        </div>

        <table class="table m-5">
      <thead>
        <tr>       
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Parking</th>
          <th scope="col">Vote</th>
          <th scope="col">Distance</th>
        </tr>
      </thead>
      <tbody>
        <!-- qua faccio il primo ciclo -->
        <?php foreach($hotelFiltrati as $item){ ?>
            <tr>
                <!-- qua ciclo di nuovo con il foreach e dico che la key è item_2 -->
                <?php foreach($item as $key => $item_2) {?>
                <td>
                    <?php
                        // if($item_2['parking']){
                        // echo 'SI';
                        // }
                        // else{
                        //     echo 'NO';
                        // };
                        // provavo a scorrere l'array come se fossero singoli elementi
                     ?>
                    <?php
                        // echo $key."<br>";
                        if($key == 'parking'){
                            // echo 'questo è un parcheggio: '.$item_2;
                            if($item_2){
                                echo 'Sì';
                            }
                            else{
                                echo 'No';
                            }
                        }
                        else{
                            echo $item_2;
    
                        }
                    ?>
                </td>
                <?php }?>
            </tr>
        <?php }?>   
    </table>
    </div>
</body>
</html>