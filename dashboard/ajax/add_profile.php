<?php include "functions.php"; ?>

<?php
if (isset($_POST['add_personal_info'])) {

  if (!empty($_FILES['userimage']) && !empty($_POST['gender']) && !empty($_POST['dob']) && !empty($_POST['city']) && !empty($_POST['country']) && !empty($_POST['contact_no'])) {

    // profile image
    $target_dir = "../../profiles/";
    $target_file = $target_dir . uniqid() . basename($_FILES["userimage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["userimage"]["tmp_name"]);
    if ($check !== false) {

      if ($_FILES["userimage"]["size"] > 5242880) {
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
      if (!move_uploaded_file($_FILES["userimage"]["tmp_name"], $target_file)) {
        echo "Sorry, there was an error uploading your file.";
      } else {

        $image = $target_file;
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $contact_no = $_POST['contact_no'];

        if (AddProfileInfo($image, $gender, $dob, $city, $country, $contact_no)) {
          echo "Personal Information Saved";
        }
      }
    }
    // profile image


  } else {
    echo "Please Fill All Fields";
  }
}


if (isset($_POST['add_education'])) {

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
          echo "Error uploading file";
        }
      } else {
        echo "You can only upload PDF, JPEG, JPG, PNG or GIF files";
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

    if (AddEducationInfo($degree, $field_of_study, $institute, $degree_from, $degree_to, $cert)) {
      echo $degree . " education added";
    } else {
      echo "Error adding education";
    }

    // ======
  }
}


if (isset($_POST['save_education'])) {
  if (SaveEducation()) {
    echo "Education Information Saved";
  } else {
    echo "Unexpected error occurred!";
  }
}


if (isset($_POST['profession_info'])) {

  if (!empty($_POST['prof_catg']) && !empty($_POST['experience']) && !empty($_POST['salary_range'])) {

    $category = $_POST['prof_catg'];
    $experience = $_POST['experience'];
    $salary_range = $_POST['salary_range'];
    $languages = $_POST['languages'];

    $lang_str = "";
    for ($i = 0; $i < count($languages); $i++) {
      $lang_str .= $languages[$i] . ",";
    }

    if (AddProfessionInfo($category, $experience, $salary_range, $lang_str)) {
      echo "Professional Information Saved";
    } else {
      echo "Unexpected error occurred!";
    }

    // 
  } else {
    echo "Please Fill All Fields";
  }
}


if (isset($_POST['social_scrt'])) {

  $twitter = "";
  $linkedin = "";
  $fb = "";
  $insta = "";
  $git = "";
  $dribble = "";
  $behance = "";

  if (!empty($_POST['twitter'])) {
    $twitter = $_POST['twitter'];
  }
  if (!empty($_POST['linkedin'])) {
    $linkedin = $_POST['linkedin'];
  }
  if (!empty($_POST['facebook'])) {
    $fb = $_POST['facebook'];
  }
  if (!empty($_POST['instagram'])) {
    $insta = $_POST['instagram'];
  }
  if (!empty($_POST['github'])) {
    $git = $_POST['github'];
  }
  if (!empty($_POST['dribble'])) {
    $dribble = $_POST['dribble'];
  }
  if (!empty($_POST['behance'])) {
    $behance = $_POST['behance'];
  }

  if (AddSocialInfo($linkedin, $twitter, $fb, $insta, $git, $dribble, $behance)) {
    echo "Social Links Saved";
  } else {
    echo "Unexpected error occurred!";
  }
}


if (isset($_POST['skill_scrt'])) {

  if (!empty($_POST['skills']) && isset($_POST['skills'])) {

    $skills = $_POST['skills'];

    $skills_str = "";
    for ($i = 0; $i < count($skills); $i++) {
      $skills_str .= $skills[$i] . ",";
    }

    if (AddskillsInfo($skills_str)) {
      echo "Skills Saved";
    } else {
      echo "Unexpected error occurred!";
    }

    // 
  } else {
    echo "Add atleast one skill";
  }
}


if (isset($_POST['resume_scrt'])) {

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

        if (AddCV($cv)) {
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
  // ======
}

if (isset($_POST['emp_add_personal_info'])) {

  if (!empty($_FILES['emp_image']) && !empty($_POST['emp_name']) && !empty($_POST['comp_name']) && !empty($_POST['emp_city']) && !empty($_POST['emp_country']) && !empty($_POST['emp_contact_no'])) {

    // profile image
    $target_dir = "../../profiles/";
    $target_file = $target_dir . uniqid() . basename($_FILES["emp_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["emp_image"]["tmp_name"]);
    if ($check !== false) {

      if ($_FILES["emp_image"]["size"] > 5242880) {
        echo "Maximum file size: 5mbs0";
        $uploadOk = 0;
      } elseif (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
      ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed0";
        $uploadOk = 0;
      } else {
        $uploadOk = 1;
      }
    } else {
      echo "File is not an image0";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded0";
    } else {
      if (!move_uploaded_file($_FILES["emp_image"]["tmp_name"], $target_file)) {
        echo "Sorry, there was an error uploading your file0";
      } else {
        $image = $target_file;
        $emp_name = $_POST['emp_name'];
        $comp_name = $_POST['comp_name'];
        $emp_city = $_POST['emp_city'];
        $emp_country = $_POST['emp_country'];
        $emp_contact_no = $_POST['emp_contact_no'];

        if (AddEmployeProfileInfo($image, $emp_name, $comp_name, $emp_city, $emp_country, $emp_contact_no)) {
          echo "Profile Saved";
        }
      }
    }
    // profile image

  } else {
    echo "Please Fill All Fields0";
  }
}


if (isset($_POST['about_info'])) {

  if (!empty($_POST['short_desc']) && !empty($_POST['long_desc'])) {

    $long_desc = $_POST['long_desc'];
    $short_desc = $_POST['short_desc'];


    if (AddAboutInfo($short_desc, $long_desc)) {
      echo "Saved";
    } else {
      echo "Unexpected error occurred!0";
    }
  } else {
    echo "Please Fill All Fields0";
  }
}
