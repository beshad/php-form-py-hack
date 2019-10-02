<?php
require 'db.php';
include 'header.php';
session_start();
if (isset($_POST['username'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if($user) {
        $_SESSION["username"] = $user['username'];
        header('Location: index.php');
    } }?>
            <div>
                <h1>Login</h1>
                <form action="" method="post" name="login">
                    <input type="text" name="username" placeholder="Username" required/>
                    <input type="password" name="password" placeholder="Password" required/>
                    <input name="submit" type="submit" value="Login"/>
                </form>
                <p>Not registered yet? <a href='registration.php'>Register Here</a></p>
            </div>
            <?php require 'footer.php' ?>