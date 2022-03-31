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
  <body>
    <nav class="navbar navbar-expand-lg navbar-light" aria-label="Eleventh navbar example" id="nav">
        <div class="container-fluid">
          <a class="navbar-brand" href="home.html">
            <img src="https://library.sportingnews.com/2021-08/nba-75-logo_xiyzcva3x0eo1c45w97bgdhv0.jpg" alt="NBA Logo" width="100" class="d-inline-block align-middle mr-2">
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbar"
            aria-controls="navbar"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.html" >Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="fantasy.html">Fantasy Dashboard</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dropdown09"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Leaderboards
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdown09">
                  <li>
                    <a class="dropdown-item" href="players.html">Players</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="leaderboard.html">Teams</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="games.html">Games</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="about.html">About</a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="navbar-nav d-flex flex-row me-1">
              <li class="nav-item me-3 me-lg-0">
                <a class="nav-link" href="login.html"><i class="bi bi-person"></i><span class="visually-hidden">Profile</span></a>
              </li>
            </ul>
            <form>
              <input class="form-control" type="text" placeholder="Search" aria-label="Search">
            </form>
          </div>
        </div>
      </nav>
      <div class="p-5 mb-4 rounded-3" id="jumbotronHome">
        <div class="container-fluid py-5">
          <img src="https://cdn.nba.com/manage/2020/10/NBA20Secondary20Logo-784x462.jpg" alt="NBA Logo" class="center" height="10">
          <h2 class="display-5 fw-bold" style="text-align: center;">Your Home for All Things NBA</h2>
        </div>
      </div>
      <div class="row">
          <div class="col-mb-4">
            <div class="card sm-4">
              <a href="players.html">
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
              <a href="teams.html">
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
              <a href="fantasy.html">
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