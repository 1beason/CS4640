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

    <style>
      .checked {
        color: #35b557;
      }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
	        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
	        crossorigin="anonymous"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        if ($('#name').html() == "" || $('#username').html() == "" || $('#password').html() == "") {
            $('#submit').prop('disabled', true);
        }
        $('input').keyup(function() {
            if ($('#name').val() != "" && $('#username').val() != "" && $('#password').val() != "") {
                $('#submit').prop('disabled', false);
            } else {
                $('#submit').prop('disabled', true);
            }
        });

        $('#name').keyup(function() {
            if(($('#name').val().match(/[^a-zA-Z'-]/))) {
              $('#name_err').html("Names cannot contain numbers or special characters");
              $('#submit').prop('disabled', true);
            } else {
              $('#name_err').html("");
            }
        })

        $('#username').keyup(function() {
            if(($('#username').val().match(/[^a-zA-Z0-9]/))) {
              $('#username_err').html("Usernames cannot contain special characters");
              $('#submit').prop('disabled', true);
            } else {
              $('#username_err').html("");
            }
        })

        $('#password').keyup(function() {
            if(($('#password').val().match(/[a-zA-Z]/))) {
              $('#chars').addClass('checked');
            } else {
              $('#chars').removeClass('checked');
            }

            if(($('#password').val().match(/[!@#$%^&*()_`~]/))) {
              console.log("sym check");
              $('#sym').addClass('checked');
            }  else{
              $('#sym').removeClass('checked');
            }
            if(($('#password').val().match(/[0-9]/))) {
              console.log("num check");
              $('#nums').addClass('checked');
            } else {
              $('#nums').removeClass('checked');
            }
            if(($('#password').val().length >= 7)) {
              $('#len').addClass('checked');
            } else {
              $('#len').removeClass('checked');
            }

            if(!($('#chars').hasClass('checked') && $('#sym').hasClass('checked') && $('#nums').hasClass('checked') && $('#len').hasClass('checked'))) {
              $('#submit').prop('disabled', true);
            }
        })
    });
    </script>


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
              <span class="text-danger" id="name_err"></span>
            </div>
        </div>
        <div class="row">
          <div class="mb-3" >
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
              <span class="text-danger" id="username_err"></span>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="mb-3">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
              </div>
              <span><p>Must Contain:</p>&ensp;<p id="len">7 characters</p>&ensp;<span id="chars">letters, </span><span id="nums">numbers, </span><span id="sym">at least one symbol</span></span>
            </div>
        </div>
        <div class="row">
          <div class="mb-3" >
            <button type="submit" id="submit" class="btn btn-primary">Login</button>
          </div>
        </div>
    </div>
    </form>
</body>
</html>