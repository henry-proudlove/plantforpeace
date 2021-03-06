<?php
/**
 * @package WordPress
 * @subpackage themename
 */

/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 */
load_theme_textdomain( 'themename', get_template_directory() . '/languages' );

$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/**
 * Add jQuery
 */
function add_jquery_script() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
    wp_enqueue_script( 'jquery' );
}    
add_action('wp_enqueue_scripts', 'add_jquery_script');

/**
 * Remove code from the <head>
 */
//remove_action('wp_head', 'rsd_link'); // Might be necessary if you or other people on this site use remote editors.
//remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
//remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
//remove_action('wp_head', 'index_rel_link'); // Displays relations link for site index
//remove_action('wp_head', 'wlwmanifest_link'); // Might be necessary if you or other people on this site use Windows Live Writer.
//remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
//remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
//remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_filter( 'the_content', 'capital_P_dangit' ); // Get outta my Wordpress codez dangit!
remove_filter( 'the_title', 'capital_P_dangit' );
remove_filter( 'comment_text', 'capital_P_dangit' );
// Hide the version of WordPress you're running from source and RSS feed // Want to JUST remove it from the source? Try: remove_action('wp_head', 'wp_generator');
/*function hcwp_remove_version() {return '';}
add_filter('the_generator', 'hcwp_remove_version');*/
// This function removes the comment inline css
/*function twentyten_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );*/

/**
 * Remove meta boxes from Post and Page Screens
 */
function customize_meta_boxes() {
   /* These remove meta boxes from POSTS */
  //remove_post_type_support("post","excerpt"); //Remove Excerpt Support
  //remove_post_type_support("post","author"); //Remove Author Support
  //remove_post_type_support("post","revisions"); //Remove Revision Support
  //remove_post_type_support("post","comments"); //Remove Comments Support
  //remove_post_type_support("post","trackbacks"); //Remove trackbacks Support
  //remove_post_type_support("post","editor"); //Remove Editor Support
  //remove_post_type_support("post","custom-fields"); //Remove custom-fields Support
  //remove_post_type_support("post","title"); //Remove Title Support

  
  /* These remove meta boxes from PAGES */
  //remove_post_type_support("page","revisions"); //Remove Revision Support
  //remove_post_type_support("page","comments"); //Remove Comments Support
  //remove_post_type_support("page","author"); //Remove Author Support
  //remove_post_type_support("page","trackbacks"); //Remove trackbacks Support
  //remove_post_type_support("page","custom-fields"); //Remove custom-fields Support
  
}
add_action('admin_init','customize_meta_boxes');

/**
 * This theme uses wp_nav_menus() for the header menu, utility menu and footer menu.
 */
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'themename' ),
	'footer' => __( 'Footer Menu', 'themename' ),
	'utility' => __( 'Utility Menu', 'themename' )
) );

/** 
 * Add default posts and comments RSS feed links to head
 */
add_theme_support( 'automatic-feed-links' );

/**
 * This theme uses post thumbnails
 */
add_theme_support( 'post-thumbnails' );

/**
 *	This theme supports editor styles
 */

add_editor_style("/css/layout-style.css");

/**
 * Remove superfluous elements from the admin bar (uncomment as necessary)
 */
function remove_admin_bar_links() {
	global $wp_admin_bar;

	//$wp_admin_bar->remove_menu('wp-logo');
	//$wp_admin_bar->remove_menu('updates');	
	//$wp_admin_bar->remove_menu('my-account');
	//$wp_admin_bar->remove_menu('site-name');
	//$wp_admin_bar->remove_menu('my-sites');
	//$wp_admin_bar->remove_menu('get-shortlink');
	//$wp_admin_bar->remove_menu('edit');
	//$wp_admin_bar->remove_menu('new-content');
	//$wp_admin_bar->remove_menu('comments');
	//$wp_admin_bar->remove_menu('search');
}
//add_action('wp_before_admin_bar_render', 'remove_admin_bar_links');

/**
 *	Replace the default welcome 'Howdy' in the admin bar with something more professional.
 */
function admin_bar_replace_howdy($wp_admin_bar) {
    $account = $wp_admin_bar->get_node('my-account');
    $replace = str_replace('Howdy,', 'Welcome,', $account->title);            
    $wp_admin_bar->add_node(array('id' => 'my-account', 'title' => $replace));
}
add_filter('admin_bar_menu', 'admin_bar_replace_howdy', 25);

/**
 * This enables post formats. If you use this, make sure to delete any that you aren't going to use.
 */
//add_theme_support( 'post-formats', array( 'aside', 'audio', 'image', 'video', 'gallery', 'chat', 'link', 'quote', 'status' ) );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function handcraftedwp_widgets_init() {
	register_sidebar( array (
		'name' => __( 'Sidebar', 'themename' ),
		'id' => 'sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s" role="complementary">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'init', 'handcraftedwp_widgets_init' );

/*
 * Remove senseless dashboard widgets for non-admins. (Un)Comment or delete as you wish.
 */
function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // Plugins widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPress Blog widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // Other WordPress News widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // Right Now widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // Quick Press widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // Incoming Links widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // Recent Drafts widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Recent Comments widget
}

/**
 *	Hide Menu Items in Admin
 */
function themename_configure_dashboard_menu() {
	global $menu,$submenu;

	global $current_user;
	get_currentuserinfo();

		// $menu and $submenu will return all menu and submenu list in admin panel
		
		// $menu[2] = ""; // Dashboard
		// $menu[5] = ""; // Posts
		// $menu[15] = ""; // Links
		// $menu[25] = ""; // Comments
		// $menu[65] = ""; // Plugins

		// unset($submenu['themes.php'][5]); // Themes
		// unset($submenu['themes.php'][12]); // Editor
}


// For non-admins, add action to Hide Dashboard Widgets and Admin Menu Items you just set above
// Don't forget to comment out the admin check to see that changes :)
if (!current_user_can('manage_options')) {
	add_action('wp_dashboard_setup', 'remove_dashboard_widgets'); // Add action to hide dashboard widgets
	add_action('admin_head', 'themename_configure_dashboard_menu'); // Add action to hide admin menu items
}


?>
<?php // asynchronous google analytics: mathiasbynens.be/notes/async-analytics-snippet
//	 change the UA-XXXXX-X to be your site's ID
/*add_action('wp_footer', 'async_google_analytics');
function async_google_analytics() { ?>
	<script>
	var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
		(function(d, t) {
			var g = d.createElement(t),
				s = d.getElementsByTagName(t)[0];
			g.async = true;
			g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g, s);
		})(document, 'script');
	</script>
<?php }*/ ?>
<?php

/*
 *
 * CUSTOM EXCERPT 
 *
 */

function p4p_excerpt_length($length) {
	$type = get_post_type();
	switch ($type){
		case 'post':
			return 50;
			break;
		case 'timeline':
			return 10;
			break;
		case 'press_rels':
			return 13;
			break;
		default:
			return 20;
	}
}

add_filter('excerpt_length', 'p4p_excerpt_length');

function p4p_excerpt_more($more) {
	global $post;
	return '...';
}
add_filter('excerpt_more', 'p4p_excerpt_more');

/*
 *
 * CUSTOM DATE
 *
 */
 
function p4p_post_date() {
    global $post;
    if(get_post_type() == 'timeline'){
		$d = 'F Y'; 
		$the_date = mysql2date($d, $post->post_date);
	}else{
		$d = 'jS F Y'; 
		$the_date = mysql2date($d, $post->post_date);
	}
	return $the_date;
}
add_filter('get_the_date', 'p4p_post_date');

/*
 *
 * CREATE PAGES ON THEME ACTIVATION
 *
 */
 
 if (isset($_GET['activated']) && is_admin()){
	
	$pforp_pages = array(
				array(
					'page_title' => 'Home',
					'page_template' => 'page-home.php',
					'menu_order' => 0,
				),
				array(
					'page_title' => 'What We Do',
					'page_template' => 'page-whatwedo.php',
					'menu_order' => 1,
				),
				array(
					'page_title' => 'How we Work',
					'page_template' => 'page-howwework.php',
					'menu_order' => 2,
				),
				array(
					'page_title' => 'Plant For Peace Foundation',
					'page_template' => 'page-body.php',
					'menu_order' => 3,
					
				),
				array(
					'page_title' => 'International Steering Group',
					'page_template' => 'page-body.php',
					'menu_order' => 4,
				),
				array(
					'page_title' => 'Funktional Group',
					'page_template' => 'page-body.php',
					'menu_order' => 5,
				),
				array(
					'page_title' => 'Where we Work',
					'page_template' => 'page-wherewework.php',
					'menu_order' => 6,
				),
				array(
					'page_title' => 'Supporters',
					'page_template' => 'page-supporters.php',
					'menu_order' => 7,
				),
				array(
					'page_title' => 'News',
					'page_template' => 'page-news.php',
					'menu_order' => 8,
				),
				array(
					'page_title' => 'Products',
					'page_template' => 'page-product.php',
					'menu_order' => 9,
				),
				array(
					'page_title' => 'Get Involved',
					'page_template' => 'page-getinvolved.php',
					'menu_order' => 10,
				),
				array(
					'page_title' => 'Image Gallery',
					'page_template' => 'page-gallery.php',
					'menu_order' => 11,
				),
				array(
					'page_title' => 'Press Releases',
					'page_template' => 'page-press-releases.php',
					'menu_order' => 11,
				),
				array(
					'page_title' => 'Resources',
					'page_template' => 'page-resources.php',
					'menu_order' => 11,
				),
				array(
					'page_title' => 'Contact Us',
					'page_template' => 'page-contact.php',
					'menu_order' => 11,
				)
		);
	$page_count = count($pforp_pages);
	
	foreach($pforp_pages as $page)
	{
		$new_page = array(
			'ID' => $page['page_id'],
			'post_type' => 'page',
			'post_title' => $page['page_title'],
			'post_content' => '',
			'post_status' => 'publish',
			'post_author' => 1,
			'menu_order' => $page['menu_order']
		);
		
		$new_page_id = wp_insert_post($new_page);
		update_post_meta($new_page_id, '_wp_page_template', $page['page_template']);
		
		switch ($page['page_title']){
			case 'Home':
				update_option( 'page_on_front', $new_page_id );
				update_option( 'show_on_front', 'page' );
				break;
			case 'News':
				update_option( 'page_for_posts', $new_page_id );
				break;
			case 'Plant For Peace Foundation':
				add_post_meta($new_page_id, '_page_id', 'p4p', true);
				break;
			case 'International Steering Group':
				add_post_meta($new_page_id, '_page_id', 'isg', true);
				break;
			case 'Funktional Group':
				add_post_meta($new_page_id, '_page_id', 'fgi', true);
				break;
			case 'Where we Work':
				add_post_meta($new_page_id, '_page_id', 'wherework', true);
				break;
			case 'Products':
				add_post_meta($new_page_id, '_page_id', 'product', true);
				break;
		}
	}
}

/*
 *
 * CUSTOM POST TYPES
 *
 */
 
	// Array of labels and args for cpts
	
	$cpts_args	= array(
		
		// People Profiles
		
		'p4pf_profile' => array(
			'name' => 'p4p_profile',
			'label' => 'P4P UK People',
			'sing' => 'P4P UK Person' ,
			'edit' => 'Person',
			'edits' => 'People',
			'supports' => array( 'title', 'editor', 'thumbnail')
		),
		'p4pf_afg_profile' => array(
			'name' => 'p4p_afg_profile',
			'label' => 'P4P Afganistan People',
			'sing' => 'P4P Afganistan Person' ,
			'edit' => 'Person',
			'edits' => 'People',
			'supports' => array( 'title', 'editor', 'thumbnail')
		),
		'isg_profile' => array(
			'name' => 'isg_profile',
			'label' => 'ISG People',
			'sing' => 'ISG Person',
			'edit' => 'Person',
			'edits' => 'People',
			'supports' => array( 'title', 'editor', 'thumbnail')
		),
		'fgi_profile' => array(
			'name' => 'fgi_profile',
			'label' => 'FGI People',
			'sing' => 'FGI Person',
			'edit' => 'Person',
			'edits' => 'People',
			'supports' => array( 'title', 'editor', 'thumbnail')
		),
		'sp_people_profile' => array(
			'name' => 'sp_people_profile',
			'label' => 'People',
			'sing' => 'Person',
			'edit' => 'Person',
			'edits' => 'People',
			'supports' => array( 'title', 'editor', 'thumbnail')
		),
		'sp_company_profile' => array(
			'name' => 'sp_company_profile',
			'label' => 'Companies',
			'sing' => 'Company',
			'edit' => 'Comapany',
			'edits' => 'Companies',
			'supports' => array( 'title', 'editor', 'thumbnail')
		),
		'retailer_profile' => array(
			'name' => 'retailer_profile',
			'label' => 'Retailers',
			'sing' => 'Retailer',
			'edit' => 'Retailer',
			'edits' => 'Retailers',
			'supports' => array( 'title', 'editor', 'thumbnail')
		),
		
		// Timeline Items
		
		'timeline' => array(
			'name' => 'timeline',
			'label' => 'Timeline items',
			'sing' => 'Timeline Item',
			'edit' => 'Item',
			'edits' => 'Items',
			'supports' => array('title', 'editor', 'thumbnail')
		),
		
       //Home Page Promos & Carousel
       
       'hp_promos' => array(
			'name' => 'hp_promos',
			'label' => 'Home Promos',
			'sing' => 'Home Promo',
			'edit' => 'Promo',
			'edits' => 'Promo',
			'supports' => array('title', 'editor', 'thumbnail', 'revisions')
		),
		
		'hp_carousel' => array(
			'name' => 'hp_carousel',
			'label' => 'Home Carousel',
			'sing' => 'Home Carousel Item',
			'edit' => 'Item',
			'edits' => 'Items',
			'supports' => array('title', 'thumbnail')
		),
		
		//Press releases resources
       
       'press_rels' => array(
			'name' => 'press_rels',
			'label' => 'Press Releases',
			'sing' => 'Press Release',
			'edit' => 'Press Release',
			'edits' => 'Press Releases',
			'supports' => array('title', 'editor', 'thumbnail')
		),
		
		'resources' => array(
			'name' => 'resources',
			'label' => 'Resources',
			'sing' => 'Resource',
			'edit' => 'Resource',
			'edits' => 'Resources',
			'supports' => array('title', 'editor', 'thumbnail')
		),
		
		// P4PF, ISG, FGI Page Sections
		
		'p4p_secs' => array(
			'name' => 'p4p_secs',
			'label' => 'P4P UK Sections',
			'sing' => 'P4P UK Section',
			'edit' => 'Section',
			'edits' => 'Sections',
			'supports' => array( 'title', 'editor', 'thumbnail')
		),
		
		'p4p_afg_secs' => array(
			'name' => 'p4p_afg_secs',
			'label' => 'P4P Afghansitan Sections',
			'sing' => 'P4P Afghansitan Section',
			'edit' => 'Section',
			'edits' => 'Sections',
			'supports' => array( 'title', 'editor', 'thumbnail')
		),
		
		'isg_secs' => array(
			'name' => 'isg_secs',
			'label' => 'ISG Sections',
			'sing' => 'ISG Section',
			'edit' => 'Section',
			'edits' => 'Sections',
			'supports' => array( 'title', 'editor', 'thumbnail')
		),
		
		'fgi_secs' => array(
			'name' => 'fgi_secs',
			'label' => 'FGI Sections',
			'sing' => 'FGI Section',
			'edit' => 'Section',
			'edits' => 'Sections',
			'supports' => array( 'title', 'editor', 'thumbnail')
		),
		
		'wherework_secs' => array(
			'name' => 'wherework_secs',
			'label' => 'Afganistan Sections',
			'sing' => 'Afganistan Section',
			'edit' => 'Section',
			'edits' => 'Sections',
			'supports' => array( 'title', 'editor', 'thumbnail')
		),
		
		'product_secs' => array(
			'name' => 'product_secs',
			'label' => 'Products Sections',
			'sing' => 'Product Section',
			'edit' => 'Section',
			'edits' => 'Sections',
			'supports' => array( 'title', 'editor', 'thumbnail')
		),
		
		// How we work promos
		
		'howwework_promo' => array(
			'name' => 'howwework_promo',
			'label' => 'How we work Promos',
			'sing' => 'How we work Promo',
			'edit' => 'Promo',
			'edits' => 'Promos',
			'supports' => array( 'title', 'editor', 'thumbnail')
		)
		
	);
	foreach($cpts_args as $cpt){
	
		//EDIT, ADD AND SEARCH TERMS
		$add = 'Add ' . $cpt['edit'];
		$edit = 'Edit ' . $cpt['edit'];
		$new = 'New ' . $cpt['edit'];
		$view = 'View ' . $cpt['edit'];
		$search = 'Search ' . $cpt['edits'];
		$none = 'No ' . $cpt['edits'] . ' Found';
		$trash = 'No ' . $cpt['edits'] . ' Found In Trash';
		
		$labels = array(
			'name' => _x($cpt['label'], 'post type general name'),
			'singular_name' => _x($cpt['sing'], 'post type singular name'),
			'add_new' => _x('Add New', 'handcraftedwptemplate_robot'),
			'add_new_item' => __($add),
			'edit_item' => __($edit),
			'new_item' => __($new),
			'view_item' => __($view),
			'search_items' => __($search),
			'not_found' =>  __($none),
			'not_found_in_trash' => __($trash), 
			'parent_item_colon' => ''
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => $cpt['supports']
		);
		register_post_type($cpt['name'], $args);
	}


/*
 *
 * META BOXES
 *
 */
 
include_once WP_CONTENT_DIR . '/wpalchemy/MetaBox.php';

// global styles for the meta boxes
if (is_admin()) add_action('admin_enqueue_scripts', 'metabox_style');

function metabox_style() {
	wp_enqueue_style('wpalchemy-metabox', get_stylesheet_directory_uri() . '/metaboxes/meta.css');
}

// Meta box for people profile on P4PF, ISG, FGI

$people_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_people_meta',
	'title' => 'Role And Email',
	'types' => array('p4p_profile' , 'isg_profile' , 'fgi_profile'),
	'template' => get_stylesheet_directory() . '/metaboxes/people-meta.php',
));

$link_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_link_meta',
	'title' => 'Link',
	'types' => array('sp_company_profile' , 'sp_people_profile' , 'retailer_profile', 'press_rels', 'hp_promos', 'howwework_promo'),
	'template' => get_stylesheet_directory() . '/metaboxes/link-meta.php',
));

$carousel_meta = new WPAlchemy_MetaBox(array
(
	'id' => '_carousel_meta',
	'title' => 'Carousel Item Clickthourgh',
	'types' => array('hp_carousel'),
	'template' => get_stylesheet_directory() . '/metaboxes/carousel-meta.php',
));

$timeline_meta = new WPAlchemy_MetaBox(array
(
	'id' => '_timeline_meta',
	'title' => 'Video/Image',
	'types' => array('timeline'),
	'template' => get_stylesheet_directory() . '/metaboxes/timeline-meta.php',
));

$timeline_intro_meta = new WPAlchemy_MetaBox(array
(
	'id' => '_timeline_intro_meta',
	'title' => 'Timeline Intro Copy',
	'include_template' => array('page-whatwedo.php'),
	'template' => get_stylesheet_directory() . '/metaboxes/timeline-intro-meta.php',
));



/*
 *
 * IMAGE SIZES
 *
 */

add_image_size( 'carousel', 960, 440, true );
add_image_size( 'header', 960, 360, true );
add_image_size( 'promo', 320, 210, true );
add_image_size( 'profile', 193, 193, true );
add_image_size( 'overlay', 640, 300, true );
add_image_size( 'overlay_person', 430, 350, true );
add_image_size( 'news_lead', 590, 300, true );
add_image_size( 'news_body', 295, 295, true );
add_image_size( 'timeline', 430, 200, true );
add_image_size( 'resource', 135, 135, true );


update_option('medium_size_w', 590);
update_option('medium_size_h', 590);

update_option('large_size_w', 2048);
update_option('large_size_h', 2048);

update_option('thumbnail_size_w', 78);
update_option('thumbnail_size_h', 78);
update_option('thumbnail_crop', 1);


/*
 *
 * IMAGE FETCHER
 *
 */
 
function img_fecther($size='header', $limit=1, $post_id = null, $bg = false) {

	global $post;
	
	if(!isset($post_id)){
		$post_id = $post->ID;
	}
	
	//echo '<div class="images">';
	

	if ($images = get_children(array(

		'post_parent' => $post_id,
		'post_type' => 'attachment',
		'order' => 'menu_order',
		'numberposts' => $limit,
		'post_mime_type' => 'image'))):
		
		
		foreach($images as $image) {
			$attachment=wp_get_attachment_image_src($image->ID, $size); ?>
			<img src="<?php echo $attachment[0]; ?>" width="<?php echo $attachment[1]; ?>" height="<?php echo $attachment[2]; ?>" /><?php
		}
	endif;
	//echo '</div><!--.images-->';
	
}

function bg_img_fecther($size) {

	global $post;

	if ($images = get_children(array(

		'post_parent' => $post->ID,
		'post_type' => 'attachment',
		'order' => 'menu_order',
		'numberposts' => 1,
		'post_mime_type' => 'image'))):
		
		foreach($images as $image) {
			$attachment = wp_get_attachment_image_src($image->ID, $size);
			echo $attachment[0];
		}
		 
	endif;
	//echo '</div><!--.images-->';
	
}

/*
 *
 * META DATA HANDLERS
 *
 */
 

function carousel_meta(){
	global $carousel_meta;
	$meta = $carousel_meta->the_meta();
	
	if($meta['page-video'] == 'video'){
		$meta['page-video'] = 'lightbox-video';
		$meta['ct_link'] = video_fectcher($meta['ct_link']);
	}else{
		$meta['page-video'] = '';
	}
	
	return $meta;
}

function video_fectcher($video){

		if(strpos($video , 'vimeo.com')){	
		
			$video = substr($video , 17);
			$video = 'http://player.vimeo.com/video/' . $video . '?autoplay=1';
			return $video;

		}elseif (strpos($video, 'youtu.be')){	
		
			$video = substr($video , 16, 11);
			$video = 'http://www.youtube.com/embed/' . $video . '?autoplay=1&amp;wmode=transparent';
			return $video;
			
		}elseif (strpos($video_link , 'youtube.com')){
		
			$video = substr($video , 31 , 11);
			$video = 'http://www.youtube.com/embed/' . $video . '?autoplay=1';
			return $video;
			
		}else{
			return false;
		}
}

function the_clickthrough($text = 'Find out more'){
	global $post;
	echo '<span class="arrow-link">';
	echo $text;
	echo '</span>';
}

function threecol_promos($type){ 

	global $post;
	$i=1;?>
	<section id="promos" class="threecol">
		<?php
			$args = array('post_type' => $type , 'posts_per_page' => '3');
			$wp_query = new WP_Query($args);
			
			while ( $wp_query->have_posts() ) : $wp_query->the_post();
				//get the clickthrough link
				$meta = get_post_meta($post->ID, '_link_meta', true);				
				$class = rowpos_class($i , 3, $wp_query->post_count);
				
				?>
					<a href="<?php echo $meta['link_url'] ?>" id="post-<?php the_ID(); ?>" <?php post_class($class . ' box-link'); ?> role="article" rel="bookmark">
						<h3><? the_title(); ?></h3>
						<div class="tint"><div class="image-holder" style="background-image: url('<?php bg_img_fecther('promo'); ?>');"></div></div>
						<?php the_excerpt(); ?>
						<?php the_clickthrough($meta['link_txt']); ?>
					</a>
					<?php $i++;
			 endwhile; ?>
	</section><!--#promos-->

<?php }

function pg_header(){ 
	
	global $post;

	?>
	<section id="intro">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
			<?php
			echo '<div id="carousel"><div id="header-images">';
			
			if(is_page_template('page-whatwedo.php')){?>
				<a href="http://player.vimeo.com/video/53156464?badge=0" class="lightbox-video" rel="bookmark"><?php img_fecther('header' , 1) ?></a> <?php
			}else if(is_page_template('page-gallery.php')){
			
			}else{
				img_fecther('header' , -1);
			}

			echo '</div><!--#header-images--></div><!--#carousel-->'; ?>

			<div class="page-intro">
				<?php
					$parent = get_parent();
					if($parent){?>
						<h3 class="breadcrumb"><a href="<?php echo get_permalink($parent); ?>" rel="bookmark"><?php echo get_the_title($parent); ?></a></h3><?php
					} 
				?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-content clearfix">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
			</div><!-- .intro -->
			
		</article><!-- #post-<?php the_ID(); ?> -->
	</section><!--#intro-->
	
<?php }


function the_timeline_exceprt(){

	global $post; ?>
	
	<a href="<?php echo get_permalink() . '#post-' . get_the_ID(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('lightbox box-link'); ?> rel="bookmark">

		<time><?php the_date('F Y');?></time>
		<div class="tint"><div class="image-holder" style="background-image: url('<?php bg_img_fecther('timeline'); ?>');"></div></div>
		<div class="intro">
			<h3 class="entry-title"><?php the_title(); ?></h3>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
				<?php the_clickthrough('Read More'); ?>
			</div><!-- .entry-summary -->
		</div><!-- .intro -->
		
	</a><!-- #post-<?php the_ID(); ?> -->
	
<?php }

function pagefinder(){

	global $post;
	/*$pg_title = get_the_title();
	echo get_page_template() . '</br>';
	echo get_template_directory();*/
	
	$pg_id = get_post_meta(get_the_ID(), '_page_id', true);

	switch($pg_id){
		case 'p4p':
			$type = 'p4p';
			break;
		case 'isg':
			$type = 'isg';
			break;
		case 'fgi':
			$type = 'fgi';
			break;
		case 'wherework':
			$type = 'wherework';
			break;
		case 'product':
			$type = 'product';
			break;
		default :
			$type = '';
	}
	
	return $type;
	
}
function people_profiles(){

	$type = pagefinder() . '_profile';
	
	echo '<section id="people" class="profiles">';
	echo '<h3>People</h3>';
		profiles_loop($type);
	echo '</section><!--#people-->';
}

function profiles_loop($type){
	$args = array('post_type' => $type, 'posts_per_page' => '-1');
	$wp_query = new WP_Query($args);
	$i=1;
	while ( $wp_query->have_posts() ) : $wp_query->the_post();
		$class = rowpos_class($i , 5, $wp_query->post_count);
		profile_markup($class);
		$i++;
	endwhile;
	wp_reset_query();
}


function profile_markup($class){
	global $post ?>
	
	<a href="<?php echo get_permalink() . '#post-' . get_the_ID(); ?>" id="post-<?php the_ID(); ?>" <?php post_class($class . ' box-link lightbox'); ?> rel="bookmark">
		<div class="tint"><div class="image-holder" style="background-image: url('<?php bg_img_fecther('profile'); ?>');"></div></div>
		<?php the_clickthrough(get_the_title()); ?>
	</a><!-- #post-<?php the_ID(); ?> -->
	
	
<?php }

function page_sections(){
	
	$type = pagefinder() . '_secs';
	sections_loop($type);
	
}

function sections_loop($type){
	$args = array('post_type' => $type, 'posts_per_page' => '-1');
		$wp_query = new WP_Query($args);
	if($wp_query->have_posts()):
	
		echo '<section id="chapters" class="centered clearfix">';
		while ( $wp_query->have_posts() ) : $wp_query->the_post();
				section_markup();
		endwhile;
	echo '</section><!--#chapters-->';
	endif;
	wp_reset_query();
}

function section_markup(){
	global $post;?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
		<h1><?php the_title(); ?> </h1>
		<div class="entry-content">
			<div class="images"><?php img_fecther('news_body', -1);?></div><!--.images-->
			<div class="text"><?php the_content(); ?><!--.text-->
		</div><!--.entry-content-->
	</article><!--#post-<?php the_ID(); ?>-->
<?php }

function get_resources($type){
	$args = array('post_type' => $type, 'posts_per_page' => '-1');
	$wp_query = new WP_Query($args);
	while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
	
		$meta = get_post_meta(get_the_ID(), '_link_meta', true);?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
			<?php 
				if (has_post_thumbnail()):
					the_post_thumbnail('resource');
				endif; ?>
			<div class="holder">
				<header class="entry-header">
				<? if (get_post_type() == 'press_rels'): ?>
					<div class="entry-meta">
						<?php
							printf( __( '<time class="entry-date" datetime="%2$s" pubdate>%3$s</time>', 'themename' ),
								get_permalink(),
								get_the_date( 'c' ),
								get_the_date()
							);
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
				
				<h1 class="entry-title"><a href="<?php echo $meta['link_url']; ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themename' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				
				</header><!-- .entry-header -->

				<div class="entry-summary">
					<?php the_content(); ?>
				</div><!-- .entry-summary -->
				
				<a href="<?php echo $meta['link_url']; ?>" class="arrow-link" title="<?php printf( esc_attr__( 'Permalink to %s', 'themename' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo $meta['link_txt']; ?></a>
			</div><!--.holder-->
		</article><!-- #post-<?php the_ID(); ?> --><?php
			
	endwhile;
		
	wp_reset_query();
}

function thumbs_gallery($identifier){

	$gallery = get_page_by_title($identifier);
	$gallery = $gallery->ID;
	echo '<a href="' . get_permalink($gallery) . '" id="image-gallery">';
	echo '<div id="images" class="clearfix">';
	echo img_fecther('thumbnail','12', $gallery);
	echo '</div><!--#images-->';
	the_clickthrough('View all');
	echo '</a><!--#image-gallery-->';
	
}

function single_profile(){ 

	if ( have_posts() ) while ( have_posts() ) : the_post();
	
	$post_types = array('sp_people_profile' ,'sp_company_profile'); ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					<?php img_fecther($size='overlay_person', $limit=1); ?>
					<div class="profile-content">
						<header class="entry-header">
							<h1 class="entry-title"><?php the_title(); ?></h1>
							<div class="entry-meta">
								<?php
									if(!in_array(get_post_type(), $post_types)):
										$meta = get_post_meta(get_the_ID(), '_people_meta', true);
										echo '<h2>' . $meta['role'] . '</h2>';
									endif;
								?>
							</div><!-- .entry-meta -->
						</header><!-- .entry-header -->
	
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
	
						<footer class="entry-meta">
						
							<?php if(!in_array(get_post_type(), $post_types)):
								$meta = get_post_meta(get_the_ID(), '_people_meta', true);
								$text = $meta['email'];
								$url = 'mailto:' . $meta['email'];
							else:
								$meta = get_post_meta(get_the_ID(), '_link_meta', true);
								$text = $meta['link_txt'];
								$url = $meta['link_url'];
							endif;
								echo '<a href="' . $url . '" class="arrow-link" target="_blank">' . $text . '</a>';
							?>
						</footer><!-- #entry-meta -->
					<div><!--.profile-content-->
				</article><!-- #post-<?php the_ID(); ?> -->

				<nav id="nav-below" role="article">
					<h1 class="section-heading"><?php _e( 'Post navigation', 'themename' ); ?></h1>
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'themename' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'themename' ) . '</span>' ); ?></div>
				</nav><!-- #nav-below -->

	<?php endwhile; // end of the loop.
			
}

function rowpos_class($i , $divider, $total){
	//echo $total;
	if($i % $divider == 1){
		$class = 'left ';
	}elseif($i % $divider == 0){
		$class = 'right ';
	}else{
		$class = '';
	}
		
	$lastrow = $total % $divider;
	$lastrow = $i - $total + $lastrow;
			
	if($lastrow > 0){
		$class .= 'bottom';
		if($i == $total){
			$class .= ' widow';
		}
	}else if($total <= $divider){
		$class .= 'bottom';
	}
	
	return $class;
}

function get_parent() {
	global $wp_query;
	$parent = $wp_query->post->post_parent;
	if($parent != 0){
		return $wp_query->post->post_parent;
	}else{
		return false;
	}
}



















?>