<?php

/* 
SoloFolio
Theme - About Page
*/

?>

<?php get_header(); ?>        
<div id="about-page"><!-- Begin Content -->
	<?php if (have_posts()) : ?>
	<?php the_post_thumbnail( 'about-image' ); ?>
	<?php while (have_posts()) : the_post(); ?>	
		<?php the_content('Read the rest of this entry &raquo;'); ?>
	<?php endwhile; ?>
	<?php else : ?>
		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	<?php endif; ?>
</div><!-- End Content --> 
<?php get_footer(); ?>	