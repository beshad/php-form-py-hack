<?php
require 'db.php';
include 'auth.php';
include 'header.php';

if (isset($_POST['submit'])) {
    $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);

    $query = "UPDATE blogs SET 
            title='$title',
            body='$body' 
        WHERE id={$update_id}";

    if (mysqli_query($conn, $query)) {
      header('Location: index.php');
    }
}

$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = 'SELECT * FROM blogs WHERE id='.$id;
$result = mysqli_query($conn, $query);
$blog = mysqli_fetch_assoc($result);
?>

 <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input value="<?php echo $blog['title'] ?>" name="title" type="text" placeholder="Title"/>
            <textarea name="body" rows="15" cols="40" placeholder="Body"><?php echo $blog['body'] ?></textarea><br>
            <input type="hidden" name="update_id" value="<?php echo $blog['id'] ?>">
            <input type="submit" value="Submit" name="submit"/>
</form>