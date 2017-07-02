jQuery(window).on("scroll touchmove", function () {
    jQuery('#mainheader').toggleClass('ridotto', jQuery(document).scrollTop() > 32);
    jQuery('body').toggleClass('ridotto', jQuery(document).scrollTop() > 32);
});

jQuery("#edit-submit-ricerca-responsive").on("click", function () {
   if(jQuery(".ricerca section").is(':visible') && jQuery('.ricerca input').val() != ''){
       jQuery("#edit-submit-ricerca").click();
       jQuery('.ricerca input').val('');
   }
    jQuery(".ricerca section").slideToggle();
});

jQuery('#hamburger-toggle').click(function() {
    jQuery('body,html').animate({scrollTop:0},200);
    jQuery('body').toggleClass('main-menu-opened');
    jQuery('#block-menu-hamburger').toggleClass('active', 1000);
});
jQuery('#hamburger-close').on('click',function(e){
    e.preventDefault();
    jQuery('body').toggleClass('main-menu-opened');
    jQuery('#block-menu-hamburger').toggleClass('active', 1000);
});

jQuery('.accordion-toggle').click(function(){
    jQuery(this).siblings().slideToggle();
    jQuery(this).toggleClass('collapsed');
    jQuery(this).toggleClass('not-collapsed');
    jQuery(this).children().toggleClass('fa-angle-down');
    jQuery(this).children().toggleClass('fa-angle-up');
});