<?php get_header(); ?>
<?php get_sidebar('left'); ?>
<?php include (TEMPLATEPATH . '/col-centro-header.php'); ?>



<div class="blog">
    <ul id="posts">

        <?php if (have_posts ()) : while (have_posts ()) : the_post(); ?>
            <li <?php post_class("post") ?> id="post-<?php the_ID(); ?>">
                <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
                <h2><?php the_time('F jS, Y') ?></h2>
                <?php the_content(); ?>
<!--                <div class="imagenes">
                    <ul>
                        <li><img src="images/blog-foto-peque.png"/></li>
                        <li><img src="images/blog-foto-peque.png"/></li>
                        <li><img src="images/blog-foto-peque.png"/></li>
                        <li><img src="images/blog-foto-peque.png"/></li>
                    </ul>
                    <img src="images/blog-foto-grand.png"/>
                </div>-->

                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style ">
                    <a href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4cf0fabc7e891907" class="addthis_button_compact">Share</a>
                </div>
                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4cf0fabc7e891907"></script>
                <!-- AddThis Button END -->
                <div class="hr blogseparator"></div>
            </li>
        <?php endwhile; ?>
        <?php //include (TEMPLATEPATH . '/inc/nav.php' ); ?>
        <?php else : ?>
                    <h2>Not Found</h2>
        <?php endif; ?>
                </ul>
            </div>


<?php include (TEMPLATEPATH . '/col-centro-footer.php'); ?>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>
	<script type='text/javascript' src='<?php echo(bloginfo('stylesheet_directory').'/javascripts/jcarousellite1.0.1.js'); ?>'></script>

<script type='text/javascript'>
$(document).ready(function(){
   $(".soa-gallery ul img").click(function(){
       var href = $(this).attr('data-orignal-image-url');
       console.log($(this).data())
       console.log(href)
       var $soa_gallery_show = $(this).parents('.soa-gallery').next('.soa-gallery-show');
       console.log($soa_gallery_show)
       $soa_gallery_show.attr('src', href);
       return false;
   });

//   $("#soa-gallery-1").jCarouselLite({visible:4, circular:false, btnPrev:'.gallery-prev',btnNext:'.gallery-next' });

});
</script>