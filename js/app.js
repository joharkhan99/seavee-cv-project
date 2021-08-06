// scroll nav
$(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
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
document.addEventListener('readystatechange', function() {
    if (document.readyState === "complete") {
        init();
    }
});