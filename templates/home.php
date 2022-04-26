<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="author" content="Brooks Eason, Matthew Condecido" />
    <meta name="description" content="A page for NBA information" />
    <meta name="keywords" content="NBA, Basketball, Stats, information" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/main.css">


    <title>NBA Stats</title>
  </head>
  <script src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#newPlayer").click(function(event){
        $.getJSON('https://data.nba.net/data/10s/prod/v1/2021/players.json', function(player) {
          var newPlayer = player.league.standard[Math.floor(Math.random() * player.league.standard.length)];
          var url = "https://ak-static.cms.nba.com/wp-content/uploads/headshots/nba/latest/260x190/" + newPlayer.personId + ".png";
          $('#display').html('<img src=' + url + '><h3 style="text-align: center;" class="card-title" >' + newPlayer.firstName + ' ' + newPlayer.lastName + '<br/>Welcomes You to NBA Stats!</h3>');
          $


        });
      });
    });
  </script>


  <body>
    <?php
      include("nav.php");
    ?>

      <div class="p-5 mb-3 rounded-3" id="jumbotronHome">
        <div class="container-fluid py-5" style="margin-bottom: 10px">
          <img src="https://cdn.nba.com/manage/2020/10/NBA20Secondary20Logo-784x462.jpg" alt="NBA Logo" class="center" height="10">
          <h2 class="display-5 fw-bold" style="text-align: center;">Your Home for All Things NBA</h2>
          <div class="card sm-4" style="	margin: 0 auto; display: grid; place-items: center; margin-top: 10px; width: 18rem;" id="display"></div>
          <h3 id="newPlayer" class=" fw-bold" style="text-align: center; ">Click to be greeted by a player.</h3>
        </div>
      </div>
        <div class="row">
          <div class="col-mb-4">
            <div class="card sm-4">
              <a href="?command=players">
              <img src="https://a.espncdn.com/combiner/i?img=/i/headshots/nba/players/full/1966.png" class="card-img-top" alt="LeBron James headshot" height="290">
              </a>
              <div class="card-body">
                <h5 class="card-title">Players</h5>
                <p class="card-text">
                  The best players in the NBA.
                </p>
              </div>
            </div>
          </div>
          <div class="col-mb-4">
            <div class="card sm-4">
              <a href="?command=leaderboard">
              <img src="https://www.nba.com/assets/logos/teams/primary/web/GSW.svg" class="card-img-top" alt="Golden State Warrirors Logo" height="290">
              </a>
              <div class="card-body">
                <h5 class="card-title">Teams</h5>
                <p class="card-text">
                  The best teams in the NBA.
                </p>
              </div>
            </div>
          </div>
          <div class="col-mb-4">
            <div class="card sm-4">
              <a href="?command=fantasy">
              <img src="https://a1.espncdn.com/combiner/i?img=%2Fi%2Fespn%2Fmisc_logos%2F500%2Ffba.png" class="card-img-top" alt="Fantasy Icon" height="290">
              </a>
              <div class="card-body">
                <h5 class="card-title">Fantasy</h5>
                <p class="card-text">
                  Your dashboard for fantasy basketball.
                </p>
              </div>
            </div>
          </div>
        </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  </body>
