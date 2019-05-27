jQuery(window).scroll(function () {
    var tickerHeight = jQuery('#ticker').outerHeight();
    var hT = jQuery('#scroll-to').offset().top,
    hH = jQuery('#scroll-to').outerHeight(),
    wH = jQuery(window).height(),
    wS = jQuery(this).scrollTop();
    if (wS > (hT-wH+tickerHeight)){
       jQuery('.ticker').removeClass('fixed');
        jQuery('.ticker').addClass('bottom');
    } else {
        jQuery('.ticker').addClass('fixed');
         jQuery('.ticker').removeClass('bottom');
    }
});
var timing = 3000;
jQuery('#studiescarousel').carousel({ interval: timing, cycle: true });
