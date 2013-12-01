<?php require_once '../includes/library/session.php' ?>
<?php require_once '../includes/library/functions.php' ?>

<?php
if ($session->check_login() == true){
    $session->logout();
    redirect_to("login.php");
} else {
    redirect_to("login.php");
}
?>
