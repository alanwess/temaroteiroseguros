<?php get_header(); ?>  

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">
					<?php 
					if ( have_posts() ) : 
						while ( have_posts() ) : 
							the_post(); 
					?>

						<h1><?php the_title(); ?></h1>

						<?php the_content(); ?>

					<?php 
						endwhile; 
					endif; 
					?>
				</div>

			</div>

		</section><!-- #content end -->

<?php get_footer(); ?>