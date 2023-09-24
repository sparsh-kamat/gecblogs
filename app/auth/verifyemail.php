<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/database/db.php");


$errors = array();
$success = array();
$email = '';


if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $verify_query = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $verify_query);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);
        
        if($row['verified'] == '0')
        {
            $clicked_token = $row['token'];
            $update_query = "UPDATE users SET verified='1' WHERE token='$clicked_token'";
            $update_query_run = mysqli_query($conn, $update_query);

            if($update_query_run)
            {
                //make java script alert here
                // "<script>alert('Email verified. Please login')</script>";

                array_push($success, "Email verified. Please login");
                
            }
            else
            {
                array_push($errors, "Something went wrong. Please try again.");
                
            

            }

        }
        else 
        {
            array_push($errors, "Email already verified");
        }

    }
    else
    {
        array_push($errors, "Token not found");
        
    }
   
}
else
{
    die("Something went wrong");
}

?>


<!-- //make a basic website to display the error array -->

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
  <link rel="stylesheet" href="http://localhost/gecblogs/assets/css/style.css">

  <title>Verify Email</title>
</head>

<body>

  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

  <div class="auth-content">

    <form action="" method="">
      <h2 class="form-title">Verify Email</h2>

      <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
      
            <!-- display "email" is now verified -->
            <div>
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>" class="text-input">
            </div>
    </form>
    </div>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Custom Script -->
    <script src="assets/js/scripts.js"></script>
</body>



