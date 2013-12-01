<?php

class Session {

    private $logged_in = false;
    public $userid = "";
    
    function __construct() {
        session_start();
    }

    public function check_login() {
        if (isset($_SESSION['logged_in'])) {
            $this->logged_in = true;
            $this->userid = $_SESSION['userid'];
            return true;
        } else {
            return false;
        }
    }

    public function login($userid) {
        if ($userid) {
            $this->userid = $_SESSION['userid'] = $userid;
            $_SESSION['logged_in'] = $this->logged_in = true;
        }
    }

    public function logout() {
        unset($_SESSION['userid']);
        unset($_SESSION['logged_in']);
        unset($this->userid);
        $this->logged_in = false;
    }

}

$session = new Session();
?>
