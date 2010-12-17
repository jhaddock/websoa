<?php get_header(); ?>
<?php get_sidebar('left'); ?>
<?php include (TEMPLATEPATH . '/col-centro-header.php'); ?>

<div class="goodlista">

<?php if (have_posts ()) : ?>
    <h1>Good staff: Azafatas con idiomas</h1>
    <ul id="azafatas">
    <?php while (have_posts ()) : the_post(); ?>
    <?php
        $height =    simple_fields_get_post_value(get_the_id(), array(1, 1), true);
        $languages = simple_fields_get_post_value(get_the_id(), array(1, 2), true);
        $img1 =      simple_fields_get_post_value(get_the_id(), array(1, 3), true);
        $img2 =      simple_fields_get_post_value(get_the_id(), array(1, 4), true);
    ?>
        <li class="azafata clearfix">
            <!--<div class="pequena"><img src="<?php echo wp_get_attachment_url($img1) ?>"/></div> //-->
            <!--<div class="grande"> <img src="<?php echo wp_get_attachment_url($img2) ?>"/></div> //-->
            <div class="pequena">
                <a href="<?php echo wp_get_attachment_url($img1) ?>" title="<?php the_title(); ?>" class="lightbox">
                    <img src="<?php echo wp_get_attachment_thumb_url($img1) ?>"/>
                </a>
            </div>
            <div class="grande">
                <a href="<?php echo wp_get_attachment_url($img2) ?>" title="<?php the_title(); ?>" class="lightbox">
                    <img src="<?php echo wp_get_attachment_thumb_url($img2) ?>"/>
                </a>
            </div>
            <!--<div class="grande"><img src="<?php echo wp_get_attachment_thumb_url($img2) ?>"/></div> //-->
            <ul class="descripcion">
              <li><h2><?php the_title(); ?></h2></li>
              <li><?php echo $languages ?></li>
              <li><em>Altura:</em> <?php echo $height ?></li>
            </ul>
        </li>
    <?php endwhile; ?>
    </ul><!-- #azafatas //-->
    <script type="text/javascript">
        $(function() { $('a.lightbox').lightBox();});
    </script>
    <?php //include (TEMPLATEPATH . '/inc/nav.php' ); ?>
<?php else : ?>
    <h2>Empty Category</h2>
<?php endif; ?>


</div>

<?php include (TEMPLATEPATH . '/col-centro-footer.php'); ?>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>

