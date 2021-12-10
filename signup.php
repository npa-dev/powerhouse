<?php

include("connection.php");
include("register.php");
if (isset($_POST['Sign_up'])) {
    //Collecting the input that was posted
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirm_password'];
    $password = md5($password); // password encryption with md5

     // validate data
    
    // Array to keep track of errors.
    $errors = array();

    // check if fields are empty
    if(empty($first_name)){array_push($errors, "First name is required");}
    if(empty($last_name)){array_push($errors, "Last name is required");}
    if(empty($email)){array_push($errors, "email is required");}
    if(empty($password)){array_push($errors, "password is required");}
    if(empty($cpassword)){array_push($errors, "you must confirm your password");}

    // verify that the length of each field is not too short.
    if(strlen($first_name) < 3){array_push($errors, "First name is too short");}
    if(strlen($last_name) <3){array_push($errors, "Last name is too short");}

    // verify that the length of each field matches with the space provided in the database
    if(strlen($first_name) > 30){array_push($errors, "Too long. First name must be under 50 characters");}
    if(strlen($last_name) > 30){array_push($errors, "Too long. Last name must be under 50 characters");}
    if(strlen($email) > 100){array_push($errors, "email must be under 100 characters");}

    // check if passwords are the same
    if($password != $cpassword){array_push($errors, "passwords must be the same");}
    
    // validate email with regex
    $regex = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    // set error if not an email
    if(!preg_match($regex, $email)){array_push($errors, "enter a valid email");}

    $checkmail = "SELECT * FROM Sign_up WHERE email='$email'";
    $results = mysqli_query($con, $checkmail);

    if (mysqli_num_rows($results) > 0) {
        echo ("<script>alert('It seems you already have an account. Login Now!')</script>");
        //echo ("<script>window.location = 'signup.php';</script>");
    } else {
        $query = "INSERT INTO Sign_up( First_name, Last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";
        if (mysqli_query($con, $query)) {
            echo '<script>alert("sign up successful!")</script>';
            die;
            header("Location: register.php");
        }
        echo "error";
    }
    
    
   
        
    
}

   // else {
    //    echo "Please Enter Valid information";
    //}
//}
