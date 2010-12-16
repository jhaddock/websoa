<div id="col-derecha" class="span-5 last columna">
    <ul class="wp-categories">
        <li class="first">Cotegorías:</li>
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