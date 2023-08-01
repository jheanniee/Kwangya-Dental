<?php
session_start();
if (isset($_SESSION['username']))
  header('location:index.php');
$username = "";
$email = "";
$errors = [];
$db = mysqli_connect('localhost', 'root', '', 'dcms') or die("could not connect to database");
if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $cpnum = mysqli_real_escape_string($db, $_POST['cpnum']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $role = mysqli_real_escape_string($db, $_POST['role']);
  //regex validation 
  $uppercase = preg_match('@[A-Z]@', $password_1);
  $lowercase = preg_match('@[a-z]@', $password_1);
  $number = preg_match('@[0-9]@', $password_1);
  $specialChars = preg_match('@[^\w]@', $password_1);
  if ($password_1 != $password_2) {
    array_push($errors, "Passwords do not match");
  } else if (!$uppercase || !$lowercase || !$number || !$number) {
    array_push($errors, "Password must contain at least one lowercase, one uppercase, one digit and one special character.");
  } else {
    $user_check_query = " SELECT * FROM user WHERE username='$username' or email='$email' LIMIT  1 ";
    $results = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($results);
    if ($user) {
      if ($user['username'] == $username) {
        array_push($errors, "Username already exists");
      }
      if ($user['email'] == $email) {
        array_push($errors, "User with this email ID already exists");
      }
    } else {
      $password = hash('sha256', $password_1);
      $query = "INSERT INTO user (username, email, password, role) VALUES('$username', '$email', '$password', '$role')";

      mysqli_query($db, $query);
      header('location: login.php');
    }
  }
}
?>
<!DOCTYPE html>

<head>
  <title>Kwangya Dental Clinic | Sign Up</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/login-signup.css">

  <link rel="icon" href="assets/images/icon.png">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <style>
    .example_e:hover {
      background-color: #caf0f8;
      color: black;
    }

    .example_e {
      margin-top: 20px;
      background-color: #236edf;
      color: white;
      border-radius: 5px;
    }
  </style>
</head>

<body><br><br>
  <?php require_once("header.php"); ?>

  <!-- Sign up form -->
  <section class="signup">
    <div class="container">
      <div class="signup-content">
        <div class="signup-form">
          <h2 class="form-title">SIGN UP</h2>
          <?php
          if (sizeof($errors) > 0) {
            foreach ($errors as $err) {
              echo "<h3 style='color:red; width:75%'>" . $err . "</h3><br>";
            }
          }
          ?>
          <form method="POST" class="register-form" id="register-form">
            <div class="form-group">
              <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
              <input type="text" name="username" minlength="2" maxlength="32" id="name" placeholder="Enter your username" required />
            </div>
            <div class="form-group">
              <label for="email"><i class="zmdi zmdi-email"></i></label>

              <input type="email" name="email" maxlength="50" id="email" placeholder="Enter your email" required />
            </div>

            <div class="form-group">
              <label for="pass"><i class="zmdi zmdi-lock"></i></label>
              <input type="password" name="password_1" id="pass" placeholder="Enter your password" minlength="8" maxlength="32" required />
            </div>
            <div class="form-group">
              <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
              <input type="password" name="password_2" id="re_pass" placeholder="Re-enter your password" minlength="8" maxlength="32" required />
            </div><br>
            <div class="form-group">
              <label style="font-size:18px"><strong>User type:</strong></label><br>
            </div>
            <div class="form-group">
              <p style="color:white">Dentist</p>
              <input type="radio" name="role" id="dentist" value="dentist" required style="width:60%">
              <label for="dentist" style="font-weight:normal; font-size:16px; margin-top: 14px">Dentist</label>
            </div>
            <div class="form-group">
              <p style="color:white">Patient</p>
              <input type="radio" name="role" id="patient" value="patient" required style="width:60%">
              <label for="patient" style="font-weight:normal; font-size:16px; margin-top: 14px;">Patient</label>
            </div>
            <div class="form-group form-button">
              <input type="submit" name="reg_user" id="signup" class="example_e" value="Create an Account" />
            </div>
          </form>
        </div>
        <div class="signup-image">
          <img class="sign-up-image" src="assets/images/signup-image.svg"><br><br>
          <a href="login.php" class="signup-image-link">Already a member? <strong>Log in</strong></a>
        </div>
      </div>
    </div>
  </section>


  </div>

  </center>

</body>

</html>