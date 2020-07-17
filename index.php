
<!doctype html>
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/2e0a884014.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=BenchNine:wght@300&family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="css/style.css">-->
    <title>Pokedex</title>
    <?php
        $url = 'https://pokeapi.co/api/v2/pokemon/';
        $pokename = $_GET['search'];
        $dataname = file_get_contents($url.$pokename.'/');
        $pokemonDataArr = json_decode($dataname, true);
        $pokemonDataObj = json_decode($dataname);
        $pokeTypes = $pokemonDataArr['types'];
        $pokeMoves = $pokemonDataArr['moves'];
        $pokeMove1 = $pokemonDataArr['moves'][0]['move']['name'];
        $pokeMove2 = $pokemonDataArr['moves'][1]['move']['name'];
        $pokeMove3 = $pokemonDataArr['moves'][2]['move']['name'];
        $pokeMove4 = $pokemonDataArr['moves'][3]['move']['name'];
    ?>
</head>
<body id="pokedex">
<div class="container-fluid px-0">
    <header>
        <div class="headerH1">
            <h1>Pokemon</h1>
        </div>
    </header>
    <main class="container">
        <div class="pokedexCtn">
            <img src="img/pokedexpaint.png" alt="pokedex">
            <div id="pokemontypecolor" class="pokemonImgCtn">
                <div class="row">
                    <div class="pokemonFrontImg">

                    
                    <img src="<?php echo($pokemonDataArr['sprites']['front_shiny']);?>">
                    
                    </div>
                    <div class="pokemonBackImg">
                        <img src="<?php echo($pokemonDataArr['sprites']['back_shiny']);?>">
                    </div>
                </div>
                <div class="row">
                    <p class="typeHeading"></p>&nbsp;
                    <div class="types" style="color: white;">
                        <?php
                            for($i = 0; $i < count($pokeTypes); $i++){
                                echo($pokeTypes[$i]['type']['name'].' ');   
                            };
                        ?>
                    </div>
                </div>

            </div>
            <div class="idBtnCtn">
                <button id="prevId" title="Previous ID" class="btn btn-success idBtnStyle"><i class="fas fa-backward"></i></button>
                <button id="nextId" title="Next ID" class="btn btn-warning idBtnStyle"><i class="fas fa-forward"></i></button>
            </div>
            <div class="idScreenCtn">
                <?php
                    echo($pokemonDataObj->id);
                ?>
            </div>
            <div class="nameAndMovesCtn">
                <h5 class="name">
                <?php 
                    echo($pokemonDataObj->name);
                ?>              
                </h5>
                <ul>
                    <div class="row">
                        <li  class="col pokeMove">
                            <?php echo($pokeMove1);?>
                        </li>
                        <li class="col pokeMove">
                            <?php echo($pokeMove2);?>
                        </li>
                    </div>
                    <div class="row">
                        <li class="col pokeMove">
                            <?php echo($pokeMove3);?>
                        </li>
                        <li class="col pokeMove">
                            <?php echo($pokeMove4);?>
                        </li>
                    </div>

                </ul>
            </div>
            <div class="warningCtn">
                    <p>Fetch error or invalid name/id!</p>
            </div>
            <form action="index.php" method="get" class="searchCtn">
                <input id="pokeinput" type="text" name="search" placeholder="Name/ID">
                <button id="run" class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
            </form>
                
            <div class="evolutionImgCtn">
                <div title="Previous evolution" class="prevEvo"></div><div title="Next evolution" class="nextEvo"></div>
            </div>
        </div>
    </main>
    <footer>
        &copy; Copyright 2020.
    </footer>
</div>
    <!--<script async src="js/js-lenn.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <!--<script src="js/main.js"></script>-->
</body>
</html>