<div id="col-derecha" class="span-5 last columna">

    <ul class="archive by_year">
    <?php
    /**/
    $years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date DESC");
    foreach($years as $year) :
    ?>
            <li class="first">Eventos:</li>
            <li><a href="<?php echo get_year_link($year); ?> "><?php echo $year; ?></a>

                    <ul class="by_month">
                    <?	$months = $wpdb->get_col("SELECT DISTINCT MONTH(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' AND YEAR(post_date) = '".$year."' ORDER BY post_date DESC");
                            foreach($months as $month) :
                            ?>
                            <li><a href="<?php echo get_month_link($year, $month); ?>"><?php echo date( 'F', mktime(0, 0, 0, $month) );?></a>
                                    <!--
                                    <ul class="by_day">
                                    <?	$days = $wpdb->get_col("SELECT DISTINCT DAY(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' AND MONTH(post_date) = '".$month."' AND YEAR(post_date) = '".$year."' ORDER BY post_date DESC");
                                            foreach($days as $day) :
                                            ?>
                                            <li><a href="<?php echo get_day_link($year, $month, $day); ?>"><?php echo $day;?></a></li>
                                            <?php endforeach;?>
                                    </ul>
                                    //-->

                            </li>
                            <?php endforeach;?>
                    </ul>
            </li>
    <?php endforeach; ?>
    </ul>

    <ul class="wp-categories">
        <li class="first">Categorías:</li>
        <?php wp_list_categories(array('title_li'=> '', 'exclude' => '1')); ?>
    </ul>

    <?php

        $mytags = wp_tag_cloud("format=array");
        $size = sizeof($mytags);
        $count = 0;
    if (!empty($mytags)) :
    ?>
    <ul class="tags" class="clearfix">
        <li class="first">Tags:</li>
        <?php foreach ($mytags as $tag) { ?>
            <li><?php echo $tag?></li>
        <?php } ?>
    </ul>
    <?php endif;?>


</div><!-- col-derecha -->