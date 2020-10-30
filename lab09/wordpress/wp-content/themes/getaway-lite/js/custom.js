jQuery('.hellotext span:gt(0)').hide();
setInterval(function(){
    jQuery('.hellotext span:first-child').fadeOut('fast')
     .next('span').fadeIn('fast')
     .end().appendTo('.hellotext');},
200);

jQuery(window).scroll( function() {
        if ( jQuery(window).scrollTop() > 10 ) {
           jQuery('#header, .nav-bars').addClass('faded');
    } else {
        jQuery('#header, .nav-bars').removeClass('faded');
    }

    if ( jQuery(window).scrollTop() > 15 ) {
       jQuery('#header, .nav-bars').addClass('display');
} else {
    jQuery('#header, .nav-bars').removeClass('display');
}
});
