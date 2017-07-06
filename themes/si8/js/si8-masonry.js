//inizializzazione masonry

if(jQuery("body.path-frontpage").length == 0){
    jQuery(document).ready(function(){
        //box primi livelli
        jQuery('.field--items>div').attr('style','');
        jQuery('.field--items').masonry({
            itemSelector: '.field--items>div'
        });
        //video
        jQuery('body.path-video .griglia>div').attr('style','');
        jQuery('body.path-video .griglia').masonry({
            itemSelector: '.griglia>div'
        });
    });
}
//elementi in home
else {
    jQuery(document).ready(function(){
        setTimeout(function(){
            //notizie
            jQuery('body.path-frontpage .paragraph--type--notizie-in-evidenza .field--items>div').attr('style','');
            jQuery('body.path-frontpage .paragraph--type--notizie-in-evidenza .field--items').masonry({
                itemSelector: '.field--items>div'
        });
        },1500);
    });
}