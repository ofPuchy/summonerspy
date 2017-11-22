<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
include('cache/php-riot-api.php');
include('cache/FileSystemCache.php');
include_once('functions.php');
function preview($tabs) {
    echo "<pre>";
    print_r($tabs);
    echo "<pre>";
}

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

<html>

    <head>
        <meta charset="UTF-8">
        <title>SummonerSpy</title>
        <style>
            div.padding{
                padding-top: 100px;
                padding-left: 500px;
            } 
        </style>
    </head>
    <body id="page-top">

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
                    <h1 style="text-height:16px">   </h1>
                    <h2>get started</h2>
                    
                   
                    <p>Enter summoner name to conduct research on league of legends player
                    <form role="form" id="contactForm" data-toggle="validator" action="lookup.php">
                        <input type="text" name="search" placeholder="Search.." style="padding:10px">
                        <button type="submit" id="form-submit" class="btn btn-success btn-lg">Look up Summoner</button>
                        </form>
                </div>
            </div>
        </section>
      

        <?php
        $search = $_GET['search'];
        $server = "euw";
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
       
        $champ = $api->getChampionMastery($summcon['SummId']);
        
        preview($summcon);
        $champ1 = $champ[0]['championId'];
        $champ1f = idtochamp($champ1);
        echo "<p1>Most played champ:  =  ". $champ1f."</p1><br>";
       echo "<p1>Player Id:  =  ".  $summcon['SummId']."</p1><br>";
       echo "<p1>Summoner Name:  =  <b>".  $summcon['SummName']."</b></p1><br>";

        echo "<div class=padding><b>" . $api_username . "</b><br>
       <img src=http://ddragon.leagueoflegends.com/cdn/6.24.1/img/profileicon/" . $iconid . ".png></div>"
        ?>
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
