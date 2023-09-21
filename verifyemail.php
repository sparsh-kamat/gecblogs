<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/database/db.php");


$errors = array();

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

                $js = "<script> alert('Email verified. Please login here : http://localhost/gecblogs/login.php '); </script>";
                echo $js;
            
                

            }
            else
            {
                $js = "<script> alert('Email not verified. Please try again'); </script>";
                echo $js;
                
            

            }

        }
        else 
        {
            $js = "<script> alert('Email not verified. Please try again'); </script>";
                echo $js;
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
