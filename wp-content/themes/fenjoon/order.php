<?php
/*
Template Name: New order
*/
get_header();

$choice_sections = array( 'sitetypes', 'modules', 'features', 'attributes', 'standards' );
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
		$order_sections[ $post->post_type ][ $post->ID ] = $post->post_title;
	}
	

}
?>
<div class="wrapper">
	<h1><?php _e( 'Fenjoon Group Website', 'fenjoon' );?></h1>
	<main class="main full"><?php
		if( $the_query->have_posts() ){
			wp_nonce_field(basename( __FILE__ ), 'save_order');
			foreach( $order_sections as $key => $order_section ){
				$post_type = get_post_type_object( $key );
				if( $post_type && !empty( $order_section ) ){?>
				<div class="cols">
					<div class="col col2">
						<div class="tile">
							<section>
								<h2><?php echo $post_type->label;?></h2>
								<ul><?php
								foreach( $order_section as $choice_id => $choice_title ){
									if( in_array( $choice_id, $parents ) ){?>
										<li class="icon checkbox unchecked" ><?php echo $choice_title;
											if( $children[ $choice_id ] ){?>
												<ul class="l2""><?php
													foreach( $children[ $choice_id ] as $child_id ){?>
														<li class="icon checkbox unchecked" ><?php echo $order_sections[ $key ][ $child_id ];?></li><?php
													}?>
												</ul><?php
											}
										?></li><?php
									}
								}?>
								</ul>
							</section>
						</div>
					</div><div class="col col2 last-child">
					</div>
				</div><?php
				}
			}
		}?>
		<form action="<?php echo site_url(); ?>/" method="post">		
			<input type="hidden" name="string" value=""/>			
			<input type="submit">
		</form>
	</main>
</div><?php
get_footer(); ?>