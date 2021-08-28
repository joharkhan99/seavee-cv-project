<?php session_start(); ?>
<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>
<?php include "ajax/db.php" ?>

<?php

if (isset($_GET['profile_id'])) {
    $profile_id = $_GET['profile_id'];

    $query = mysqli_query($connection, "SELECT * FROM users INNER JOIN personal_info ON users.userkey=personal_info.userkey INNER JOIN profession_info ON users.userkey=profession_info.userkey INNER JOIN about ON users.userkey=about.userkey INNER JOIN skills ON users.userkey=skills.userkey INNER JOIn cvs ON users.userkey=cvs.userkey INNER JOIN social_info ON users.userkey=social_info.userkey WHERE users.userkey='$profile_id'");

    if (mysqli_num_rows($query) <= 0) {
        echo "<h3 style='text-align:center;padding-top:100px'>Sorry Nothing Found Here!</h3>";
    } else {


        $info = mysqli_fetch_assoc($query);

        $query3 = mysqli_query($connection, "SELECT * FROM reviews WHERE userkey='$profile_id'");

        $stars = 0;
        while ($reviews = mysqli_fetch_assoc($query3)) {
            $stars += $reviews['rating'];
        }
        $stars = $stars / mysqli_num_rows($query3);
?>

        <!-- profile -->
        <section id="profile">
            <div class="container">

                <div class="cv_bio">
                    <div class="row _left">

                        <div class="col-md-3">
                            <div class="u-image">
                                <label>
                                    <?php $image_arr = explode('../', $info['image']); ?>
                                    <img src="<?php echo $image_arr[2]; ?>" alt="<?php echo $info['name'] ?>">
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h1 class="name"><?php echo ucwords($info['name']) ?></h1>
                            <div class="designation"><?php echo ucwords(str_replace("_", " ", $info['category'])) ?></div>
                            <div class="rating">
                                <?php
                                $s = (int)$stars;
                                for ($j = 0; $j < 5; $j++) {
                                    $_g = "";
                                    if ($j < $s) {
                                        $_g = "_g";
                                    }
                                ?>
                                    <i class="fas fa-star <?php echo $_g ?>"></i>
                                <?php } ?>

                            </div>
                            <div class="profile_btns">
                                <button class="contact_btn">Contact</button>
                                <input style="position: absolute; z-index: -999; opacity: 0;" id="copy_email" name="copy_email" class="copy_email" value="<?php echo $info['email'] ?>">
                                <a href="resumes/<?php echo $info['cv'] ?>" class="resume_btn" target="_blank">Resume</a>
                            </div>
                        </div>

                        <div class="col-md-5 bio_details">
                            <div class="_left">
                                <span>Age</span>
                                <span>Location</span>
                                <span>Years experience</span>
                                <span>Salary Range</span>
                            </div>
                            <div class="_right">
                                <?php
                                $birthDate = date('m/d/Y', strtotime($info['dob']));

                                $birthDate = explode("/", $birthDate);
                                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                                    ? ((date("Y") - $birthDate[2]) - 1)
                                    : (date("Y") - $birthDate[2]));
                                ?>


                                <span><?php echo $age; ?> Year(s)</span>
                                <span><?php echo ucfirst($info['city']) . ', ' . ucfirst($info['country']) ?></span>
                                <span><?php echo $info['experience'] ?></span>
                                <span><?php echo $info['salary_range'] ?></span>
                            </div>

                            <div class="row socials mx-auto w-100">
                                <div class="col-md-12 text-center">
                                    <div>

                                        <?php if (!empty($info['linkedin'])) : ?>
                                            <a href="<?php echo $info['linkedin'] ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        <?php endif; ?>
                                        <?php if (!empty($info['twitter'])) : ?>
                                            <a href="<?php echo $info['twitter'] ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <?php endif; ?>
                                        <?php if (!empty($info['facebook'])) : ?>
                                            <a href="<?php echo $info['facebook'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <?php endif; ?>
                                        <?php if (!empty($info['insta'])) : ?>
                                            <a href="<?php echo $info['insta'] ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                        <?php endif; ?>
                                        <?php if (!empty($info['git'])) : ?>
                                            <a href="<?php echo $info['git'] ?>" target="_blank"><i class="fab fa-github"></i></a>
                                        <?php endif; ?>
                                        <?php if (!empty($info['dribble'])) : ?>
                                            <a href="<?php echo $info['dribble'] ?>" target="_blank"><i class="fab fa-dribbble"></i></a>
                                        <?php endif; ?>
                                        <?php if (!empty($info['behance'])) : ?>
                                            <a href="<?php echo $info['behance'] ?>" target="_blank"><i class="fab fa-behance"></i></a>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="profile_details">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about">

                                <div class="description">
                                    <h5>ABOUT</h5>
                                    <p>
                                        <?php echo $info['long_desc'] ?>
                                    </p>
                                </div>

                                <div class="skills">
                                    <h5>SKILLS</h5>
                                    <div>
                                        <?php
                                        $skills = $info['skills'];
                                        $skill_arr = explode(",", $skills);
                                        for ($i = 0; $i < count($skill_arr) - 1; $i++) {
                                        ?>
                                            <span><?php echo $skill_arr[$i] ?></span>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="langs">
                                    <h5>LANGUAGES</h5>
                                    <div>
                                        <?php
                                        $languages = $info['languages'];
                                        $lang_arr = explode(",", $languages);
                                        for ($i = 0; $i < count($lang_arr) - 1; $i++) {
                                        ?>
                                            <span><?php echo $lang_arr[$i] ?></span>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="profile_details profile_education">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>EDUCATION</h5>

                            <div class="row mt-4">

                                <?php
                                $query2 = mysqli_query($connection, "SELECT * FROM education_info WHERE userkey='$profile_id'");
                                while ($row = mysqli_fetch_assoc($query2)) :
                                ?>

                                    <div class="col-md-4">
                                        <h6><span><?php echo $row['degree'] ?></span> <?php echo $row['field_of_study'] ?></h6>
                                        <div class="uni"><?php echo $row['institute'] ?></div>
                                        <div class="date"><i class="far fa-calendar-alt"></i> <?php echo $row['from_date'] ?> - <?php echo !empty($row['to_date']) ? $row['to_date'] : 'ongoing' ?></div>
                                    </div>

                                <?php endwhile; ?>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="reviews">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>REVIEWS (<?php echo mysqli_num_rows($query3) ?>)</h5>

                            <div class="review_container">


                                <?php
                                function humanTiming($time)
                                {

                                    $time = time() - $time; // to get the time since that moment
                                    $time = ($time < 1) ? 1 : $time;
                                    $tokens = array(
                                        31536000 => 'year',
                                        2592000 => 'month',
                                        604800 => 'week',
                                        86400 => 'day',
                                        3600 => 'hour',
                                        60 => 'minute',
                                        1 => 'second'
                                    );

                                    foreach ($tokens as $unit => $text) {
                                        if ($time < $unit) continue;
                                        $numberOfUnits = floor($time / $unit);
                                        return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
                                    }
                                }

                                $query3 = mysqli_query($connection, "SELECT * FROM reviews INNER JOIN users ON users.userkey=reviews.employerkey INNER JOIN employee_info ON reviews.employerkey=employee_info.employerkey WHERE reviews.userkey='$profile_id'");

                                while ($reviews = mysqli_fetch_assoc($query3)) :
                                ?>
                                    <div class="row user_review">
                                        <div class="col-md-12">
                                            <div class="img">
                                                <label>
                                                    <?php $image_arr = explode('../', $reviews['image']); ?>
                                                    <img src="<?php echo $image_arr[2] ?>" alt="">
                                                </label>
                                            </div>
                                            <div class="detail">
                                                <div class="name"><?php echo ucwords($reviews['name']) ?></div>
                                                <div class="comp_name"><?php echo ucwords($reviews['company']) ?></div>
                                                <div class="rating">

                                                    <?php for ($j = 0; $j < 5; $j++) {
                                                        $_g = "";
                                                        if (!empty($reviews['rating']) && $j < $reviews["rating"]) {
                                                            $_g = "_g";
                                                        }
                                                    ?>

                                                        <i class="fas fa-star <?php echo $_g ?>"></i>
                                                    <?php } ?>

                                                </div>
                                                <div class="time">
                                                    <?php
                                                    echo humanTiming(strtotime($reviews['created_at']));
                                                    ?> ago
                                                </div>
                                            </div>
                                            <p class="content">
                                                <?php echo $reviews['text'] ?>
                                            </p>

                                        </div>
                                    </div>

                                <?php endwhile; ?>

                            </div>

                        </div>
                    </div>
                </div>

                <?php if ($_SESSION['role'] == 'employer') : ?>
                    <div class="reviews leave__rev">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>LEAVE A REVIEW</h5>
                                <form method="POST" id="review_form" name="review_form">
                                    <textarea name="review_textarea" id="review_textarea" cols="30" rows="10" class="form-control review_textarea" placeholder="write your review"></textarea>

                                    <div class="stars_rating">
                                        <h6>Rating</h6>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="review_rating" id="rat_1" value="1">
                                            <label class="form-check-label" for="rat_1">
                                                <i class="fas fa-star"></i>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="review_rating" id="rat_2" value="2">
                                            <label class="form-check-label" for="rat_2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="review_rating" id="rat_3" value="3">
                                            <label class="form-check-label" for="rat_3">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="review_rating" id="rat_4" value="4">
                                            <label class="form-check-label" for="rat_4">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="review_rating" id="rat_5" value="5">
                                            <label class="form-check-label" for="rat_5">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="review_form_scrt" id="review_form_scrt">
                                    <input type="hidden" name="profile_id" id="profile_id" value="<?php echo $profile_id ?>">

                                    <button type="submit">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>


            </div>
        </section>
        <!-- ./profile -->
<?php
    }
} else {
    echo "<h3 style='text-align:center;padding-top:100px'>Sorry Nothing Found Here!</h3>";
}
?>

<?php include "includes/footer.php" ?>

<script>
    $('.contact_btn').click(function() {
        $(this).siblings('input.copy_email').select();
        document.execCommand("copy");
        showAlert("Email copied!");
    });


    // $(".contact_btn").on("click", function() {
    //     // var val = $(".contact_btn");

    //     var $temp = $(".contact_btn");
    //     $("body").append($temp);
    //     $temp.val($(element).text()).select();
    //     document.execCommand("copy");
    //     $temp.remove();


    //     // val.select();
    //     // val.setSelectionRange(0, 99999);
    //     // navigator.clipboard.writeText(val.value);
    //     // alert("Copied the text: " + val.value);


    // });

    $("#review_form").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "ajax/save_rev.php",
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
                        $("#profile").load(" #profile > *");
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