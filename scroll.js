var left = document.getElementById("hhh");
var stop = (left.offsetTop + 110);

window.onscroll = function (e) {
    var scrollTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
    console.log(scrollTop, left.offsetTop);
    // left.offsetTop;

    if (scrollTop >= stop) {
        left.className = 'hhh stick';
    } else {
        left.className = 'hhh';
    }

}