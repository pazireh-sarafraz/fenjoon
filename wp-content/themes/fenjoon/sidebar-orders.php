<?php
global $permalink, $title, $order_code, $created_date, $modified_date, $total_price, $total_time;
if( file_exists( THEME_DIR . '/tcpdf/tcpdf_barcodes_2d.php' ) ){
	require_once( THEME_DIR . '/tcpdf/tcpdf_barcodes_2d.php'  );
	$barcodeobj = new TCPDF2DBarcode( $permalink, 'QRCODE,H' );
}
?>
<aside class="aside">
	<div class="cols">
		<div class="col11">
			<div class="tile padding2 green mb2">
				<p class="center size3"><?php
					if( !empty( $title ) ){
						echo $title;
					}else{
						_e( 'Your order', 'fenjoon' );
					}?>
				</p>
				<ul><?php
					if( !empty( $order_code ) ){?>
					<li class="icon size3 barcode">
						<span class="ib"><?php echo $order_code;?></span>
						<span class="left"><?php _e( 'Identifier', 'fenjoon' );?></span>
					</li><?php
					}
					if( !empty( $created_date ) ){?>
					<li class="icon size3 calendar">
						<span class="ib"><?php echo $created_date;?></span>
						<span class="left"><?php _e( 'Date created', 'fenjoon' );?></span>
					</li><?php
					}
					if( !empty( $modified_date ) ){?>
					<li class="icon size3 calendar">
						<span class="ib"><?php echo $modified_date;?></span>
						<span class="left"><?php _e( 'Correction', 'fenjoon' );?></span>
					</li><?php
					}?>
					<li class="icon size3 cart">
						<span class="ib" id="total_price"><?php echo $total_price;?></span>
						<span class="left"><?php _e( 'Toman', 'fenjoon' );?></span>
					</li>
					<li class="icon size3 alarm">
						<span class="ib" id="total_time"><?php echo $total_time;?></span>
						<span class="left"><?php _e( 'Days', 'fenjoon' );?></span>
					</li><?php
					if( !empty( $barcodeobj ) ){?>
						<li class="mt1 center"><?php
							echo $barcodeobj->getBarcodeHTML();?>
						</li><?php
					}?>
				</ul>
			</div>
			<div class="tile padding1">
				<?php get_search_form();?>
			</div>
		</div>
	</div>
</aside>