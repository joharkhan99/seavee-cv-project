<?php session_start(); ?>
<?php include "includes/header.php" ?>

<?php include "includes/nav.php" ?>

<!-- filters -->
<section id="filter_section">
    <div class="container">

        <!-- search form -->
        <div class="row filter_search_form">
            <div class="col-md-6 mx-auto">
                <form method="POST" id="search_form">
                    <div class="row">
                        <div class="col">
                            <span class="search_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </span>
                            <input type="text" name="search_query" class="form-control" id="search_query" aria-describedby="search" placeholder="Find People">
                            <button class="search_submit_btn" id="search_submit_btn">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- search form -->

        <div class="row">

            <!-- ------------------------------------------------Left filters -->
            <div class="col-md-3 left_side">
                <!-- <div class="filters_container">

                    <div class="filter">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" data-bs-toggle="collapse" data-bs-target="#filter1" aria-expanded="false" aria-controls="filter1">
                                    Category <i class="fas fa-angle-down"></i>
                                </button>
                                <div class="collapse" id="filter1">
                                    <div class="filter-body">

                                        <form action="">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="software_eng">
                                                <label class="form-check-label" for="software_eng">
                                                    Software Engineer
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="doctor">
                                                <label class="form-check-label" for="doctor">
                                                    Doctor
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lawyer">
                                                <label class="form-check-label" for="lawyer">
                                                    Lawyer
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="game_dev">
                                                <label class="form-check-label" for="game_dev">
                                                    Game Developer
                                                </label>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="filter">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" data-bs-toggle="collapse" data-bs-target="#filter2" aria-expanded="false" aria-controls="filter2">
                                    Salary Range <i class="fas fa-angle-down"></i>
                                </button>
                                <div class="collapse" id="filter2">
                                    <div class="filter-body">

                                        <form action="">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="sr1">
                                                <label class="form-check-label" for="sr1">
                                                    $100,000+
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="sr2">
                                                <label class="form-check-label" for="sr2">
                                                    $100,000 - $90,000
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="sr3">
                                                <label class="form-check-label" for="sr3">
                                                    $90,000 - $80,000
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="sr4">
                                                <label class="form-check-label" for="sr4">
                                                    $80,000 - $70,000
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="sr5">
                                                <label class="form-check-label" for="sr5">
                                                    $70,000 - $60,000
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="sr6">
                                                <label class="form-check-label" for="sr6">
                                                    $60,000 - $50,000
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="sr7">
                                                <label class="form-check-label" for="sr7">
                                                    $50,000 - $40,000
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="sr8">
                                                <label class="form-check-label" for="sr8">
                                                    $40,000 - $30,000
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="sr9">
                                                <label class="form-check-label" for="sr9">
                                                    $30,000 - $20,000
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="sr10">
                                                <label class="form-check-label" for="sr10">
                                                    $20,000 - $10,000
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="sr11">
                                                <label class="form-check-label" for="sr11">
                                                    $10,000 - $5,000
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="sr12">
                                                <label class="form-check-label" for="sr12">
                                                    $5,000 - $1,000
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="sr13">
                                                <label class="form-check-label" for="sr13">
                                                    $1,000 - $10
                                                </label>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="filter">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" data-bs-toggle="collapse" data-bs-target="#filter3" aria-expanded="false" aria-controls="filter3">
                                    Category <i class="fas fa-angle-down"></i>
                                </button>
                                <div class="collapse" id="filter3">
                                    <div class="filter-body">

                                        <form action="">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="software_eng">
                                                <label class="form-check-label" for="software_eng">
                                                    Software Engineer
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="doctor">
                                                <label class="form-check-label" for="doctor">
                                                    Doctor
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lawyer">
                                                <label class="form-check-label" for="lawyer">
                                                    Lawyer
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="game_dev">
                                                <label class="form-check-label" for="game_dev">
                                                    Game Developer
                                                </label>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> -->
            </div>
            <!-- ./------------------------------------------------Left filters -->

            <!-- --------------------------------------------------right filters result -->
            <div class="col-md-9 right_side">
                <div class="sort_res">
                    <!-- <div class="total_results">
                        Search results: 3
                    </div> -->
                    <!-- <div class="sort">
                        <div class="dropdown">
                            <button type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Sort By <i class="fas fa-sort-down"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><button class="dropdown-item"><i class="fas fa-sort-amount-up"></i>Rating Ascending</button></li>
                                <li><button class="dropdown-item"><i class="fas fa-sort-amount-down"></i>Rating Descending</button></li>
                                <li><button class="dropdown-item"><i class="fas fa-sort-amount-up"></i>Salary Ascending</button></li>
                                <li><button class="dropdown-item"><i class="fas fa-sort-amount-down"></i>Salary Descending</button></li>
                                <li><button class="dropdown-item"><i class="fas fa-sort-amount-up"></i>Experience Ascending</button></li>
                                <li><button class="dropdown-item"><i class="fas fa-sort-amount-down"></i>Experience Descending</button></li>
                            </ul>
                        </div>
                    </div> -->
                </div>

                <div class="cards_container">

                </div>
            </div>
            <!-- ./--------------------------------------------------right filters result -->

        </div>

    </div>
</section>
<!-- ./filters -->

<?php include "includes/footer.php" ?>

<script>
    // heart
    $(".add_to_fav button i").click(function() {
        if ($(this).hasClass('far')) {
            $(this).removeClass('far');
            $(this).addClass('fas');
        } else {
            $(this).removeClass('fas');
            $(this).addClass('far');
        }
    });

    $("#search_form").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "ajax/fav.php",
            type: 'POST',
            data: formData,
            beforeSend: function() {
                showAlert('Please wait...');
            },
            success: function(data) {
                $(".cards_container").html(data);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>

</body>

</html>