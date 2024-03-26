<?php 
    session_start();
    include_once('config.php');
    // Data from the input fields
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) 
    {
        // check if users email is valid
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            // check if the email already exists
            $sql = mysqli_query($conn, "SELECT email FROM Users WHERE email = '{$email}'");

            if(mysqli_num_rows($sql) > 0) 
            {
                echo "$email - This email already exists...";
            } 
            else 
            {
                // check if user uploaded a file
                if(isset($_FILES['image'])) 
                {
                    $img_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    // get the image extension
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    $extensions = ['png', 'jpeg', 'jpg'];

                    if(in_array($img_ext, $extensions) === true) 
                    {
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if (move_uploaded_file($tmp_name, "images/$new_img_name")) 
                        {
                            $status = 'Active now';
                            $random_id = rand(time(), 10000000);

                            // insert all user data into database
                            $sql2 = mysqli_query($conn, "INSERT INTO Users (unique_id, fname, lname, email, password, img, status) 
                            VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', 
                            '{$password}', '{$new_img_name}', '{$status}')");

                            if($sql2) 
                            {
                                $sql3 = mysqli_query($conn, "SELECT * FROM Users WHERE email = '{$email}'");

                                if(mysqli_num_rows($sql3) > 0) 
                                {
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                }
                            } 
                            else 
                            {
                                echo "Something went wrong...";
                            }
                        } 
                        else 
                        {
                            echo "Something went wrong while uploading the image...";
                        }
                    } 
                    else 
                    {
                        echo "Image file must be png, jpeg, jpg...";
                    }
 
                } 
                else 
                {
                    echo "Please select an image file...";
                }
            }
        } 
        else 
        {
            echo "$email - is not a valid email address...";
        }
    } 
    else 
    {
        echo "All input fields are required...";
    }
?>