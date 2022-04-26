<nav class="navbar navbar-expand-lg navbar-light" aria-label="Eleventh navbar example" id="nav">
        <div class="container-fluid">
          <a class="navbar-brand" href="?command=home">
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
                <a class="nav-link active" aria-current="page" href="?command=home" >Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?command=fantasy">Fantasy Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?command=leaderboard">Team Leaderboard</a>
              </li>
            </ul>
            <ul class="navbar-nav d-flex flex-row me-1">
                <?php
                if (isset($_SESSION['name'])) {
                  echo "<li class='nav-item me-3 me-lg-0'>";
                  echo "<a class='nav-link' href='?command=profile'>{$_SESSION['name']}</a>";
                  echo "</li>";
                  echo "<li class='nav-item me-3 me-lg-0'>";
                  echo "<a class='nav-link' href='?command=logout'>Logout</a>";
                  echo "</li>";

                } else {
                  echo "<li class='nav-item me-3 me-lg-0'>";
                  echo '<a class="nav-link" href="?command=login"><i class="bi bi-person"></i><span class="visually-hidden">Profile</span></a>';
                  echo "</li>";
                }
              ?>
            </ul>
            <form>
              <input class="form-control" type="text" placeholder="Search" aria-label="Search">
            </form>
          </div>
        </div>
 </nav>