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

<style>
/* Popup Styling Copied From https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_popup */
.popup {
  position: relative;
  display: inline-block;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* The actual popup */
.popup .popuptext {
  visibility: hidden;
  width: 180px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;} 
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
</style>

    <title>NBA Stats</title>
  </head>
  <body>
  <?php
  include("nav.php");
  ?>
    <h1>2021-2022 Eastern Conference Standings</h1>
    <div class="container">
    
      <table class="table table-hover table-striped">
      <thead class="thead-inverse">
        <tr>
          <th scope="col">Team</th>
          <th scope="col">Division</th>
          <th scope="col">W</th>
          <th scope="col">L</th>
          <th scope="col">Pct</th>
          <th scope="col">GB</th>
          <th scope="col">Strk</th>
      </tr>
      </thead>
        <tbody>
          <?php
          $i = 0;
          foreach ($east_data as $east_details) : ?>
            <?php $east_details["city"] = preg_replace('/\s+/', '-', $east_details["city"]);
            $url = "https://loodibee.com/wp-content/uploads/nba-" . strtolower($east_details['city']) . "-" . strtolower($east_details['name']) .  "-logo.png";
            $alt_text = $east_details['city'] . " " . $east_details['name'] . " Logo"; ?>
              <tr>
                <td><div class="popup" onclick=<?php echo "eastPopupFunction" . $i . "()";?>><img src = <?php echo $url ?> alt= <?php echo $alt_text ?> style="width:25px; height:auto" > <?php echo $east_details['name'] ?>
                  <span class="popuptext" id= <?php echo "eastPopup" . $i ?>>
                     <?php echo "W/L Splits:" . "<br/>" . 
                     "Home Record: " . $east_details["homeWins"] . "-" . $east_details["homeLosses"] . "<br/>" . 
                     "Away Record: " . $east_details["awayWins"] . "-" . $east_details["awayLosses"] . "<br/>" . 
                     "Conference Record: " . $east_details["confWins"] . "-" . $east_details["confLosses"] . "<br/>" . 
                     "Division Record: " . $east_details["divWins"] . "-" . $east_details["divLosses"]; ?> </span>
                  <?php $i++ ?>
                </div></td>
                  <td><?php echo $east_details['division']; ?></td>
                  <td><?php echo $east_details['wins']; ?></td>
                  <td><?php echo $east_details['losses']; ?></td>
                  <td><?php echo $east_details['percent']; ?></td>
                  <td><?php echo $east_details['GB']; ?></td>
                  <td><?php echo $east_details['streak']; ?></td>
              </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
    </div>
    
    <h1>2021-2022 Western Conference Playoff Standings</h1>
    <div class="container">
      <table class="table table-hover table-striped">
        <thead class="thead-inverse">
          <tr>
            <th scope="col">Team</th>
            <th scope="col">Division</th>
            <th scope="col">W</th>
            <th scope="col">L</th>
            <th scope="col">Pct</th>
            <th scope="col">GB</th>
            <th scope="col">Strk</th>
        </tr>
        </thead>
          <tbody>
            <?php 
            $i = 0;
            foreach ($west_data as $west_details) : ?>
  
              <?php $west_details["city"] = preg_replace('/\s+/', '-', $west_details["city"]);
              $url = "https://loodibee.com/wp-content/uploads/nba-" . strtolower($west_details['city']) . "-" . strtolower($west_details['name']) .  "-logo.png";
              if (strcmp($west_details['name'], "Nuggets") == 0){
                $url = "https://loodibee.com/wp-content/uploads/denver-nuggets-logo-symbol.png";
              }
              if (strcmp($west_details['city'], "Portland") == 0){
                $url = "https://loodibee.com/wp-content/uploads/portland-trail-blazers-logo-symbol.png";
              }
              if (strcmp($west_details['name'], "Clippers") == 0){
                $url = "https://loodibee.com/wp-content/uploads/los-angeles-clippers-logo-symbol.png";
              }

              $alt_text = $west_details['city'] . " " . $west_details['name'] . " Logo"; ?>
                <tr>
                  <td><div class="popup" onclick=<?php echo "westPopupFunction" . $i . "()";?>><img src = <?php echo $url ?> alt= <?php echo $alt_text ?> style="width:25px; height:auto" > <?php echo $west_details['name'] ?>
                    <span class="popuptext" id= <?php echo "westPopup" . $i ?>>
                       <?php echo "W/L Splits:" . "<br/>" . 
                       "Home Record: " . $west_details["homeWins"] . "-" . $west_details["homeLosses"] . "<br/>" . 
                       "Away Record: " . $west_details["awayWins"] . "-" . $west_details["awayLosses"] . "<br/>" . 
                       "Conference Record: " . $west_details["confWins"] . "-" . $west_details["confLosses"] . "<br/>" . 
                       "Division Record: " . $west_details["divWins"] . "-" . $west_details["divLosses"]; ?> </span>
                    <?php $i++ ?>
                  </div></td>
                    <td><?php echo $west_details['division']; ?></td>
                    <td><?php echo $west_details['wins']; ?></td>
                    <td><?php echo $west_details['losses']; ?></td>
                    <td><?php echo $west_details['percent']; ?></td>
                    <td><?php echo $west_details['GB']; ?></td>
                    <td><?php echo $west_details['streak']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    
    <script>
 /* Popup Logic Copied From https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_popup */
function eastPopupFunction0() {
  var popup = document.getElementById("eastPopup0");
  popup.classList.toggle("show");
}
function eastPopupFunction1() {
  var popup = document.getElementById("eastPopup1");
  popup.classList.toggle("show");
}
function eastPopupFunction2() {
  var popup = document.getElementById("eastPopup2");
  popup.classList.toggle("show");
}
function eastPopupFunction3() {
  var popup = document.getElementById("eastPopup3");
  popup.classList.toggle("show");
}
function eastPopupFunction4() {
  var popup = document.getElementById("eastPopup4");
  popup.classList.toggle("show");
}
function eastPopupFunction5() {
  var popup = document.getElementById("eastPopup5");
  popup.classList.toggle("show");
}
function eastPopupFunction6() {
  var popup = document.getElementById("eastPopup6");
  popup.classList.toggle("show");
}
function eastPopupFunction7() {
  var popup = document.getElementById("eastPopup7");
  popup.classList.toggle("show");
}
function eastPopupFunction8() {
  var popup = document.getElementById("eastPopup8");
  popup.classList.toggle("show");
}
function eastPopupFunction9() {
  var popup = document.getElementById("eastPopup9");
  popup.classList.toggle("show");
}
function eastPopupFunction10() {
  var popup = document.getElementById("eastPopup10");
  popup.classList.toggle("show");
}
function eastPopupFunction11() {
  var popup = document.getElementById("eastPopup11");
  popup.classList.toggle("show");
}
function eastPopupFunction12() {
  var popup = document.getElementById("eastPopup12");
  popup.classList.toggle("show");
}
function eastPopupFunction13() {
  var popup = document.getElementById("eastPopup13");
  popup.classList.toggle("show");
}
function eastPopupFunction14() {
  var popup = document.getElementById("eastPopup14");
  popup.classList.toggle("show");
}
function westPopupFunction0() {
  var popup = document.getElementById("westPopup0");
  popup.classList.toggle("show");
}
function westPopupFunction1() {
  var popup = document.getElementById("westPopup1");
  popup.classList.toggle("show");
}
function westPopupFunction2() {
  var popup = document.getElementById("westPopup2");
  popup.classList.toggle("show");
}
function westPopupFunction3() {
  var popup = document.getElementById("westPopup3");
  popup.classList.toggle("show");
}
function westPopupFunction4() {
  var popup = document.getElementById("westPopup4");
  popup.classList.toggle("show");
}
function westPopupFunction5() {
  var popup = document.getElementById("westPopup5");
  popup.classList.toggle("show");
}
function westPopupFunction6() {
  var popup = document.getElementById("westPopup6");
  popup.classList.toggle("show");
}
function westPopupFunction7() {
  var popup = document.getElementById("westPopup7");
  popup.classList.toggle("show");
}
function westPopupFunction8() {
  var popup = document.getElementById("westPopup8");
  popup.classList.toggle("show");
}
function westPopupFunction9() {
  var popup = document.getElementById("westPopup9");
  popup.classList.toggle("show");
}
function westPopupFunction10() {
  var popup = document.getElementById("westPopup10");
  popup.classList.toggle("show");
}
function westPopupFunction11() {
  var popup = document.getElementById("westPopup11");
  popup.classList.toggle("show");
}
function westPopupFunction12() {
  var popup = document.getElementById("westPopup12");
  popup.classList.toggle("show");
}
function westPopupFunction13() {
  var popup = document.getElementById("westPopup13");
  popup.classList.toggle("show");
}
function westPopupFunction14() {
  var popup = document.getElementById("westPopup14");
  popup.classList.toggle("show");
}
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>
