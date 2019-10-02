<?php
require 'db.php';
include 'header.php';
if (isset($_POST['username'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $username = stripslashes($username);
    $username = filter_var($username, FILTER_SANITIZE_STRING);

    $email = stripslashes($email);
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $password = stripslashes($password);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $query = "INSERT INTO users(username, password, email) VALUES('$username','$password','$email')";

    if (mysqli_query($conn, $query)) {
        echo "<h3>You are registered successfully.</h3><br>Click here to <a href='login.php'>Login</a>";
        header('Location: login.php');
    }
} else {
    ?>
    <div>
        <h1>Registration</h1>
        <form name="registration" action="" method="post">
            <input type="text" name="username" placeholder="Username" required/>
            <input type="email" name="email" placeholder="Email"/>
            <input type="password" name="password" placeholder="Password" required/>
            <input type="submit" name="submit" value="Register" required/>
        </form>
        <p>Already Registered? <a href='login.php'>Login Here</a></p>
    </div>
<?php }?>
<?php include 'footer.php' ?>