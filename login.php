<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'dcms') or die("could not connect to database");
if (isset($_SESSION['username']))
  header('location:index.php');
//echo $_SESSION['redirect'];
$username = "";
$count1 = 0;
$errors = [];
if (isset($_POST['login_user'])) {
  if (!isset($_SESSION['username'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $role = mysqli_real_escape_string($db, $_POST['role']);
    if (!empty($username) && !empty($password)) {
      $password = hash('sha256', $password);
      $query = " SELECT * FROM user WHERE username='$username' and password='$password' and role = '$role' LIMIT 1";
      $results = mysqli_query($db, $query);
      $res = mysqli_fetch_assoc($results);
      if ($username == $res['username'] && $password == $res['password'] && $role == $res['role']) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        if (isset($_SESSION['redirect'])) {
          echo "inside redirect";
          $link = $_SESSION['redirect'];
          unset($_SESSION['redirect']);
          echo "location:$link";
          header("location:$link");
        }
        header('location:index.php');
      } else {
        array_push($errors, "Invalid credentials entered");
        #echo "<h3 style='color:red; width:50%'></h3><br>";
      }
    }
  }
}
?>
<html>

<head>
  <title>Kwangya Dental Clinic | Login</title>
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
  <section class="sign-in">
    <div class="container">
      <div class="signin-content">
        <div class="signin-image">
          <figure><img src="assets/images/login-image.svg" alt="sing up image"></figure>
          <a href="registration.php" class="signup-image-link">New here? <strong>Create an account</strong></a>
        </div>

        <div class="signin-form">
          <h2 class="form-title">LOGIN</h2>
          <?php
          if (sizeof($errors) > 0) {
            foreach ($errors as $err) {
              echo "<h3 style='color:red; width:75%'>" . $err . "</h3><br>";
            }
          }
          ?>
          <form method="POST" class="register-form" id="login-form">
            <div class="form-group">
              <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
              <input type="text" name="username" id="your_name" placeholder="Username" />
            </div>
            <div class="form-group">
              <label for="password"><i class="zmdi zmdi-lock"></i></label>
              <input type="password" name="password" id="your_pass" placeholder="Password" />
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
              <label for="patient" style="font-weight:normal; font-size:16px; margin-top: 14px">Patient</label>
            </div>
            <div class="form-group">
              <p style="color:white">Admin</p>
              <input type="radio" name="role" id="admin" value="admin" required style="width:60%">
              <label for="patient" style="font-weight:normal; font-size:16px; margin-top: 14px">Admin</label>
            </div>
            <div class="form-group form-button">
              <input type="submit" class="example_e" name="login_user" id="signin" value="Log In" />
            </div>
          </form>

        </div>
      </div>
    </div>
  </section>
  </center><br>
</body>

</html>