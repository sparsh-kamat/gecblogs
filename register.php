<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");
guestsOnly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="assets/css/style.css">

  <title>Register</title>
</head>

<body>


  <?php
  //initializing error array
  $table = 'users';

  $admin_users = selectAll($table);

  $errors = array();
  $success = array();
  $id = '';
  $username = '';
  $admin = '';
  $email = '';
  $password = '';
  $passwordConf = '';

  include(ROOT_PATH . "/app/helpers/email/emailhelper.php");


  if (isset($_POST['register-btn'])) {
    $errors = validateUser($_POST);
    //generate token
    $token = md5(rand());

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];

    ///check if email already exists
    $existingUser = selectOne('users', ['email' => $email]);
    if ($existingUser) {
      array_push($errors, 'Email already exists');
    } else {

      if (count($errors) === 0) {
        unset($_POST['passwordConf'], $_POST['register-btn']);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username,admin,  email, password, token) VALUES ('$username', '0', '$email', '$hash', '$token')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
          sendemailverify($username, $email, $token);
          array_push($success, 'Email has been sent to your email address');
        }
      } else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
      }
    }
  }

  ?>


  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

  <div class="auth-content">

    <form action="register.php" method="post">
      <h2 class="form-title">Register</h2>

      <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

      <div>
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>" class="text-input contact-input"
          placeholder="">
      </div>
      <div>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>" class="text-input contact-input" placeholder="">
      </div>
      <div>
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $password; ?>" class="text-input contact-input"
          placeholder="">
      </div>
      <div>
        <label>Password Confirmation</label>
        <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="text-input contact-input"
          placeholder="">
      </div>
      <div>
        <button type="submit" name="register-btn" class="btn btn-big">Register</button>
      </div>
      <p>Or <a href="<?php echo BASE_URL . '/login.php' ?>">Sign In</a></p>
    </form>

  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom Script -->
  <script src="assets/js/scripts.js"></script>

</body>

</html>

<style>
  .btn.btn-big {
    padding-top: 10px;
    margin-top: 15px;
    display: block;
    margin-left: auto;
    margin-right: auto;

  }
</style>