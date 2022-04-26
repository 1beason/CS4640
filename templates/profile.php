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
    <?php
      include("nav.php");
    ?>
    <h1 style="text-align: center;"><?php echo $_SESSION['name'] . "'s Team" ?></h1>
    </body>
    <div class="container">
    <div class="row">
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
          if(count($players) !== 0) {
          foreach($players as $player):
            ?>
            <tr>
              <td><?php echo $player[0]['position'] ?></td>
              <td><?php echo $player[0]['name'] ?></td>
              <td><?php echo $player[0]['team'] ?></td>
              <td><?php echo $player[0]['fp'] ?></td>
          </tr>
          <?php endforeach; } else {
            echo "<h2 class='text-center'><b>You haven't chosen any players yet</h2>";
          }?>
        </tbody>
    </table>
    </div>
</div>
</html>