<?php
//******************************************
// Basic Setup
//******************************************
define( "THEME_DIR", get_template_directory() );
define( "THEME_URI", get_template_directory_uri() );
load_theme_textdomain( 'fenjoon', THEME_DIR .'/lang');
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'feed_links', 2 );
add_filter('show_admin_bar', '__return_false');
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );
add_theme_support( 'html5', array( 'search-form' ) );
//******************************************
// disable emoji
//******************************************
function fjn_disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
function fjn_disable_wp_emojicons() {
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  add_filter( 'tiny_mce_plugins', 'fjn_disable_emojicons_tinymce' );
}
add_action( 'init', 'fjn_disable_wp_emojicons' );
//******************************************
// Add Custom JS & CSS
//******************************************
function add_fenjoon_admin_js() {
	wp_enqueue_script( 'fenjoon_admin_js', admin_url() . 'js/fenjoon_admin.js', array(), '1.0', true );
}
add_filter('admin_head', 'add_fenjoon_admin_js');
function add_fenjoon_admin_css() {
	wp_register_style( 'fenjoon_admin_css', admin_url() . 'css/fenjoon_admin.css', false, '1.0' );
	wp_enqueue_style( 'fenjoon_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'add_fenjoon_admin_css' );
function add_fenjoon_js() {
	if( is_page_template( 'single-orders.php' ) || is_singular( 'orders' ) ){
		wp_enqueue_script( 'fenjoon', THEME_URI . '/js/fenjoon.js', array(), '1.0', true );
	}
	if( is_page_template( 'single-projects.php' ) || is_singular( 'projects' ) ){
		wp_enqueue_script( 'fenjoon', THEME_URI . '/js/gauge.js', array(), '1.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'add_fenjoon_js' );
//******************************************
// add image sizes
//******************************************
function fjn_thumb_sizes() {
  add_image_size( 'portfolio', 282, 282, true );
}
add_action( 'after_setup_theme', 'fjn_thumb_sizes' );
//******************************************
// register menu
//******************************************
function fjn_register_menu() {
  register_nav_menu(	'top', __( 'Top Menu', 'fenjoon' ) );
}
add_action( 'init', 'fjn_register_menu' );

function fjn_wp_nav_menu( $loc ){
	$args = array(
		'theme_location'  => $loc,
		'menu'            => '',
		'container'       => 'nav',
		'container_class' => $loc,
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
	);
	wp_nav_menu( $args );
}
//******************************************
// Custom classes for menu items
//******************************************
function fjn_filter_menu_class( $objects, $args ){
	$ids        = array();
	$parent_ids = array();
	$top_ids    = array();
	foreach ( $objects as $i => $object ){
			if ( 0 == $object->menu_item_parent ){
				$top_ids[$i] = $object;
				continue;
			}
			if ( ! in_array( $object->menu_item_parent, $ids ) ){
				$objects[$i]->classes[] = 'first-menu-item';
				$ids[]          = $object->menu_item_parent;
			} 
			if ( in_array( 'first-menu-item', $object->classes ) )
				continue;
			$parent_ids[$i] = $object->menu_item_parent;
	}
	$sanitized_parent_ids = array_unique( array_reverse( $parent_ids, true ) );
	foreach ( $sanitized_parent_ids as $i => $id )
		$objects[$i]->classes[] = 'last-menu-item';
	return $objects; 
}
add_filter( 'wp_nav_menu_objects', 'fjn_filter_menu_class', 10, 2 );
//******************************************
// Template functions
//******************************************
function fjn_template_query( $cpt, $user_id = null ){
	if( 'orders' == $cpt ){
		$args = array(
			'post_type'				=> 'orders',
			'post_status'			=> array( 'publish', 'pending' ),
			'posts_per_page'	=> -1,
			'orderby'					=> 'date',
			'order'						=> 'DESC',
			'author'					=> $user_id
		);
	}elseif( 'general' == $cpt ){
		$args = array(
			'post_type'				=> 'general',
			'post_status'			=> 'publish',
			'posts_per_page'	=> -1,
			'orderby'					=> 'title',
			'order'						=> 'ASC',
			'tax_query'				=> array(
				'relation'			=> 'OR',
				array(
					'taxonomy'		=> 'field',
					'field'				=> 'slug',
					'terms'				=> array( 'about', 'difference', 'offered-services', 'unoffered-services', 'responsibility' )
				)
			)
		);
	}elseif( 'portfolio' == $cpt ){
		$args = array(
			'post_type'				=> 'portfolio',
			'post_status'			=> 'publish',
			'posts_per_page'	=> -1,
			'orderby'					=> 'title',
			'order'						=> 'ASC'
		);
	}elseif( is_array( $cpt ) && array_key_exists( 'post_type', $cpt ) ){
		$args = array(
			'post_type'				=> $cpt[ 'post_type' ],
			'post_status'			=> 'publish',
			'posts_per_page'	=> -1,
			'orderby'					=> 'menu_order',
			'order'						=> 'ASC'
		);
	}
	$the_query = new WP_Query( $args );
	return $the_query;
}
//******************************************
// CPT - General + field taxonomy
//******************************************
function cpt_general(){
	$labels = array(
		'name'                => __( 'General', 'fenjoon' ),
		'singular_name'       => __( 'General', 'fenjoon' ),
		'menu_name'           => __( 'General', 'fenjoon' ),
		'parent_item_colon'   => __( 'Parent General', 'fenjoon' ),
		'all_items'           => __( 'All General', 'fenjoon' ),
		'view_item'           => __( 'View General', 'fenjoon' ),
		'add_new_item'        => __( 'Add New General', 'fenjoon' ),
		'add_new'             => __( 'Add New', 'fenjoon' ),
		'edit_item'           => __( 'Edit General', 'fenjoon' ),
		'update_item'         => __( 'Update General', 'fenjoon' ),
		'search_items'        => __( 'Search General', 'fenjoon' ),
		'not_found'           => __( 'Not found', 'fenjoon' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'fenjoon' ),
	);
	$args = array(
		'label'               => __( 'General', 'fenjoon' ),
		'description'         => __( 'General information for the site', 'fenjoon' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'						=> 'dashicons-admin-home',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'general', $args );
}
add_action( 'init', 'cpt_general', 0 );

function fjn_general_field_taxonomy(){
	register_taxonomy(
		'field',
		'general',
		array(
			'labels' => array(
			'name' => __( 'General Field', 'fenjoon' ),
			'add_new_item' => __( 'Add New Field', 'fenjoon' ),
			'new_item_name' => __( 'New Field', 'fenjoon' )
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true
		)
	);
}
add_action( 'init', 'fjn_general_field_taxonomy', 0 );
//******************************************
// custom field column for general cpt
//******************************************
function fjn_set_general_field_columns( $columns ){
    $columns['field'] = __( 'Field', 'fenjoon' );
    return $columns;
}
add_filter( 'manage_edit-general_columns', 'fjn_set_general_field_columns' );
function fjn_general_field_custom_columns( $column, $post_id ){
	switch ( $column ){
	case 'field' :
		$terms = get_the_term_list( $post_id , 'field' , '' , ',' , '' );
		if ( is_string( $terms ) )
			echo $terms;
		else
		    _e( 'Field not set!', 'fenjoon' );
		break;
	}
}
add_action( 'manage_general_posts_custom_column' , 'fjn_general_field_custom_columns', 10, 2 );
//******************************************
// CPT - Portfolio + cat taxonomy
//******************************************
function cpt_portfolio(){
	$labels = array(
		'name'                => __( 'Portfolio', 'fenjoon' ),
		'singular_name'       => __( 'Portfolio', 'fenjoon' ),
		'menu_name'           => __( 'Portfolio', 'fenjoon' ),
		'parent_item_colon'   => __( 'Parent Portfolio', 'fenjoon' ),
		'all_items'           => __( 'All Portfolio', 'fenjoon' ),
		'view_item'           => __( 'View Portfolio', 'fenjoon' ),
		'add_new_item'        => __( 'Add New Portfolio', 'fenjoon' ),
		'add_new'             => __( 'Add New', 'fenjoon' ),
		'edit_item'           => __( 'Edit Portfolio', 'fenjoon' ),
		'update_item'         => __( 'Update Portfolio', 'fenjoon' ),
		'search_items'        => __( 'Search Portfolio', 'fenjoon' ),
		'not_found'           => __( 'Not found', 'fenjoon' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'fenjoon' ),
	);
	$args = array(
		'label'               => __( 'Portfolio', 'fenjoon' ),
		'description'         => __( 'Portfolio items', 'fenjoon' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail' ),
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'						=> 'dashicons-admin-appearance',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'portfolio', $args );
}
add_action( 'init', 'cpt_portfolio', 0 );

function fjn_portfolio_cat_taxonomy(){
	register_taxonomy(
		'cat',
		'portfolio',
		array(
			'labels' => array(
			'name' => __( 'Portfolio Cat', 'fenjoon' ),
			'add_new_item' => __( 'Add New Cat', 'fenjoon' ),
			'new_item_name' => __( 'New Cat', 'fenjoon' )
			),
			'show_ui' => true,
			'show_tagcloud' => true,
			'hierarchical' => true
		)
	);
}
add_action( 'init', 'fjn_portfolio_cat_taxonomy', 0 );
//******************************************
// Add Porftfolio metaboxes
//******************************************
function fjn_portfolio_metaboxes( $postType ) {
	$types = array( 'portfolio' );
	if( in_array( $postType, $types ) ){
		add_meta_box(
			'portfolio_metadata',
			__( 'Portfolio Metadata', 'fenjoon' ),
			'create_portfolio_metadata',
			$postType,
			'normal'
		);
	}
}

function create_portfolio_metadata(){
	global $post;
	wp_nonce_field( basename( __FILE__ ), 'portfolio_metadata' );
	$metadata = get_post_meta( $post->ID );
	?>
	<table>
		<tr>
			<td>
				<label for="technology">
					<?php _e( 'technology', 'fenjoon' );?>
				</label>
			</td>
			<td>
				<input type="text" id="technology" name="technology" value="<?php echo $metadata['technology'][0];?>" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="start">
					<?php _e( 'start', 'fenjoon' );?>
				</label>
			</td>
			<td>
				<input type="text" id="start" name="start" value="<?php echo $metadata['start'][0];?>" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="finish">
					<?php _e( 'finish', 'fenjoon' );?>
				</label>
			</td>
			<td>
				<input type="text" id="finish" name="finish" value="<?php echo $metadata['finish'][0];?>" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="workforce">
					<?php _e( 'workforce', 'fenjoon' );?>
				</label>
			</td>
			<td>
				<input type="text" id="workforce" name="workforce" value="<?php echo $metadata['workforce'][0];?>" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="security">
					<?php _e( 'security', 'fenjoon' );?>
				</label>
			</td>
			<td>
				<input type="text" id="security" name="security" value="<?php echo $metadata['security'][0];?>" />
			</td>
		</tr>
	</table><?php
}
add_action( 'add_meta_boxes', 'fjn_portfolio_metaboxes', 10, 1 );

function save_portfolio_metadata(){
	global $post;
	$post_id = $post->ID;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( !wp_verify_nonce( $_POST['portfolio_metadata'], basename( __FILE__ ) ) ) return;
	if ( !current_user_can( 'edit_post', $post_id ) ) return;
	$metadata_arr = array( 'technology', 'start', 'finish', 'workforce', 'security' );
	foreach( $metadata_arr as $metadata ){
		$$metadata = $_POST[ $metadata ];
		if( $$metadata ) {
			update_post_meta( $post_id, $metadata, $$metadata );
		}
	}
}
add_action( 'save_post', 'save_portfolio_metadata' );
?>