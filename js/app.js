// heart
$(".add_to_fav button i").click(function () {
    if ($(this).hasClass('far')) {
        $(this).removeClass('far');
        $(this).addClass('fas');
    } else {
        $(this).removeClass('fas');
        $(this).addClass('far');
    }
});

// scroll nav
$(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 40) {
        $("header").addClass("scrolling");
    } else {
        $("header").removeClass("scrolling");
    }
});

// mob nav
function hasClass(ele, cls) {
    return !!ele.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)'));
}

function addClass(ele, cls) {
    if (!hasClass(ele, cls)) ele.className += " " + cls;
}

function removeClass(ele, cls) {
    if (hasClass(ele, cls)) {
        var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');
        ele.className = ele.className.replace(reg, ' ');
    }
}

function init() {
    document.getElementById("open-mob-menu").addEventListener("click", toggleMenu);
    document.getElementById("body-overlay").addEventListener("click", toggleMenu);
}

function toggleMenu() {
    var ele = document.getElementsByTagName('body')[0];
    if (!hasClass(ele, "open-mob-menu")) {
        addClass(ele, "open-mob-menu");
    } else {
        removeClass(ele, "open-mob-menu");
    }
}
document.addEventListener('readystatechange', function () {
    if (document.readyState === "complete") {
        init();
    }
});

// ad slideshow
$("#slideshow > div:gt(0)").hide();

setInterval(function () {
    $('#slideshow > div:first')
        .fadeOut(1000)
        .next()
        .fadeIn(1000)
        .end()
        .appendTo('#slideshow');
}, 3000);


// popular slides
(function () {
    function next_prev_btns(btn_id, items_id) {
        $("." + btn_id).click(function () {
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

// navbar sidebar
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
            $(".dropdown-btn i").css("transform", "rotate(0deg)")
        } else {
            dropdownContent.style.display = "block";
            $(".dropdown-btn i").css({ "transform": "rotate(-180deg)", "padding-bottom": "5px" });
        }
    });
};