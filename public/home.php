<?php require_once '../includes/library/database_object.php' ?>
<?php require_once '../includes/library/user.php' ?>
<?php require_once '../includes/content/header.php' ?>
<?php require_once '../includes/library/validation.php' ?>
<?php require_once '../includes/library/session.php' ?>
<?php require_once '../includes/library/functions.php' ?>


<?php
if ($session->check_login() == false) {
    redirect_to("login.php");
}
?>

<body>
    <div id = "container">
        <div id = "infobar" style="width: 22%;">
            <p><b><?php echo "Welcome, " . User::data_by_id($session->userid,"first_name")?></b></p>
            <p id="info-title">Dashboard</p>
            <form action="logout.php">
                <input type="submit" id="submit" name="Logout" value="logout">
            </form>
        </div>
        <div id="main-content">
            <b><h2>Your Recent Audits</h2></b>
            <p>Data not found!</p>
        </div>
    </div>
</body>
<?php require_once '../includes/content/footer.php' ?>
