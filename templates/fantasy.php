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
    <link href="styles/main.css" rel="stylesheet">


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
            aria-label="Toggle navigation"
          >
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
      <h1 style="text-align: center;">This Week's Top Scoring Players</h1>
      <div class="container">
        <table class="table table-hover table-striped">
          <thead class="thead-inverse">
            <tr>
              <th>Position</th>
              <th>Player</th>
              <th>Team</th>
              <th>Points</th>
              <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">SF</th>
                <td>LeBron James <img src="https://a.espncdn.com/combiner/i?img=/i/headshots/nba/players/full/1966.png" alt="LeBron James headshot" style="width:25px; height:auto;"></td>
                <td>Los Angeles Lakers <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Los_Angeles_Lakers_logo.svg/1200px-Los_Angeles_Lakers_logo.svg.png" alt="Lakers Logo" style="width:25px; height:auto;"></td>
                <td>24.5</td>
                <td>$6,000</td>
            </tr>
            <tr>
                <th scope="row">PG</th>
                <td>Stephen Curry <img src="https://cdn.nba.com/headshots/nba/latest/1040x760/201939.png" alt="Stephen Curry headshot" style="width:25px; height:auto;"></td>
                <td>Golden State Warriors <img src="https://www.nba.com/assets/logos/teams/primary/web/GSW.svg" alt="Warriors Logo" style="width:25px; height:auto;"></td>
                <td>23</td>
                <td>$5,300</td>
            </tr>
            <tr>
                <th scope="row">PF</th>
                <td>Kevin Durant <img src="https://cdn.nba.com/headshots/nba/latest/1040x760/201142.png" alt="Kevin Durant headshot" style="width:25px; height:auto;"></td>
                <td>Brooklyn Nets<img src="https://logos-world.net/wp-content/uploads/2020/05/Brooklyn-Nets-Logo.png" alt="Warriors Logo" style="width:25px; height:auto;"></td>
                <td>22.5</td>
                <td>$5,500</td>
            </tr>
            <tr>
                <th scope="row">SG</th>
                <td>Klay Thompson <img src="https://cdn.nba.com/headshots/nba/latest/1040x760/202691.png" alt="Klay Thompson headshot" style="width:25px; height:auto;"></td>
                <td>Golden State Warriors <img src="https://www.nba.com/assets/logos/teams/primary/web/GSW.svg" alt="Warriors Logo" style="width:25px; height:auto;"></td>
                <td>22.5</td>
                <td>$3,000</td>
            </tr>
            <tr>
                <th scope="row">C</th>
                <td>Anthony Davis <img src="https://a.espncdn.com/combiner/i?img=/i/headshots/nba/players/full/6583.png&w=350&h=254" alt="Anthony Davis headshot" style="width:25px; height:auto;"></td>
                <td>Los Angeles Lakers<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Los_Angeles_Lakers_logo.svg/1200px-Los_Angeles_Lakers_logo.svg.png" alt="Lakers Logo" style="width:25px; height:auto;"></td>
                <td>22</td>
                <td>$4,000</td>
        </tbody>
      </table>
    </div>
    <div class="container">
        <div class="row">
          <h2 style="text-align: center; padding-bottom: 0px;">All Players</h2>
          <h3 style="padding-top: 0px;">Filter by:</h3>
          <div class="col-sm-3" >
            <div class="form-group">
              <label for="positionFilter">Position</label>
              <select class="form-select" id="positionFilter">
                <option>All</option>
                <option>PG</option>
                <option>SG</option>
                <option>SF</option>
                <option>PF</option>
                <option>C</option>
              </select>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="teamFilter">Team</label>
              <select class="form-select" id="teamFilter">
                <option>All</option>
                <option>Boston Celtics</option>
                <option>Brooklyn Nets</option>
                <option>New York Knicks</option>
                <option>Philadelphia 76ers</option>
                <option>Toronto Raptors</option>
                <option>Chicago Bulls</option>
                <option>Cleveland Cavaliers</option>
                <option>Detroit Pistons</option>
                <option>Indiana Pacers</option>
                <option>Milwaukee Bucks</option>
                <option>Atlanta Hawks</option>
                <option>Charlotte Hornets</option>
                <option>Miami Heat</option>
                <option>Orlando Magic</option>
                <option>Washington Wizards</option>
                <option>Denver Nuggets</option>
                <option>Minnesota Timberwolves</option>
                <option>Oklahoma City Thunder</option>
                <option>Portland Trail Blazers</option>
                <option>Utah Jazz</option>
                <option>Golden State Warriors</option>
                <option>Los Angeles Clippers</option>
                <option>Los Angeles Lakers</option>
                <option>Phoenix Suns</option>
                <option>Sacramento Kings</option>
                <option>Dallas Mavericks</option>
                <option>Houston Rockets</option>
                <option>Memphis Grizzlies</option>
                <option>New Orleans Pelicans</option>
                <option>San Antonio Spurs</option>
              </select>
            </div>            
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="salaryFilter">Salary</label>
              <select class="form-select" id="salaryFilter">
                <option>Highest to Lowest</option>
                <option>Lowest to Highest</option>
              </select>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="pointsFilter">Points</label>
              <select class="form-select" id="pointsFilter">
                <option>Highest to Lowest</option>
                <option>Lowest to Highest</option>
              </select>
            </div>
          </div>
      </div>
      <table class="table table-hover table-striped">
        <thead class="thead-inverse">
          <tr>
            <th>Position</th>
            <th>Player</th>
            <th>Team</th>
            <th>Points</th>
            <th>Salary</th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <th scope="row">SF</th>
              <td>LeBron James <img src="https://a.espncdn.com/combiner/i?img=/i/headshots/nba/players/full/1966.png" alt="LeBron James headshot" style="width:25px; height:auto;"></td>
              <td>Los Angeles Lakers <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Los_Angeles_Lakers_logo.svg/1200px-Los_Angeles_Lakers_logo.svg.png" alt="Lakers Logo" style="width:25px; height:auto;"></td>
              <td>24.5</td>
              <td>$6,000</td>
          </tr>
          <tr>
              <th scope="row">PG</th>
              <td>Stephen Curry <img src="https://cdn.nba.com/headshots/nba/latest/1040x760/201939.png" alt="Stephen Curry headshot" style="width:25px; height:auto;"></td>
              <td>Golden State Warriors <img src="https://www.nba.com/assets/logos/teams/primary/web/GSW.svg" alt="Warriors Logo" style="width:25px; height:auto;"></td>
              <td>23</td>
              <td>$5,300</td>
          </tr>
          <tr>
              <th scope="row">PF</th>
              <td>Kevin Durant <img src="https://cdn.nba.com/headshots/nba/latest/1040x760/201142.png" alt="Kevin Durant headshot" style="width:25px; height:auto;"></td>
              <td>Brooklyn Nets<img src="https://logos-world.net/wp-content/uploads/2020/05/Brooklyn-Nets-Logo.png" alt="Warriors Logo" style="width:25px; height:auto;"></td>
              <td>22.5</td>
              <td>$5,500</td>
          </tr>
          <tr>
              <th scope="row">SG</th>
              <td>Klay Thompson <img src="https://cdn.nba.com/headshots/nba/latest/1040x760/202691.png" alt="Klay Thompson headshot" style="width:25px; height:auto;"></td>
              <td>Golden State Warriors <img src="https://www.nba.com/assets/logos/teams/primary/web/GSW.svg" alt="Warriors Logo" style="width:25px; height:auto;"></td>
              <td>22.5</td>
              <td>$3,000</td>
          </tr>
          <tr>
              <th scope="row">C</th>
              <td>Anthony Davis <img src="https://a.espncdn.com/combiner/i?img=/i/headshots/nba/players/full/6583.png&w=350&h=254" alt="Anthony Davis headshot" style="width:25px; height:auto;"></td>
              <td>Los Angeles Lakers<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Los_Angeles_Lakers_logo.svg/1200px-Los_Angeles_Lakers_logo.svg.png" alt="Lakers Logo" style="width:25px; height:auto;"></td>
              <td>22</td>
              <td>$4,000</td>
      </tbody>
    </table>
  </div>
<nav aria-label="Page navigation example" style="margin-bottom: 1.5em;">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>