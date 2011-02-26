<!--This file has to be identical to page-armario-->
<?php get_header(); ?>
<?php get_sidebar('left'); ?>
<?php include (TEMPLATEPATH . '/col-centro-header.php'); ?>

<div class="uniformesopciones">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="enlace clearfix">
        <h1>Uniforms</h1>
    </div>
    <?php the_content(); ?>
    <ul class="clearfix">
    <?php
    $args = array( 'post_type' => 'armario');
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    ?>
    <li>
        <?php if ( has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
        <?php endif; ?>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </li>
    <?php endwhile; ?>
    </ul>

    <?php endwhile; endif; ?>
</div>

<?php include (TEMPLATEPATH . '/col-centro-footer.php'); ?>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>

