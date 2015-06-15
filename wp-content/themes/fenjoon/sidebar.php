<aside class="aside"><?php
	if( is_page_template( 'orderlist.php' ) ){?>
		<div class="cols">
			<div class="col11">
				<div class="tile padding2 green mb2">
					<p class="center size3"><?php _e( 'Your order', 'fenjoon' );?></p>
					<ul>
						<li class="icon size5 cart">
							<span class="ib" id="total_price">0</span>
							<span class="left"><?php _e( 'Toman', 'fenjoon' );?></span>
						</li>
						<li class="icon size5 alarm">
							<span class="ib" id="total_time">0</span>
							<span class="left"><?php _e( 'Days', 'fenjoon' );?></span>
						</li>
					</ul>
				</div>
				<div class="tile padding1">
					<p class="center size3"><?php _e( 'Submit a new order!', 'fenjoon' );?></p>
					<a class="button green" href="<?php echo home_url( 'order' );?>"><?php _e( 'New order', 'fenjoon' );?></a>
				</div>
			</div>
		</div>
	<?php }?>
</aside>