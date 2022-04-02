<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">  

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Brooks Eason">
        <meta name="description" content="CS4640 Finance Tansaction History Page">  

        <title>Transaction History</title>

       
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        .styling {
            text-align: center;
            margin-top: 40px;
          }
        img {
            margin-bottom: 30px;
        }
          
    </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light" aria-label="Eleventh navbar example" id="nav">
            <div class="container-fluid">
              <button
                class="navbar-toggler"
                data-toggle="collapse"
                data-target="#navbar"
                aria-controls="navbar"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
      
              <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?command=history" >Transaction History</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?command=new_transaction">New Transaction</a>
                  </li>
                </ul>
                <ul class="navbar-nav d-flex flex-row me-1">
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link">
                            <b>Name: </b> <?php 
                            echo $_SESSION["name"] 
                            ?> 
                        </a>
                    </li>
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link">
                            <b>Email: </b> <?php 
                            echo $_SESSION["email"] 
                            ?> 
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav d-flex flex-row me-1">
                    <li class="nav-item">
                        <a class="nav-link" href="?command=logout"><b>Logout</b></a>
                    </li>
                </ul>


              </div>
            </div>
          </nav>
        <h1 class="text-center">Transaction History</h1>
        <?php if(empty($transactions)) : ?>
        <h2 class="text-center">It appears you do not have any transactions listed in our database.</h2>
        <div class="text-center">
         <img src=https://media1.giphy.com/media/h0MTqLyvgG0Ss/giphy.gif class="text-center">
        </div>
        <h3 class="text-center">You can add new withdrawals and deposits by clicking the tab "New Transaction" above.
        </h3>
        <?php else : ?>



        <h2 class="text-center">Your transaction history, sorted by latest to earliest</h2>
      

        <div class="text-center">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Category</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Type</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transactions as $transaction) : ?>
                        <tr>
                            <td><?php echo $transaction['pay_name']; ?></td>
                            <td><?php echo $transaction['t_date']; ?></td>
                            <td><?php echo $transaction['category']; ?></td>
                            <td><?php echo $transaction['amount']; ?></td>
                            <td><?php echo $transaction['pay_type']; ?></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <h3 class="styling"> Your Current Balance: 
            <?php
                echo $sum[0]["balance"]
            ?>
        </h3>
        <div class="text-center">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Category</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($new_cat_balance as $new_cat) : ?>
                        <tr>
                            <td><?php echo $new_cat["category"]; ?></td>
                            <td><?php echo $new_cat["balance"]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p>*Above is your current balance, divided by category.</p>
        </div>
        <?php endif; ?>





        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>