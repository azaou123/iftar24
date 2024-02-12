<?php
session_start();

if (isset($student['bourse']['user'])){
    header('Location: dashboard.php');
}

include 'includes/header.php';
include '../action/Database.php';

$db = Database::getInstance();
$con = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['user'];
    $hashedPass = sha1($_POST['pass']);

    $stmt = $con->prepare("SELECT Username, Password FROM users WHERE Username = ? AND Password = ? AND RoleID = 1");
    $stmt->bind_param("ss", $username, $hashedPass);
    $stmt->execute();
    $stmt->store_result();
    $count = $stmt->num_rows();

    if ($stmt->num_rows() > 0){
        echo 'good';
        $_SESSION['user']= $username;
        header("Location: inscription.php");
        exit();
    }
}
$con->close();
?>

<form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <h4 class="text-center">IFTAR 24 Admin Login</h4>
    <input class="form-control" type="text" name="user" placeholder="Username" autocomplete="off" />
    <input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="new-password" />
    <input class="btn btn-primary btn-block" type="submit" value="Login" />
    <p class="text-dark">Login: <strong>admin</strong><br>Password: <strong>admin</strong></p>
</form>