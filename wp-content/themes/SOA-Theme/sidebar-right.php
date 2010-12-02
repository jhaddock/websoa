<div id="col-derecha" class="span-5 last columna">
    <ul class="blog_resume">
        <li class="first"><a href="<?php page_url('blog');?>">What's on? SOA blog</a></li>
        <?php 
            $numItems = count(query_posts('posts_per_page=3'));
            $i = 0;
        ?>
        <?php if (have_posts ()) : while (have_posts ()) : the_post(); ?>
        <li <?php if ($i == $numItems-1): echo("class='last'");endif;?>>
            <p class="post-tit"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
            <p class="post-text"> <?php the_excerpt(); ?> </p>
            <a href="<?php the_permalink() ?>">descubre m&aacute;s</a>
        </li>
        <?php $i++;endwhile; endif;?>
    </ul>
</div><!-- col-derecha -->