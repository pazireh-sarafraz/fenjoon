<?php get_header();?>
<div class="wrapper"><?php
	get_sidebar();?><main class="main"><?php
	if( have_posts() ){
		while( have_posts() ){the_post();?>
		<div class="cols">
			<div class="col col11">
				<div class="tile p2">
					<section>
						<h2><?php the_title();?></h2>
					</section>
				</div>
			</div>
		</div><?php
		}
	}?>
	</main>
</div><?php
get_footer();?>