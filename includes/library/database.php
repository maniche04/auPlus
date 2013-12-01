<?php

class Database {

    public $last_query;
    public $connection;

    function __CONSTRUCT() {
        $this->connection = mysqli_connect("localhost", "auditp", "cescfabregas", "auditp");
        $this->check_connect_error();
    }

    public function check_connect_error() {
        if (mysqli_connect_error($this->connection)) {
            die("Database Connection Error: " . mysqli_connect_error($this->connection));
        }
    }

    public function query($sql = "") {
        $this->last_query = $sql;
        $resultset = mysqli_query($this->connection, $sql);
        if ($resultset) {
            return $resultset;
        } else {
            echo mysqli_errno($this->connection) . " : " . mysqli_error($this->connection) . "</br>";
        }
    }

    public function fetch_assoc($result_set) {
        if ($result_set) {
            return mysqli_fetch_assoc($result_set);
        } else {
            return "";
        }
    }

}

$database = new Database();
?>
