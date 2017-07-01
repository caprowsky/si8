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