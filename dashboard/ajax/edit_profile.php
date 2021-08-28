<?php include "functions.php"; ?>

<?php
if (isset($_POST['edit_personal_info'])) {
  $user_image = $_FILES['user_image'];
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $city = $_POST['city'];
  $country = $_POST['country'];
  $contact_no = $_POST['contact_no'];


  // profile image
  if ($_FILES['user_image']['name'] != '') {
    $target_dir = "../../profiles/";
    $target_file = $target_dir . uniqid() . basename($_FILES["user_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $user_image = $target_file;

    $check = getimagesize($_FILES["user_image"]["tmp_name"]);
    if ($check !== false) {

      if ($_FILES["user_image"]["size"] > 5242880) {
        echo "Maximum file size: 5mbs";
        $uploadOk = 0;
      } elseif (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
      ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      } else {
        $uploadOk = 1;
      }
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    } else {
      if (!move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_file)) {
        echo "Sorry, there was an error uploading your file.";
      } else {
        UpdateField('image', $user_image, 'personal_info');
      }
    }
  }
  // profile image

  if (!empty($name) && isset($name)) {
    UpdateField('name', $name, 'users');
  }

  if (!empty($gender) && isset($gender)) {
    UpdateField('gender', $gender, 'personal_info');
  }
  if (!empty($dob) && isset($dob)) {
    UpdateField('dob', $dob, 'personal_info');
  }
  if (!empty($city) && isset($city)) {
    UpdateField('city', $city, 'personal_info');
  }
  if (!empty($country) && isset($country)) {
    UpdateField('country', $country, 'personal_info');
  }
  if (!empty($contact_no) && isset($contact_no)) {
    UpdateField('contact_no', $contact_no, 'personal_info');
  }
}

if (isset($_POST['edit_work_info_scrt'])) {
  // 
  $category = $_POST['prof_catg'];
  $experience = $_POST['experience'];
  $salary_range = $_POST['salary_range'];
  $languages = $_POST['languages'];

  $lang_str = "";
  for ($i = 0; $i < count($languages); $i++) {
    $lang_str .= $languages[$i] . ",";
  }
  //

  if (!empty($category) && isset($category)) {
    UpdateField('category', $category, 'profession_info');
  }
  if (!empty($experience) && isset($experience)) {
    UpdateField('experience', $experience, 'profession_info');
  }
  if (!empty($salary_range) && isset($salary_range)) {
    UpdateField('salary_range', $salary_range, 'profession_info');
  }
  if (!empty($lang_str) && isset($lang_str)) {
    UpdateField('languages', $lang_str, 'profession_info');
  }
}

if (isset($_POST['edit_social_form_scrt'])) {

  $twitter = $_POST['twitter'];
  $linkedin = $_POST['linkedin'];
  $fb = $_POST['facebook'];
  $insta = $_POST['instagram'];
  $git = $_POST['github'];
  $dribble = $_POST['dribble'];
  $behance = $_POST['behance'];

  if (UpdateSocialInfo($linkedin, $twitter, $fb, $insta, $git, $dribble, $behance)) {
    echo "Updated";
  } else {
    echo "Error Updating";
  }
}

if (isset($_POST['skill_scrt_form'])) {

  if (!empty($_POST['skills']) && isset($_POST['skills'])) {

    $skills = $_POST['skills'];

    $skills_str = "";
    for ($i = 0; $i < count($skills); $i++) {
      $skills_str .= $skills[$i] . ",";
    }

    if (UpdateField("skills", $skills_str, "skills")) {
      echo "Updated";
    } else {
      echo "Unexpected error occurred!";
    }

    // 
  } else {
    echo "Add atleast one skill";
  }
}

if (isset($_POST['resume_hid_scrt'])) {

  $cv = "";

  if (!empty($_FILES['resume']) && isset($_FILES['resume'])) {

    // 
    $targetfolder = "../../resumes/";
    $file = uniqid() . basename($_FILES['resume']['name']);
    $targetfolder = $targetfolder . $file;
    $cv = $file;
    $ok = 1;

    $file_type = $_FILES['resume']['type'];

    if ($file_type == "application/pdf" || $file_type == "image/gif" || $file_type == "image/jpeg" || $file_type == "image/png") {
      if (!move_uploaded_file($_FILES['resume']['tmp_name'], $targetfolder)) {
        echo "Error uploading file";
      } else {

        if (UpdateField("cv", $cv, "cvs")) {
          echo "CV/Resume added";
        } else {
          echo "Error adding CV/Resume";
        }
      }
    } else {
      echo "You can only upload PDF, JPEG, JPG, PNG or GIF files";
    }
  } else {
    echo "Please add a resume/cv";
  }
}

if (isset($_POST['add_educ_scrt'])) {

  // -------------------------------------------
  if (!empty($_POST['qualification']) && !empty($_POST['field_of_study']) && !empty($_POST['institute']) && !empty($_POST['degree_from'])) {

    $cert = "";
    $degree_to = "";

    if (!empty($_FILES['cert']) && isset($_FILES['cert'])) {

      // 
      $targetfolder = "../../certificates/";
      $file = uniqid() . basename($_FILES['cert']['name']);
      $targetfolder = $targetfolder . $file;
      $cert = $file;
      $ok = 1;

      $file_type = $_FILES['cert']['type'];

      if ($file_type == "application/pdf" || $file_type == "image/gif" || $file_type == "image/jpeg" || $file_type == "image/png") {
        if (!move_uploaded_file($_FILES['cert']['tmp_name'], $targetfolder)) {
          echo "Error uploading file0";
        }
      } else {
        echo "You can only upload PDF, JPEG, JPG, PNG or GIF files0";
      }
    }

    $degree = $_POST['qualification'];
    $field_of_study = $_POST['field_of_study'];
    $institute = $_POST['institute'];
    $degree_from = $_POST['degree_from'];
    $degree_to = $_POST['degree_to'];

    if (empty($degree_to)) {
      $degree_to = "ongoing";
    }
    if (empty($cert)) {
      $cert = "-";
    }

    if (UpdateEducationInfo($degree, $field_of_study, $institute, $degree_from, $degree_to, $cert)) {
      echo "Updated";
    } else {
      echo "Error Updating0";
    }

    // ======
  }
  // -------------------------------------------
}

if (isset($_POST['edit_about_info'])) {

  // -------------------------------------------
  if (!empty($_POST['short_desc']) && !empty($_POST['long_desc'])) {


    $short_desc = $_POST['short_desc'];
    $long_desc = $_POST['long_desc'];

    if (UpdateAboutInfo($short_desc, $long_desc)) {
      echo "Updated";
    } else {
      echo "Error Updating0";
    }

    // ======
  }
  // -------------------------------------------
}

if (isset($_POST['emp_update_info'])) {

  // -------------------------------------------
  $emp_image = $_FILES['emp_image'];
  $emp_name = $_POST['emp_name'];
  $comp_name = $_POST['comp_name'];
  $emp_city = $_POST['emp_city'];
  $emp_country = $_POST['emp_country'];
  $emp_contact_no = $_POST['emp_contact_no'];


  // profile image
  if ($_FILES['emp_image']['name'] != '') {
    $target_dir = "../../profiles/";
    $target_file = $target_dir . uniqid() . basename($_FILES["emp_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $emp_image = $target_file;

    $check = getimagesize($_FILES["emp_image"]["tmp_name"]);
    if ($check !== false) {

      if ($_FILES["emp_image"]["size"] > 5242880) {
        echo "Maximum file size: 5mbs";
        $uploadOk = 0;
      } elseif (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
      ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      } else {
        $uploadOk = 1;
      }
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    } else {
      if (!move_uploaded_file($_FILES["emp_image"]["tmp_name"], $target_file)) {
        echo "Sorry, there was an error uploading your file.";
      } else {
        UpdateField('image', $emp_image, 'employee_info', 'employerkey');
      }
    }
  }
  // profile image

  if (!empty($emp_name) && isset($emp_name)) {
    UpdateField('name', $emp_name, 'users');
  }

  if (!empty($comp_name) && isset($comp_name)) {
    UpdateField('company', $comp_name, 'employee_info', 'employerkey');
  }

  if (!empty($emp_city) && isset($emp_city)) {
    UpdateField('city', $emp_city, 'employee_info', 'employerkey');
  }

  if (!empty($emp_country) && isset($emp_country)) {
    UpdateField('country', $emp_country, 'employee_info', 'employerkey');
  }

  if (!empty($emp_contact_no) && isset($emp_contact_no)) {
    UpdateField('contact_no', $emp_contact_no, 'employee_info', 'employerkey');
  }

  // -------------------------------------------
}
