<?php
$i = 0;
foreach ($attachment_ids as $id) {
	$attachment = get_post($id);

	$link2 = wp_get_attachment_url($id);
	$link3 = wp_get_attachment_image_src($id, 'thumbnail');
	$link4 = wp_get_attachment_image_src($id, 'large');

	$output .= "\n\n<div class='vert-scroll' style=\"max-width:" . $link4[1] . "px; \">";
	$output .= "<img src=\"" . $link4[0] . "\"
									 data-retina=\"" . $link2 . "\"
									 alt=\"open image\"
									 class=\"full\"
									 id=\"" . $i . "\"/>";

	if ($captions != "false"){
		$output .= "<p class=\"wp-caption-text\">" .  wptexturize($attachment->post_excerpt) . "</p> ";
	}

	$output .= "</div>";
	$i += 1;
}
?>
