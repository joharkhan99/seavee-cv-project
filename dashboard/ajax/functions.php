<?php session_start(); ?>
<?php include "db.php" ?>

<?php

function sanitize($str)
{
  global $connection;

  if (empty($str)) {
    return $str;
  } else {
    $str = mysqli_real_escape_string($connection, trim(stripslashes(htmlentities(strip_tags($str), ENT_QUOTES, "UTF-8"))));
    return $str;
  }
}

function AddProfileInfo($image, $gender, $dob, $city, $country, $contact_no)
{
  global $connection;

  $image = sanitize($image);
  $gender = sanitize($gender);
  $dob = sanitize($dob);
  $city = sanitize($city);
  $country = sanitize($country);
  $contact_no = sanitize($contact_no);
  $userkey = sanitize($_SESSION['userkey']);

  $query = mysqli_query($connection, "INSERT INTO personal_info(userkey,image,gender,dob,city,country,contact_no,status) VALUES('$userkey','$image','$gender','$dob','$city','$country','$contact_no','yes')");

  if ($query) {
    return true;
  } else {
    return false;
  }
}

function UpdateField($field, $value, $table, $keytype = 'userkey')
{
  global $connection;

  $field = sanitize($field);
  $value = sanitize($value);
  $table = sanitize($table);
  $userkey = sanitize($_SESSION['userkey']);

  $query = mysqli_query($connection, "UPDATE $table SET $field='$value' WHERE $keytype='$userkey'");

  if ($query) {
    return true;
  } else {
    return false;
  }
}

function UpdateSocialInfo($linkedin, $twitter, $fb, $insta, $git, $dribble, $behance)
{
  global $connection;

  $linkedin = sanitize($linkedin);
  $twitter = sanitize($twitter);
  $fb = sanitize($fb);
  $insta = sanitize($insta);
  $git = sanitize($git);
  $dribble = sanitize($dribble);
  $behance = sanitize($behance);
  $userkey = sanitize($_SESSION['userkey']);

  $query = mysqli_query($connection, "UPDATE social_info SET linkedin='$linkedin', twitter='$twitter',facebook='$fb',insta='$insta',git='$git',dribble='$dribble',behance='$behance' WHERE userkey='$userkey'");

  if ($query) {
    return true;
  } else {
    return false;
  }
}

function AddEducationInfo($degree, $field_of_study, $institute, $degree_from, $degree_to, $cert)
{
  global $connection;

  $degree = sanitize($degree);
  $field_of_study = sanitize($field_of_study);
  $institute = sanitize($institute);
  $degree_from = sanitize($degree_from);
  $degree_to = sanitize($degree_to);
  $cert = sanitize($cert);
  $userkey = sanitize($_SESSION['userkey']);

  $query = mysqli_query($connection, "INSERT INTO education_info(userkey,degree,field_of_study,institute,from_date,to_date,cert,status) VALUES('$userkey','$degree','$field_of_study','$institute','$degree_from','$degree_to','$cert','no')");

  if ($query) {
    return true;
  } else {
    return false;
  }
}

function AddAboutInfo($short_desc, $long_desc)
{
  global $connection;

  $short_desc = sanitize($short_desc);
  $long_desc = sanitize($long_desc);
  $userkey = sanitize($_SESSION['userkey']);

  $query = mysqli_query($connection, "INSERT INTO about(userkey,short_desc,long_desc,status) VALUES('$userkey','$short_desc','$long_desc','yes')");

  if ($query) {
    return true;
  } else {
    return false;
  }
}

function UpdateAboutInfo($short_desc, $long_desc)
{
  global $connection;

  $short_desc = sanitize($short_desc);
  $long_desc = sanitize($long_desc);
  $userkey = sanitize($_SESSION['userkey']);

  $query = mysqli_query($connection, "UPDATE about SET short_desc='$short_desc',long_desc='$long_desc' WHERE userkey='$userkey'");

  if ($query) {
    return true;
  } else {
    return false;
  }
}

function AddEmployeProfileInfo($image, $emp_name, $comp_name, $emp_city, $emp_country, $emp_contact_no)
{
  global $connection;

  $image = sanitize($image);
  $emp_name = sanitize($emp_name);
  $comp_name = sanitize($comp_name);
  $emp_city = sanitize($emp_city);
  $emp_country = sanitize($emp_country);
  $emp_contact_no = sanitize($emp_contact_no);
  $userkey = sanitize($_SESSION['userkey']);

  $query = mysqli_query($connection, "INSERT INTO employee_info(employerkey,image,company,city,country,contact_no,status) VALUES('$userkey','$image','$comp_name','$emp_city','$emp_country','$emp_contact_no','yes')");

  if ($query && UpdateField("name", $emp_name, "users")) {
    return true;
  } else {
    return false;
  }
}

function RemoveFromFav($fav_id)
{
  global $connection;

  $fav_id = sanitize($fav_id);
  $userkey = sanitize($_SESSION['userkey']);

  $query = mysqli_query($connection, "DELETE FROM favorites WHERE fav_id='$fav_id' AND employerkey='$userkey'");

  if ($query) {
    return true;
  } else {
    return false;
  }
}

function UpdateEducationInfo($degree, $field_of_study, $institute, $degree_from, $degree_to, $cert)
{
  global $connection;

  $degree = sanitize($degree);
  $field_of_study = sanitize($field_of_study);
  $institute = sanitize($institute);
  $degree_from = sanitize($degree_from);
  $degree_to = sanitize($degree_to);
  $cert = sanitize($cert);
  $userkey = sanitize($_SESSION['userkey']);

  $query = mysqli_query($connection, "UPDATE education_info SET degree='$degree',field_of_study='$field_of_study',institute='$institute',from_date='$degree_from',to_date='$degree_to',cert='$cert' WHERE userkey='$userkey' AND degree='$degree'");

  if ($query) {
    return true;
  } else {
    return false;
  }
}

function SaveEducation()
{
  global $connection;

  $userkey = sanitize($_SESSION['userkey']);

  $query = mysqli_query($connection, "UPDATE education_info SET status='yes' WHERE userkey='$userkey'");

  if ($query) {
    return true;
  } else {
    return false;
  }
}

function AddProfessionInfo($category, $experience, $salary_range, $lang_str)
{
  global $connection;

  $category = sanitize($category);
  $experience = sanitize($experience);
  $salary_range = sanitize($salary_range);
  $lang_str = sanitize($lang_str);
  $userkey = sanitize($_SESSION['userkey']);


  $query = mysqli_query($connection, "INSERT INTO profession_info(userkey,category,experience,salary_range,languages,status) VALUES('$userkey','$category','$experience','$salary_range','$lang_str','yes')");

  if ($query) {
    return true;
  } else {
    return false;
  }
}

function AddSocialInfo($linkedin, $twitter, $fb, $insta, $git, $dribble, $behance)
{
  global $connection;
  $linkedin = sanitize($linkedin);
  $twitter = sanitize($twitter);
  $fb = sanitize($fb);
  $insta = sanitize($insta);
  $git = sanitize($git);
  $dribble = sanitize($dribble);
  $behance = sanitize($behance);

  $userkey = sanitize($_SESSION['userkey']);

  $query = mysqli_query($connection, "INSERT INTO social_info(userkey,linkedin,twitter,facebook,insta,git,dribble,behance,status) VALUES('$userkey','$linkedin','$twitter','$fb','$insta','$git','$dribble','$behance','yes')");

  if ($query) {
    return true;
  } else {
    return false;
  }
}

function AddskillsInfo($skills_str)
{
  global $connection;
  $skills_str = sanitize($skills_str);
  $userkey = sanitize($_SESSION['userkey']);

  $query = mysqli_query($connection, "INSERT INTO skills(userkey,skills,status) VALUES('$userkey','$skills_str','yes')");

  if ($query) {
    return true;
  } else {
    return false;
  }
}

function AddCV($cv)
{

  global $connection;

  $cv = sanitize($cv);
  $userkey = sanitize($_SESSION['userkey']);

  $query = mysqli_query($connection, "INSERT INTO cvs(userkey,cv,status) VALUES('$userkey','$cv','yes')");

  if ($query) {
    return true;
  } else {
    return false;
  }
}

?>