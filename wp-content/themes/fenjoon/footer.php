	<footer></footer>
<?php wp_footer();?>
	<script>
	function hasClass( el, clss ) {
		return el.className && new RegExp( "(^|\\s)" + clss + "(\\s|$)" ).test( el.className );
	}
	window.onload = function(){
		menu_box = document.getElementById( 'menu_box' );
		top_menu = document.getElementById( 'top_menu' );
		menu_box.onclick = function(){
			if( hasClass( top_menu, 'mhidden' ) ){
				top_menu.classList.remove( 'mhidden' );
			}else{
				top_menu.classList.add( 'mhidden' );
			}
		}
		if( typeof order_onload === 'function' ){
			order_onload();
		}
	}
	</script>
</body>
</html>
