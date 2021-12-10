<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="powerhouse images/mental health.jpg" alt="">
      </div>
      <div class="back">
        <img class="backImg" src="powerhouse images/mental health 2.jpg" alt="">
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <h1>Login</h1>
          <form action="" method="POST">
            <?php
            include("connection.php");

            if (isset($_POST['Login'])) {
              //Collecting the input that was posted
              $user_name = $_POST["Email"];
              $password = $_POST["Password"];

              if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
                //read from database

                $query = "SELECT * FROM sign_up where email = '$user_name' limit 1 ";
                $result = mysqli_query($con, $query);

                if ($result) {
                  if ($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);
                    if ($user_data['password'] === md5($password)) {
                      $_SESSION['id'] = $user_data['id'];
                      header("Location: index.php");
                      die;
                    }
                  }
                }
                echo '<h6 style = "color:red;">' . "Invalid email or password provided" . "</h6>";
              }
            }
            ?>
            <div class="input-boxes">
              <div class="txt_field">
                <input type="text" name="Email" id="username" required>
                <span></span>
                <label for="username">Email</label>
              </div>
              <div class="txt_field">
                <input type="password" name="Password" id="Password" required>
                <span></span>
                <label for="password">Password</label>
              </div>
              <div class="forgotpass">Forgot Password?</div>
              <input type="submit" name="Login" value="Login">
              <div class="sign_up">
                <div class="login_text"> Not a member? <label for="flip">Sign up</label></a> </div>
              </div>
            </div>
          </form>
        </div>

        <div class="signup-form">
          <h1>Signup</h1>
          <form action="signup.php" method="POST" id="Signup">
          
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="first_name" placeholder="Enter your first name" required>
                
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="last_name" placeholder="Enter your last name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="emailfield" placeholder="Enter your email" required>
                <span id="text"></span>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Enter your password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number, one uppercase, and one lowercase letter, and at least 6 characters">
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password" required>
              </div>
              <div class="button input-box">
                <input type="submit" name="Sign_up" value="Submit" onclick="validatePassword(); validation();">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    var password = document.getElementById("password");
    var confirm_password = document.getElementById("confirm_password");

    function validatePassword() {
      if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    function validation() {
      var form = document.getElementById("Signup");
      var email = document.getElementById("emailfield").value;
      var text = document.getElementById("text");
      // regex email pattern
      var pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

      if (pattern.test(email)) {
        emailfield.setCustomValidity("");
      } else {
        emailfield.setCustomValidity("Enter a valid email");
      }
    }


    function myFunction(message) {
      alert(message);
    }
  </script>
</body>

</html>