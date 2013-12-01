<?php require_once '../includes/library/database.php' ?>
<?php require_once '../includes/library/database_object.php' ?>
<?php require_once '../includes/content/header.php' ?>
<?php require_once '../includes/library/user.php' ?>
<?php require_once '../includes/library/validation.php' ?>
<?php require_once '../includes/library/session.php' ?>
<?php require_once '../includes/library/functions.php' ?>
<?php
if ($session->check_login() == true) {
    redirect_to("home.php");
}

$is_valid = new Validation();
$username = "";

if (isset($_POST["submit"])) {
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];
    $username = $input_username;
    $is_valid->login($input_username, $input_password);
    if ($is_valid->valid == true) {
        redirect_to("home.php");
    }
}
?>
<body>
    <div id = "container">
        <div id = "infobar" style="width: 22%;">
            <p id="info-title">Login</p>
            <?php
            if ($is_valid->valid == false) {
                echo "<div id=\"error\"><b>{$is_valid->login_error}</b><hr></div>";
            }
            ?>
            <form name="login" method="POST" action="login.php">
                <table>
                    <tr>
                        <td>Username: </td>
                        <td><input type="text" name="username" value="<?php echo $username ?>"><br></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="password"><br></td>
                    </tr>

                </table>
                <p><input type="submit" name="submit" value="submit" id="submit"></p>
            </form>
        </div>
        <div id="main-content">
            <h2>What is Audit Plus?</h2>
            <p> This site is meant to be a portal for auditors, and will provide access to free web based
                and desktop based audit tools which will add efficiency to your daily work.</p>                
            <p>The primary focus of the site will be a Credit Observation web interface, which will
                allow you to maintain online working paper of all the credit files you've observed
                during a particular audit engagement. Many more features will then follow!</p>
            <p>Keep loggin in for more!</p>
            <p><b>Manish Bhattarai</b><br>Professional Staff<br>Baker Tilly, Dev Associates</p>
        </div>
    </div>
</body>
<?php require_once '../includes/content/footer.php' ?>