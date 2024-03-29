<?php get_header(); ?>
	
	<div class="container">
		
		<div id="content">
		
			<?php if(get_theme_mod( 'zblack_featured_slider' ) == true) : ?>
				<?php get_template_part('inc/featured/featured'); ?>
			<?php endif; ?>
		
			<?php if(get_theme_mod( 'zblack_promo' ) == true) : ?>
				<?php get_template_part('inc/promo/promo'); ?>
			<?php endif; ?>

			<div id="main" <?php if( get_theme_mod('zblack_sidebar_homepage')== 'no' || get_theme_mod('zblack_sidebar_homepage')== true) : ?>class="fullwidth"<?php endif; ?>>
				
				<?php if( get_theme_mod('zblack_home_layout') == 'grid' || get_theme_mod('zblack_home_layout') == 'full_grid') : ?><ul class="sp-grid"><?php endif; ?>
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<?php if( get_theme_mod('zblack_home_layout') == 'grid') : ?>
					
						<?php get_template_part('content', 'grid'); ?>
					
					<?php elseif( get_theme_mod('zblack_home_layout') == 'list') : ?>
					
						<?php get_template_part('content', 'list'); ?>
						
					<?php elseif( get_theme_mod('zblack_home_layout') == 'full_list') : ?>
					
						<?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>
							<?php get_template_part('content'); ?>
						<?php else : ?>
							<?php get_template_part('content', 'list'); ?>
						<?php endif; ?>
					
					<?php elseif( get_theme_mod('zblack_home_layout') == 'full_grid') : ?>
					
						<?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>
							<?php get_template_part('content'); ?>
						<?php else : ?>
							<?php get_template_part('content', 'grid'); ?>
						<?php endif; ?>
					
					<?php else : ?>
						
						<?php get_template_part('content'); ?>
						
					<?php endif; ?>	
						
				<?php endwhile; ?>
				
				<?php if( get_theme_mod('zblack_home_layout') == 'grid' || get_theme_mod('zblack_home_layout') == 'full_grid') : ?></ul><?php endif; ?>
				
					<?php zblack_pagination(); ?>
				
				<?php endif; ?>
			
			</div>

<?php if( get_theme_mod('zblack_sidebar_homepage')) : else : ?><?php get_sidebar(); ?><?php endif; ?>
<?php get_footer(); ?>