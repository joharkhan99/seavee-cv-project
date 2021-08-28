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

// alerts
const hideAlert = () => {
    const el = document.querySelector('.cust_alert');
    if (el)
        el.parentElement.removeChild(el);
};
const showAlert = (msg, time = 3) => {
    hideAlert();
    const markup = `<div class="cust_alert">${msg}</div>`;
    document.querySelector('body').insertAdjacentHTML('afterbegin', markup);
    window.setTimeout(hideAlert, time * 1000);
};