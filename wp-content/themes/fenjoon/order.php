<?php
/*
Template Name: New order
*/
get_header();

if( $fenjoon_settings = get_option( 'fenjoon_settings' ) ){
	$developer_count = $fenjoon_settings[ 'developer_count' ];
	$man_hour_fee = $fenjoon_settings[ 'man_hour_fee' ];
	$daily_work_hours = $fenjoon_settings[ 'daily_work_hours' ];
}else{
	$developer_count = 0;
	$man_hour_fee = 0;
	$daily_work_hours = 0;
}
$daily_man_power = ( $developer_count * $daily_work_hours != 0 ) ? $developer_count * $daily_work_hours : 1;
$choice_sections = array( 'sitetypes', 'modules', 'features', 'standards' );
$cpt = array( 'post_type' => $choice_sections );
$the_query = fjn_template_query( $cpt );
if( $the_query->have_posts() ){
	$order_sections = array();
	foreach( $choice_sections as $choice_section){
		$order_sections[ $choice_section ] = array();
	}
	$parents = array();
	$children = array();
	while( $the_query->have_posts() ){
		$the_query->the_post();
		if( 0 != $post->post_parent ){
			$parents[] = $post->post_parent;
			$children[$post->post_parent][] = $post->ID;
		}elseif( !in_array( $post->ID, $parents ) ){
			$parents[] = $post->ID;
		}
		$order_sections[ $post->post_type ][ $post->ID ]['title'] = $post->post_title;
		$order_sections[ $post->post_type ][ $post->ID ]['description'] = $post->post_excerpt;
	}
	$total_pt_price = array();
	foreach( $order_sections as $key => $order_section ){
		foreach( $order_section as $choice_id => $choice_info ){
			if( 'sitetypes' == $key ){
				$order_sections[ $key ][ $choice_id ][ 'sitetype_str' ] = get_post_meta( $choice_id, 'sitetype_str', 1 );
			}elseif( 'sitetypes' != $key ){
				$order_sections[ $key ][ $choice_id ][ 'workforce' ] = get_post_meta( $choice_id, 'workforce', 1 );
				$total_pt_price[ $key ] += ( $order_sections[ $key ][ $choice_id ][ 'workforce' ] ) * $man_hour_fee;
			}
		}
	}
}
?>
<div class="full backblue">
	<div class="wrapper">
		<div class="cols">
			<div class="col col11">
				<h1 class="padding4"><?php _e( 'Fenjoon Group Website', 'fenjoon' );?></h1>
			</div>
		</div>
	</div>
</div>
<div class="wrapper">
	<?php get_sidebar();?><main class="main"><?php
		if( $the_query->have_posts() ){
			foreach( $order_sections as $key => $order_section ){
				$post_type = get_post_type_object( $key );
				if( $post_type && !empty( $order_section ) ){?>
				<div class="cols <?php if( 'sitetypes' != $key ) echo 'post_type';?>">
					<div class="col col23">
						<div class="tile">
							<section class="section">
								<h2><?php echo $post_type->label;?></h2>
								<ul><?php
								foreach( $order_section as $choice_id => $choice_info ){
									if( in_array( $choice_id, $parents ) ){?>
										<li class="option icon <?php echo( 'sitetypes' == $key ? 'radio' : 'checkbox');?> unchecked" value="<?php echo $choice_id;?>" id="option<?php echo $choice_id;?>"<?php
										if( 'sitetypes' == $key ){
											echo( $order_sections[ $key ][ $choice_id ][ 'sitetype_str' ] ? ' preselection="' . $order_sections[ $key ][ $choice_id ][ 'sitetype_str' ] . '"' : '' );
										}elseif( 'sitetypes' != $key ){
											echo( $order_sections[ $key ][ $choice_id ][ 'workforce' ] ? ' workforce="' . $order_sections[ $key ][ $choice_id ][ 'workforce' ] . '"' : '' );
										}?>
										><?php echo $choice_info['title'];?>
											<p class="description hidden"><?php echo $choice_info['description'];?></p>
										</li><?php
										if( $children[ $choice_id ] ){
											$coselected = get_post_meta( $choice_id, 'coselected_children', 1 );
											?>
											<ul class="indent"><?php
												foreach( $children[ $choice_id ] as $child_id ){?>
													<li class="option icon checkbox unchecked children<?php echo $choice_id; echo( in_array( $child_id, explode( ',', $coselected ) ) ? ' coselection' : '' );?>" value="<?php echo $child_id;?>" id="option<?php echo $child_id;?>" <?php if( 'sitetypes' != $key ){
											echo( $order_sections[ $key ][ $child_id ][ 'workforce' ] ? ' workforce="' . $order_sections[ $key ][ $child_id ][ 'workforce' ] . '"' : '' );
										}?>><?php echo $order_sections[ $key ][ $child_id ]['title'];?>
														<p class="description hidden"><?php echo $order_sections[ $key ][ $child_id ]['description'];?></p>
													</li><?php
												}?>
											</ul><?php
										}
									}
								}?>
								</ul>
							</section>
						</div>
					</div><div class="col col13 last-child">
						<?php if( 'sitetypes' != $key ){?>
						<div class="tile">
							<ul>
								<li class="icon size5 padding1 align-right"><span class="your_pt_price ib">0</span><span class="left"><?php _e( 'Toman', 'fenjoon' );?></span></li>
								<li class="icon size5 align-justify"><span class="total_pt_price ib"><?php echo $total_pt_price[ $key ];?></span><span class="left"><?php _e( 'Toman', 'fenjoon' );?></span></li>
							</ul>
						</div>
						<?php }?>
					</div>
				</div><?php
				}
			}?>
				<div class="cols">
					<div class="col col23">
						<div class="tile">
							<h2><?php _e( 'Complementary information', 'fenjoon' );?></h2>
							<form id="new_order" action="<?php echo site_url(); ?>/" method="post">
								<input type="text" name="title" value="" placeholder="<?php _e( 'Order title', 'fenjoon' );?>"><?php
								wp_nonce_field( 'fjn_new-order', 'fjn_nonce' );
								$current_url = '';
								global $wp;
								$current_url = home_url( add_query_arg( array(), $wp->request ) );?>
								<input type="hidden" name="referrer" value="<?php echo $current_url;?>">
								<input type="hidden" name="string" value="">
								<input type="hidden" name="action" value="new_order">
								<input type="hidden" id="daily_man_power" value="<?php echo $daily_man_power;?>">	
								<input type="hidden" id="man_hour_fee" value="<?php echo $man_hour_fee;?>">	
								<a class="button" onclick="document.getElementById('new_order').submit();"><?php _e( 'Submit order', 'fenjoon' );?></a>
							</form>
						</div>
					</div>
				</div><?php
		}?>
	</main>
</div><?php
get_footer(); ?>