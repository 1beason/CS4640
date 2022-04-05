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
  <?php
    include("nav.php");
    ?>
      <h1 style="text-align: center;">This Week's Top Scoring Players</h1>
      <div class="container">
        <table class="table table-hover table-striped">
          <thead class="thead-inverse">
            <tr>
              <th>Position</th>
              <th>Player</th>
              <th>Team</th>
              <th>Points</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($top_scorers as $player):
            ?>
            <tr>
                <th scope="row"><?php echo $player['position'] ?></th>
                <td><?php echo $player['name'] ?></td>
                <td><?php echo $player['team'] ?></td>
                <td><?php echo $player['fp']?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <form name="playerFilter" id="playerFilter" method="POST">
      <div class="container">
          <div class="row">
            <h2 style="text-align: center; padding-bottom: 0px;">All Players</h2>
            <h3 style="padding-top: 0px;">Filter by:</h3>
            <div class="col-sm-3" >
              <div class="form-group">
                <label for="positionFilter">Position</label>
                <select class="form-select" id="positionFilter" name="positionFilter">
                  <?php 
                  if($positionFilter) { 
                    echo "<option>{$positionFilter}</option>";
                  } 
                  ?>
                  <option>All</option>
                  <?php
                  foreach($positions as $position):
                    ?>
                  <option><?php echo $position['position'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="teamFilter">Team</label>
                <select class="form-select" id="teamFilter" name="teamFilter">
                  <?php 
                  if($teamFilter) { 
                    echo "<option>{$teamFilter}</option>";
                    }
                  ?>
                  <option>All</option>
                  <?php
                  foreach($teams as $team):
                    ?>
                  <option><?php echo $team['team']?></option>
                  <?php endforeach ?>
                </select>
              </div>            
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="pointsFilter">Points</label>
                <select class="form-select" id="pointsFilter" name="pointsFilter">
                  <option>Highest to Lowest</option>
                  <option>Lowest to Highest</option>
                </select>
              </div>
            </div>
            <div class="button-container">
              <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      <table class="paginated table table-hover table-striped">
        <thead class="thead-inverse">
          <tr>
            <th>Position</th>
            <th>Player</th>
            <th>Team</th>
            <th>Points</th>
          </tr>
      </thead>
      <tbody>
          <?php
          foreach($players as $player):
          ?>
          <tr>
              <td><?php echo $player['position'] ?></td>
              <td><?php echo $player['name'] ?></td>
              <td><?php echo $player['team'] ?></td>
              <td><?php echo $player['fp']?></td>
          </tr>
          <?php endforeach ?>
      </tbody>
    </table>
  </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>        
</body>