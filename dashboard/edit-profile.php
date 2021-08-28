<?php include "includes/header.php" ?>

<?php
if (!isset($_SESSION['userkey'])) {
  header("Location: ../login.php");
}
?>

<?php include "ajax/db.php" ?>
<?php include "includes/nav.php" ?>

<!-- partial -->
<div class="main-panel" id="main_info_forms">
  <div class="content-wrapper">

    <div class="row">
      <div class="col-md-12 mb-5 comp_heading">
        <h4 class="mb-0 text-white bg-success text-center py-2">Edit Your Profile</h4>
      </div>
    </div>

    <?php if ($_SESSION['role'] == "employer") : ?>

      <?php
      $empkey = mysqli_real_escape_string($connection, $_SESSION['userkey']);
      $query = mysqli_query($connection, "SELECT * FROM users INNER JOIN employee_info ON users.userkey=employee_info.employerkey WHERE employee_info.employerkey='$empkey'");
      $empinfo = mysqli_fetch_assoc($query);
      ?>


      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <form method="POST" class="emp_info_form" name="emp_info_form" id="emp_info_form">

                <div class="form-group">
                  <label for="upload">Change Profile Image</label>
                  <div class="input-group pill bg-white shadow-sm">
                    <input id="upload" type="file" name="emp_image" onchange="readURL(this);" class="form-control border-0">
                    <label id="upload-label" for="upload" class="text-muted">Choose
                      file</label>
                    <div class="input-group-append">
                      <label for="upload" class="btn m-0 pill px-4">
                        <small class="text-uppercase font-weight-bold">Choose
                          file</small>
                      </label>
                    </div>
                  </div>

                  <!-- Uploaded image area-->

                  <div class="image-area" style="display: block;">
                    <?php $image_arr = explode('../', $empinfo['image']); ?>
                    <img id="imageResult" src="<?php echo "../" . $image_arr[2]; ?>" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                  </div>

                  <script>
                    function readURL(input) {
                      if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                          document.querySelector(".image-area").style.display = "block";
                          document.querySelector("#imageResult").setAttribute('src', e.target.result);
                        };
                        reader.readAsDataURL(input.files[0]);
                      }
                    }

                    (function() {
                      document.getElementById("upload").onchange = function() {

                        readURL(input);
                      }
                    });
                    var input = document.getElementById('upload');

                    input.addEventListener('change', showFileName);

                    function showFileName(event) {
                      var input = event.srcElement;
                      var fileName = input.files[0].name;
                    }
                  </script>
                </div>

                <div class="form-group">
                  <label for="emp_name">Change Name</label>
                  <input type="text" class="form-control form-control-lg" id="emp_name" name="emp_name" placeholder="Enter your name" value="<?php echo $empinfo['name'] ?>" required>
                </div>

                <div class="form-group">
                  <label for="comp_name">Change Company/Organization Name</label>
                  <input type="text" class="form-control form-control-lg" id="comp_name" name="comp_name" value="<?php echo $empinfo['company'] ?>" placeholder="Enter your company name" required>
                </div>

                <div class="form-group">
                  <label for="emp_city">Change City</label>
                  <input type="text" class="form-control form-control-lg" id="emp_city" name="emp_city" placeholder="Enter your city" value="<?php echo $empinfo['city'] ?>" required>
                </div>

                <div class="form-group">
                  <label for="emp_country">Change Country</label>
                  <input type="text" class="form-control form-control-lg" id="emp_country" name="emp_country" placeholder="Enter your country" value="<?php echo $empinfo['country'] ?>" required>
                </div>

                <div class="form-group mb-lg-5">
                  <label for="emp_contact_no">Change Contact No.</label>
                  <input type="text" class="form-control form-control-lg" id="emp_contact_no" name="emp_contact_no" placeholder="Enter your contact number" value="<?php echo $empinfo['contact_no'] ?>" required>
                </div>

                <input type="hidden" name="emp_update_info" value="<?php echo uniqid("emp_update_info") ?>">

                <button type="submit" class="btn btn-primary me-2 w-100">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>


    <?php if ($_SESSION['role'] == "candidate") : ?>
      <div class="row">

        <?php
        $userkey = mysqli_real_escape_string($connection, $_SESSION['userkey']);
        $query = mysqli_query($connection, "SELECT * FROM users INNER JOIN personal_info ON users.userkey=personal_info.userkey INNER JOIN profession_info ON users.userkey=profession_info.userkey INNER JOIN skills ON users.userkey=skills.userkey INNER JOIN cvs ON users.userkey=cvs.userkey INNER JOIN social_info ON users.userkey=social_info.userkey INNER JOIN about ON users.userkey=about.userkey WHERE users.userkey='$userkey'");
        $info = mysqli_fetch_assoc($query);

        $query2 = mysqli_query($connection, "SELECT * FROM education_info WHERE userkey='$userkey'");
        ?>


        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Personal Information</h4>
              <form class="p_info_form" name="p_info_form" id="p_info_form" method="POST">

                <div class="form-group">
                  <label for="upload">Change Profile Image</label>
                  <div class="input-group pill bg-white shadow-sm">
                    <input id="upload" type="file" name="user_image" onchange="readURL(this);" class="form-control border-0">
                    <label id="upload-label" for="upload" class="text-muted">Choose
                      file</label>
                    <div class="input-group-append">
                      <label for="upload" class="btn m-0 pill px-4">
                        <small class="text-uppercase font-weight-bold">Choose
                          file</small>
                      </label>
                    </div>
                  </div>

                  <!-- Uploaded image area-->
                  <div class="image-area" style="display: block;">
                    <?php $image_arr = explode('../', $info['image']); ?>
                    <img id="imageResult" src="<?php echo "../" . $image_arr[2]; ?>" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                  </div>

                  <script>
                    function readURL(input) {
                      if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                          document.querySelector(".image-area").style.display = "block";
                          document.querySelector("#imageResult").setAttribute('src', e.target.result);
                        };
                        reader.readAsDataURL(input.files[0]);
                      }
                    }

                    (function() {
                      document.getElementById("upload").onchange = function() {

                        readURL(input);
                      }
                    });
                    var input = document.getElementById('upload');

                    input.addEventListener('change', showFileName);

                    function showFileName(event) {
                      var input = event.srcElement;
                      var fileName = input.files[0].name;
                    }
                  </script>
                </div>

                <div class="form-group">
                  <label for="name">Change Your Name</label>
                  <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Enter your name" value="<?php echo $info['name'] ?>">
                </div>

                <div class="form-group">
                  <label for="gender">Change Gender</label>
                  <select name="gender" id="gender" class="form-control form-control-lg">
                    <option selected><?php echo ucfirst($info['gender']) ?></option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Others</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="dob">Change Date Of Birth</label>
                  <input type="date" class="form-control form-control-lg" id="dob" name="dob" placeholder="Date of birth" value="<?php echo $info['dob'] ?>">
                </div>

                <div class="form-group">
                  <label for="city">Change City</label>
                  <input type="text" class="form-control form-control-lg" id="city" name="city" placeholder="Enter your city" value="<?php echo $info['city'] ?>">
                </div>

                <div class="form-group">
                  <label for="country">Change Country</label>
                  <input type="text" class="form-control form-control-lg" id="country" name="country" placeholder="Enter your country" value="<?php echo $info['country'] ?>">
                </div>

                <div class="form-group mb-lg-5">
                  <label for="contact_no">Change Contact No.</label>
                  <input type="text" class="form-control form-control-lg" id="contact_no" name="contact_no" placeholder="Enter your contact number" value="<?php echo $info['contact_no'] ?>">
                </div>

                <input type="hidden" name="edit_personal_info" value="<?php echo uniqid("edit_personal_info") ?>">

                <button type="submit" class="btn btn-primary me-2 w-100">Update</button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">

              <h4 class="card-title">Educational Information</h4>

              <form class="e_info_form" name="e_info_form" id="e_info_form" method="POST">

                <div class="list_container">
                  <table class="table table-responsive" id="degree_list">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Edit</th>
                        <th scope="col">Degree</th>
                        <th scope="col">Field of Study</th>
                        <th scope="col">Institute</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Certificate</th>
                      </tr>
                    </thead>
                    <tbody>


                      <?php while ($education_info = mysqli_fetch_assoc($query2)) : ?>
                        <tr>
                          <td>
                            <button type="button" onclick="Fill_Edu_Form(this);show('popup2')" class="btn btn-primary px-3 py-1">Edit</button>
                          </td>
                          <td>
                            <?php echo $education_info['degree'] ?>
                          </td>
                          <td>
                            <?php echo $education_info['field_of_study'] ?>
                          </td>
                          <td>
                            <?php echo $education_info['institute'] ?>
                          </td>
                          <td>
                            <?php echo $education_info['from_date'] ?>
                          </td>
                          <td>
                            <?php echo empty($education_info['to_date']) ? 'ongoing' : $education_info['to_date'] ?>
                          </td>
                          <td>
                            <?php
                            if ($education_info['cert'] == "-") {
                              echo "-";
                            } else {
                            ?>
                              <a class="text-primary" href="../certificates/<?php echo $education_info['cert'] ?>">
                                <?php echo $education_info['cert'] ?>
                              </a>
                            <?php
                            }
                            ?>
                          </td>
                        </tr>
                      <?php endwhile; ?>

                    </tbody>
                  </table>
                </div>

                <div class="form-group text-center">
                  <button type="submit" class="btn btn-primary me-2 w-100">Update</button>
                </div>

              </form>

              <div class="popup" id="popup2">
                <div class="row">
                  <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Edit Your Education</h4>

                        <form name="add_e_info_form" id="add_e_info_form" method="POST">

                          <div class="form-group">
                            <label for="qualification">Qualification</label>
                            <select name="qualification" id="qualification" class="form-control form-control-lg" required>
                              <option selected value="">Please Select</option>
                              <option value="phd">PHD</option>
                              <option value="masters">Masters</option>
                              <option value="bachelors">Bachelors</option>
                              <option value="diploma">Diploma</option>
                              <option value="high_school">High School</option>
                              <option value="short_course">Short Course</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="field_of_study">Field Of Study</label>
                            <input type="text" class="form-control form-control-lg" id="field_of_study" name="field_of_study" placeholder="Enter field of study" required>
                          </div>

                          <div class="form-group">
                            <label for="institute">Institute</label>
                            <input type="text" class="form-control form-control-lg" id="institute" name="institute" placeholder="Enter institute" required>
                          </div>

                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-6">
                                <label for="degree_from">From</label>
                                <input type="date" class="form-control" id="degree_from" name="degree_from" placeholder="Enter from date" required>
                              </div>
                              <div class="col-md-6">
                                <label for="degree_to">To <small>(leave empty if
                                    ongoing)</small></label>
                                <input type="date" class="form-control" id="degree_to" name="degree_to" placeholder="Enter to date">
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="cert">Upload Certificate
                              <small>(optional)</small>
                            </label>
                            <input type="file" class="form-control form-control-lg" id="cert" name="cert" placeholder="certificate">
                          </div>

                          <input type="hidden" name="add_educ_scrt" value="<?php echo uniqid("add_educ_scrt") ?>">

                          <button type="submit" class="btn btn-primary me-2">Ok</button>
                          <button type="button" class="btn btn-light" onclick="hide('popup2')">Cancel</button>
                        </form>

                        <!-- edu list adding -->
                        <script>
                          // fill form
                          function Fill_Edu_Form(param) {
                            var deg = "",
                              f_of_s = "",
                              inst = "",
                              from = "",
                              to = "";
                            var as = param.parentElement.parentElement.childNodes;
                            deg = as[3].textContent.trim();
                            f_of_s = as[5].textContent.trim();
                            inst = as[7].textContent.trim();
                            from = as[9].textContent.trim();
                            to = as[11].textContent.trim();

                            document.getElementById('qualification').value = deg;
                            document.getElementById('field_of_study').value = f_of_s;
                            document.getElementById('institute').value = inst;
                            document.getElementById('degree_from').value = from;
                            document.getElementById('degree_to').value = to;
                          }
                        </script>


                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <script>
                var getId = function(id) {
                  return document.getElementById(id);
                }

                var show = function(id) {
                  getId(id).style.display = 'block';
                }
                var hide = function(id) {
                  getId(id).style.display = 'none';
                };
              </script>


            </div>
          </div>
        </div>

        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Professional Information</h4>
              <form class="work_info_form" name="work_info_form" id="work_info_form" method="POST">

                <div class="form-group">
                  <label for="prof_catg">Change Professional Field</label>
                  <select name="prof_catg" id="prof_catg" class="form-control form-control-lg">
                    <option selected><?php echo $info['category'] ?></option>
                    <option value="software engineer">software engineer</option>
                    <option value="accountant">accountant</option>
                    <option value="teacher">teacher</option>
                    <option value="data scientist">data scientist</option>
                    <option value="app developer">app developer</option>
                    <option value="game developer">game developer</option>
                    <option value="ui/ux designer">ui/ux designer</option>
                    <option value="book cover designer">book cover designer</option>
                    <option value="data entry specialist">data entry specialist</option>
                    <option value="engineer">engineer</option>
                    <option value="lawyer">lawyer</option>
                    <option value="doctor">doctor</option>
                    <option value="social media manager">social media manager</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="city">How much year(s) of experience do you have?</label>
                  <input type="text" class="form-control form-control-lg" name="experience" id="city" value="<?php echo $info['experience'] ?>" placeholder="Total years of experience">
                </div>

                <div class="form-group">
                  <label for="salary_range">Change Salary Range</label>
                  <select name="salary_range" id="salary_range" class="form-control form-control-lg">
                    <option selected><?php echo $info['salary_range'] ?></option>
                    <option value="10_100">$10 - $100</option>
                    <option value="100_1000">$100 - $1000</option>
                    <option value="1000_10000">$1000 - $10000</option>
                    <option value="1000_10000">$10000 - $20000</option>
                    <option value="1000_10000">$20000 - $30000</option>
                    <option value="1000_10000">$30000 - $40000</option>
                    <option value="1000_10000">$40000 - $50000</option>
                    <option value="1000_10000">$50000 - $60000</option>
                    <option value="1000_10000">$60000 - $70000</option>
                    <option value="1000_10000">$70000 - $80000</option>
                    <option value="1000_10000">$80000 - $90000</option>
                    <option value="1000_10000">$90000 - $100000</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="salary_range">Add Spoken Languages</label>
                  <button type="button" onclick="show('popup4')" class="add_lang_btn" style="border: none;
                      background: none;
                      border: 1px solid purple;
                      border-radius: 50%;
                      color: purple;
                      background: purple;
                      color: white;
                      margin-left: 10px;
                      width: 25px;
                      height: 25px;
                      text-align: center;
                      padding-top: 0;">+</button>
                </div>

                <div class="langs_container">
                  <?php
                  $langs = $info['languages'];
                  $lang_arr = explode(",", $langs);
                  for ($i = 0; $i < count($lang_arr) - 1; $i++) :
                  ?>

                    <span class="rounded-pill"><?php echo $lang_arr[$i] ?>
                      <b title="remove language" onclick="RemoveSkill(this)">x</b>
                      <input type='hidden' name='languages[]' value='<?php echo $lang_arr[$i] ?>'>
                    </span>


                  <?php endfor; ?>
                </div>

                <input type="hidden" name="edit_work_info_scrt" id="edit_work_info_scrt" value="<?php echo uniqid("work_info") ?>">


                <button type="submit" class="btn btn-primary me-2 w-100 mt-5">Update</button>

              </form>

              <div class="popup" id="popup4">
                <div class="row">
                  <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Add Language</h4>
                        <form name="add_lang" id="add_lang" method="POST">

                          <div class="form-group">
                            <label for="lang">Language</label>
                            <input type="text" class="form-control form-control-lg" id="lang" placeholder="Enter language">
                          </div>


                          <button type="submit" class="btn btn-primary me-2">Ok</button>
                          <button type="button" class="btn btn-light" onclick="hide('popup4')">Cancel</button>
                        </form>


                        <!-- edu list adding -->
                        <script>
                          var add_lang_form = document.getElementById("add_lang");
                          add_lang_form.onsubmit = function(e) {
                            e.preventDefault();
                            hide("popup4");

                            var skill = document.getElementById("lang").value;
                            var span = document.createElement('span'); // is a node
                            span.className = "rounded-pill";
                            span.innerHTML = skill + "<b title='remove skill' onclick='RemoveLang(this)'>x</b><input type='hidden' name='languages[]' value='" + skill + "'>";
                            document.querySelector(".langs_container").appendChild(span);

                            add_lang_form.reset();
                          };

                          function RemoveLang(param) {
                            param.parentElement.remove();
                          }
                        </script>


                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">About</h4>
              <form method="POST" class="about_info_form" name="about_info_form" id="about_info_form">

                <div class="form-group">
                  <label for="short_desc">Edit Short Description</label>
                  <textarea name="short_desc" id="short_desc" cols="30" rows="10" placeholder="write about yourself" required class="form-control form-control-lg" style="height: 110px;" maxlength="221"><?php echo $info['short_desc'] ?></textarea>
                  <small class="max_chars" style="display: block;text-align: right;font-size: 11px;color: #8d8e90;">max characters: 221</small>
                </div>

                <div class="form-group">
                  <label for="long_desc">Edit Cover Letter</small></label>
                  <textarea name="long_desc" id="long_desc" cols="30" rows="10" placeholder="write cover letter about yourself" required class="form-control form-control-lg" style="height: 231px;"><?php echo $info['long_desc'] ?></textarea>
                </div>

                <input type="hidden" name="edit_about_info" value="<?php echo uniqid("edit_about_info") ?>">

                <button type="submit" class="btn btn-primary me-2 w-100 mt-5">Save</button>

              </form>

            </div>
          </div>
        </div>

        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Edit Your Social Links</h4>

              <form class="edit_social_form" name="edit_social_form" id="edit_social_form" method="POST">

                <div class="input-group mb-3 mt-4">
                  <div class="input-group-prepend">
                    <span class="px-3 input-group-text h-100" id="linkedin">
                      <i class="icon icon-social-linkedin"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="Linkedin profile URL" aria-describedby="linkedin" name="linkedin" value="<?php echo $info['linkedin'] ?>">
                </div>

                <div class="input-group mb-3 mt-4">
                  <div class="input-group-prepend">
                    <span class="px-3 input-group-text h-100" id="twitter">
                      <i class="icon icon-social-twitter"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="Twitter profile URL" aria-describedby="Twitter" name="twitter" value="<?php echo $info['twitter'] ?>">
                </div>

                <div class="input-group mb-3 mt-4">
                  <div class="input-group-prepend">
                    <span class="px-3 input-group-text h-100" id="facebook">
                      <i class="icon icon-social-facebook"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="Facebook profile URL" aria-describedby="facebook" name="facebook" value="<?php echo $info['facebook'] ?>">
                </div>

                <div class="input-group mb-3 mt-4">
                  <div class="input-group-prepend">
                    <span class="px-3 input-group-text h-100" id="instagram">
                      <i class="icon icon-social-instagram"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="Instagram profile URL" aria-describedby="instagram" name="instagram" value="<?php echo $info['insta'] ?>">
                </div>

                <div class="input-group mb-3 mt-4">
                  <div class="input-group-prepend">
                    <span class="px-3 input-group-text h-100" id="github">
                      <i class="icon icon-social-github"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="github profile URL" aria-describedby="github" name="github" value="<?php echo $info['git'] ?>">
                </div>

                <div class="input-group mb-3 mt-4">
                  <div class="input-group-prepend">
                    <span class="px-3 input-group-text h-100" id="dribble">
                      <i class="icon icon-social-dribbble"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="dribble profile URL" aria-describedby="dribble" name="dribble" value="<?php echo $info['dribble'] ?>">
                </div>

                <div class="input-group mb-3 mt-4">
                  <div class="input-group-prepend">
                    <span class="px-3 input-group-text h-100" id="behance">
                      <i class="icon icon-social-behance"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="behance profile URL" aria-describedby="behance" name="behance" value="<?php echo $info['behance'] ?>">
                </div>

                <input type="hidden" name="edit_social_form_scrt" value="<?php echo uniqid("edit_social_form_scrt") ?>">

                <div class="form-group text-center mt-5">
                  <button type="submit" class="btn btn-primary me-2 w-100">Update</button>
                </div>

              </form>

            </div>
          </div>
        </div>

        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Edit Skills</h4>
              <form class="skills_form" name="skills_form" id="skills_form" method="POST">

                <div class="skills_container">
                  <?php
                  $skills = $info['skills'];
                  $skill_arr = explode(",", $skills);
                  for ($i = 0; $i < count($skill_arr) - 1; $i++) :
                  ?>

                    <span class="rounded-pill"><?php echo $skill_arr[$i] ?>
                      <b title="remove skill" onclick="RemoveSkill(this)">x</b>
                      <input type='hidden' name='skills[]' value='<?php echo $skill_arr[$i] ?>'>
                    </span>

                  <?php endfor; ?>
                </div>

                <input type="hidden" name="skill_scrt_form" value="<?php echo uniqid("skill_scrt_form") ?>">

                <div class="form-group text-center">
                  <button type="button" class="btn btn-primary me-2 w-25" onclick="show('popup3')">Add</button>
                  <button type="submit" class="btn btn-primary me-2 w-25">Update</button>
                </div>


              </form>

              <div class="popup" id="popup3">
                <div class="row">
                  <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Add Skill</h4>
                        <form name="add_skill" id="add_skill" method="POST">

                          <div class="form-group">
                            <label for="skill">Skill</label>
                            <input type="text" class="form-control form-control-lg" id="skill" placeholder="Enter skill">
                          </div>


                          <button type="submit" class="btn btn-primary me-2">Ok</button>
                          <button type="button" class="btn btn-light" onclick="hide('popup3')">Cancel</button>
                        </form>


                        <!-- edu list adding -->
                        <script>
                          var add_skill_form = document.getElementById("add_skill");
                          add_skill_form.onsubmit = function(e) {
                            e.preventDefault();
                            hide("popup3");
                            var skill = document.getElementById("skill").value;
                            var span = document.createElement('span'); // is a node
                            span.className = "rounded-pill";
                            span.innerHTML = skill + "<b title='remove skill' onclick='RemoveSkill(this)'>x</b><input type='hidden' name='skills[]' value='" + skill + "'>";
                            document.querySelector(".skills_container").appendChild(span);

                            add_skill_form.reset();
                          };

                          function RemoveSkill(param) {
                            param.parentElement.remove();
                          }
                        </script>


                      </div>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>

        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Update Your Resume/CV</h4>
              <form class="resume_form" name="resume_form" id="resume_form" method="POST">

                <div class="form-group mb-lg-5">
                  <label for="resume">Please upload your updated resume</label>
                  <input type="file" class="form-control form-control-lg" id="resume" name="resume" placeholder="upload your resume" required>
                </div>

                <input type="hidden" name="resume_hid_scrt" id="" value="<?php echo uniqid("resume_hid_scrt") ?>">

                <div class="form-group text-center">
                  <button type="submit" class="btn btn-primary me-2 w-50">Update</button>
                </div>

              </form>

            </div>
          </div>
        </div>

      </div>
    <?php endif; ?>


  </div>
  <!-- content-wrapper ends -->
</div>
<!-- content-wrapper ends -->




<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<?php include "includes/footer.php" ?>

<script>
  $("#add_e_info_form").submit(function(e) {
    e.preventDefault();
    // hide("popup2");
    var formData = new FormData(this);

    $.ajax({
      url: "ajax/edit_profile.php",
      type: 'POST',
      data: formData,
      beforeSend: function() {
        showAlert('Please wait...')
      },
      success: function(data) {
        if (data.includes("0")) {
          showAlert(data.replace('0', ''));
        } else {
          showAlert("Updated");
          setTimeout(() => {
            $("#main_info_forms").load(" #main_info_forms > *");
          }, 2000);
        }
      },
      cache: false,
      contentType: false,
      processData: false
    });

    // $('#add_e_info_form').trigger("reset");
  });


  $("#p_info_form").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: "ajax/edit_profile.php",
      type: 'POST',
      data: formData,
      beforeSend: function() {
        showAlert('Please wait...')
      },
      success: function(data) {
        setTimeout(() => {
          $("#main_info_forms").load(" #main_info_forms > *");
        }, 2000);
        showAlert("Updated");
      },
      cache: false,
      contentType: false,
      processData: false
    });
  });

  $("#work_info_form").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: "ajax/edit_profile.php",
      type: 'POST',
      data: formData,
      beforeSend: function() {
        showAlert('Please wait...')
      },
      success: function(data) {
        setTimeout(() => {
          $("#main_info_forms").load(" #main_info_forms > *");
        }, 2000);
        showAlert("Updated");
      },
      cache: false,
      contentType: false,
      processData: false
    });
  });

  $("#edit_social_form").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: "ajax/edit_profile.php",
      type: 'POST',
      data: formData,
      beforeSend: function() {
        showAlert('Please wait...')
      },
      success: function(data) {
        setTimeout(() => {
          $("#main_info_forms").load(" #main_info_forms > *");
        }, 2000);
        showAlert(data);
      },
      cache: false,
      contentType: false,
      processData: false
    });
  });

  $("#skills_form").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: "ajax/edit_profile.php",
      type: 'POST',
      data: formData,
      beforeSend: function() {
        showAlert('Please wait...')
      },
      success: function(data) {
        setTimeout(() => {
          $("#main_info_forms").load(" #main_info_forms > *");
        }, 2000);
        showAlert(data);
      },
      cache: false,
      contentType: false,
      processData: false
    });
  });

  $("#resume_form").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: "ajax/edit_profile.php",
      type: 'POST',
      data: formData,
      beforeSend: function() {
        showAlert('Please wait...')
      },
      success: function(data) {
        setTimeout(() => {
          $("#main_info_forms").load(" #main_info_forms > *");
        }, 2000);
        showAlert(data);
      },
      cache: false,
      contentType: false,
      processData: false
    });
  });

  $("#emp_info_form").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: "ajax/edit_profile.php",
      type: 'POST',
      data: formData,
      beforeSend: function() {
        showAlert('Please wait...')
      },
      success: function(data) {
        setTimeout(() => {
          $("#main_info_forms").load(" #main_info_forms > *");
        }, 2000);
      },
      cache: false,
      contentType: false,
      processData: false
    });
  });

  $("#about_info_form").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: "ajax/edit_profile.php",
      type: 'POST',
      data: formData,
      beforeSend: function() {
        showAlert('Please wait...')
      },
      success: function(data) {
        setTimeout(() => {
          $("#main_info_forms").load(" #main_info_forms > *");
        }, 2000);
      },
      cache: false,
      contentType: false,
      processData: false
    });
  });

  $("#about_info_form").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: "ajax/edit_profile.php",
      type: 'POST',
      data: formData,
      beforeSend: function() {
        showAlert('Please wait...')
      },
      success: function(data) {
        showAlert(data);
        setTimeout(() => {
          $("#main_info_forms").load(" #main_info_forms > *");
        }, 2000);
      },
      cache: false,
      contentType: false,
      processData: false
    });
  });
</script>

</body>

</html>