<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
include('cache/php-riot-api.php');
include('cache/FileSystemCache.php');
include_once('functions.php');
error_reporting(0);


$platform = array(
    "na" => "na1",
    "euw" => "euw1",
    "eune" => "eun1",
    "br" => "br1",
    "lan" => "la1",
    "las" => "la2",
    "oce" => "oc1",
    "ru" => "ru",
    "tr" => "tr1",
    "kr" => "kr",
    "jp" => "jp1"
);
?>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Summoner Spy</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="css/grayscale.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Navigation -->


        <!-- Intro Header -->

        <!-- About Section -->

        <header>
            <div class="container text-center">
                <br><br>
                <h1>Summoner Spy</h1><br>
            </div>
        </header>
        <!-- Download Section -->
        <section id="download" class="download-section content-section text-center">
            <div class="container">
                <div class="col-lg-8 mx-auto">
                    <?php
                    $search = $_GET['search'];
                    $server = "euw";
                    $soloq = true;
                    $flex5 = true;
                    $flex3 = true;
                    if ($search == '') {

                        echo "<script type='text/javascript'>alert('Invalid name');</script>";

                        exit;
                    }
                    $api = new riotapi($platform[$server]);
                    $api_cache = new riotapi('euw1', new FileSystemCache('cache/'));
                    $api_username = $search;
                    $test = $api->getSummonerByName($api_username);
                    $ids = $api->getSummonerId($api_username);
                    
                    $summcon = [
                        "SummId" => $api->getSummonerByName($api_username)['id'],
                        "SummName" => $api->getSummonerByName($api_username)['name'],
                        "SummIcon" => $api->getSummonerByName($api_username)['profileIconId'],
                        "SummLvL" => $api->getSummonerByName($api_username)['summonerLevel']
                    ];
                    $iconid = $summcon['SummIcon'];
                    echo "<div class=padding>
                    <img class=img-circle2 src=http://ddragon.leagueoflegends.com/cdn/6.24.1/img/profileicon/" . $iconid . ".png><br><br><h1>$api_username</h1></div><hr>";
                    echo "";
                    $champ = $api->getChampionMastery($summcon['SummId']);
                    //Array mit Informationen holen
                    $elo = $api->getLeaguePosition($summcon['SummId']);
                    //Zweidimensionalen Array auslesen
                    // RANKED 5on5 SOLO DUO Auslesen
                   
                    if ($elo[0]['queueType'] === 'RANKED_SOLO_5x5') {
                        if ($elo[0]['tier'] == !NULL) {
                            $elo1 = $elo[0]['tier'];
                            $division = $elo[0]['rank'];
                            $leaguep = $elo[0]['leaguePoints'];
                            $wins = $elo[0]['wins'];
                            $losses = $elo[0]['losses'];
                            //Gewinnquote berechnen
                            $percentwr = ($wins + $losses) / 100;
                            $winrate = $wins / $percentwr;
                        } else {
                            
                        }
                    } else
                    if
                    ($elo[1]['queueType'] === 'RANKED_SOLO_5x5') {
                        if ($elo[1]['tier'] == !NULL) {
                            $elo1 = $elo[1]['tier'];
                            $division = $elo[1]['rank'];
                            $leaguep = $elo[1]['leaguePoints'];
                            $wins = $elo[1]['wins'];
                            $losses = $elo[1]['losses'];
                            //Gewinnquote berechnen
                            $percentwr = ($wins + $losses) / 100;
                            $winrate = $wins / $percentwr;
                        } else {
                            
                        }
                    } else
                    if
                    ($elo[2]['queueType'] === 'RANKED_SOLO_5x5') {
                        if ($elo[2]['tier'] == !NULL) {
                            $elo1 = $elo[2]['tier'];
                            $division = $elo[2]['rank'];
                            $leaguep = $elo[2]['leaguePoints'];
                            $wins = $elo[2]['wins'];
                            $losses = $elo[2]['losses'];
                            //Gewinnquote berechnen
                            $percentwr = ($wins + $losses) / 100;
                            $winrateper = $wins / $percentwr;
                            $winrate = ceil($winrateper);
                        }
                    } else {
                        
                    }
                    // RANKED 5on5 FLEX auslesen

                    if ($elo[0]['queueType'] === 'RANKED_FLEX_SR') {
                        if ($elo[0]['tier'] == !NULL) {
                            $elo12 = $elo[0]['tier'];
                            $division2 = $elo[0]['rank'];
                            $leaguep2 = $elo[0]['leaguePoints'];
                            $wins2 = $elo[0]['wins'];
                            $losses2 = $elo[0]['losses'];
                            //Gewinnquote berechnen
                            $percentwr2 = ($wins2 + $losses2) / 100;
                            $winrate2 = $wins2 / $percentwr2;
                        } else {
                            
                        }
                    } else
                    if
                    ($elo[1]['queueType'] === 'RANKED_FLEX_SR') {
                        if ($elo[1]['tier'] == !NULL) {
                            $elo12 = $elo[1]['tier'];
                            $division2 = $elo[1]['rank'];
                            $leaguep2 = $elo[1]['leaguePoints'];
                            $wins2 = $elo[1]['wins'];
                            $losses2 = $elo[1]['losses'];
                            //Gewinnquote berechnen
                            $percentwr2 = ($wins2 + $losses2) / 100;
                            $winrate2 = $wins2 / $percentwr2;
                        } else {
                            
                        }
                    } else
                    if
                    ($elo[2]['queueType'] === 'RANKED_FLEX_SR') {
                        if ($elo[2]['tier'] == !NULL) {
                            $elo12 = $elo[2]['tier'];
                            $division2 = $elo[2]['rank'];
                            $leaguep2 = $elo[2]['leaguePoints'];
                            $wins2 = $elo[2]['wins'];
                            $losses2 = $elo[2]['losses'];
                            //Gewinnquote berechnen
                            $percentwr2 = ($wins2 + $losses2) / 100;
                            $winrateper2 = $wins2 / $percentwr2;
                            $winrate2 = ceil($winrateper2);
                        } else {
                            
                        }
                    }

                    if ($elo[0]['queueType'] === 'RANKED_FLEX_TT') {
                        if ($elo[0]['tier'] == !NULL) {
                            $elo13 = $elo[0]['tier'];
                            $division3 = $elo[0]['rank'];
                            $leaguep3 = $elo[0]['leaguePoints'];
                            $wins3 = $elo[0]['wins'];
                            $losses3 = $elo[0]['losses'];
                            //Gewinnquote berechnen
                            $percentwr3 = ($wins3 + $losses3) / 100;
                            $winrate3 = $wins3 / $percentwr3;
                        } else {
                            
                        }
                    } else
                    if
                    ($elo[1]['queueType'] === 'RANKED_FLEX_TT') {
                        if ($elo[1]['tier'] == !NULL) {
                            $elo13 = $elo[1]['tier'];
                            $division3 = $elo[1]['rank'];
                            $leaguep3 = $elo[1]['leaguePoints'];
                            $wins3 = $elo[1]['wins'];
                            $losses3 = $elo[1]['losses'];
                            //Gewinnquote berechnen
                            $percentwr3 = ($wins3 + $losses3) / 100;
                            $winrate3 = $wins3 / $percentwr3;
                        } else {
                            
                        }
                    } else
                    if
                    ($elo[2]['queueType'] === 'RANKED_FLEX_TT') {

                        if ($elo[2]['tier'] == !NULL) {
                            $elo13 = $elo[2]['tier'];
                            $division3 = $elo[2]['rank'];
                            $leaguep3 = $elo[2]['leaguePoints'];
                            $wins3 = $elo[2]['wins'];
                            $losses3 = $elo[2]['losses'];
                            //Gewinnquote berechnen
                            $percentwr3 = ($wins3 + $losses3) / 100;
                            $winrateper3 = $wins3 / $percentwr3;
                            $winrate3 = ceil($winrateper3);
                        } else {
                            
                        }
                    }
                    /*
                      $elo1 = $elo[0]['tier'];
                      $division = $elo[0]['rank'];
                      $leaguep = $elo[0]['leaguePoints'];
                      $wins = $elo[0]['wins'];
                      $losses = $elo[0]['losses'];
                      //Gewinnquote berechnen
                      $percentwr = ($wins + $losses) / 100;
                      $winrate = $wins / $percentwr;

                      //$history = $api->getRecentMatchList($summcon['SummId']);
                      //preview($history); */



                    http://ddragon.leagueoflegends.com/cdn/7.5.2/img/champion/Warwick.png
                    //Ranginformationen und Gewinnchance ausgeben   

                    echo "<br><h3>Elo</h3><hr>";
                    echo "<h6>Ranked Solo/Duo 5x5</h6>";
                    if ($soloq) {
                        if (isset($elo1)) {
                            if ($elo1 === 'PLATINUM') {
                                echo "<img src=img/PlatinumBadgeSeason2.png alt=Platinum>  ";
                                echo "<h4>Platinum</h4><br>";
                                echo "<p1>Division: " . $division . "<br> Leaguepoints: " . $leaguep . "<br>Games played: ".($losses+$wins)."<br></p1>";
                            } else if ($elo1 === 'GOLD') {
                                echo "<img src=img/GoldBadgeSeason2.png alt=Gold>  ";
                                echo "<h4>Gold</h4><br>";
                                echo "<p1>Division: " . $division . "<br> Leaguepoints: " . $leaguep . "<br>Games played: ".($losses+$wins)."<br></p1>";
                            } else if ($elo1 === 'SILVER') {
                                echo "<img src=img/SilverBadgeSeason2.png alt=Silver>  ";
                                echo "<h4>Silver</h4><br>";
                                echo "<p1>Division: " . $division . "<br> Leaguepoints: " . $leaguep . "<br>Games played: ".($losses+$wins)."<br></p1>";
                            } else if ($elo1 === 'DIAMOND') {
                                echo "<img src=img/DiamondBadge.png alt=Diamond>  ";
                                echo "<h4>Diamond</h4><br>";
                                echo "<p1>Division: " . $division . "<br> Leaguepoints: " . $leaguep . "<br>Games played: ".($losses+$wins)."<br></p1>";
                            } else if ($elo1 === 'BRONZE') {
                                echo "<img src=img/BronzeBadgeSeason2.png alt=Bronze>  ";
                                echo "<h4>Bronze</h4><br>";
                                echo "<p1>Division: " . $division . "<br> Leaguepoints: " . $leaguep . "<br>Games played: ".($losses+$wins)."<br></p1>";
                            } else if ($elo1 === 'CHALLENGER') {
                                echo "<img src=img/ChallengerBadge.png alt=Challenger>  ";
                                echo "<h4>Challenger</h4><br>";
                                echo "<p1>Division: " . $division . "<br> Leaguepoints: " . $leaguep . "<br>Games played: ".($losses+$wins)."<br></p1>";
                            } else if ($elo1 === 'MASTER') {
                                echo "<img src=img/MasterBadge.png alt=Master>  ";
                                echo "<h4>Master</h4><br>";
                                echo "<p1>Division: " . $division . "<br> Leaguepoints: " . $leaguep . "<br>Games played: ".($losses+$wins)."<br></p1>";
                            }

                            $color = getProperColor($winrate);
                            echo "Winrate: <b><span style=color:" . $color . ">" . round($winrate, 0) . "%</span></b><br><hr>";
                        } else {
                            echo "<img src=img/UnrankedBadge.png alt=unranked>  ";
                            echo "<h4>Unranked</h4><br><br><hr>";
                        }
                    }// echo "<p1>Winrate: <b>" . $winrate . "%</b></p1>";
                    echo "<h6>Ranked Flex 5x5</h6>";
                    if ($flex5) {
                        if (isset($elo12)) {
                            if ($elo12 === 'PLATINUM') {
                                echo "<img src=img/PlatinumBadgeSeason2.png alt=Platinum>  ";
                                echo "<h4>Platinum</h4><br>";
                                echo "<p1>Division: " . $division2 . "<br> Leaguepoints: " . $leaguep2 . "<br>Games played: ".($losses2+$wins2)."<br></p1>";
                            } else if ($elo12 === 'GOLD') {
                                echo "<img src=img/GoldBadgeSeason2.png alt=Gold>  ";
                                echo "<h4>Gold</h4><br>";
                                echo "<p1>Division: " . $division2 . "<br> Leaguepoints: " . $leaguep2 . "<br>Games played: ".($losses2+$wins2)."<br></p1>";
                            } else if ($elo12 === 'SILVER') {
                                echo "<img src=img/SilverBadgeSeason2.png alt=Silver>  ";
                                echo "<h4>Silver</h4><br>";
                                echo "<p1>Division: " . $division2 . "<br> Leaguepoints: " . $leaguep2 . "<br>Games played: ".($losses2+$wins2)."<br></p1>";
                            } else if ($elo12 === 'DIAMOND') {
                                echo "<img src=img/DiamondBadge.png alt=Diamond>  ";
                                echo "<h4>Diamond</h4><br>";
                                echo "<p1>Division: " . $division2 . "<br> Leaguepoints: " . $leaguep2 . "<br>Games played: ".($losses2+$wins2)."<br></p1>";
                            } else if ($elo12 === 'BRONZE') {
                                echo "<img src=img/BronzeBadgeSeason2.png alt=Bronze>  ";
                                echo "<h4>Bronze</h4><br>";
                                echo "<p1>Division: " . $division2 . "<br> Leaguepoints: " . $leaguep2 . "<br>Games played: ".($losses2+$wins2)."<br></p1>";
                            } else if ($elo12 === 'CHALLENGER') {
                                echo "<img src=img/ChallengerBadge.png alt=Challenger>  ";
                                echo "<h4>Challenger</h4><br>";
                                echo "<p1>Division: " . $division2 . "<br> Leaguepoints: " . $leaguep . "<br>Games played: ".($losses2+$wins2)."<br></p1>";
                            } else if ($elo12 === 'MASTER') {
                                echo "<img src=img/MasterBadge.png alt=Master>  ";
                                echo "<h4>Master</h4><br>";
                                echo "<p1>Division: " . $division2 . "<br> Leaguepoints: " . $leaguep2 . "<br>Games played: ".($losses2+$wins2)."<br></p1>";
                            }

                            $color2 = getProperColor($winrate2);
                            echo "Winrate: <b><span style=color:" . $color2 . ">" . round($winrate2, 0) . "%</span></b><br><hr>";
                        } else {
                            echo "<img src=img/UnrankedBadge.png alt=unranked>  ";
                            echo "<h4>Unranked</h4><br><br><hr>";
                        }
                    }
                    echo "<h6>Ranked Flex 3x3</h6>";
                    if ($flex3) {
                        if (isset($elo13)) {
                            if ($elo13 === 'PLATINUM') {
                                echo "<img src=img/PlatinumBadgeSeason2.png alt=Platinum>  ";
                                echo "<h4>Platinum</h4><br>";
                                echo "<p1>Division: " . $division3 . "<br> Leaguepoints: " . $leaguep3 . "<br>Games played: ".($losses3+$wins3)."<br></p1>";
                            } else if ($elo13 === 'GOLD') {
                                echo "<img src=img/GoldBadgeSeason2.png alt=Gold>  ";
                                echo "<h4>Gold</h4><br>";
                                echo "<p1>Division: " . $division3 . "<br> Leaguepoints: " . $leaguep3 . "<br>Games played: ".($losses3+$wins3)."<br></p1>";
                            } else if ($elo13 === 'SILVER') {
                                echo "<img src=img/SilverBadgeSeason2.png alt=Silver>  ";
                                echo "<h4>Silver</h4><br>";
                                echo "<p1>Division: " . $division3 . "<br> Leaguepoints: " . $leaguep3 . "<br>Games played: ".($losses3+$wins3)."<br></p1>";
                            } else if ($elo13 === 'DIAMOND') {
                                echo "<img src=img/DiamondBadge.png alt=Diamond>  ";
                                echo "<h4>Diamond</h4><br>";
                                echo "<p1>Division: " . $division3 . "<br> Leaguepoints: " . $leaguep3 . "<br>Games played: ".($losses3+$wins3)."<br></p1>";
                            } else if ($elo13 === 'BRONZE') {
                                echo "<img src=img/BronzeBadgeSeason2.png alt=Bronze>  ";
                                echo "<h4>Bronze</h4><br>";
                                echo "<p1>Division: " . $division3 . "<br> Leaguepoints: " . $leaguep3 . "<br>Games played: ".($losses3+$wins3)."<br></p1>";
                            } else if ($elo13 === 'CHALLENGER') {
                                echo "<img src=img/ChallengerBadge.png alt=Challenger>  ";
                                echo "<h4>Challenger</h4><br>";
                                echo "<p1>Division: " . $division3 . "<br> Leaguepoints: " . $leaguep3 . "<br>Games played: ".($losses3+$wins3)."<br></p1>";
                            } else if ($elo13 === 'MASTER') {
                                echo "<img src=img/MasterBadge.png alt=Master>  ";
                                echo "<h4>Master</h4><br>";
                                echo "<p1>Division: " . $division3 . "<br> Leaguepoints: " . $leaguep3 . "<br>Games played: ".($losses3+$wins3)."<br></p1>";
                            }

                            $color3 = getProperColor($winrate3);
                            echo "Winrate: <b><span style=color:" . $color3 . ">" . round($winrate3, 0) . "%</span></b><br><hr>";
                        } else {
                            echo "<img src=img/UnrankedBadge.png alt=unranked>  ";
                            echo "<h4>Unranked</h4><br><br><hr>";
                        }
                    }
                    $level = $summcon['SummLvL'];
                    $colorlevel = getProperColor2($level);
                   
                     echo "<h3>LEVEL</h3><b><span style=color:" . $colorlevel . "><h2>".round($level,0)."</h2></span></b><hr>";
                    //preview($hist);
                    $champ1 = $champ[0]['championId'];
                    $champ2 = $champ[1]['championId'];
                    $champ3 = $champ[2]['championId'];
                    $elo1 = $elo[0]['tier'];

                    
                    $champ1f = idtochamp($champ1);

                    $champ2f = idtochamp($champ2);
                    $champ3f = idtochamp($champ3);
                   // echo "<p1>Player Id:  =  " . $summcon['SummId'] . "</p1><br>";
                   // echo "<p1>Summoner Name:  =  <b>" . $summcon['SummName'] . "</b></p1><br>";
                    echo "<p1><br><br><h3>  Most played champions</h3></p1>
                        
                        <p style=text-align:center>" . " <br>        1st.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         2nd.      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    3rd.</p>  
       <img class=img-circle3  src=http://ddragon.leagueoflegends.com/cdn/7.5.2/img/champion/" . $champ1f . ".png alt=".$champ1f."> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;             <img class=img-circle  src=http://ddragon.leagueoflegends.com/cdn/7.5.2/img/champion/" . $champ2f . ".png>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;          <img class=img-circle3 src=http://ddragon.leagueoflegends.com/cdn/7.5.2/img/champion/" . $champ3f . ".png><br><br>";
                    echo "<p style=text-align:center>" . "         " . $champ1f . "     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     " . $champ2f . "     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     " . $champ3f . "</p>";
                    ?>

                     

                </div>
            </div>
        </section>

        <!-- Contact Section -->




        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Simon Bundi</p>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

        <!-- Custom scripts for this template -->
        <script src="js/grayscale.min.js"></script>

    </body>

</html>
