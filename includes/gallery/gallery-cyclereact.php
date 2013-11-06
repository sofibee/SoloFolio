<?php
/* 

SoloFolio
Gallery Template: Cycle-React (Picturefill + jQuery Cycle hack)

*/

global $solofolio_autoplay;


$output .="<div id=\"solofolio-cyclereact-wrap\">";

$output .="<div id=\"solofolio-cyclereact-stage\">";

$output .="<div id=\"solofolio-cyclereact-images\" class=\"cycle-slideshow manual\" data-cycle-slides=\"div.solofolio-cycelereact-slide\"
data-cycle-prev=\".prev\"
data-cycle-next=\".next\"
data-cycle-auto-height=0\n";

if ($solofolio_autoplay == "true"){ $output .= "Autoplay";} else {$output.= "data-cycle-timeout=0\n";}

$output .="data-cycle-center-vert=true
data-cycle-fx=\"fade\"
data-cycle-caption=\".solofolio-cyclereact-caption\"
data-cycle-caption-template=\"{{cycleTitle}}\">\n\n";

$i = 0;
$result = count($attachment_ids) - 1;

foreach ($attachment_ids as $id) {

	
	// Get attachment metadata
	$attachment = get_post($id);
	
	$link = wp_get_attachment_url($id);	
	$link2 = wp_get_attachment_url($id);	
	$link3 = wp_get_attachment_image_src($id, 'thumbnail');
	$link4 = wp_get_attachment_image_src($id, 'large');
	$link5 = wp_get_attachment_image_src($id, 'xlarge');
	$link6 = wp_get_attachment_image_src($id, 'medium');
	
	$output .= "<div class=\"solofolio-cycelereact-slide\" data-cycle-title=\"" .  wptexturize($attachment->post_excerpt) . "\">
		<div class=\"solofolio-cycelereact-fill\" data-picture>
			<div data-src=\"" . $link6[0] . "\"></div>
			<div data-src=\"" . $link4[0] . "\" data-media=\"(min-width: 320px)\" style=\"max-width: 900px;\"></div>
			<div data-src=\"" . $link5[0] . "\" data-media=\"(min-width: 920px)\" style=\"max-width: 1800px;\"></div>
			<noscript><img src=\"" . $link6[0] . "\" alt=\"" .  wptexturize($attachment->post_excerpt) . "\"></noscript>
		</div>
		</div>\n";

	$i++;
	
} // End ForEach

$output .= "</div>\n";

$output .="<div class=\"solofolio-cyclereact-image-nav\">
		<div class=\"solofolio-cyclereact-nav-right next\"></div>
		<div class=\"solofolio-cyclereact-nav-left prev\"></div>
	</div>";

$output .= "</div>";

$output .= "</div>";

$output .="<div id=\"solofolio-cyclereact-bar\">
<p class=\"solofolio-cyclereact-caption\"></p>
<div id=\"solofolio-cyclereact-controls\">
			<p id=\"solofolio-cyclereact-caption\"></p>
    	</div>
    	</div>";

add_action('wp_footer', 'sl_cyclereact');
 
function sl_cyclereact() {
	
	// Output necessary JS. This can't be mobile friendly.
	$output .="<script type=\"text/javascript\" src=\"" . get_bloginfo('template_url') . "/includes/gallery/js/matchmedia.js\"></script>";

	$output .="<script type=\"text/javascript\" src=\"" . get_bloginfo('template_url') . "/includes/gallery/js/picturefill.js\"></script>";

	$output .="<script type=\"text/javascript\" src=\"" . get_bloginfo('template_url') . "/includes/gallery/js/jquery.cycle2.min.js\"></script>";
	
	// Make things fit nicely 
	
	$output.="
	<script type=\"text/javascript\"> 
	$(window).load(function(){
		var setResponsive = function () {
			var pageHeight = jQuery(window).height();
			var barHeight = $(\"#solofolio-cyclereact-bar\").outerHeight();
			var headerHeight = $(\"#header\").outerHeight();
			var wrapperWidth = $(\"#wrapper\").innerWidth();
			var imgHeight = $(\".cycle-slide-active div img\").outerHeight();
			var imgWidth = $(\".cycle-slide-active div img\").outerWidth();
			
			var n = $(\"#header\").css('right');

			if (n == '0px') {
				$('#solofolio-cyclereact-images img').css('max-height', pageHeight - barHeight - headerHeight - 20);
			} 
			else {
				$('#solofolio-cyclereact-images img').css('max-height', pageHeight - barHeight);
			}
			console.log('n: ' + n);
			console.log('barHeight: ' + barHeight);
			console.log('imgHeight: ' + imgHeight); 
			console.log('pageHeight: ' + pageHeight); 
			$('#solofolio-cyclereact-images img').css('max-width', wrapperWidth);
		}
		$(window).resize(setResponsive);
		setResponsive();
	});</script>";
	
	// Allow keyboard control
	$output.="<script type=\"text/javascript\">$(document.documentElement).keyup(function (e) {
		if (e.keyCode == 39)
		{        
		   $('#solofolio-cyclereact-images').cycle('next');
		}

		if (e.keyCode == 37)
		{
			$('#solofolio-cyclereact-images').cycle('prev');
		}

	});</script>";
	
	$output.="<style type=\"text/css\">
	

	
	</style>";
	
	
     
    echo $output;
 
}

?>
