<?php get_header(); ?>

<div id="content-search">
	<h2>Search Results</h2>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="entry">
				<div class="post-meta">
					<h3 class="post-title">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
					</h3>
					<span class="date sans"><?php the_time('l, F jS Y') ?> by <?php the_author() ?></span>
				</div>
				<?php the_content('Continue reading &raquo;'); ?>
			</div>
		<?php endwhile; ?>
		<div class="pagination-nav">
			<div class="left"><p><?php next_posts_link('<i class="icon-angle-left"></i> Past') ?></p></div>
			<div class="right"><p><?php previous_posts_link('Future <i class="icon-angle-right"></i>') ?></p></div>
			<div class="clear"></div>
		</div>
	<?php else : ?>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
