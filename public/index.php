<?php require_once '../includes/library/database_object.php' ?>
<?php require_once '../includes/library/session.php' ?>
<?php require_once '../includes/library/functions.php' ?>
<?php require_once '../includes/library/session.php' ?>

<?php

if ($session->check_login() == true){
    redirect_to("home.php");
} else {
    redirect_to("login.php");
}
?>