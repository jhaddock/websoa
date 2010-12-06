$(document).ready(function(){
    var soa = $.extend({}, {
        init_gallery : function(){
            if(!soa.gallery_initialized){
                $('.soa-gallery ul img').live('click',function(){
                    var href = $(this).attr('data-orignal-image-url');
                    var JQsoa_gallery_show = $(this).parents('.soa-gallery').next('.soa-gallery-show');
                    JQsoa_gallery_show.attr('src', href);
                    return false;
                });

                $('.soa-gallery').each(function(){
                    var btnPrevID = '#' + $(this).attr('data-btnprev');
                    var btnNextID = '#' + $(this).attr('data-btnnext');
                    $(this).jCarouselLite({
                        visible:4,
                        circular:true,
                        btnPrev:btnPrevID,
                        btnNext:btnNextID
                    });
                });
                soa.gallery_initialized = true;
            }

        },
        gallery_initialized : false
    });
});
