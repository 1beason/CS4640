<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">  

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Brooks Eason">
        <meta name="description" content="CS4640 New Transaction page">  

        <title>New Transaction</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
    </head>
    <body>
        <h1 class="text-center">New Transaction</h1>
        <h3 class="text-center">Please enter the information below to create a new transaction.</h3>
        <form action="?command=new_transaction" method="post">
            <div class="mb-3 text-center">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"/>
            </div>
            <div class="mb-3 text-center">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category"/>
            </div>
            <div class="mb-3 text-center">
                <label for="amount" class="form-label">Amount</label>
                <input type="decimal" class="form-control" id="amount" name="amount"/>
            </div>
            <div class="mb-3 text-center">
                <label for="t_date" class="form-label">Date</label>
                <input type="date" class="form-control" id="t_date" name="t_date"/>
            <div class="mb-3 text-center">
                <label for="type" class="form-label">Type</label>
                <select id="type" name="type">
                    <option value="debit">Debit</option>
                    <option value="credit">Credit</option>
                </select>
            </div>
            <div class="text-center">                
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </body>
</html> 