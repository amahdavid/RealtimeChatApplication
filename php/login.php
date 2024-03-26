<?php

session_start();
    include_once('config.php');
    // Data from the input fields
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($email) && !empty($password)) 
    {
        // check if users email is valid
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            // check if the email already exists
            $sql = mysqli_query($conn, "SELECT * FROM Users WHERE email = '{$email}' AND password = '{$password}'");

            if(mysqli_num_rows($sql) > 0) 
            {
                $row = mysqli_fetch_assoc($sql);
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE Users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2) 
                {
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
                }
            } 
            else 
            {
                echo "Email or Password is incorrect!";
            }
        } 
        else 
        {
            echo "$email - This is not a valid email!";
        }
    } 
    else 
    {
        echo "All input fields are required!";
    }
?>