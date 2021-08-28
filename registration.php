<?php include "includes/header.php" ?>

<?php include "includes/nav.php" ?>


<!-- login/signup -->
<section id="registration">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="candidate_pill" data-bs-toggle="pill" data-bs-target="#pills-candidate" type="button" role="tab" aria-controls="pills-candidate" aria-selected="true">Sign Up As Candidate</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="pill_employer" data-bs-toggle="pill" data-bs-target="#pills-employer" type="button" role="tab" aria-controls="pills-employer" aria-selected="false">Sign Up As Employer</button>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-candidate" role="tabpanel" aria-labelledby="candidate_pill">
                        <div class="row">
                            <div class="col-md-5 mx-auto">
                                <form id="client_form">
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control" id="c_name" name="c_name" placeholder="Enter your name" required>
                                        <label for="c_name">Name</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="email" class="form-control" id="c_email" name="c_email" placeholder="Enter your email" required>
                                        <label for="c_email">Email</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="password" class="form-control" name="c_password" id="c_password" placeholder="Password" required>
                                        <label for="c_password">Password</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="password" class="form-control" name="c_con_password" id="c_con_password" placeholder="Confirm Password" required>
                                        <label for="c_con_password">Confirm Password</label>
                                    </div>

                                    <input type="hidden" name="register" value="<?php echo uniqid() ?>">

                                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>

                                    <span class="or">OR</span>

                                    <a href="javascript:void(0)" class="login_btn w-100 btn btn-lg btn-primary">Login</a>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-employer" role="tabpanel" aria-labelledby="pill_employer">
                        <div class="row">
                            <div class="col-md-5 mx-auto">
                                <form id="employer_form">
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control" id="e_name" placeholder="Enter your name" name="e_name" required>
                                        <label for="e_name">Name</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="email" class="form-control" id="e_email" placeholder="Enter your email" name="e_email" required>
                                        <label for="e_email">Email</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="password" class="form-control" id="e_password" placeholder="Password" name="e_password" required>
                                        <label for="e_password">Password</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="password" class="form-control" id="e_con_password" placeholder="Password" name="e_con_password" required>
                                        <label for="e_con_password">Confirm Password</label>
                                    </div>

                                    <input type="hidden" name="register_2" value="<?php echo uniqid() ?>">

                                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>

                                    <span class="or">OR</span>

                                    <a href="login.php" class="login_btn w-100 btn btn-lg btn-primary">Login</a>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ./login/signup -->
<?php include "includes/footer.php" ?>

<script>
    $('#client_form').submit(function(e) {
        e.preventDefault();

        var name = $('form[id="client_form"] #c_name').val().trim();
        var email = $('form[id="client_form"] #c_email').val().trim();
        var password = $('form[id="client_form"] #c_password').val().trim();
        var confirm_pass = $('form[id="client_form"] #c_con_password').val().trim();

        if (name == '' || email == '' || password == '' || confirm_pass == '') {
            showAlert('Please Fill All Fields');
        } else if (password != confirm_pass) {
            showAlert('Passwords do not match');
        } else if (password.length < 8) {
            showAlert('Password must be at least 8 characters')
        } else {
            console.log("object");
            $.ajax({
                type: "post",
                url: "ajax/register.php",
                data: new FormData(this),
                processData: false, //add this
                contentType: false, //and this
                beforeSend: function() {
                    showAlert('Please wait...')
                },
                success: function(response) {
                    setTimeout(() => {
                        if (response.includes('0')) {
                            showAlert(response.replace('0', ''));
                        } else {
                            showAlert("Account Created Successfully");
                            setTimeout(() => {
                                // window.location.href = 'login.php';
                            }, 2000);
                        }
                    }, 1000);
                }
            });
        }
    });



    $('#employer_form').submit(function(e) {
        e.preventDefault();

        var name = $('form[id="employer_form"] #e_name').val().trim();
        var email = $('form[id="employer_form"] #e_email').val().trim();
        var password = $('form[id="employer_form"] #e_password').val().trim();
        var confirm_pass = $('form[id="employer_form"] #e_con_password').val().trim();

        if (name == '' || email == '' || password == '' || confirm_pass == '') {
            showAlert('Please Fill All Fields');
        } else if (password != confirm_pass) {
            showAlert('Passwords do not match');
        } else if (password.length < 8) {
            showAlert('Password must be at least 8 characters')
        } else {
            console.log("object");
            $.ajax({
                type: "post",
                url: "ajax/register.php",
                data: new FormData(this),
                processData: false, //add this
                contentType: false, //and this
                beforeSend: function() {
                    showAlert('Please wait...');
                },
                success: function(response) {
                    setTimeout(() => {
                        if (response.includes('0')) {
                            showAlert(response.replace('0', ''));
                        } else {
                            showAlert("Account Created Successfully");
                            setTimeout(() => {
                                window.location.href = 'login.php';
                            }, 2000);
                        }
                    }, 1000);
                }
            });
        }
    });
</script>

</body>

</html>