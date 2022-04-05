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
    <h1>2021-2022 Eastern Conference Playoff Standings</h1>
    <div class="container">
    
      <table class="table table-hover table-striped">
      <thead class="thead-inverse">
        <tr>
          <th>#</th>
          <th>Team</th>
          <th>W</th>
          <th>L</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Heat <img src="https://ssl.gstatic.com/onebox/media/sports/logos/0nQXN6OF7wnLY3hJz8lZJQ_48x48.png" alt="Miami Heat Logo" style="width:25px; height:auto;"></td>
          <td>38</td>
          <td>21</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Bulls <img src="https://ssl.gstatic.com/onebox/media/sports/logos/ofjScRGiytT__Flak2j4dg_48x48.png" alt="Chicago Bulls Logo" style="width:25px; height:auto;"></td>
          <td>38</td>
          <td>21</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>76ers <img src="https://ssl.gstatic.com/onebox/media/sports/logos/US6KILZue2D5766trEf0Mg_48x48.png" alt="Philadelphia 76ers Logo" style="width:25px; height:auto;"></td>
          <td>35</td>
          <td>23</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Cavaliers <img src="https://ssl.gstatic.com/onebox/media/sports/logos/NAlGkmv45l1L-3NhwVhDPg_48x48.png" alt="Cleveland Cavaliers Logo" style="width:25px; height:auto;"></td>
          <td>35</td>
          <td>23</td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>Bucks <img src="https://ssl.gstatic.com/onebox/media/sports/logos/Wd6xIEIXpfqg9EZC6PAepQ_48x48.png" alt="Milwaukee Bucks Logo" style="width:25px; height:auto;"></td>
          <td>36</td>
          <td>24</td>
        </tr>
        <tr>
          <th scope="row">6</th>
          <td>Celtics <img src="https://ssl.gstatic.com/onebox/media/sports/logos/US6KILZue2D5766trEf0Mg_48x48.png" alt="Boston Celtics Logo" style="width:25px; height:auto;"></td>
          <td>34</td>
          <td>26</td>
        </tr>
        <tr>
          <th scope="row">7</th>
          <td>Raptors <img src="https://ssl.gstatic.com/onebox/media/sports/logos/745IgW4NSvnRxg-W9oczmQ_48x48.png" alt="Toronto Raptors Logo" style="width:25px; height:auto;"></td>
          <td>32</td>
          <td>25</td>
        </tr>
        <tr>
          <th scope="row">8</th>
          <td>Nets <img src="https://ssl.gstatic.com/onebox/media/sports/logos/iishUmO7vbJBE7iK2CZCdw_48x48.png" alt="Brooklyn Nets Logo" style="width:25px; height:auto;"></td>
          <td>31</td>
          <td>28</td>
        </tr>
      </tbody>
    </table>
    </div>

    <a href="full_table.html" style="color:blue; text-align: center;">Show all 15 Teams in the Conference</a>
    
    <h1>2021-2022 Western Conference Playoff Standings</h1>
    <div class="container">
    <table class="table table-hover table-striped">
      <thead class="thead-inverse">
        <tr>
          <th>#</th>
          <th>Team</th>
          <th>W</th>
          <th>L</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Suns <img src="https://ssl.gstatic.com/onebox/media/sports/logos/pRr87i24KHWH0UuAc5EamQ_48x48.png" alt="Phoenix Suns Logo" style="width:25px; height:auto;"></td>
          <td>48</td>
          <td>10</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Warriors <img src="https://ssl.gstatic.com/onebox/media/sports/logos/ovwlyYHRKZ90s7zn_qlMCg_48x48.png" alt="Golden State Warriors Logo" style="width:25px; height:auto;"></td>
          <td>42</td>
          <td>17</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Grizzlies <img src="https://ssl.gstatic.com/onebox/media/sports/logos/3ho45P8yNw-WmQ2m4A4TIA_48x48.png" alt="Memphis Grizzlies Logo" style="width:25px; height:auto;"></td>
          <td>41</td>
          <td>19</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Jazz <img src="https://ssl.gstatic.com/onebox/media/sports/logos/SP_dsmXEKFVZH5N1DQpZ4A_48x48.png" alt="Utah Jazz Logo" style="width:25px; height:auto;"></td>
          <td>36</td>
          <td>22</td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>Mavericks <img src="https://ssl.gstatic.com/onebox/media/sports/logos/xxxlj9RpmAKJ9P9phstWCQ_48x48.png" alt="Dallas Mavericks Logo" style="width:25px; height:auto;"></td>
          <td>35</td>
          <td>24</td>
        </tr>
        <tr>
          <th scope="row">6</th>
          <td>Nuggets <img src="https://ssl.gstatic.com/onebox/media/sports/logos/9wPFTOxV_zP1KmRRggJNqQ_48x48.png" alt="Denver Nuggets Logo" style="width:25px; height:auto;"></td>
          <td>33</td>
          <td>25</td>
        </tr>
        <tr>
          <th scope="row">7</th>
          <td>Timberwolves <img src="https://ssl.gstatic.com/onebox/media/sports/logos/21Zm6e_zGiWXsaLCQyjVig_48x48.png" alt="Minnesota Timberwolves Logo" style="width:25px; height:auto;"></td>
          <td>31</td>
          <td>28</td>
        </tr>
        <tr>
          <th scope="row">8</th>
          <td>Clippers <img src="https://ssl.gstatic.com/onebox/media/sports/logos/F36nQLCQ2FND3za-Eteeqg_48x48.png" alt="Los Angeles Clippers Logo" style="width:25px; height:auto;"></td>
          <td>30</td>
          <td>31</td>
        </tr>
      </tbody>
    </table>
    </div>
    <a href="full_table.html" style="color:blue; text-align: center;">Show all 15 Teams in the Conference</a>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>
