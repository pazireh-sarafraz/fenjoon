<aside class="aside"><?php
	if( is_page_template( 'orderlist.php' ) ){?>
		<div class="cols">
			<div class="col11">
				<div class="tile padding1 mb2">
					<?php get_search_form();?>
				</div>
				<div class="tile padding1">
					<p class="center size3"><?php _e( 'Submit a new order!', 'fenjoon' );?></p>
					<a class="button green" href="<?php echo home_url( 'order' );?>"><?php _e( 'Register new order', 'fenjoon' );?></a>
				</div>
			</div>
		</div>
	<?php }?>
</aside>