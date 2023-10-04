<?php include("path.php");
include(ROOT_PATH . '/app/controllers/posts.php');


if (isset($_GET['id'])) {
  $post = selectOne('posts', ['id' => $_GET['id']]);
}

$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);

$post_id = $_GET['id'];
// get comments from database
$sql = "SELECT * FROM comments WHERE post_id=$post_id";
$result = mysqli_query($conn, $sql);
$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);


$likes = selectAll('likes', ['post_id' => $post_id, 'liked' => 1]);

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/comments.css">
  <title>
    <?php echo $post['title']; ?> | GEC Blogs
  </title>

</head>

<body>
  <!-- Facebook Page Plugin SDK -->
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=285071545181837&autoLogAppEvents=1">
    </script>

  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
  <!-- Page Wrapper -->
  <div class="page-wrapper">
    <div class="content clearfix">
      <div class="main-content-wrapper">
        <div class="main-content single">
          <h1 class="post-title">
            <?php echo $post['title']; ?>
          </h1>
          <!-- image -->
          <div class="post-image-single">
            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" id="post-image-single">
          </div>
          <div class="post-content">
            <?php echo html_entity_decode($post['body']); ?>
          </div>



          <div class="like-wrapper">
          <?php if (isset($_SESSION['id'])): ?>
            <form action="http://localhost/gecblogs/app/controllers/likes.php" method="post">
              <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
              <button type="submit" class="btn btn-big like-btn" name="like-btn">
                <i class="fas fa-thumbs-up"></i>
              </button>
              <?php else: ?>
                <button type="submit" class="btn btn-big like-btn" name="like-btn" disabled>
                  <i class="fas fa-thumbs-up"></i>
                </button>
              <?php endif ?>
              <span class="likes"><?php echo count($likes); ?></span>

          </div>


          <div class="comments-wrapper">
            <div class="comments" id="comments">
              <h2>Comments</h2>


              <?php if (isset($_SESSION['id'])): ?>
                <form action="http://localhost/gecblogs/app/controllers/comments.php" class="comment-form" method="post">
                  <input type="hidden" name="post_id" id="post_id" value="<?php echo $post['id']; ?>">
                  <textarea name="comment" id="comment" cols="30" rows="5" placeholder=" Add a comment"></textarea>
                  <button type="submit" class="btn btn-big" name="comment_posted">Post comment</button>
                </form>
              <?php else: ?>
                <h2 style="text-align: center; margin-top: 20px;">You need to <a href="login.php">login</a> or <a
                    href="register.php">register</a> to add a comment</h2>
              <?php endif ?>


              <div class="comments">
                <h2><span id="comments_count">
                    <?php echo count($comments) ?>
                  </span> Comment(s)</h2>
                <hr>

                <?php if (isset($comments)): ?>
                  <?php foreach ($comments as $comment): ?>
                    <?php
                    //username of user who commented
                    $comment_user_id = $comment['user_id'];
                    //use selectOne function to get user details
                    $comment_user = selectOne('users', ['id' => $comment_user_id]);
                    //echo username
                    ?>
                    <div class="comment">
                      <img src="assets/images/profile.png" alt="" class="profile-image">
                      <div class="comment-info">
                        <h4>
                          <?php echo $comment_user['username']; ?>
                        </h4>
                        <span>
                          <?php echo date("F j, Y ", strtotime($comment["created_at"])); ?>
                        </span>
                        <p>
                          <?php echo $comment['comment']; ?>
                        </p>
                      </div>
                    </div>
                  <?php endforeach ?>


                <?php else: ?>
                  <h2>Be the first to comment on this post</h2>
                <?php endif ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- // Main Content -->

      <style>


      </style>


      <!-- Sidebar -->
      <div class="sidebar single">

        <div class="fb-page" data-href="https://www.facebook.com/profile.php?id=61552188862829"
          data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <blockquote cite="https://www.facebook.com/profile.php?id=61552188862829" class="fb-xfbml-parse-ignore"><a
              href="https://www.facebook.com/profile.php?id=61552188862829"></a></blockquote>
        </div>


        <div class="section popular">
          <h2 class="section-title">Popular</h2>

          <?php foreach ($posts as $p): ?>
            <div class="post clearfix">
              <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
              <a href="" class="title">
                <h4>
                  <?php echo $p['title'] ?>
                </h4>
              </a>
            </div>
          <?php endforeach; ?>


        </div>

        <div class="section topics">
          <h2 class="section-title">Topics</h2>
          <ul>
            <?php foreach ($topics as $topic): ?>
              <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>">
                  <?php echo $topic['name']; ?>
                </a></li>
            <?php endforeach; ?>

          </ul>
        </div>
      </div>
      <!-- // Sidebar -->

    </div>
    <!-- // Content -->

  </div>
  <!-- // Page Wrapper -->

  <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Slick Carousel -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!-- Custom Script -->
  <script src="assets/js/scripts.js"></script>

</body>

</html>

<style>
  #post-image-single {
    width: 50vh;
    height: auto;
    margin-bottom: 20px;
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
</style>