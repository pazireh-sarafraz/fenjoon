<?php get_header();?>
<div class="wrapper">
	<h1><?php _e( 'Fenjoon Group Website', 'fenjoon' );?></h1>
	<main class="main full"><?php
	$second_query = fjn_template_query( 'general' );
	if( $second_query->have_posts() ){?>
		<div class="cols">
			<div class="col col2">
				<div class="tile">
					<section>
						<h2><?php _e( 'About us', 'fenjoon' );?></h2>
						<ul><?php
							while( $second_query->have_posts() ){
								$second_query->the_post(); 
								if( has_term( 'about', 'field' ) ){?>
									<li class="icon pencil blue"><?php the_title(); ?></li><?php
								}
							}?>
						</ul>
					</section>
				</div><?php rewind_posts();?>					
			</div><div class="col col2 last-child">
				<div class="tile">
					<section>
						<h2><?php _e( 'Our difference', 'fenjoon' );?></h2>
						<ul><?php
							while( $second_query->have_posts() ){
								$second_query->the_post(); 
								if( has_term( 'difference', 'field' ) ){?>
									<li class="icon checkmark green"><?php the_title(); ?></li><?php
								}
							}?>
						</ul>
					</section>
				</div><?php rewind_posts();?>
			</div>
		</div>
		
		<div class="cols">
			<div class="col col2">
				<div class="tile">
					<section>
						<h2><?php _e( 'Services we offer', 'fenjoon' );?></h2>
						<ul><?php
							while( $second_query->have_posts() ){
								$second_query->the_post(); 
								if( has_term( 'offered-services', 'field' ) ){?>
									<li class="icon checkmark green"><?php the_title(); ?></li><?php
								}
							}?>
						</ul>
					</section>
				</div><?php rewind_posts();?>
			</div><div class="col col2 last-child">
				<div class="tile">
					<section>
						<h2><?php _e( 'Services we do not offer', 'fenjoon' );?></h2>
						<ul><?php
							while( $second_query->have_posts() ){
								$second_query->the_post(); 
								if( has_term( 'unoffered-services', 'field' ) ){?>
									<li class="icon cross red"><?php the_title(); ?></li><?php
								}
							}?>
						</ul>
					</section>
				</div><?php rewind_posts();?>
				<div class="tile tilestack">
					<section>
						<h2><?php _e( 'Public responsibility', 'fenjoon' );?></h2><?php
						while ($second_query->have_posts()){
							$second_query->the_post(); 
							if( has_term( 'responsibility', 'field' ) ){?>
								<p><?php the_title(); ?></p><?php
							}
						}?>
					</section><?php rewind_posts();wp_reset_postdata();?>
				</div>
			</div>
		</div>
	
		<div class="cols">
			<div class="col col2">
				<div class="tile">
					<section>
						<h2><?php _e( 'Our statistics', 'fenjoon' );?></h2>
						<ul>
							<li class="large icon calendar blue"><?php _e( 'Activity duration', 'fenjoon' );?><span class="left">2 <?php _e( 'Year', 'fenjoon' );?></span></li>
							<li class="large icon man-woman blue"><?php _e( 'Number of customers', 'fenjoon' );?><span class="left">18 <?php _e( 'Person', 'fenjoon' );?></span></li>
							<li class="large icon fire blue"><?php _e( 'Number of designed and developed websites', 'fenjoon' );?><span class="left">30 <?php _e( 'Website', 'fenjoon' );?></span></li>
							<li class="large icon power blue"><?php _e( 'Number of designed and developed web applications', 'fenjoon' );?><span class="left">5 <?php _e( 'Web application', 'fenjoon' );?></span></li>
						</ul>
					</section>
				</div>
			</div><div class="col col2 last-child">
				<div class="tile">

				</div>
			</div>
		</div><?php
	}?>
	</main>
</div>
<div class="full backgreen">
	<div class="wrapper">
		<div class="cols">
			<div class="col col1">
				<p class="big"><?php
					_e( 'Push this new order button right now!', 'fenjoon' );?>
				</p>
			</div>
		</div>
	</div>
</div>
<div class="wrapper">
	<div class="main full"><?php
	$third_query = fjn_template_query( 'portfolio' );
	if ($third_query->have_posts()){
		?>
		<div class="cols">
			<section>
				<h2><?php _e( 'Portfolio', 'fenjoon' );?></h2>
				<div class="row hightop">
					<div class="col col4 tile"><?php
					while ($third_query->have_posts()){ $third_query->the_post();
						$metadata = get_post_meta( $post->ID );?>
						<a class="thumb" href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php
							if( has_post_thumbnail() ){
								$attr = array(
									'alt' => trim( strip_tags( get_the_title() ) )
								);
								the_post_thumbnail( 'portfolio', $attr );
							}else{?>
								<img src="<?php echo THEME_URI;?>/img/portfolio.png" alt="<?php echo trim( strip_tags( get_the_title() ) );?>"><?php
							}?>
						</a>
						<ul><?php
						foreach( $metadata as $key => $value ){
							if( '_' == substr( $key, 0, 1 ) ) continue;?>
							<li class="icon"><span class="right"><?php _e( $key, 'fenjoon' );?></span><span class="left"><?php echo $value[0];?></span></li><?php
						}?>
						</ul><?php
						if( ( $third_query->current_post + 2 ) < ( $third_query->post_count ) ){?>
							</div><!-- --><div class="col col4 tile"><?php						
						}elseif( ( $third_query->current_post + 2 ) == ( $third_query->post_count ) ){?>
							</div><!-- --><div class="col col4 tile last-child"><?php						
						}
					}?>
					</div>
				</div>
			</section><?php wp_reset_postdata();?>
		</div><?php
	}?>
	</div>
</div>
<?php rewind_posts();
get_footer();
?>