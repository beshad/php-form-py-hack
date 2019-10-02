<?php
require 'db.php';
include 'auth.php';
include 'header.php';

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);

    $query = "INSERT INTO blogs(title, body) VALUES('$title','$body')";

    if (mysqli_query($conn, $query)) {
      header('Location: index.php');
    }
}
?>

 <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input name="title" type="text" placeholder="Title"/>
            <textarea name="body" rows="15" cols="40" placeholder="Body"></textarea><br>
            <input type="submit" value="Submit" name="submit"/>
</form>