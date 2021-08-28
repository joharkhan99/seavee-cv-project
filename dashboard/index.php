<?php include "includes/header.php" ?>
<?php include "ajax/db.php" ?>

<?php
if (!isset($_SESSION['userkey'])) {
    header("Location: ../login.php");
}
?>

<?php include "includes/nav.php" ?>

<!-- partial -->

<div class="main-panel" id="main_info_forms">
    <div class="content-wrapper">

        <?php if ($_SESSION['role'] == "employer") : ?>

            <?php
            $empkey = mysqli_real_escape_string($connection, $_SESSION['userkey']);
            $query = mysqli_query($connection, "SELECT status FROM employee_info WHERE employerkey='$empkey'");
            $row = mysqli_fetch_assoc($query);
            $emp_status = $row['status'];
            ?>

            <?php if ($emp_status == "no") : ?>

                <div class="row mb-3">
                    <div class="col-md-6 px-4">
                        <h5>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16" style="fill: #8e8f92;vertical-align: bottom;margin-right: 7px;">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                            </svg>
                            Please Complete Your Profile
                        </h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" class="emp_info_form" name="emp_info_form" id="emp_info_form">

                                    <div class="form-group">
                                        <label for="upload">Profile Image</label>
                                        <div class="input-group pill bg-white shadow-sm">
                                            <input id="upload" type="file" name="emp_image" onchange="readURL(this);" class="form-control border-0" required>
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
                                        <div class="image-area">
                                            <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
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
                                        <label for="emp_name">Name</label>
                                        <input type="text" class="form-control form-control-lg" id="emp_name" name="emp_name" placeholder="Enter your name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="comp_name">Company/Organization Name</label>
                                        <input type="text" class="form-control form-control-lg" id="comp_name" name="comp_name" placeholder="Enter your company name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="emp_city">City</label>
                                        <input type="text" class="form-control form-control-lg" id="emp_city" name="emp_city" placeholder="Enter your city" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="emp_country">Country</label>
                                        <input type="text" class="form-control form-control-lg" id="emp_country" name="emp_country" placeholder="Enter your country" required>
                                    </div>

                                    <div class="form-group mb-lg-5">
                                        <label for="emp_contact_no">Contact No.</label>
                                        <input type="text" class="form-control form-control-lg" id="emp_contact_no" name="emp_contact_no" placeholder="Enter your contact number" required>
                                    </div>

                                    <input type="hidden" name="emp_add_personal_info" value="<?php echo uniqid("emp_personal_info") ?>">

                                    <button type="submit" class="btn btn-primary me-2 w-100">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        <?php endif; ?>

        <?php if ($_SESSION['role'] == "candidate") : ?>
            <div class="row">

                <?php
                $userkey = mysqli_real_escape_string($connection, $_SESSION['userkey']);
                $query = mysqli_query($connection, "SELECT status FROM personal_info WHERE userkey='$userkey'");
                $row = mysqli_fetch_assoc($query);
                $personal_info = $row['status'];

                $query = mysqli_query($connection, "SELECT status FROM education_info WHERE userkey='$userkey'");
                $row = mysqli_fetch_assoc($query);
                $education_info = $row['status'];

                $query = mysqli_query($connection, "SELECT status FROM profession_info WHERE userkey='$userkey'");
                $row = mysqli_fetch_assoc($query);
                $profession_info = $row['status'];

                $query = mysqli_query($connection, "SELECT status FROM social_info WHERE userkey='$userkey'");
                $row = mysqli_fetch_assoc($query);
                $social_info = $row['status'];

                $query = mysqli_query($connection, "SELECT status FROM skills WHERE userkey='$userkey'");
                $row = mysqli_fetch_assoc($query);
                $skills_info = $row['status'];

                $query = mysqli_query($connection, "SELECT status FROM cvs WHERE userkey='$userkey'");
                $row = mysqli_fetch_assoc($query);
                $cv_info = $row['status'];

                $query = mysqli_query($connection, "SELECT status FROM about WHERE userkey='$userkey'");
                $row = mysqli_fetch_assoc($query);
                $about_info = $row['status'];
                ?>

                <div class="col-md-8 mb-5">
                    <h4 class="px-3">Profile Completion Status</h4>

                    <?php
                    $percent = 0;
                    if ($personal_info == "yes")
                        $percent += 14.29;
                    if ($education_info == "yes")
                        $percent += 14.29;
                    if ($profession_info == "yes")
                        $percent += 14.29;
                    if ($social_info == "yes")
                        $percent += 14.29;
                    if ($skills_info == "yes")
                        $percent += 14.29;
                    if ($cv_info == "yes")
                        $percent += 14.29;
                    if ($about_info == "yes")
                        $percent += 14.29;

                    $percent = (int) $percent;

                    if ($percent > 100)
                        $percent = 100;
                    ?>

                    <div class="meter">

                        <span style="width: <?php echo $percent ?>%;">
                            <b><?php echo $percent ?>%</b>
                        </span>
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


                <?php
                if ($personal_info == 'no' || empty($personal_info)) :
                ?>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Personal Information</h4>
                                <form method="POST" class="p_info_form" name="p_info_form" id="p_info_form">

                                    <div class="form-group">
                                        <label for="upload">Profile Image</label>
                                        <div class="input-group pill bg-white shadow-sm">
                                            <input id="upload" type="file" name="userimage" onchange="readURL(this);" class="form-control border-0" required>
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
                                        <div class="image-area">
                                            <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
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
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender" class="form-control form-control-lg" required>
                                            <option selected value="">Please Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Others</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="dob">Date Of Birth</label>
                                        <input type="date" class="form-control form-control-lg" id="dob" name="dob" placeholder="Date of birth" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control form-control-lg" id="city" name="city" placeholder="Enter your city" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control form-control-lg" id="country" name="country" placeholder="Enter your country" required>
                                    </div>
                                    <div class="form-group mb-lg-5">
                                        <label for="contact_no">Contact No.</label>
                                        <input type="text" class="form-control form-control-lg" id="contact_no" name="contact_no" placeholder="Enter your contact number" required>
                                    </div>

                                    <input type="hidden" name="add_personal_info" value="<?php echo uniqid("personal information") ?>">

                                    <button type="submit" class="btn btn-primary me-2 w-100">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php
                if ($education_info == 'no' || empty($education_info)) :
                ?>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Educational Information</h4>

                                <form method="POST" class="e_info_form" name="e_info_form" id="e_info_form">

                                    <div class="list_container">
                                        <table class="table table-responsive" id="degree_list">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Degree</th>
                                                    <th scope="col">Field of Study</th>
                                                    <th scope="col">Institute</th>
                                                    <th scope="col">From</th>
                                                    <th scope="col">To</th>
                                                    <th scope="col">Certificate</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $query = mysqli_query($connection, "SELECT * FROM education_info WHERE userkey='$userkey'");
                                                while ($row = mysqli_fetch_assoc($query)) :
                                                ?>

                                                    <tr>
                                                        <td><?php echo $row['degree'] ?></td>
                                                        <td><?php echo $row['field_of_study'] ?></td>
                                                        <td><?php echo $row['institute'] ?></td>
                                                        <td><?php echo $row['from_date'] ?></td>
                                                        <td><?php echo $row['to_date'] ?></td>
                                                        <td>
                                                            <?php
                                                            if ($row['cert'] == "-") {
                                                                echo "-";
                                                            } else {
                                                            ?>
                                                                <a class="text-primary" href="../certificates/<?php echo $row['cert'] ?>"><?php echo $row['cert'] ?></a>
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
                                        <input type="hidden" name="save_education" value="<?php echo uniqid("save_education") ?>">
                                        <button type="button" class="btn btn-primary me-2 w-25" onclick="show('popup2')">Add</button>
                                        <button type="submit" class="btn btn-primary me-2 w-25">Save</button>
                                    </div>

                                </form>

                                <div class="popup" id="popup2">
                                    <div class="row">
                                        <div class="col-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Add Your Education</h4>
                                                    <form method="POST" name="add_e_info_form" id="add_e_info_form" enctype="multipart/form-data">

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
                                                            <input type="text" class="form-control form-control-lg" name="field_of_study" id="field_of_study" placeholder="Enter field of study" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="institute">Institute</label>
                                                            <input type="text" class="form-control form-control-lg" name="institute" id="institute" placeholder="Enter institute" required>
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
                                                                <small>(optional)</small></label>
                                                            <input type="file" class="form-control form-control-lg" id="cert" name="cert" placeholder="certificate">
                                                        </div>

                                                        <input type="hidden" name="add_education" value="<?php echo uniqid("add_edu") ?>">

                                                        <button type="submit" class="btn btn-primary me-2">Ok</button>
                                                        <button type="button" class="btn btn-light" onclick="hide('popup2')">Cancel</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php
                if ($profession_info == 'no' || empty($profession_info)) :
                ?>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Professional Information</h4>
                                <form method="POST" class="work_info_form" name="work_info_form" id="work_info_form">

                                    <div class="form-group">
                                        <label for="prof_catg">Professional Field</label>
                                        <select name="prof_catg" id="prof_catg" class="form-control form-control-lg" required>
                                            <option selected>Please Select your Field</option>
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
                                        <label for="experience">How much year(s) of experience do you have?</label>
                                        <input type="number" class="form-control form-control-lg" id="experience" name="experience" placeholder="1, 2, 3, etc.." required>
                                    </div>

                                    <div class="form-group">
                                        <label for="salary_range">Salary Range</label>
                                        <select name="salary_range" id="salary_range" class="form-control form-control-lg">
                                            <option selected value="">Please Select your salary range</option>
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
                                        <label>Add Spoken Languages</label>
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

                                    <input type="hidden" name="profession_info" value="<?php echo uniqid("profession_info") ?>">

                                    <div class="langs_container">
                                    </div>


                                    <button type="submit" class="btn btn-primary me-2 w-100 mt-5">Save</button>

                                </form>

                                <div class="popup" id="popup4">
                                    <div class="row">
                                        <div class="col-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Add Language</h4>
                                                    <form method="POST" name="add_lang" id="add_lang">

                                                        <div class="form-group">
                                                            <label for="lang">Language</label>
                                                            <input type="text" class="form-control form-control-lg" id="lang" placeholder="Enter language" required>
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
                <?php endif; ?>


                <?php
                if ($about_info == 'no' || empty($about_info)) :
                ?>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">About</h4>
                                <form method="POST" class="about_info_form" name="about_info_form" id="about_info_form">

                                    <div class="form-group">
                                        <label for="short_desc">Short Description</label>
                                        <textarea name="short_desc" id="short_desc" cols="30" rows="10" placeholder="write about yourself" required class="form-control form-control-lg" style="height: 110px;" maxlength="221"></textarea>
                                        <small class="max_chars" style="display: block;text-align: right;font-size: 11px;color: #8d8e90;">max characters: 221</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="long_desc">Cover Letter</small></label>
                                        <textarea name="long_desc" id="long_desc" cols="30" rows="10" placeholder="write cover letter about yourself" required class="form-control form-control-lg" style="height: 231px;"></textarea>
                                    </div>

                                    <input type="hidden" name="about_info" value="<?php echo uniqid("about_info") ?>">

                                    <button type="submit" class="btn btn-primary me-2 w-100 mt-5">Save</button>

                                </form>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>


                <?php
                if ($social_info == 'no' || empty($social_info)) :
                ?>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Your Social Links</h4>
                                <p>optional but recommended</p>

                                <form method="POST" class="social_form" name="social_form" id="social_form">

                                    <div class="input-group mb-3 mt-4">
                                        <div class="input-group-prepend">
                                            <span class="px-3 input-group-text h-100" id="linkedin">
                                                <i class="icon icon-social-linkedin"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" placeholder="Linkedin profile URL" aria-describedby="linkedin" name="linkedin">
                                    </div>

                                    <div class="input-group mb-3 mt-4">
                                        <div class="input-group-prepend">
                                            <span class="px-3 input-group-text h-100" id="twitter">
                                                <i class="icon icon-social-twitter"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" placeholder="Twitter profile URL" aria-describedby="Twitter" name="twitter">
                                    </div>

                                    <div class="input-group mb-3 mt-4">
                                        <div class="input-group-prepend">
                                            <span class="px-3 input-group-text h-100" id="facebook">
                                                <i class="icon icon-social-facebook"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" placeholder="Facebook profile URL" aria-describedby="facebook" name="facebook">
                                    </div>

                                    <div class="input-group mb-3 mt-4">
                                        <div class="input-group-prepend">
                                            <span class="px-3 input-group-text h-100" id="instagram">
                                                <i class="icon icon-social-instagram"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" placeholder="Instagram profile URL" aria-describedby="instagram" name="instagram">
                                    </div>

                                    <div class="input-group mb-3 mt-4">
                                        <div class="input-group-prepend">
                                            <span class="px-3 input-group-text h-100" id="github">
                                                <i class="icon icon-social-github"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" placeholder="github profile URL" aria-describedby="github" name="github">
                                    </div>

                                    <div class="input-group mb-3 mt-4">
                                        <div class="input-group-prepend">
                                            <span class="px-3 input-group-text h-100" id="dribble">
                                                <i class="icon icon-social-dribbble"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" placeholder="dribble profile URL" aria-describedby="dribble" name="dribble">
                                    </div>

                                    <div class="input-group mb-3 mt-4">
                                        <div class="input-group-prepend">
                                            <span class="px-3 input-group-text h-100" id="behance">
                                                <i class="icon icon-social-behance"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" placeholder="behance profile URL" aria-describedby="behance" name="behance">
                                    </div>

                                    <input type="hidden" name="social_scrt" id="" value="<?php echo uniqid("social_scrt") ?>">

                                    <div class="form-group text-center mt-5">
                                        <button type="submit" class="btn btn-primary me-2 w-100">Save</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php
                if ($skills_info == 'no' || empty($skills_info)) :
                ?>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Skills</h4>
                                <form method="POST" class="skills_form" name="skills_form" id="skills_form">

                                    <div class="skills_container">
                                    </div>

                                    <input type="hidden" name="skill_scrt" value="<?php echo uniqid("skill_scrt") ?>" id="">

                                    <div class="form-group text-center">
                                        <button type="button" class="btn btn-primary me-2 w-25" onclick="show('popup3')">Add</button>
                                        <button type="submit" class="btn btn-primary me-2 w-25">Save</button>
                                    </div>

                                </form>

                                <div class="popup" id="popup3">
                                    <div class="row">
                                        <div class="col-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Add Skill</h4>
                                                    <form method="POST" name="add_skill" id="add_skill">

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
                <?php endif; ?>

                <?php
                if ($cv_info == 'no' || empty($cv_info)) :
                ?>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Your Resume/CV</h4>
                                <form method="POST" class="resume_form" name="resume_form" id="resume_form">

                                    <div class="form-group mb-lg-5">
                                        <label for="resume">Please upload your resume</label>
                                        <input type="file" class="form-control form-control-lg" id="resume" name="resume" placeholder="upload your resume">
                                    </div>

                                    <input type="hidden" name="resume_scrt" value="<?php echo uniqid("resume_form") ?>">

                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary me-2 w-50">Save</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>

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
    $("#p_info_form").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "ajax/add_profile.php",
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

    $("#add_e_info_form").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "ajax/add_profile.php",
            type: 'POST',
            data: formData,
            beforeSend: function() {
                showAlert('Please wait...')
            },
            success: function(data) {
                hide("popup2");
                document.getElementById("add_e_info_form").reset();
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

    $("#e_info_form").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        var tbl = document.getElementById('degree_list');
        if (tbl.rows.length <= 1) {
            showAlert("Atleast add one education");
        } else {

            $.ajax({
                url: "ajax/add_profile.php",
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

        }

    });

    $("#work_info_form").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "ajax/add_profile.php",
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

    $("#social_form").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "ajax/add_profile.php",
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

    $("#skills_form").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "ajax/add_profile.php",
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

    $("#resume_form").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "ajax/add_profile.php",
            type: 'POST',
            data: formData,
            beforeSend: function() {
                showAlert('Please wait...');
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

    $("#emp_info_form").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "ajax/add_profile.php",
            type: 'POST',
            data: formData,
            beforeSend: function() {
                showAlert('Please wait...')
            },
            success: function(data) {

                if (data.includes("0")) {
                    showAlert(data.replace('0', ''));
                } else {
                    showAlert(data);
                    setTimeout(() => {
                        $("#main_info_forms").load(" #main_info_forms > *");
                    }, 2000);
                }

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
            url: "ajax/add_profile.php",
            type: 'POST',
            data: formData,
            beforeSend: function() {
                showAlert('Please wait...')
            },
            success: function(data) {


                if (data.includes("0")) {
                    showAlert(data.replace('0', ''));
                } else {
                    showAlert(data);
                    setTimeout(() => {
                        $("#main_info_forms").load(" #main_info_forms > *");
                    }, 2000);
                }




            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>


</body>

</html>