<?php
/* 
SoloFolio
Gallery Template: Sidescroll
*/

$output .= "<script type=\"text/javascript\" charset=\"utf-8\">
		
		/*$( document ).ready( function(){
    		setMax();
    		$( window ).bind(\"resize\", setMax );
    		function setMax() {
    			$(\".sl-sidescroll-container\").css(\"maxWidth\", ($(\"#wrapper\").innerWidth() - 30));
    		}

});*/

	</script>";
	
	$output .="<table cellspacing=0 ><tbody><tr>";
	
	$i = 0;
		
	foreach ($attachment_ids as $id) {

		$attachment = get_post($id);
		
		$link2 = wp_get_attachment_url($id);
		$link3 = wp_get_attachment_image_src($id, 'thumbnail');
		$link4 = wp_get_attachment_image_src($id, 'large');

		$output .= "\n\n<td class=\"sl-sidescroll-container\" style=\"max-width:" . $link4[1] . "px; max-height:" . $link4[2] . "px \">";
		
		$output .= "
			
			<img src=\"" . $link4[0] . "\" data-retina=\"" . $link2 . "\" alt=\"open image\" class=\"full\" id=\"" . $i . "\"/>";
			
		if ($captions != "false"){		
			$output .="<p>" .  wptexturize($attachment->post_excerpt) . "</p> ";
		}
		
		$output .= "</td>";
		
		$i += 1;
		
	} // end foreach
		
	$output .="</tr></table>";
	
	$output.="<style type=\"text/css\">
	
	#wrapper {
		overflow-x: scroll;
	}
	
	</style>";
	
?>
