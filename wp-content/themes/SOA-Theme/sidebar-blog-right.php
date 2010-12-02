<div id="col-derecha" class="span-5 last columna">
    <ul class="wp-categories">
        <li class="first">Cotegorías:</li>
        <?php wp_list_categories(array('title_li'=> '', 'exclude' => '1')); ?>
    </ul>
    <ul class="tags-header"><li class="first">Tags:</li></ul>
    <?php wp_tag_cloud(array('format' => 'list')); ?>
</div><!-- col-derecha -->