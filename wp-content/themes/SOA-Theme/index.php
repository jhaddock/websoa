<?php get_header(); ?>
<?php get_sidebar('left'); ?>



<div id="col-centro" class="span-11 columna">
    <?php include (TEMPLATEPATH . '/col-centro-header.php'); ?>

    <div class="contents span-11 last">
        <?php if (have_posts ()) : while (have_posts ()) : $post = the_post(); ?>
            <?php if(is_page($post)) : ?>
                <?php $html_class = get_post_custom_values('html_class'); ?>
                <div class="<?php echo($html_class[0]) ?>">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
            
            <?php else: ?>
                <?php echo get_post_type($post) ?>

                es un bloooog!!
            <?php endif;?>
                <br/>
                <strong><?php if (get_post_type($post)){echo "lalal";}else{echo "get_post => false";}?></strong><br/>
                <strong><?php if (is_single($post)) {echo "es single_post";} else {echo "NO es sigle_post";}?></strong>
        <?php endwhile;endif; ?>
        <?php include (TEMPLATEPATH . '/col-centro-footer.php'); ?>
    </div><!-- contents -->
</div><!-- col_centro -->


<?php get_sidebar('right'); ?>
<?php get_footer(); ?>






