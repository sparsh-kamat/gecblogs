<?php
    include("../../path.php");
    include(ROOT_PATH . "/app/database/db.php");
    


    $errors = array();
    $success = array();
    $email = '';

    include(ROOT_PATH . "/app/helpers/email/emailhelper.php");
    
    if(isset($_POST['resetpassbtn'])){
        $email = $_POST['email'];
        $token =md5(rand());
    
        $email_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $email_query_run = mysqli_query($conn, $email_query);
    
        if(mysqli_num_rows($email_query_run) > 0)
        {
            $row = mysqli_fetch_assoc($email_query_run);
            $update_query = "UPDATE users SET token='$token' WHERE email='$email'";
            $update_query_run = mysqli_query($conn, $update_query);
    
            if($update_query_run)
            {
                send_password_reset($email, $token);
                array_push($success, "Password reset link sent to your email");
                
    
            }
            else
            {
                array_push($errors, "Something went wrong. Please try again.");
            }
                
    
                  
        }
        else 
        {
            array_push($errors, "Email does not exist");
        }
    
    }
    



?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=
    , initial-scale=1.0">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
      crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

    <!-- Custom Styling -->

    <link rel="stylesheet" href="../../assets/css/style.css">

    <title>Reset Password</title>
</head>

<body>
  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

  <div class="auth-content">

    <form action="password-reset.php" method="post">
      <h2 class="form-title">Reset Password</h2>

      <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
        <div>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>" class="text-input">
        </div>

      
      <div>
        <button type="submit" name="resetpassbtn" class="btn btn-big ">Reset</button>
      </div>
      </form>

  </div>


