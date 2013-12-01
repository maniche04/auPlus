
<?php

class Validation {

    public $valid = true;
    public $login_error;
    public $errors = array();

    public function null_check($input) {
        if (!$input) {
            $this->errors[] = "Cannot be blank!";
            $this->valid = false;
            return true;
        } else {
            return false;
        }
    }

    public function string_length($input, $minstrlength, $maxstrlength) {
        if (!($maxstrlength > strlen($input)) || !(strlen($input) > $minstrlength)) {
            $this->errors[] = "Must be {$minstrlength} to {$maxstrlength} characters!";
            $this->valid = false;
        }
    }

    public function new_username($input_username) {
        $this->null_check($input_username);
        $this->string_length($input_username, 4, 16);
        return ($this->valid);
    }

    public function new_password($input_password) {
        $this->null_check($input_password);
        $this->string_length($input_password, 4, 16);
        return ($this->valid);
    }

    public function login($login_username, $login_password) {
        global $database;
        global $session;
        if ($this->null_check($login_username) == true || $this->null_check($login_password)) {
            $this->login_error = "Username or password cannot be blank!";
            $this->valid = false;
        } else {
            $username = mysqli_real_escape_string($database->connection, $login_username);
            $password = mysqli_real_escape_string($database->connection, $login_password);
            $sql = "SELECT * FROM User WHERE username = \"{$username}\" AND password = \"{$password}\" LIMIT 1";
            //echo $sql;
            $result = $database->query($sql);
            $u_array = $database->fetch_assoc($result);
            if (isset($u_array['username'])) {
                if (!$u_array['username'] === $username || !$u_array['password'] === $password) {
                    $this->valid = false;
                    $this->login_error = "Incorrect username / password";
                } else {
                    $this->valid = true;
                    $session->login($u_array['id']);
                }
            } else {
                $this->valid = false;
                $this->login_error = "Incorrect username / password";
            }
        }
    }

}
?>
