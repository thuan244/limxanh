<?php
  define( 'THEME_URL', get_stylesheet_directory() );
  define( 'CORE', THEME_URL . '/core' );
  include 'acf.php';

/**
@ Thiết lập các chức năng sẽ được theme hỗ trợ
**/
if ( ! function_exists( 'limxanh_theme_setup' ) ) {
    /*
     * Nếu chưa có hàm thachpham_theme_setup() thì sẽ tạo mới hàm đó
     */
    function limxanh_theme_setup() {
    	
    	/*
		* Tự chèn RSS Feed links trong <head>
		*/
		add_theme_support( 'automatic-feed-links' );
		/*
		* Thêm chức năng post thumbnail
		*/
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'slide', 1600, 500, array('center', 'center') );
		add_image_size( 'home-product', 360, 200, array('center', 'center') );
		add_image_size( 'home-thumbnail', 300, 250, array('center', 'center') );
		/*
		* Thêm chức năng title-tag để tự thêm <title>
		*/
		add_theme_support( 'title-tag' );
		/*
		* Thêm chức năng post format
		*/
		add_theme_support( 'post-formats',
		    array(
		       'image',
		       'video',
		       'gallery',
		       'quote',
		       'link'
		    )
		 );
		/*
		* Thêm chức năng custom background
		*/
		$default_background = array(
		   'default-color' => '#e8e8e8',
		);
		add_theme_support( 'custom-background', $default_background );
		/*
		* Tạo menu cho theme
		*/
		register_nav_menu ( 'primary', __('Primary Menu', 'limxanh') );
		/*
        * Tạo sidebar cho theme
        */
        $sidebar = array(
            'name' => __('Main Sidebar', 'limxanh'),
            'id' => 'main-sidebar',
            'description' => 'Main sidebar for limxanh theme',
            'class' => 'main-sidebar',
            'before_title' => '<h3 class="widgettitle">',
            'after_sidebar' => '</h3>'
        );
        register_sidebar( $sidebar );        
    }
}
add_action ( 'init', 'limxanh_theme_setup' );

/**
@ Thiết lập hàm hiển thị logo
@ limxanh_logo()
**/
function limxanh_logo() {
    $defaults = array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'limxanh_logo' );

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

//code phân trang
function wp_corenavi($custom_query = null, $paged = null)
{
    global $wp_query;
    if ($custom_query) {
        $main_query = $custom_query;
    } else {
        $main_query = $wp_query;
    }
    $paged = ($paged) ? $paged : get_query_var('paged');
    $big = 999999999;
    $total = isset($main_query->max_num_pages) ? $main_query->max_num_pages : '';
    if ($total > 1) {
        echo '<div class="pagenavi">';
    }
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, $paged),
        'total' => $total,
        'mid_size' => '10',
        'prev_text' => '&#x276E;',
        'next_text' => '&#10095;',
    ));
    if ($total > 1) {
        echo '</div>';
    }
}
function jt_related_posts($title = 'Xem thêm:', $count = 5) {
    global $post;
    $tag_ids = array();
    $current_cat = get_the_category($post->ID);
    $current_cat = $current_cat[0]->cat_ID;
    $this_cat = '';
    $tags = get_the_tags($post->ID);
    if ( $tags ) {
        foreach($tags as $tag) {
            $tag_ids[] = $tag->term_id;
        }
    } else {
        $this_cat = $current_cat;
    }
    $args = array(
        'post_type'   => get_post_type(),
        'numberposts' => $count,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'tag__in'     => $tag_ids,
        'cat'         => $this_cat,
        'exclude'     => $post->ID
    );
    $related_posts = get_posts($args);
    /**
     * If the tags are only assigned to this post try getting
     * the posts again without the tag__in arg and set the cat
     * arg to this category.
     */
    if ( empty($related_posts) ) {
        $args['tag__in'] = '';
        $args['cat'] = $current_cat;
        $related_posts = get_posts($args);
    }
    if ( empty($related_posts) ) {
        return;
    }
    $post_list = '';
    foreach($related_posts as $related) {
        $post_list .= '<li><a href="' . get_permalink($related->ID) . '">' . $related->post_title . '</a></li>';
    }
    return sprintf('
        <div class="related-posts">
            <h4>%s</h4>
            <ul>%s</ul>
        </div> <!-- .related-posts -->
    ', $title, $post_list );
}
// Code đếm số dòng trong văn bản
function count_paragraph( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }
    return implode( '', $paragraphs );
}
//Chèn bài liên quan vào giữa nội dung
 
add_filter( 'the_content', 'prefix_insert_post_ads' );
function prefix_insert_post_ads( $content ) {
    $related_posts= jt_related_posts();
    if ( is_single() ) {
        return count_paragraph( $related_posts, 1, $content );
    }
    return $content;
}
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }
    return $title;
});
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );