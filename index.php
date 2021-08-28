<?php
// Define the database to connect to
// define("DBHOST", "127.0.0.1");
// define("DBNAME", "dblq6l3fsigs8q");
// define("DBUSER", "uqoe6j19hldde");
// define("DBPASS", "jj3(i^k115f1");
?>

<?php include "includes/header.php" ?>

<header>
    <!-- big screen nav -->
    <nav class="navbar navbar-expand-lg" aria-label="Eighth navbar example">
        <div class="container-lg">

            <a class="navbar-brand" href="index.php">
                SeaVee
            </a>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="categories.php">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link join" href="registration.php">Join</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ./big screen nav -->

    <!-- mobnav -->
    <div class="mobile-nav">
        <div id="body-overlay"></div>

        <nav class="real-menu" role="navigation">
            <div class="nav_header">
                <a href="registration.php">Join SeaVi</a>
            </div>
            <ul>
                <li><a href="login.php">Sign in</a></li>
                <li>
                    <button class="dropdown-btn">
                        Browse Categories
                        <i class="fas fa-angle-down"></i>
                    </button>
                    <div class="dropdown-container">
                        <a href="categories.php">Data Scientist</a>
                        <a href="categories.php">App Developer</a>
                        <a href="categories.php">Game Developer</a>
                        <a href="categories.php">UX/UI Designer</a>
                        <a href="categories.php">Book Cover Designer</a>
                        <a href="categories.php">Data Entry Specialist</a>
                        <a href="categories.php">Engineer</a>
                        <a href="categories.php">Lawyer</a>
                        <a href="categories.php">Doctor</a>
                        <a href="categories.php">Social Media Manager</a>
                    </div>
                </li>
                <li><a href="categories.php">Explore</a></li>
            </ul>
            <div class="nav_header">
                <h6>General</h6>
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <!-- <li><a href="javascript:void(0)">About</a></li> -->
            </ul>
        </nav>

        <button id="open-mob-menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>


<!-- carasoul -->
<section id="top_hero">
    <div id="top_carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slide1.png" class="d-block w-100" alt="slide1">
            </div>
            <div class="carousel-item">
                <img src="img/slide2.png" class="d-block w-100" alt="slide2">
            </div>
            <div class="carousel-item">
                <img src="img/slide3.png" class="d-block w-100" alt="slide3">
            </div>
            <div class="carousel-item">
                <img src="img/slide4.png" class="d-block w-100" alt="slide4">
            </div>
            <div class="carousel-item">
                <img src="img/slide5.png" class="d-block w-100" alt="slide5">
            </div>
        </div>
    </div>
    <!-- searchbar -->
    <div class="hero-section">
        <div class="header">
            <h1 class="top-text"><span>Find the perfect <i>candidate</i> for your company</span></h1>
            <div class="search_bar">
                <form action="categories.php" method="POST">
                    <span class="search_icon" style="width: 16px; height: 16px;">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" autocomplete="off" placeholder="Try &quot;graphic designer&quot;" value="">
                    <button>Search</button>
                </form>
            </div>
        </div>
    </div>

</section>

<!-- ad slider -->
<section id="adbar1">
    <div id="top_carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/ads/ad1.png" class="d-block w-100" alt="slide1">
            </div>
            <div class="carousel-item">
                <img src="img/ads/ad2.png" class="d-block w-100" alt="slide2">
            </div>
        </div>
    </div>
</section>

<!-- popular sect -->
<section class="popular-section">
    <div class="container">
        <h2>Popular professional services</h2>
        <div class="row">
            <div class="columns">

                <div class="grid-container">
                    <main class="grid-item main">
                        <div class="popular-items">

                            <div class="category">
                                <div class="sub_category">
                                    <a href="categories.php">
                                        <h4>Software Engineer</h4>
                                        <picture>
                                            <img src="img/category/software_engineer.png" class="img-fluid" alt="">
                                        </picture>
                                    </a>
                                </div>
                            </div>

                            <div class="category">
                                <div class="sub_category">
                                    <a href="categories.php">
                                        <h4>Accountant</h4>
                                        <picture>
                                            <img src="img/category/accountant.png" class="img-fluid" alt="">
                                        </picture>
                                    </a>
                                </div>
                            </div>

                            <div class="category">
                                <div class="sub_category">
                                    <a href="categories.php">
                                        <h4>Teacher</h4>
                                        <picture>
                                            <img src="img/category/teacher.png" class="img-fluid" alt="">
                                        </picture>
                                    </a>
                                </div>
                            </div>

                            <div class="category">
                                <div class="sub_category">
                                    <a href="categories.php">
                                        <h4>Data Scientist</h4>
                                        <picture>
                                            <img src="img/category/data_science.png" class="img-fluid" alt="">
                                        </picture>
                                    </a>
                                </div>
                            </div>

                            <div class="category">
                                <div class="sub_category">
                                    <a href="categories.php">
                                        <h4>App Developer</h4>
                                        <picture>
                                            <img src="img/category/app_development.png" class="img-fluid" alt="">
                                        </picture>
                                    </a>
                                </div>
                            </div>

                            <div class="category">
                                <div class="sub_category">
                                    <a href="categories.php">
                                        <h4>Game Developer</h4>
                                        <picture>
                                            <img src="img/category/game_development.png" class="img-fluid" alt="">
                                        </picture>
                                    </a>
                                </div>
                            </div>

                            <div class="category">
                                <div class="sub_category">
                                    <a href="categories.php">
                                        <h4>UI/UX Designer</h4>
                                        <picture>
                                            <img src="img/category/ui_ux_design.png" class="img-fluid" alt="">
                                        </picture>
                                    </a>
                                </div>
                            </div>

                            <div class="category">
                                <div class="sub_category">
                                    <a href="categories.php">
                                        <h4>Book Cover Designer</h4>
                                        <picture>
                                            <img src="img/category/book_cover.png" class="img-fluid" alt="">
                                        </picture>
                                    </a>
                                </div>
                            </div>

                            <div class="category">
                                <div class="sub_category">
                                    <a href="categories.php">
                                        <h4>Data Entry Specialist</h4>
                                        <picture>
                                            <img src="img/category/data_entry.png" class="img-fluid" alt="">
                                        </picture>
                                    </a>
                                </div>
                            </div>

                            <div class="category">
                                <div class="sub_category">
                                    <a href="categories.php">
                                        <h4>Engineer</h4>
                                        <picture>
                                            <img src="img/category/engineering.png" class="img-fluid" alt="">
                                        </picture>
                                    </a>
                                </div>
                            </div>

                            <div class="category">
                                <div class="sub_category">
                                    <a href="categories.php">
                                        <h4>Lawyer</h4>
                                        <picture>
                                            <img src="img/category/law.png" class="img-fluid" alt="">
                                        </picture>
                                    </a>
                                </div>
                            </div>

                            <div class="category">
                                <div class="sub_category">
                                    <a href="categories.php">
                                        <h4>Doctor</h4>
                                        <picture>
                                            <img src="img/category/medical.png" class="img-fluid" alt="">
                                        </picture>
                                    </a>
                                </div>
                            </div>

                            <div class="category">
                                <div class="sub_category">
                                    <a href="categories.php">
                                        <h4>Social Media Manager</h4>
                                        <picture>
                                            <img src="img/category/social_media_manage.png" class="img-fluid" alt="">
                                        </picture>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="arrow-thumbs">
                            <button class="arrow left popular-arrow">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="arrow right popular-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>

                    </main>
                </div>


            </div>
        </div>
    </div>
</section>

<?php include "includes/footer.php" ?>

<script>
    // ad slideshow
    $("#slideshow > div:gt(0)").hide();

    setInterval(function() {
        $('#slideshow > div:first')
            .fadeOut(1000)
            .next()
            .fadeIn(1000)
            .end()
            .appendTo('#slideshow');
    }, 3000);

    // popular slides
    (function() {
        function next_prev_btns(btn_id, items_id) {
            $("." + btn_id).click(function() {
                var box = $("." + items_id),
                    x;
                if ($(this).hasClass("right")) {
                    x = ((box.width() / 2)) + box.scrollLeft();
                    box.animate({
                        scrollLeft: x,
                    })
                } else {
                    x = ((box.width() / 2)) - box.scrollLeft();
                    box.animate({
                        scrollLeft: -x,
                    })
                }
            });
        };

        function slide_grab_scroll(items_id) {
            const slider = document.querySelector('.' + items_id);
            let isDown = false;
            let startX;
            let scrollLeft;

            slider.addEventListener('mousedown', (e) => {
                isDown = true;
                slider.classList.add('active');
                startX = e.pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
            });
            slider.addEventListener('mouseleave', () => {
                isDown = false;
                slider.classList.remove('active');
            });
            slider.addEventListener('mouseup', () => {
                isDown = false;
                slider.classList.remove('active');
            });
            slider.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                const walk = (x - startX) * 3; //scroll-fast
                slider.scrollLeft = scrollLeft - walk;
            });
        }

        next_prev_btns("popular-arrow", "popular-items");
        slide_grab_scroll("popular-items");
    })();

    function auto_slides(items_id) {
        var box = $("." + items_id),
            x;
        var x = ((box.width() / 2)) + box.scrollLeft();
        box.animate({
            scrollLeft: x,
        });
    };

    setInterval(() => {
        setTimeout(() => {
            // auto_slides("popular-items");
        }, 500);
    }, 5000);
</script>

</body>

</html>