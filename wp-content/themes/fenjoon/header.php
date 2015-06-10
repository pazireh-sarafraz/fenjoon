<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="author" content="fenjoon.net">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<meta name="format-detection" content="telephone=no">
	<title><?php bloginfo('name'); ?></title>
	<link rel="shortcut icon" href="<?php echo THEME_URI; ?>/favicon.ico" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<?php wp_head(); ?>
</head>
<body>
<header>
	<div class="banner" role="banner">
	
	</div>
	<div class="navigation" role="navigation">
		<div class="wrapper">
			<?php fjn_wp_nav_menu( 'top' );?>
		</div>
	</div>
</header>