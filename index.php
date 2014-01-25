<?php get_header(); ?>

<div id="content-index">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="entry">
				<div class="post-meta">
					<?php if (get_theme_mod('solofolio_blog_showcat')) {?><span class="post-cat"><?php the_category(', ') ?></span><?php } ?>
					<h2 class="post-title">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
					</h2>
					<span class="date"><?php the_time('M j') ?>
					<?php if (get_theme_mod('solofolio_blog_showauthor')) {?>by <?php the_author() ?><?php } ?>
				</div>
				<?php the_content('Continue reading <i class="icon-angle-right"></i>'); ?>
				<div class="clear"></div>
			</div>
		<?php endwhile; ?>
		<div class="pagination-nav">
			<div class="left"><p><?php next_posts_link('<i class="icon-angle-left"></i> Past') ?></p></div>
			<div class="right"><p><?php previous_posts_link('Future <i class="icon-angle-right"></i>') ?></p></div>
			<div class="clear"></div>
		</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
