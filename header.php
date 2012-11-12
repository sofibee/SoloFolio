<?php
/* 
SoloFolio
Theme - Header
*/

// allows the theme to get info from the theme options page
global $options;
foreach ($options as $value) {
	if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; }
	else { $$value['id'] = get_option( $value['id'] ); }
	}
global $current_user; get_currentuserinfo(); 
if (get_option('sl_maintenance_mode') == 'true') {
	if ($current_user->user_level == 10 ) { 
	} else {
	die("Coming Soon.");
	}
}
?>	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta id="extViewportMeta" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	
	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>	
	
	<?php wp_head(); ?>
		
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/includes/gallery/js/galleria-1.2.7.min.js"></script> 
	<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/includes/gallery/js/galleria.history.min.js"></script> 
	<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/js/jquery.retina.min.js"></script>
	<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/js/jquery.jknav.min.js"></script>
	

	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('url'); ?>/wp-rss.php" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
<?php if (get_option('sl_favicon_url') != '') { ?>
	<link href="<?php echo get_option('sl_favicon_url'); ?>" rel="shortcut icon" />
<?php } else { ?>
	<link href="<?php echo (bloginfo('template_url').'/img/favicon.ico'); ?>" rel="shortcut icon" />
<?php } ?>
	
<?php if (get_option('sl_ios_url') != '') { ?>
	<link href="" rel="shortcut icon" />
	<link rel="apple-touch-icon-precomposed" href="<?php echo get_option('sl_ios_url'); ?>" />
<?php } else { ?>
	<link rel="apple-touch-icon-precomposed" href="<?php echo (bloginfo('template_url').'/img/favicon.ico'); ?>" />
<?php } ?>
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" href="<?php echo (bloginfo('template_url').'/styles.php'); ?>" type="text/css" media="screen" />
	
	<script type="text/javascript"> 
	$(window).load(function(){
		$('img').retina();
		$('#wrapper img').jknav();
		$.jknav.init();
		$("p:has(img)").css('margin' , '0');
		$("p:has(img)").css('padding' , '0');
    	$('img').each(function() {
    		var mwidth = $(this).attr('width');
			$(this).attr('style', 'max-width:' + mwidth + 'px');
		});
		$('img').each(function(){ 
        	$(this).removeAttr('width')
        	$(this).removeAttr('height');
    	});
    	$('#menu-icon').click(function(){
		$("#header-content").slideToggle();
			$(this).toggleClass("active");
		});
		var setResponsive = function () {
		  // Is the window taller than the #adminmenuwrap by 50px or more?
		  if ($(window).height() > $("#header-content").height() + $("#logo").height() + 50) {
			 // ...if so, make the #adminmenuwrap fixed
			 $('#header').css('position', 'fixed'); 
		  } else {
			 //...otherwise, leave it relative        
			 $('#header').css('position', 'absolute'); 
		  }
		}
		$(window).resize(setResponsive);
		setResponsive();
	});
	
	// Scroll past iOS address bar
	window.addEventListener("load",function() {
	  // Set a timeout...
	  setTimeout(function(){
		// Hide the address bar!
		window.scrollTo(0, 1);
	  }, 0);
	});
	</script>
	
<?php if (get_option('sl_custom_css') != '') { ?>
	<style type="text/css">
	<?php echo get_option('sl_custom_css'); ?>
	</style>
<?php } ?>
	
	<?php echo stripslashes(get_option('sl_custom_head')); ?>
</head>

<body id="<?php echo get_post_type( $post ); ?>"   class="<?php echo get_option('sl_body_font'); ?>">

<div id="outerWrap">

<div id="header" class="sans"><!-- Begin Header -->
	<a id='menu-icon'>Menu</a>
	
	<div id="logo">
		<div id="logo-noimg">
			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		</div>
		
		<div id="logo-img">
			<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_option('sl_logo'); ?>" alt="<?php bloginfo('description'); ?>" data-retina="<?php echo get_option('sl_logo_retina'); ?>"/></a>	
		</div>
		
		<div id="header-phone" class="<?php echo get_option('sl_header_font'); ?> "><span><?php echo get_option('sl_phone'); ?></span></div>
			<div id="header-email" class="<?php echo get_option('sl_header_font'); ?> "><a href="mailto:<?php echo get_option('sl_email'); ?>"><?php echo get_option('sl_email'); ?></a></div>  
		
	</div>
	<div id="header-content">
		<div id="navigation" class="<?php echo get_option('sl_menu_font'); ?> ">
			<?php wp_nav_menu( array( 'menu_id' => 'suckerfishnav', 'menu_class' => 'sf-menu', 'container_class' => 'sf-menu', 'theme_location' => 'primary' ) ); ?>
		</div>
		<?php if (get_option('sl_sidebar_layout') == 'yes') { ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar Layout - Main Navigation") ) : ?>
			<?php endif; ?>
		<?php if (is_home()){ ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar Layout - Under Nav on Blog") ) : ?>
			<?php endif; ?>
		<?php } ?>
		
		<?php if (is_single()){ ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar Layout - Under Nav on Blog") ) : ?>
			<?php endif; ?>
		<?php } ?>
		
		<?php if (is_archive()){ ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar Layout - Under Nav on Blog") ) : ?>
			<?php endif; ?>
		<?php } ?>
		<?php } ?>
		
	<?php if (get_option('sl_sidebar_layout') == 'yes') { ?>
		<div id="sidebar-footer">
				<!--<p id="help-footer"><strong>j</strong>:prev <strong>k</strong>:next</p>-->
			<?php if (get_option('sl_show_footer') == 'yes') {?>
				<p id="info-footer"><?php echo get_option('sl_footer_text'); ?></p>
			<?php }; ?>
			<?php if (get_option('sl_show_att') == 'yes') {?>
				<p id="attr-footer">Powered by <a title="Powered by SoloFolio. The ultimate WordPress portfolio and blog." href="http://www.solofolio.net" target="_blank">SoloFolio</a></p>
			<?php }; ?>
			
		</div>
	<?php }; ?>	
		
	</div><!-- End Header-Content -->
	


	<div class="clear"></div>
	
</div><!-- End Header -->

<div id="wrapper"><!-- Begin Wrapper -->


