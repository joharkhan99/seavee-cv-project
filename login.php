<?php include "includes/header.php" ?>

<?php include "includes/nav.php" ?>


<!-- login/signup -->
<section id="registration">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-candidate" role="tabpanel" aria-labelledby="candidate_pill">
            <div class="row">
              <div class="col-md-5 mx-auto">
                <form id="login_form">
                  <div class="form-floating mb-2">

                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    <label for="email">Email</label>
                  </div>
                  <div class="form-floating mb-2">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                  </div>

                  <input type="hidden" name="login" value="<?php echo uniqid() ?>">
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                  <span class="or">OR</span>
                  <a href="registration.php" class="login_btn w-100 btn btn-lg btn-primary">Sign Up</a>

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
  $('#login_form').submit(function(e) {
    e.preventDefault();

    var email = $('form[id="login_form"] #email').val().trim();
    var password = $('form[id="login_form"] #password').val().trim();

    if (email == '' || password == '') {
      showAlert('error', 'Please Fill All Fields')
    } else {
      $.ajax({
        type: "post",
        url: "ajax/login.php",
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
              window.location.href = 'dashboard/';
            }
          }, 1000);
        }
      });
    }
  });
</script>

</body>

</html>