<?php get_header(); ?>

	<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin clearfix">

						<div class="single-post nobottommargin">

							<h2>Erro 404: Nenhum resultado retornado para esse endereço</h2>

							<div class="line"></div>

							<h4>Posts recentes:</h4>

							<div class="related-posts clearfix">

								<div class="col_half nobottommargin">
									<?php
							            $args = array(
							                'post_type' => 'post',
							                'posts_per_page' => 4
							            );

							            $loop = new WP_Query( $args );
							            if( $loop->have_posts() ):
							              while( $loop->have_posts() ):
							                $loop->the_post();
						          	?>
									<div class="mpost clearfix">
										<div class="entry-image">
											<a href="<?= the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h4>
											</div>
											<ul class="entry-meta clearfix">
												<li><i class="icon-calendar3"></i> <?= get_the_date(); ?></li>
												<li><i class="icon-comments"></i> <span class="fb-comments-count" data-href="<?= the_permalink(); ?>"></span></li>
											</ul>
											<div class="entry-content"><?php 
						                    	$content = get_the_content(); 
						                    	echo str_replace('&nbsp;', ' ', strip_tags(mb_strimwidth($content, 0, 150, '...'))); 
						                  	?></div>
										</div>
									</div>
									<?php
						             	endwhile;
						             endif;
					          		?>
					          	</div>
							</div>

						</div>

					</div><!-- .postcontent end -->

				</div>

			</div>

		</section><!-- #content end -->

<?php get_footer(); ?>