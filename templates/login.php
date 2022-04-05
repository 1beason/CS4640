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


    <title>NBA Stats Login</title>
  </head>
  <body>
    <?php
        include("nav.php");
    ?>
    <h1 style="text-align: center;">Login</h1>
    <h3 style="text-align: center;">Please enter your username and password</h3>
    <?php if($error_msg !== "") { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $error_msg; }?>
      </div>
    <form name="login" id="login" method="POST">
      <div style="text-align: center;" class="container">
        <div class="row">
            <div class="mb-3">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            </div>
        </div>
        <div class="row">
          <div class="mb-3" >
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="mb-3">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="mb-3" >
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </div>
    </div>
    </form>
</body>
</html>