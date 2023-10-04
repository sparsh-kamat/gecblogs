<?php
//include path.php file
include("../../path.php");
include(ROOT_PATH . "/app/database/db.php");


$usersessid = $_SESSION['id'];




//if the user clicks on the post comment button
if (isset($_POST['like-btn'])) {
    
    $post_id = $_POST['post_id'];

    //check if the user has already liked the post or not
    $sql = "SELECT * FROM likes WHERE user_id=$usersessid AND post_id=$post_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $likes = mysqli_fetch_assoc($result);
      if ($likes['liked'] == 1) {
        $sql = "UPDATE likes SET liked=0 WHERE user_id=$usersessid AND post_id=$post_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          header("location: http://localhost/gecblogs/single.php?id=$post_id");
          exit(0);
        } else {
          echo mysqli_error($conn);
        }
      } else if ($likes['liked'] == 0) {
        $sql = "UPDATE likes SET liked=1 WHERE user_id=$usersessid AND post_id=$post_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          header("location: http://localhost/gecblogs/single.php?id=$post_id");
          exit(0);
        } else {
          echo mysqli_error($conn);
        }
      }
    } else {    
    
    $sql = "INSERT INTO likes (user_id, post_id, liked) VALUES ($usersessid, $post_id, 1)";
    $result = mysqli_query($conn, $sql);
    if ($result) {
     //redirect user to the single post page after submitting comment
      header("location: http://localhost/gecblogs/single.php?id=$post_id");
      exit(0);
    } else {
      echo mysqli_error($conn);
    }
    }
    }
    ?>

    