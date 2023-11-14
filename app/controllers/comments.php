<!-- comments.php controller -->

<?php
//include path.php file
include("../../path.php");
include(ROOT_PATH . "/app/database/db.php");
//if the user clicks on the post comment button
if (isset($_POST['comment_posted'])) {
  $currentuser = $_SESSION['id'];
  $post_id = $_POST['post_id'];
  $comment = $_POST['comment'];
  $sql = "INSERT INTO comments (user_id, post_id, comment) VALUES ($currentuser, $post_id, '$comment')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
   //redirect user to the single post page after submitting comment
    header("location: http://localhost/gecblogs/single.php?id=$post_id");
    exit(0);
  } else {
    echo mysqli_error($conn);
  }
}
?>
