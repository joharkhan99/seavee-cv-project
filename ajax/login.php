<?php include "db.php" ?>
<?php include "functions.php" ?>

<?php
if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($connection, trim($_POST['email']));
  $password = mysqli_real_escape_string($connection, trim($_POST['password']));


  if (empty($email) || empty($password)) {
    echo "Please Fill All Fields0";
  } elseif (!loginUser($email, $password)) {
    echo "Invalid Email or Password0";
  }
}
