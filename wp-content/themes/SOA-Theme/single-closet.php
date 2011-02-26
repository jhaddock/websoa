<?php get_header(); ?>
<?php get_sidebar('left'); ?>
<?php include (TEMPLATEPATH . '/col-centro-header.php'); ?>

<div class="uniformesopciones">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="enlace clearfix">
        <h1>Uniformes: <?php the_title(); ?></h1>
    </div>
    <?php the_content(); ?>
    <ul class="clearfix">
    <?php
    $uniformes = simple_fields_get_post_group_values(get_the_id(), 2, false, 2);
    foreach ($uniformes as $uniforme) {
        $img = $uniforme[2];
        $pie = $uniforme[1];
    ?>
        <li>
            <a href='<?php echo wp_get_attachment_url($img) ?>' title="<?php echo $pie ?>" class='lightbox'><?php echo wp_get_attachment_image($img, $size='medium') ?></a>
            <a href='#'><?php echo $pie ?></a>
        </li>
    <?php } ?>
    </ul>


<?php endwhile; endif; ?>

</div>
<script type="text/javascript">
        $(function() { $('a.lightbox').lightBox();});
    </script>

<?php include (TEMPLATEPATH . '/col-centro-footer.php'); ?>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>

