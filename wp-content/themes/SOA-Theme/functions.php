<?php

// Add RSS links to <head> section
automatic_feed_links();

add_theme_support( 'post-thumbnails', array( 'post', 'page', 'armario', 'Good Staff' ) ); // Add it for posts


// Load jQuery
if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"), false);
    wp_enqueue_script('jquery');
}

// Clean up the <head>
function removeHeadLinks() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
}

add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Sidebar Widgets',
        'id' => 'sidebar-widgets',
        'description' => 'These are widgets for the sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
}

function soa_image($imgname) {
    echo(bloginfo('template_url') . '/images/' . $imgname);
}
function page_url($pagename) {
    echo(bloginfo('url') . '/' . get_page_uri(get_page_by_title($pagename)));
}

function soa_theme_setup() {
	add_image_size('soa_blog_big',415,1480, true);
}
add_action( 'after_setup_theme', 'soa_theme_setup' );

add_shortcode('gallery', 'soa_gallery_shortcode');
add_shortcode('soa_random_img', 'soa_random_img_shortcode');
add_shortcode('soa_random_img_mini_gallery', 'soa_random_img_mini_gallery_shortcode');

/**
 * The Gallery shortcode.
 *
 * This implements the functionality of the Gallery Shortcode for displaying
 * WordPress images on a post.
 *
 * @since 2.5.0
 *
 * @param array $attr Attributes attributed to the shortcode.
 * @return string HTML content to display gallery.
 */
function soa_gallery_shortcode($attr) {
	global $post, $wp_locale;

	static $instance = 0;
	$instance++;

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}
	$selector = "soa-gallery-{$instance}";

        if (count($attachments) > 4){
            $output = "<span id='gallery-prev-$instance' class='gallery-prev'>&#171;</span>";
            $output .= "<span id='gallery-next-$instance' class='gallery-next'>&#187;</span>";
        }
	$output .= "<div id='$selector' class='soa-gallery soa-galleryid-{$id}' data-btnprev='gallery-prev-$instance' data-btnnext='gallery-next-$instance'><ul>";

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
                $img_thumb_url = wp_get_attachment_image_src($id, 'thumbnail');
                $img_url = wp_get_attachment_image_src($id, 'full');
                $img_html = "<img src='$img_thumb_url[0]' data-orignal-image-url='$img_url[0]' width='$img_thumb_url[1]' height='$img_thumb_url[1]'/>";
		$output .= "<li>$img_html</li>";
	}

	$output .= "</ul>\n";
        if (count($attachments) > 4){
            
        }
        $first_attachment_id = array_keys($attachments);
        $first_attachment_id = $first_attachment_id[0];
        $img = wp_get_attachment_image_src($first_attachment_id,'full');
	$output .= "</div>";
	$output .= "<img class='soa-gallery-show' src='$img[0]' width='415' />";
        $output .= "
        <script type='text/javascript'>
        $(document).ready(function(){soa.init_gallery()});
        </script>
        ";

	return $output;
}

function html_tag($tag, $classes, $id, $content) {
    $output = "<$tag";
    if (!empty($classes))
        $output .= " class='$classes' ";
    if (!empty($id))
        $output .= " id='$id' ";
    $output .= ">";
    $output .= $content . "</$tag>\n";

    return $output;
}

function getDirectoryList($directory){
    
    if ($handle = opendir($directory)) {
        $results = array();
        /* This is the correct way to loop over the directory. */
        while (false !== ($file = readdir($handle))) {
          if ($file != "." && $file != "..") {
            $results[] = $file;
          }
        }
        closedir($handle);
        return $results;
    }
    else{
        echo "ERROR OPENING DIRECTORY: $directory";
        return false;
    }
}


function soa_random_img_shortcode(){
    if ($imgs = getDirectoryList('./wp-content/uploads/soa_random_images')){
//    if ($imgs = getDirectoryList('.')){
        $i = rand(0,count($imgs)-1);
        $path_to_image = home_url() . "/wp-content/uploads/soa_random_images/$imgs[$i]";
        $html = "<img class='soa_random_img' src='$path_to_image' />";
        return $html;
    }
    else{
        return '';
    }
}

function soa_random_img_mini_gallery_shortcode($args){
    extract( shortcode_atts( array(
      'visible' => 3,
      'auto' => 2500,
      'speed' => 500
      ), $args ) );
    if ($imgs = getDirectoryList('./wp-content/uploads/soa_random_images')){

        $html = "";
        shuffle($imgs);
        foreach ($imgs as $img) {
            $path_to_image = home_url() . "/wp-content/uploads/soa_random_images/$img";
            $html .= html_tag("li", "", "", "<img src='$path_to_image' />");
        }
        $html = html_tag("ul", "", "", $html);
        $div_random_class = rand(0,35000);
        $html = html_tag("div", "$div_random_class", "soa_random_img_mini_gallery", $html);
        $html .= "<script type='text/javascript'>
                    $(document).ready(function(){
                            $('.$div_random_class').jCarouselLite({auto:$auto, visible:$visible, speed:$speed});
                    });
                  </script> ";
        return $html;
    }
    else{
        return '';
    }
}






function soa_random_img_mini_gallery_shortcode2($args){
    extract( shortcode_atts( array(
      'visible' => 3,
      'auto' => 2500,
      'speed' => 500
      ), $args ) );
    if ($imgs = getDirectoryList('./wp-content/uploads/soa_random_images')){
        $div_random_class = rand(0,35000);
        $html = "<div id='large_gallery_wrapper'  style='height:459px' >
                    <div class='slideshow'  id='slideshow_$div_random_class' ></div>
                 </div> ";
        shuffle($imgs);
        foreach ($imgs as $img) {
            $path_to_image = home_url() . "/wp-content/uploads/soa_random_images/$img";
            $html .= html_tag("li", "", "", "<a class='thumb' href='$path_to_image'></a>");
        }
        $html = html_tag("ul", "thumbs", "", $html);

        $html = html_tag("div", "$div_random_class", "soa_random_img_mini_gallery", $html);
        $html .= "<script type='text/javascript'>
                    $(document).ready(function(){
                            //$('.$div_random_class').jCarouselLite({auto:$auto, visible:$visible, speed:$speed});
                            $('.$div_random_class').each(function(){
                                $('.$div_random_class').galleriffic({
                                    delay: 10000,
                                    numThumbs:                 20, // The number of thumbnails to show page
                                    preloadAhead:              20, // Set to -1 to preload all images
                                    enableTopPager:            false,
                                    enableBottomPager:         false,
                                    imageContainerSel:         '#slideshow_$div_random_class',
                                    autoStart:                 true, // Specifies whether the slideshow should be playing or paused when the page first loads
                                    syncTransitions:           true
                                })
                            });
                    });
                  </script> ";
        return $html;
    }
    else{
        return '';
    }
}





?>