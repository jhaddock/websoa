<?php get_header(); ?>
<?php get_sidebar('left'); ?>



<div id="col-centro" class="span-11 columna">
    <div class="header span-11 last">
        <ul>
            <li><a href="#esp"><img src="<?php soa_image('flag-esp.png') ?>"/> ESP</a><br/></li>
            <li><a href="#eng"><img src="<?php soa_image('flag-eng.png') ?>"/> ENG</a></li>
        </ul>
        <div class="hr fatline"></div>
        <ul class="menu">
            <li><a href="#">Azafatas</a> / </li>
            <li><a href="#">Modelos</a> / </li>
            <li><a href="#">Conductores</a> / </li>
            <li><a href="#">Otros</a></li>
        </ul>
    </div><!-- header -->

    <div class="contents span-11 last">
        <?php if (have_posts ()) : while (have_posts ()) : the_post(); ?>
             <?php $html_class = get_post_custom_values('html_class'); ?>
             <div class="<?php echo($html_class[0]) ?>">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
             </div>
        <?php endwhile; endif; ?>


            <div class="footer">
                <div class="hr thinline"></div>
                <p>Julian Romea 5, entreplanta D. 28003 Madrid. info@soastaff.com <em>Tel +34 915 357 651</em></p>
            </div>
        </div><!-- contents -->
    </div><!-- col_centro -->






<?php get_sidebar('right'); ?>
<?php get_footer(); ?>






