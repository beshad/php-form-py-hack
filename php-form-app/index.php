<?php
require 'db.php';
include 'auth.php';
include 'header.php';

$query = 'SELECT * from blogs';
$result = mysqli_query($conn, $query);
$blogs = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
// mysqli_close($result);
?>
<div>
    <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
    <h4>This is your home page</h4>
    <h5><a href="create_blog.php">Creat a new blog</a></h5>
    <?php foreach ($blogs as $blog) {?>
  <div class="post">
      <h2><?php echo $blog['title']; ?></h2>
      <small>ID: <?php echo $blog['id']; ?></small>
      <p><?php echo $blog['body']; ?></p>
      <a href="edit_blog.php?id=<?php echo $blog['id'];?>">Edit</a>
      <a href="delete_blog.php?id=<?php echo $blog['id'];?>">Delete</a>
  </div>
  <?php }?>
    <p><a href="logout.php">logout</a></p>
</div>
<?php include 'footer.php';?>
