<?php

class FinanceController {
    private $command;
    private $db;

    public function __construct($command) {
        $this->command = $command;
        $this->db = new Database();

        // check if users table exists in the database
        try { 
            $this->db->query("SELECT * FROM hw5_users LIMIT 1");
            // table exists
        } catch (Exception $e) {
            // table does not exist
            // create the table
            $this->db->query("CREATE TABLE hw5_users (
                id int not null auto_increment,
                email text not null,
                password text not null,
                primary key (id)
            )");
        }

        // check if tansactions table exists in the database
        try {
            $this->db->query("SELECT * FROM hw5_transactions LIMIT 1");
            // table exists
        } catch (Exception $e) {
            // table does not exist
            // create the table
            $this->db->query("CREATE TABLE hw5_transactions (
                id int not null auto_increment,
                user_id int not null, 
                category text not null,
                t_date date not null,
                amount decimal(10,2) not null,
                primary key (id)
            )");
        }
    }

    public function run() {
        switch ($this->command) {
            case "login":
                $this->login();
                break;
            case "logout":
                $this->logout();
                break;
            case "history":
                $this->history();
                break;
            case "new_transaction":
                $this->new_transaction();
                break;
            default:
                $this->login();
                break;
        }
    }

    private function login() {
        if (isset($_POST["email"])) {
            $data = $this->db->query("select * from hw5_users where email = ?;", "s", $_POST["email"]);
            if ($data === false) {
                $error_msg = "Error checking for user";
            } else if (!empty($data)) {
                if (password_verify($_POST["password"], $data[0]["password"])) {
                    $_SESSION["email"] = $data[0]["email"];
                    $_SESSION["user_id"] = $data[0]["id"];
                    header("Location: ?command=history");
                } else {
                    $error_msg = "Wrong password";
                }
            } else { // empty, no user found
                // TODO: input validation
                // Note: never store clear-text passwords in the database
                //       PHP provides password_hash() and password_verify()
                //       to provide password verification
                $insert = $this->db->query("insert into hw5_users (email, password) values (?, ?);", 
                        "ss", $_POST["email"], password_hash($_POST["password"], PASSWORD_DEFAULT));
                if ($insert === false) {
                    $error_msg = "Error inserting user";
                } else {
                    $_SESSION["email"] = $data[0]["email"];
                    header("Location: ?command=history");
                }
            }
        }
        include("templates/login.php");
    }

    private function logout() {
        session_destroy();
        include("templates/login.php");
    }

    private function history() {
        $data = $this->db->query("select * from hw5_transactions where user_id = ? order by t_date desc;", "i", $_SESSION["user_id"]);
        if ($data === false) {
            $error_msg = "Error checking for transactions";
        } else if (!empty($data)) {
            $transactions = $data;
        } else { // empty, no transactions found
            $transactions = array();
        }
        include("templates/history.php");
    }

    private function add_txn() {
        $data = $this->db->query("insert into hw5_transactions (user_id, category, t_date, amount) values (?, ?, ?, ?);", 
                "issd", $_SESSION["user_id"], $_POST["category"], $_POST["t_date"], $_POST["amount"]);
        if ($data === false) {
            $error_msg = "Error inserting transaction";
        } else {
            header("Location: ?command=history");
        }
    }

    private function new_transaction() {
        if (isset($_POST["category"]) && isset($_POST["t_date"]) && isset($_POST["amount"])) {
            $this->add_txn();
        }
        include("templates/new_transaction.php");
    }


}