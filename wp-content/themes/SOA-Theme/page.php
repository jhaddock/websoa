<?php get_header(); ?>
<?php get_sidebar('left'); ?>
<?php include (TEMPLATEPATH . '/col-centro-header.php'); ?>




<?php if (have_posts ()) : while (have_posts ()) : the_post(); ?>
<?php $html_class = get_post_custom_values('html_class'); ?>
    <div class="<?php echo($html_class[0]) ?>">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
<?php endwhile; endif; ?>




<?php include (TEMPLATEPATH . '/col-centro-footer.php'); ?>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>