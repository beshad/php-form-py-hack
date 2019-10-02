<?php
    require 'db.php';
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "DELETE FROM blogs WHERE id = {$id}";
    if (mysqli_query($conn, $query)) {
      header('Location: index.php');
    }

?>
