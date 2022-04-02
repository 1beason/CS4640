
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">  

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Brooks Eason">
        <meta name="description" content="CS4640 New Transaction page">  

        <title>New Transaction</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            #inner {
                width: 50%;
                margin: 0 auto;
              }
              h3{
                margin-bottom: 20px;
            }
            p{
                padding: 20px;
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
                    <a class="nav-link" href="?command=history" >Transaction History</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?command=new_transaction">New Transaction</a>
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
        <h1 class="text-center">New Transaction</h1>
        <h3 class="text-center">Please enter the information below to create a new transaction.</h3>
    <form action="?command=new_transaction" method="post">
        <div id = "inner">
            <div class="form-floating mb-3" >
                <input type="text" class="form-control" id="pay_name" placeholder="pay_name" name="pay_name" required>
                <label for="pay_name">Name</label>
            </div>
            <div class="form-floating mb-3" >
                <input type="text" class="form-control" id="category" placeholder="category" name="category" required>
                <label for="category">Category</label>
            </div>
            <div class="form-floating mb-3" >
                <input type="number" step="any" min=0 class="form-control" id="amount" placeholder="amount" name="amount" required>
                <label for="amount">Amount</label>
            </div>
            <div class="form-floating mb-3" >
                <input type="date" class="form-control" id="t_date" placeholder="t_date" name="t_date" required>
                <label for="t_date">Date</label>
            </div>
            <div class="mb-3 text-center">
                <label for="pay_type" class="form-label">Type</label>
                <select id="pay_type" name="pay_type">
                    <option value="Credit">Credit</option>
                    <option value="Debit">Debit</option>
                </select>
            </div>
        

            <div class="text-center">                
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <p style="text-align: center;"">*If "Debit" is selected, the amount inputted will be entered as a negative number into the Transactions database.</p>

        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html> 
