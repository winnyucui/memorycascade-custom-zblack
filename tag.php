<?php get_header(); ?>
	
	<div class="container">
		
		<div id="content">
		
			<div id="main" <?php if(get_theme_mod('zblack_sidebar_archive') == true) : ?>class="fullwidth"<?php endif; ?>>
			
				<div class="archive-box">
	
					<span><?php _e( 'Browsing Tag', 'zblack' ); ?></span>
					<h1><?php printf( __( '%s', 'zblack' ), single_tag_title( '', false ) ); ?></h1>
					
				</div>
			
				<?php if(get_theme_mod('zblack_archive_layout') == 'grid' || get_theme_mod('zblack_archive_layout') == 'full_grid') : ?><ul class="sp-grid"><?php endif; ?>
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<?php if(get_theme_mod('zblack_archive_layout') == 'grid') : ?>
					
						<?php get_template_part('content', 'grid'); ?>
					
					<?php elseif(get_theme_mod('zblack_archive_layout') == 'list') : ?>
					
						<?php get_template_part('content', 'list'); ?>
						
					<?php elseif(get_theme_mod('zblack_archive_layout') == 'full_list') : ?>
					
						<?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>
							<?php get_template_part('content'); ?>
						<?php else : ?>
							<?php get_template_part('content', 'list'); ?>
						<?php endif; ?>
					
					<?php elseif(get_theme_mod('zblack_archive_layout') == 'full_grid') : ?>
					
						<?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>
							<?php get_template_part('content'); ?>
						<?php else : ?>
							<?php get_template_part('content', 'grid'); ?>
						<?php endif; ?>
					
					<?php else : ?>
						
						<?php get_template_part('content'); ?>
						
					<?php endif; ?>	
						
				<?php endwhile; ?>
				
				<?php if(get_theme_mod('zblack_archive_layout') == 'grid' || get_theme_mod('zblack_archive_layout') == 'full_grid') : ?></ul><?php endif; ?>
				
					<?php zblack_pagination(); ?>
				
				<?php else : ?>
					
					<?php get_template_part('content', 'none'); ?>
					
				<?php endif; ?>
				
			</div>

<?php if(get_theme_mod('zblack_sidebar_archive')) : else : ?><?php get_sidebar(); ?><?php endif; ?>
<?php get_footer(); ?>