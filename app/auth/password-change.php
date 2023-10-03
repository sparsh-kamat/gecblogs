<?php
include("../../path.php");
include(ROOT_PATH . "/app/controllers/users.php");

if (isset($_POST['changepass'])) {
    $errors = validatechangepass($_POST);

    if (count($errors) === 0) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];

        $email_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $email_query_run = mysqli_query($conn, $email_query);

        if (mysqli_num_rows($email_query_run) > 0) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $row = mysqli_fetch_assoc($email_query_run);
            $update_query = "UPDATE users SET password='$hash' WHERE email='$email'";
            $update_query_run = mysqli_query($conn, $update_query);

            if ($update_query_run) {
                array_push($success, "Password changed successfully");

            } else {
                array_push($errors, "Something went wrong. Please try again.");
            }



        } else {
            array_push($errors, "Email does not exist");
        }


    }
}

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
    <link rel="stylesheet" href="../../assets/css/style.css">

    <title>Change Password</title>
</head>

<body>

    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <div class="auth-content">

        <form action="password-change.php" method="post">
            <h2 class="form-title">Change Password</h2>

            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

            <div>
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>" class="text-input">
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
            </div>
            <div>
                <label>Password Confirmation</label>
                <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="text-input">
            </div>
            <div>
                <button type="submit" name="changepass" class="btn btn-big">Change Password</button>
            </div>

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