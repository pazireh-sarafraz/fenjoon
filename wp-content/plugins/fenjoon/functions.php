<?php
//******************************************
// Sort object array elements by order key ( editors workforce )
//******************************************
function fjn_order_cmp( $a, $b ){
	return ($a->order < $b->order) ? -1 : (($a->order > $b->order) ? 1 : 0);
}
 
//******************************************
// CPT - Site Types
//******************************************
function cpt_sitetypes(){
	$labels = array(
		'name'                => __( 'Site Types', 'fenjoon' ),
		'singular_name'       => __( 'Site Type', 'fenjoon' ),
		'menu_name'           => __( 'Site Types', 'fenjoon' ),
		'parent_item_colon'   => __( 'Parent Site Type', 'fenjoon' ),
		'all_items'           => __( 'All Site Types', 'fenjoon' ),
		'view_item'           => __( 'View Site Type', 'fenjoon' ),
		'add_new_item'        => __( 'Add New Site Type', 'fenjoon' ),
		'add_new'             => __( 'Add New', 'fenjoon' ),
		'edit_item'           => __( 'Edit Site Type', 'fenjoon' ),
		'update_item'         => __( 'Update Site Type', 'fenjoon' ),
		'search_items'        => __( 'Search Site Types', 'fenjoon' ),
		'not_found'           => __( 'Not found', 'fenjoon' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'fenjoon' ),
	);
	$args = array(
		'label'               => __( 'Site Types', 'fenjoon' ),
		'description'         => __( 'Different site types, our team may design and develop', 'fenjoon' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'taxonomies'          => array( 'post_tag' ),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 2,
		'menu_icon'						=> 'dashicons-welcome-view-site',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'sitetypes', $args );
}
add_action( 'init', 'cpt_sitetypes', 0 );

//******************************************
// CPT - Modules
//******************************************
function cpt_modules(){
	$labels = array(
		'name'                => __( 'Modules', 'fenjoon' ),
		'singular_name'       => __( 'Module', 'fenjoon' ),
		'menu_name'           => __( 'Modules', 'fenjoon' ),
		'parent_item_colon'   => __( 'Parent Module', 'fenjoon' ),
		'all_items'           => __( 'All Modules', 'fenjoon' ),
		'view_item'           => __( 'View Module', 'fenjoon' ),
		'add_new_item'        => __( 'Add New Module', 'fenjoon' ),
		'add_new'             => __( 'Add New', 'fenjoon' ),
		'edit_item'           => __( 'Edit Module', 'fenjoon' ),
		'update_item'         => __( 'Update Module', 'fenjoon' ),
		'search_items'        => __( 'Search Modules', 'fenjoon' ),
		'not_found'           => __( 'Not found', 'fenjoon' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'fenjoon' ),
	);
	$args = array(
		'label'               => __( 'Modules', 'fenjoon' ),
		'description'         => __( 'Different Modules, our team may design and develop', 'fenjoon' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ,'page-attributes'),
		'taxonomies'          => array( 'post_tag', 'category' ),
		'hierarchical'        => true,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'						=> 'dashicons-align-left',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'modules', $args );
}
add_action( 'init', 'cpt_modules', 0 );

//******************************************
// CPT - Features
//******************************************
function cpt_features(){
	$labels = array(
		'name'                => __( 'Features', 'fenjoon' ),
		'singular_name'       => __( 'Feature', 'fenjoon' ),
		'menu_name'           => __( 'Features', 'fenjoon' ),
		'parent_item_colon'   => __( 'Parent Feature', 'fenjoon' ),
		'all_items'           => __( 'All Features', 'fenjoon' ),
		'view_item'           => __( 'View Feature', 'fenjoon' ),
		'add_new_item'        => __( 'Add New Feature', 'fenjoon' ),
		'add_new'             => __( 'Add New', 'fenjoon' ),
		'edit_item'           => __( 'Edit Feature', 'fenjoon' ),
		'update_item'         => __( 'Update Feature', 'fenjoon' ),
		'search_items'        => __( 'Search Features', 'fenjoon' ),
		'not_found'           => __( 'Not found', 'fenjoon' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'fenjoon' ),
	);
	$args = array(
		'label'               => __( 'Features', 'fenjoon' ),
		'description'         => __( 'Different Features, our team may design and develop', 'fenjoon' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ,'page-attributes'),
		'taxonomies'          => array( 'post_tag' ),
		'hierarchical'        => true,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
		'menu_icon'						=> 'dashicons-star-filled',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'features', $args );
}
add_action( 'init', 'cpt_features', 0 );
//******************************************
// CPT - Standards
//******************************************
function cpt_standards(){
	$labels = array(
		'name'                => __( 'Standards', 'fenjoon' ),
		'singular_name'       => __( 'Standard', 'fenjoon' ),
		'menu_name'           => __( 'Standards', 'fenjoon' ),
		'parent_item_colon'   => __( 'Parent Standard', 'fenjoon' ),
		'all_items'           => __( 'All Standards', 'fenjoon' ),
		'view_item'           => __( 'View Standard', 'fenjoon' ),
		'add_new_item'        => __( 'Add New Standard', 'fenjoon' ),
		'add_new'             => __( 'Add New', 'fenjoon' ),
		'edit_item'           => __( 'Edit Standard', 'fenjoon' ),
		'update_item'         => __( 'Update Standard', 'fenjoon' ),
		'search_items'        => __( 'Search Standards', 'fenjoon' ),
		'not_found'           => __( 'Not found', 'fenjoon' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'fenjoon' ),
	);
	$args = array(
		'label'               => __( 'Standards', 'fenjoon' ),
		'description'         => __( 'Different Standards, our team may design and develop', 'fenjoon' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail','page-attributes' ),
		'taxonomies'          => array( 'post_tag' ),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 8,
		'menu_icon'					  => 'dashicons-awards',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'standards', $args );
}
add_action( 'init', 'cpt_standards', 0 );

//******************************************
// CPT - Orders
//******************************************
function cpt_orders(){
	$labels = array(
		'name'                => __( 'Orders', 'fenjoon' ),
		'singular_name'       => __( 'Order', 'fenjoon' ),
		'menu_name'           => __( 'Orders', 'fenjoon' ),
		'all_items'           => __( 'All Orders', 'fenjoon' ),
		'view_item'           => __( 'View Order', 'fenjoon' ),
		'add_new_item'        => __( 'Add a New Order', 'fenjoon' ),
		'add_new'             => __( 'Add a New', 'fenjoon' ),
		'edit_item'           => __( 'Edit Order', 'fenjoon' ),
		'update_item'         => __( 'Update Order', 'fenjoon' ),
		'search_items'        => __( 'Search Orders', 'fenjoon' ),
		'not_found'           => __( 'Not found', 'fenjoon' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'fenjoon' ),
	);
	$args = array(
		'label'               => __( 'Orders', 'fenjoon' ),
		'description'         => __( 'The requests which are submitted known as ORDERS!', 'fenjoon' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor','comment' ),
		'exclude_from_search' => true,
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 9,
	  'menu_icon'					  => 'dashicons-cart',
		'has_archive'         => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'orders', $args );
}
add_action( 'init', 'cpt_orders', 0 );

//******************************************
// CPT - Projects
//******************************************	
function cpt_projects(){
	$labels = array(
		'name'                => __( 'Projects', 'fenjoon' ),
		'singular_name'       => __( 'Project', 'fenjoon' ),
		'menu_name'           => __( 'Projects', 'fenjoon' ),
		'all_items'           => __( 'All Projects', 'fenjoon' ),
		'view_item'           => __( 'View Project', 'fenjoon' ),
		'add_new_item'        => __( 'Add a New Project', 'fenjoon' ),
		'add_new'             => __( 'Add a New', 'fenjoon' ),
		'edit_item'           => __( 'Edit Project', 'fenjoon' ),
		'update_item'         => __( 'Update Project', 'fenjoon' ),
		'search_items'        => __( 'Search Projects', 'fenjoon' ),
		'not_found'           => __( 'Not found', 'fenjoon' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'fenjoon' ),
	);
	$args = array(
		'label'               => __( 'Projects', 'fenjoon' ),
		'description'         => __( 'The Projects which are submitted known as Projects!', 'fenjoon' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor','comment' ),
		'exclude_from_search' => true,
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 10,
	  'menu_icon'					  => 'dashicons-welcome-widgets-menus',
		'has_archive'         => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'projects', $args );
}
add_action( 'init', 'cpt_projects', 0 );
//******************************************
// Add Preselected list to Sitetypes page
//******************************************
function add_preselected_list_metabox(){
	if( is_admin() ){
		global $pagenow;
		if( 'post.php' == $pagenow ){
			add_meta_box( 
				'preselected',
				__('Preselected choices selected by selecting this Sitetype', 'fenjoon' ),
				'preselected',
				'sitetypes',
				'advanced',
				'core'
			); 
		}
	}
}

function preselected( $post ){
	$option_types = array( 'modules', 'features', 'standards' );
	$args = array( 'post_type' => $option_types, 'orderby' => 'menu_order', 'posts_per_page' => -1 );
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		wp_nonce_field(basename( __FILE__ ), 'save_sitetype');
		$sitetype_str = get_post_meta( $post->ID, 'sitetype_str', 1 );
		$sitetype_arr = array();
		if( !empty( $sitetype_str ) ) $sitetype_arr = explode( '+', $sitetype_str );
		$option_sections = array();
		foreach( $option_types as $option_type){
			$option_sections[ $option_type ] = array();
		}
		$parents = array();
		global $post;
		while( $the_query->have_posts() ){
			$the_query->the_post();
			if( 0 != $post->post_parent ) $parents[] = $post->post_parent;
			$option_sections[ $post->post_type ][ $post->ID ] = $post->post_title;
		}
		wp_reset_postdata();?>
		<ul><?php
		foreach( $option_sections as $key => $option_section ){
			$post_type = get_post_type_object( $key );
			if( $post_type && !empty( $option_sections[ $key ] ) ){?>
				<li class="section">
					<div class="section_title"><?php echo $post_type->label;?></div>
					<ul><?php
					foreach( $option_section as $choice_id => $choice_title ){
						if( in_array( $choice_id, $parents ) ) continue;	?>
						<li class="item">
							<input class="checkbox" type="checkbox" value="<?php echo $choice_id;?>" <?php echo (in_array( $choice_id, $sitetype_arr ) ? 'checked' : '');?> /><?php echo $choice_title;?>
						</li><?php
					}?>
					</ul>
				</li><?php
			}
		}?>
		</ul><?php
	}
	?>
	<input type="hidden" name="string" value="<?php echo $sitetype_str;?>"/>
	<?php
}
add_action( 'add_meta_boxes', 'add_preselected_list_metabox', 0 );

function save_preselected_list() {
	global $post;
	$post_id = $post->ID;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( !wp_verify_nonce( $_POST['save_sitetype'], basename( __FILE__ ) ) ) return;
	if ( !current_user_can( 'edit_post', $post_id ) ) return;
	$sitetype_str = $_POST['string'];
	if( $sitetype_str ) {
		update_post_meta( $post_id, 'sitetype_str', $sitetype_str );
	}
}
add_action( 'post_updated', 'save_preselected_list' );
//******************************************
// Add Children co-selection metabox to Modules - Modules page
//******************************************
function add_children_metabox(){
	if( is_admin() ){
		global $pagenow;
		if( 'post.php' == $pagenow ){
			global $post;
			if( empty( $post->post_parent ) ){
				$post_type = get_post_type_object( get_post_type( $post ) );
				add_meta_box( 
						'coselected_children',
						 __('Select child '.$post_type->label.' to be auto-selected by selecting this '.$post_type->labels->singular_name ),
						'children_list',
						'modules',
						'advanced',
						'core'
				);	
			}
		}
	}
}

function children_list( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'coselected_children' );
	$coselected_children_string = get_post_meta( $post->ID, 'coselected_children', 1 );
	$coselected_children_string = !empty( $coselected_children_string ) ? $coselected_children_string : '';
	$coselected_children_array = explode( '+', $coselected_children_string );
	$children = get_children( array( 'post_type' => $post->post_type, 'post_parent' => $post->ID ) );
	foreach( $children as $child){ ?>
		<input class="checkbox" type="checkbox" name="child-<?php echo $child->ID;?>" value="<?php echo $child->ID;?>" <?php echo (in_array( $child->ID, $coselected_children_array ) ? 'checked' : ''); ?> /><?php echo $child->post_title;?><br/>
<?php	} ?>
	<input type="hidden" name="string" value="<?php echo $coselected_children_string;?>"/>
<?php
}
add_action( 'add_meta_boxes','add_children_metabox',0 );

function save_coselected_children() {
	global $post;
	$post_id = $post->ID;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( !wp_verify_nonce( $_POST['coselected_children'], basename( __FILE__ ) ) ) return;
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) return;
	}else{
		if ( !current_user_can( 'edit_post', $post_id ) )
		return;
	}
	$coselected_children_string = $_POST['string'];
	if( $coselected_children_string ) update_post_meta( $post_id, 'coselected_children', $coselected_children_string );
}
add_action( 'save_post', 'save_coselected_children' );

//******************************************
// Add workforce metabox to Module & Feature & Standards page
//******************************************
function workforce_metabox( $postType ) {
	$types = array( 'modules', 'features', 'standards' );
	if( in_array( $postType, $types ) ){
		add_meta_box(
			'workforce_metabox',
			__( 'Workforce Metabox', 'fenjoon' ),
			'create_workforce_metabox',
			$postType,
			'side'
		);
	}
}

function create_workforce_metabox(){
	global $post;
	wp_nonce_field( basename( __FILE__ ), 'workforce_metabox' );
	$workforce = get_post_meta( $post->ID, 'workforce', true );?>
	<p><?php _e( 'Workforce needed (Man-Hour)', 'fenjoon' );?></p>
	<input type="text" id="workforce_value" name="workforce_value" value="<?php echo esc_attr( $workforce );?>" />
	<?php
}
add_action( 'add_meta_boxes', 'workforce_metabox', 10, 1 );

function save_workforce_metabox(){
	global $post;
	$post_id = $post->ID;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( !wp_verify_nonce( $_POST['workforce_metabox'], basename( __FILE__ ) ) ) return;
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) return;
	}else{
		if ( !current_user_can( 'edit_post', $post_id ) ) return;
	}
	$workforce = $_POST['workforce_value'];
if( $workforce || 0 == $workforce ) {
		update_post_meta( $post_id, 'workforce', $workforce );
	}

}
add_action( 'save_post', 'save_workforce_metabox' );
//******************************************
// Add order owner to Order page
//******************************************
function add_order_owner_metabox(){
	if( is_admin() ){
		global $pagenow;
		if( 'post-new.php' == $pagenow || 'post.php' == $pagenow ){
			add_meta_box( 
				'order_owner',
				__('Choose order owner', 'fenjoon' ),
				'order_owner',
				'orders',
				'side',
				'core'
			); 
		}
	}
}
function order_owner(){
	global $post;
	$post_id = $post->ID;
	$order_owner_id = get_post_field( 'post_author', $post_id );
	$args = array(
		'selected'										=> $order_owner_id,
		'name'												=> 'order_owner_id',
	);
	wp_dropdown_users($args);	
	wp_nonce_field(basename( __FILE__ ), 'order_owner');
}
   
add_action( 'add_meta_boxes', 'add_order_owner_metabox', 0 );

function save_order_owner_metabox(){
	global $post;
	$post_id = $post->ID;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( !wp_verify_nonce( $_POST['order_owner'], basename( __FILE__ ) ) ) return;
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) return;
	}else{
		if ( !current_user_can( 'edit_post', $post_id ) ) return;
	}
	$order_owner_id = $_POST['order_owner_id'];
	if( $order_owner_id ){
		$args = array(
			'ID' 						=> $post_id,
			'post_author' 	=> $order_owner_id,
			'post_type' 		=> 'orders',
			'post_status'		=> 'publish'
		);
		remove_action( 'save_post', 'save_order_owner_metabox' );
		wp_update_post( $args );
		$project_id = get_post_meta( $post_id, 'project_id', 1 );
		if( !empty( $project_id ) ){
			$args = array(
				'ID' 						=> $project_id,
				'post_author' 	=> $order_owner_id,
				'post_type' 		=> 'projects',
				'post_status'		=> 'publish'
			);
			wp_update_post( $args );
		}
	}
}
add_action( 'save_post', 'save_order_owner_metabox' );
//******************************************
// Add order list to Order page
//******************************************
function add_order_list_metabox(){
	if( is_admin() ){
		global $pagenow;
		if( 'post.php' == $pagenow ){
			add_meta_box( 
				'order_list',
				__('Submitted Choices selected by Costumer', 'fenjoon' ),
				'order_list',
				'orders',
				'advanced',
				'core'
			); 
		}
	}
}

function order_list( $post ){
	$order_list = array( 'modules', 'features', 'standards' );
	$args = array( 'post_type' => $order_list, 'orderby' => 'menu_order', 'posts_per_page' => -1 );
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		wp_nonce_field(basename( __FILE__ ), 'save_order');
		$order_str = get_post_meta( $post->ID, 'order_str', 1 );
		$order_arr = array();
		$progress_arr = array();
		if( !empty( $order_str ) ) $order_arr = explode( '+', $order_str );
		if( !empty( $order_arr ) ){
			$project_id = get_post_meta( $post->ID, 'project_id', 1 );
			if( !empty( $project_id ) ){
				$progress_str = get_post_meta( $project_id, 'progress_str', 1 );
				if( !empty( $progress_str ) ) $progress_arr = explode( '+', $progress_str );
			}
		}
		$order_sections = array();
		foreach( $order_list as $order_type){
			$order_sections[ $order_type ] = array();
		}
		$parents = array();
		global $post;
		while( $the_query->have_posts() ){
			$the_query->the_post();
			if( 0 != $post->post_parent ) $parents[] = $post->post_parent;
			$order_sections[ $post->post_type ][ $post->ID ] = $post->post_title;
		}
		wp_reset_postdata();?>
		<ul><?php
		foreach( $order_sections as $key => $order_section ){
			$post_type = get_post_type_object( $key );
			if( $post_type && !empty( $order_sections[ $key ] ) ){?>
				<li class="section">
					<div class="section_title"><?php echo $post_type->label;?></div>
					<ul><?php
					foreach( $order_section as $choice_id => $choice_title ){
						if( in_array( $choice_id, $parents ) ) continue;	?>
						<li class="item">
							<input class="checkbox" type="checkbox" name="post-<?php echo $choice_id;?>" value="<?php echo $choice_id;?>" <?php echo (in_array( $choice_id, $order_arr ) ? 'checked' : '');echo (in_array( $choice_id, $progress_arr ) ? ' disabled' : ''); ?> /><?php echo $choice_title;?>
						</li><?php
					}?>
					</ul>
				</li><?php
			}
		}?>
		</ul><?php
	}
	?>
	<input type="hidden" name="string" value="<?php echo $order_str;?>"/>
	<?php
}
add_action( 'add_meta_boxes', 'add_order_list_metabox', 0 );

function save_order_list() {
	global $post;
	$post_id = $post->ID;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( !wp_verify_nonce( $_POST['save_order'], basename( __FILE__ ) ) ) return;
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) return;
	}else{
		if ( !current_user_can( 'edit_post', $post_id ) ) return;
	}
// Order list metabox
	$order_str = $_POST['string'];
	if( $order_str ) {
		update_post_meta( $post_id, 'order_str', $order_str );
	}

// Order last changes metabox
	$changes_str = get_post_meta( $post_id, 'changes_str', 1 );
	$changes_str = !empty( $changes_str ) ? $changes_str : '';
	$changes_arr = array();
	if ( !empty( $changes_str ) ) $changes_arr = explode( "+", $changes_str );
	if( count( $changes_arr ) == 5 ) {array_shift( $changes_arr );};
	global $current_user;
	$change_str = $current_user->ID;
	if( ! is_plugin_active( 'wp-jalali/wp-jalali.php' ) ){ //this function use to specify that jdata plugin is active or not
		$date_info = date('h:i - j F Y '); //if jdate is not active we show the data in gregorian calender
	}else{
		$date_info = jdate( 'h:i - j F Y', strtotime( get_the_modified_date() ) );
	};
	$change_str = $change_str.'*'.$date_info;
	array_push( $changes_arr, $change_str );
	$changes_str = implode( "+", $changes_arr );
	update_post_meta( $post_id, 'changes_str', $changes_str );
	
// Order to Project metabox
	$project_id = get_post_meta( $post_id, 'project_id', 1 );
	if ( '' != $project_id ) return;
	if ( !current_user_can( 'publish_post' ) ) return;
	if ( !isset( $_POST['chkswchipt'] ) ) return;
	$new_project = array(
		'post_title'    => $post->post_title,
		'post_content'  => $post->post_content,
		'post_type'   	=> 'projects',
		'post_status'		=> 'publish',
		'post_author'		=> $post->post_author
	);
	remove_action( 'post_updated', 'save_order_list' );
	$project_id = wp_insert_post( $new_project );
	if ( 0 != $project_id ){
		update_post_meta( $project_id, 'order_id', $post_id );
		update_post_meta( $post_id, 'project_id', $project_id );
		if( $order_str ) update_post_meta( $project_id, 'project_str', $order_str );
	}
}
add_action( 'post_updated', 'save_order_list' );

//******************************************
// Add Order - Project switch to Order page
// Add last changes to Order page
//******************************************
function add_order_to_project_metabox(){
	if( is_admin() ){
		global $pagenow;
		if( 'post.php' == $pagenow ){
			add_meta_box( 
				'order_to_project',
				__('Start its Project now!', 'fenjoon' ),
				'order_to_project',
				'orders',
				'side',
				'core'
			);
			global $post;
			$changes_str = get_post_meta( $post->ID, 'changes_str', 1 );
			if( empty( $changes_str ) ) return;
			add_meta_box( 
				'last_change_by',
				__('Last changes of this order', 'fenjoon' ),
				'last_change_by',
				'orders',
				'side',
				'core'
			);
		}
	}
}

function order_to_project( $post ){
	$project_id = get_post_meta( $post->ID, 'project_id', 1 );
	if ( '' != $project_id ){ 
		edit_post_link(__('Edit Project No. ', 'fenjoon' ).$project_id , '<p>', '</p>', $project_id );
	}else{ ?>
	<p><?php _e('Please note that this is a ONE TIME start and your changes are irreversible!','fenjoon');?></p>
	<?php } ?>	<div id="order-to-project-switch">
		<div class="checkbox-switch">
			<input type="checkbox" name="chkswchipt" class="chkswchipt" <?php if ( '' != $project_id ) echo 'checked disabled';?>>
			<div class="checkbox-animate">
				<span class="checkbox-on"><?php _e('Project Started', 'fenjoon');?></span>
				<span class="checkbox-off"><?php _e('Change to Project', 'fenjoon');?></span>
			</div>
		</div>
	</div>
<?php
}

function last_change_by(){
	global $post;
	$changes_str = get_post_meta( $post->ID, 'changes_str', 1 );
	if( empty( $changes_str ) ) return;
	$changes_arr = explode( '+', $changes_str );?>
	<ul class="listofrows"><?php
	foreach( $changes_arr as $change ){
		$change_arr = explode( '*', $change );
		$user_info = get_userdata( $change_arr[0] );
		$change_time = $change_arr[1]; ?>
		<li class="row">
			<div class="right"><?php echo $user_info->display_name;?></div>
			<div class="left"><?php echo $change_time;?></div>
		</li>
<?php
	}?>
	</ul><?php
}
add_action( 'add_meta_boxes', 'add_order_to_project_metabox', 0 );
//******************************************
// frontend post
//******************************************
function fjn_frontend_post() {
	if( !empty( $_POST ) && !is_admin() ){
		if( !empty( $_POST['fjn_nonce'] ) ){
			$current_user		= wp_get_current_user();
			$msg = array();
			$err = array();
			if( wp_verify_nonce( $_POST['fjn_nonce'], 'fjn_new-order' ) ){
				if ( empty( $_POST['action'] ) || 'new_order' != $_POST['action'] ) return;
				if ( !is_user_logged_in() ) auth_redirect();
				if ( !current_user_can( 'edit_posts' ) ) {
					// wp_redirect( home_url( '/' ) );
					exit;
				}
				$title				= $_POST['title'];
				if( empty( $title ) ) {
					$err[] = 1;
				}else{
					$post_id = wp_insert_post(
						array(
							'post_author'   => $current_user->ID,
							'post_type'			=> 'orders',
							'post_title'    => $title,
							'post_content'  => $title,
							'tax_input'			=> array( 'field' => $field ),
							'post_status'   => 'pending'
						)
					);
					if( isset( $post_id ) ){
						$msg[] = 1; // order submitted successfully!
						update_post_meta( $post_id, 'order_str', $_POST['string'] );
					}else{
						$err[] = 1; // order did not submit and error occurred!
					}
				}
			}
			$msg = implode( '-', $msg );
			$err = implode( '-', $err );
			$query_var = '';
			if( $msg ){
				$query_var .= '?msg=' . $msg;
				if( $err ) $query_var .= '&err=' . $err;
			}elseif( $err ){
				$query_var .= '?err=' . $err;
			}
			$referer = wp_get_referer();
			if( $referer ){
				$referer = strtok( $referer, '?' );
				wp_redirect( $referer . $query_var );
			}else{
				$referer = $_POST['referrer'];
				$referer = filter_var( $referer, FILTER_SANITIZE_URL );
				if ( !filter_var( $referer, FILTER_VALIDATE_URL ) === false ){
					$referer_arr = parse_url( $referer );
					$home_url = parse_url( home_url() );
					if( $referer_arr['host'] == $home_url['host'] )
						$referer = strtok( $referer, '?' );
						wp_redirect( $referer . $query_var );
				}
			}
			exit;
		}
	}
}
add_action( 'init', 'fjn_frontend_post' );
//******************************************
// Add options
//******************************************
if( is_admin() ){
	function fenjoon_settings_page(){
		add_options_page(
			__( 'Fenjoon Settings','fenjoon'), 
			__( 'Fenjoon Settings','fenjoon'), 
			'manage_options', 
			'fenjoon_settings', 
			'create_fenjoon_settings_page' 
    );
	}
	add_action( 'admin_menu', 'fenjoon_settings_page' );
	
	function create_fenjoon_settings_page(){?>
		<div class="wrap">
			<form method="post" action="options.php">
				<?php
					settings_fields( 'fenjoon_settings' );   
					do_settings_sections('fenjoon_settings');
					submit_button();
				?>
			</form>
		</div>
	<?php
	}

	function register_fenjoon_settings(){
		register_setting(
		'fenjoon_settings', 
		'fenjoon_settings', 
		'sanitize' 
		);

		add_settings_section(
		'workforce_settings',
		__( 'Work Force Settings', 'fenjoon' ), 
		'print_display_section' , 
		'fenjoon_settings' 
		);

		add_settings_field(
		'developer_count', 
		__( 'Developers Count', 'fenjoon' ), 
		'developer_count_callback' , 
		'fenjoon_settings', 
		'workforce_settings'         
		);      

		add_settings_field(
		'man_hour_fee', 
		__( 'Man-Hour Fee', 'fenjoon' ), 
		'man_hour_fee_callback', 
		'fenjoon_settings', 
		'workforce_settings'
		);
		
		add_settings_field(
		'daily_work_hours', 
		__( 'Daily Work Hours', 'fenjoon' ), 
		'daily_work_hours_callback', 
		'fenjoon_settings', 
		'workforce_settings'
		);
	}
	add_action( 'admin_init', 'register_fenjoon_settings' );

 	function sanitize( $input ){
		$new_input = array();
		if( isset( $input['developer_count'] ) )
			$new_input['developer_count'] = absint( $input['developer_count'] );

		if( isset( $input['man_hour_fee'] ) )
			$new_input['man_hour_fee'] = absint ($input['man_hour_fee'] );

		if( isset( $input['daily_work_hours'] ) )
			$new_input['daily_work_hours'] = absint( $input['daily_work_hours'] );
		
		return $new_input;
	}

	function print_display_section(){
		echo '<p>Select general work force settings for the Fenjoon group.</p>';
	}
 
	// Get the settings option array and print one of its values
	function developer_count_callback(){
		$options = get_option( 'fenjoon_settings' );
		echo(
		'<input type="text" id="developer_count" name="fenjoon_settings[developer_count]" value="'.esc_attr( $options['developer_count'] ).'" />'
		);
	}
	// Get the settings option array and print one of its values
	function man_hour_fee_callback(){
		$options = get_option( 'fenjoon_settings' );
		echo(
		'<input type="text" id="man_hour_fee" name="fenjoon_settings[man_hour_fee]" value="'.esc_attr( $options['man_hour_fee'] ).'" />'
		);
	}

	function daily_work_hours_callback(){
		$options = get_option( 'fenjoon_settings' );
		echo(
		'<input type="text" id="daily_work_hours" name="fenjoon_settings[daily_work_hours]" value="'.esc_attr( $options['daily_work_hours'] ).'" />'
		);
	}
	
}

//******************************************
// Add project list metabox to Projects - Project edit page
//******************************************
function add_project_list_metabox(){
	if( is_admin() ){
		global $pagenow;
		if( 'post.php' == $pagenow ){
			add_meta_box( 
				'project_list',
				__('Project Progress', 'fenjoon' ),
				'project_list',
				'projects',
				'advanced',
				'low'
			);
			add_meta_box( 
				'last_change_by',
				__('Last changes of this Project', 'fenjoon' ),
				'last_change_by',
				'projects',
				'side',
				'core'
			);
		}
	}
}

function display_editor( $editors, $assign, $choice_id ){
	if( is_super_admin() ){?>
		<select class="dropdown" post="<?php echo $choice_id;?>">
		<option selected><?php __( 'Choose editor', 'fenjoon' );?></option><?php
		foreach( $editors as $editor ){?>
			<option value="<?php echo $editor->ID;?>" <?php if( $assign[ $choice_id ] == $editor->ID ) echo 'selected';?>><?php echo $editor->display_name;?></option><?php
		}?>
		</select><?php
	}else{
?>
		<span><?php
		if( !empty( $assign ) ){
			foreach( $editors as $editor ){
				if( $assign[ $choice_id ] == $editor->ID ) echo $editor->display_name;
			}
		}else{
			_e( 'Not assigned yet', 'fenjoon' );
		}?>
		</span><?php
	}
}

function project_list( $post ){
	$project_list = array( 'sitetypes', 'modules', 'features', 'standards' );
	$project_id = $post->ID;
	$order_id = get_post_meta( $project_id, 'order_id', 1 );
	$order_str = get_post_meta( $order_id, 'order_str', 1 );
	$order_arr = array();
	if( !empty( $order_str ) ) $order_arr = explode( '+', $order_str );
	$project_str = get_post_meta( $project_id, 'project_str', 1 );
	$project_arr = array();
	if( !empty( $project_str ) ) $project_arr = explode( '+', $project_str );
	$removed_arr = array_diff( $project_arr, $order_arr );
	$added_arr = array_diff( $order_arr, $project_arr );	
	$args = array( 'post__in' => array_merge( $project_arr, $added_arr, $removed_arr ), 'post_type' => $project_list, 'orderby' => 'menu_order', 'posts_per_page' => -1 );
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		wp_nonce_field(basename( __FILE__ ), 'save_project');
		$progress_str = get_post_meta( $project_id, 'progress_str', 1 );
		$progress_arr = array();
		if( !empty( $progress_str ) )	$progress_arr = explode( '+', $progress_str );
		$done_str = get_post_meta( $project_id, 'done_str', 1 );
		$done_arr = array();
		if( !empty( $done_str ) )	$done_arr = explode( '+', $done_str );
		$editor_str = get_post_meta( $project_id, 'editor_str', 1 );
		$editors_arr = array();
		if( !empty( $editor_str ) )	$editors_arr = explode( '+', $editor_str );
		$assign = array();
		foreach( $editors_arr as $activity_str ){
			if( !empty( $activity_str ) )	$activity_arr = explode( '-', $activity_str );
			$activity_id = $activity_arr[0];
			$editor_id = $activity_arr[1];
			$assign[ $activity_id ] = $editor_id;
		}
		$editors = get_users( array( 'role' => 'editor', 'fields' => array( 'ID', 'display_name') ) );
		//if( empty( $editors ) ) return; Activate if the site has at least one editor
		$sorted_by_free_time = fjn_editors_by_free_time();
		foreach( $sorted_by_free_time as $key => $value ){
			foreach( $editors as $editor ){
				if( $editor->ID == $key ) $editor->order = $value;
			}
		}
		usort( $editors, 'fjn_order_cmp' );
		$project_sections = array();
		foreach( $project_list as $project_type){
			$project_sections[ $project_type ] = array();
		}
		$parents = array();
		global $post;
		while( $the_query->have_posts() ){
			$the_query->the_post();
			if( 0 != $post->post_parent ) $parents[] = $post->post_parent;
			$project_sections[ $post->post_type ][ $post->ID ] = $post->post_title;
		}
		wp_reset_query();?>
		<div class="legend">
			<ul>
				<li class="item"><span class="progress"><input type="checkbox"><?php _e('In Progress', 'fenjoon');?></span></li>
				<li class="item"><span class="done"><input type="checkbox"><?php _e('Done', 'fenjoon');?></span></li>
				<li class="item text"><?php _e('Still in order', 'fenjoon');?></li>
				<li class="item text added"><?php _e('Added to order', 'fenjoon');?></li>
				<li class="item text removed"><?php _e('Removed from order', 'fenjoon');?></li>
			</ul>
		</div>
		<ul><?php
		foreach( $project_sections as $key => $project_section ){
			$post_type = get_post_type_object( $key );
			if( $post_type && !empty( $project_sections[ $key ] ) ){?>
				<li class="section">
					<div class="section_title"><?php echo $post_type->label;?></div>
					<ul><?php
					foreach( $project_section as $choice_id => $choice_title ){
						if( in_array( $choice_id, $parents ) ) continue;	?>
						<li class="item<?php if( in_array( $choice_id, $added_arr ) ){ echo ' added';}elseif( in_array( $choice_id, $removed_arr ) ){ echo ' removed';}; ?>"><span class="editor"><?php display_editor( $editors, $assign, $choice_id );?></span><span class="progress"><input class="checkbox" type="checkbox" name="post-<?php echo $choice_id;?>" value="<?php echo $choice_id;?>" <?php echo (in_array( $choice_id, $progress_arr ) ? 'checked' : '');echo (in_array( $choice_id, $removed_arr ) ? ' disabled' : ''); ?> /></span><span class="done"><input class="checkbox_done" type="checkbox" name="post-done-<?php echo $choice_id;?>" value="<?php echo $choice_id;?>" <?php echo (in_array( $choice_id, $done_arr ) ? 'checked' : '');echo (in_array( $choice_id, $removed_arr ) ? ' disabled' : ''); ?> /></span>
							<span class="title"><?php echo $choice_title;?></span>
						</li><?php
					}?>
					</ul>
				</li><?php
			}
		}?>
		</ul><?php
	}?>
	<input type="hidden" name="string" value="<?php echo $progress_str;?>"/>
	<input type="hidden" name="string_done" value="<?php echo $done_str;?>"/>
	<input type="hidden" name="string_dropdown" value="<?php echo $editor_str;?>"/>
<?php
	
}
add_action( 'add_meta_boxes', 'add_project_list_metabox', 0 );

function save_project_list(){
	global $post;
	$post_id = $post->ID;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( !wp_verify_nonce( $_POST['save_project'], basename( __FILE__ ) ) ) return;
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) return;
	}else{
		if ( !current_user_can( 'edit_post', $post_id ) ) return;
	}
// Project list metabox
	$progress_str = $_POST['string'];
	if( $progress_str ) update_post_meta( $post_id, 'progress_str', $progress_str );
	$done_str = $_POST['string_done'];
	if( $done_str ) update_post_meta( $post_id, 'done_str', $done_str );
	$editor_str = $_POST['string_dropdown'];
	if( $editor_str ) update_post_meta( $post_id, 'editor_str', $editor_str );
	
	//Insert the tasks assigned to specific Editor in wp_tasks table
	fjn_assign_tasks_to_editors( $post_id );		

	
// Project last changes metabox
	$changes_str = get_post_meta( $post_id, 'changes_str', 1 );
	$changes_str = !empty( $changes_str ) ? $changes_str : '';
	$changes_arr = array();
	if ( !empty( $changes_str ) ) $changes_arr = explode( "+", $changes_str );
	if( count( $changes_arr ) == 5 ) {array_shift( $changes_arr );};
	global $current_user;
	$change_str = $current_user->ID;
	if ( ! is_plugin_active( 'wp-jalali/wp-jalali.php' ) ){ //this function use to specify that jdata plugin is active or not
		$date_info = date('h:i - j F Y'); //if jdate is not active we show the data in gregorian calender
	}else{
		$date_info = jdate( 'h:i - j F Y', strtotime( get_the_modified_date() ) );
	};
	$change_str = $change_str.'*'.$date_info;
	array_push( $changes_arr, $change_str );
	$changes_str = implode( "+", $changes_arr );
	update_post_meta( $post_id, 'changes_str', $changes_str );	
}
add_action( 'post_updated', 'save_project_list' );


//******************************************
// Add project progress metabox - Project edit page
//******************************************
function fjn_add_project_progress_metabox(){
	if( is_admin() ){
		global $pagenow;
		if( 'post.php' == $pagenow ){
			add_meta_box( 
				'project_progress',
				__('Project Progress', 'fenjoon' ),
				'fjn_project_progress',
				'projects',
				'side',
				'low'
			);
		}
	}
}

function fjn_project_progress( $post ){
	$project_list = array( 'sitetypes', 'modules', 'features', 'standards' );
	$project_id = $post->ID;
	$order_id = get_post_meta( $project_id, 'order_id', 1 );
	$order_str = get_post_meta( $order_id, 'order_str', 1 );
	$order_arr = array();
	if( !empty( $order_str ) ) $order_arr = explode( '+', $order_str );
	$project_str = get_post_meta( $project_id, 'project_str', 1 );
	$project_arr = array();
	if( !empty( $project_str ) ) $project_arr = explode( '+', $project_str );
	$project_count = count( $order_arr );
	$removed_arr = array_diff( $project_arr, $order_arr );
	$added_arr = array_diff( $order_arr, $project_arr ); 
	$args = array( 'post__in' => array_merge( $project_arr, $added_arr, $removed_arr ), 'post_type' => $project_list, 'orderby' => 'menu_order', 'posts_per_page' => -1 );
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
	wp_nonce_field(basename( __FILE__ ), 'save_project');
	$progress_str = get_post_meta( $project_id, 'progress_str', 1 );
	$progress_arr = array();
	if( !empty( $progress_str ) ) $progress_arr = explode( '+', $progress_str );
		$done_str = get_post_meta( $project_id, 'done_str', 1 );
		$done_arr = array();
		if( !empty( $done_str ) ) $done_arr = explode( '+', $done_str );
		$project_done_count=count($done_arr);
		wp_reset_query();
		if( 0 == $project_count ) $project_count = 1;
		echo '%'.$project_done_count / $project_count * 100;
	}
}

add_action( 'add_meta_boxes', 'fjn_add_project_progress_metabox', 10, 1 );

//******************************************
// Last Seen User Update
//******************************************

function fjn_user_last_login(){
	$current_user = wp_get_current_user();
	$current_user_id = $current_user->id;
	$date_info = date('Y-m-d H:i:s'); 
	update_user_meta( $current_user_id, 'last_login', $date_info );
	update_user_meta( $current_user_id, 'last_login_time', time() );
/* Get Info Last Seen User BY 
get_user_meta( $current_user_id, 'last_login', 1 );
OR
get_user_meta( $current_user_id, 'last_login_time', 1 );
*/
};
add_action( 'wp_loaded', 'fjn_user_last_login', 10 , 2 );


//******************************************
// Add Notification User Tasks
//******************************************


function fjn_create_tasks_menu() {
	global $wpdb;
	global $wp_admin_bar;
	$table_tasks = $wpdb->prefix.'tasks';
	$current_user = wp_get_current_user();
	$current_user_id = $current_user->id;
	$seen_user = $wpdb -> get_col( "SELECT seen_date FROM {$table_tasks} WHERE editor_id = {$current_user_id}" );
	$seen_user_count = count($seen_user);
	$count_tasks = 0;
	for( $x = 0; $x < $seen_user_count; $x++ ){
	  if( $seen_user[$x] == 0 || $seen_user[$x] == null ){
	 	  $count_tasks++;
		}
	}
	$menu_id = 'tasks';
	$wp_admin_bar->add_menu(
		array(
			'id' => $menu_id,
			'title' => $count_tasks . " " . __('New Tasks') ,
			'href' => 'users.php?page=tasks_user',
		)
	); 
}
add_action('admin_bar_menu', 'fjn_create_tasks_menu', 1000);


//******************************************
// Check All Users Last Seen
//******************************************

function fjn_check_users_seen(){
	global $wpdb;
	$tasks_table = $wpdb->prefix . 'tasks';
	$query_user_seen = $wpdb->get_results( "SELECT task_id, editor_id, seen_date FROM {$tasks_table} WHERE seen_date = null OR seen_date = 0 " );
	$for_countr = count( $query_user_seen );
	for( $y = 0; $y <= $for_countr; $y++ ){
		$last_user_seen_time = get_user_meta( $query_user_seen[$y]->editor_id, 'last_login_time', 1 );
		$last_user_seen = get_user_meta( $query_user_seen[$y] -> editor_id, 'last_login', 1 );
		if( time() - $last_user_seen_time > 3600 ){
			$wpdb->update(
				$tasks_table ,
				array( 'seen_date' => $last_user_seen ),
				array( 'editor_id' => $query_user_seen[$y]->editor_id,'task_id' => $query_user_seen[$y]->task_id )
		  );
		}
	}
}
add_action( 'wp_loaded', 'fjn_check_users_seen', 9 , 2 );

//******************************************************
// Insert the assigned tasks of Editors to the database
//******************************************************

function fjn_assign_tasks_to_editors($project_id){	//assign tasks to editors in wp_tasks table in database to inform editors what they do!!
	$editor_str = get_post_meta( $project_id, 'editor_str', 1 );
	$editors_arr = array();
	if( !empty( $editor_str ) )	$editors_arr = explode( '+', $editor_str );
	
	foreach( $editors_arr as $activity_str ){
		if( !empty( $activity_str ) )	$activity_arr = explode( '-', $activity_str );
		$activity_id = $activity_arr[0];
		$editor_id = $activity_arr[1];
		fjn_insert_record_to_db( $editor_id, $activity_id, $project_id );		
	}
}

//******************************************
// Insertion of records function
//******************************************

function fjn_insert_record_to_db( $editor_id, $activity_id, $project_id ){
	global $wpdb;
	$tasks_table = $wpdb->prefix.'tasks';
	$activity_check=$wpdb->query(
	"SELECT  activity_id   FROM  $tasks_table   WHERE  activity_id = $activity_id"
	);
	if ( !$activity_check ){								 //INSERTION
		$data=array(
		'task_id' => "",
		'activity_id' => $activity_id,
     	'project_id' => $project_id, 
		'editor_id' => $editor_id,     
		'assign_date' => date("Y-m-d H:i:s")
		);
	
		$format= array('%d','%d','%d','%d','%s');
		$wpdb->insert( $tasks_table , $data , $format );
	}
	else{    // UPDATE the task and assign 0 to inactive task
		$editor=$wpdb->get_results(  "SELECT   editor_id	FROM  $tasks_table	 WHERE  activity_id = $activity_id"
									);
		$last=count($editor);	
		if ($editor[$last-1]->editor_id != $editor_id){
			$wpdb->query(
						" UPDATE $tasks_table	 SET active = 0		WHERE activity_id = $activity_id"
						);
		$data=array(
			'task_id' => "",
			'activity_id' => $activity_id,
			'project_id' => $project_id,  
			'editor_id' => $editor_id,
			'assign_date' => date("Y-m-d H:i:s")
			);
	
		$format= array('%d','%d','%d','%d','%s');
		$wpdb->insert( $tasks_table , $data , $format );	
		}
	}
}
//******************************************
// User Tasks
//******************************************
function fjn_task_menu(){
	add_users_page( __( 'My Tasks', 'fenjoon' ), __( 'My Tasks', 'fenjoon' ), 'edit_others_posts', 'tasks_user', 'fjn_tasks' );
}
add_action( 'admin_menu', 'fjn_task_menu' );
function fjn_tasks(){
 	$fjn_task_list = new Task_List_Table();
	$fjn_task_list->prepare_items();?>
	<div class="wrap">
		<h2><?php _e( 'All tasks assigned to you over time', 'fenjoon' );?></h2>
		<?php $fjn_task_list->display(); ?>
	</div><?php
}
add_action( 'admin_head', 'my_column_thumbnail_width' );
function my_column_thumbnail_width(){?>
<style type="text/css">
.column-col_task_id{width:6%;}
.column-col_activity_title{width:25%;}
.column-col_project_title{width:35%;}
.column-col_assign_date{width:10%;}
.column-col_seen_date{width:10%;}
.column-col_start_date{width:10%;}
.column-col_done_date{width:10%;}
</style>
<?php
}

//*******************************************
// Get editors list by free time
//*******************************************
function fjn_get_meta_by_key( $key ){
	global $wpdb;
	if( empty( $key ) ) return;
	$query = "SELECT post_id, meta_key, meta_value FROM {$wpdb->postmeta} WHERE meta_key = '" . $key ."'";
	$r = $wpdb->get_results( $query, ARRAY_A );
	$workforce = array();
	foreach( $r as $row ){
		$post_id = array_shift( $row );
		$workforce[$post_id] = $row['meta_value'];
	}
	return $workforce;
}

function fjn_editors_by_free_time(){
	global $wpdb;
	$workforce_values = fjn_get_meta_by_key( 'workforce' );
	$tasks_table = $wpdb->prefix.'tasks';
	$query_month = "SELECT editor_id, activity_id, start_date FROM {$tasks_table} 
		WHERE EXTRACT( YEAR_MONTH FROM start_date ) = EXTRACT( YEAR_MONTH FROM NOW() )";
	$query = "SELECT `editor_id`, `activity_id`, count(1) AS `count` FROM ({$query_month}) nested GROUP BY `editor_id`, `activity_id`";
	$r = $wpdb->get_results( $query, ARRAY_A );
	$workforce = array();
	foreach( $r as $row ){
		$editor_id = $row['editor_id'];
		if( !isset( $workforce[$editor_id] ) ) $workforce[$editor_id] = 0;
		$activity_id = $row['activity_id'];
		$workforce[$editor_id] += (int)$workforce_values[$activity_id];
	}
	asort( $workforce );
	return $workforce;
}

//******************************************
// Insertion of records to payments table
//******************************************

function fjn_insert_record_to_payment_db( $project_id, $payment_date, $amount_paid ){
	global $wpdb;
	$payments_table = $wpdb->prefix.'payments';
	$data=array(
		'pay_id' 		=> "",
     	'project_id'	=> 	$project_id, 
		'payment_date' 	=>  $payment_date,     
		'amount_paid' 	=>  $amount_paid
		);
	$format= array( '%d', '%d', '%s', '%d' );
	$wpdb->insert( $payments_table, $data, $format );	
}

//******************************************
// Add Payment History metabox - Project edit page
//******************************************

function fjn_add_payment_history_metabox(){
	if( is_admin() ){
		global $pagenow;
		if( 'post.php' == $pagenow ){
			add_meta_box( 
				'payment_history',
				__( 'Payment History', 'fenjoon' ),
				'fjn_payment_history',
				'projects',
				'side',
				'low'
			);
		}
	}
}
function fjn_payment_history(){	
	global $wpdb;
	global $post;
	$post_id = $post->ID;
	$payments_table = $wpdb->prefix.'payments';
	$query_payment = $wpdb->get_results( "SELECT payment_date, amount_paid FROM {$payments_table} WHERE project_id = {$post_id}" );?>		
	<ul class="listofrows"><?php
	foreach( ( array ) $query_payment as $pay ){?>
		<li class="row">
			<div class="right"><?php echo $pay->amount_paid;?></div>
			<div class="left"><?php echo  $pay->payment_date;?></div>
		</li><?php
	}?>
	</ul><?php
}
add_action( 'add_meta_boxes', 'fjn_add_payment_history_metabox', 0 );
add_action( 'add_meta_boxes', 'fjn_add_payment_history_metabox', 0 );

?>	