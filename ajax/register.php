<?php include "db.php" ?>
<?php include "functions.php" ?>

<?php

if (isset($_POST['register'])) {
  $name = mysqli_real_escape_string($connection, trim($_POST['c_name']));
  $email = mysqli_real_escape_string($connection, trim($_POST['c_email']));
  $password = mysqli_real_escape_string($connection, trim($_POST['c_password']));


  if (empty($name) || empty($email) || empty($password)) {
    echo "Please Fill All Fields0";
  } elseif (emailExists($email)) {
    echo "Email already taken. Choose another0";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Not a valid email address0";
  } else {
    registerUser($name, $email, $password);
  }
}

if (isset($_POST['register_2'])) {
  $name = mysqli_real_escape_string($connection, trim($_POST['e_name']));
  $email = mysqli_real_escape_string($connection, trim($_POST['e_email']));
  $password = mysqli_real_escape_string($connection, trim($_POST['e_password']));

  if (empty($name) || empty($email) || empty($password)) {
    echo "Please Fill All Fields0";
  } elseif (emailExists($email)) {
    echo "Email already taken. Choose another0";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Not a valid email address0";
  } else {
    registerUser2($name, $email, $password);
  }
}
