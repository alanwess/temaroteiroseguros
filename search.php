<?php get_header(); ?>  

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">
					<h2>Resultados de busca para "<?= get_search_query(); ?>"</h2>
					<br>

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin clearfix">

						<!-- Posts
						============================================= -->
						<div id="posts">

						  	<?php
					            if(have_posts()):
					              while(have_posts() ):
					                the_post();
				          	?>


							<div class="entry clearfix">
								<div class="entry-image">
									<a href="<?= the_permalink(); ?>" data-lightbox="image"><?php the_post_thumbnail(); ?></a>
								</div>
								<div class="entry-title">
									<h2><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h2>
								</div>
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> <?= get_the_date(); ?></li>
									<li><i class="icon-user"></i> <?= get_the_author(); ?></a></li>
									<li><i class="icon-folder-open"></i>
									<?php  
				                        $categories = get_the_category();
				                        $separator = ' ';
				                        $output = '';
				                        if ( ! empty( $categories ) ) {
				                            foreach( $categories as $category ) {
				                                $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'Veja todos os posts em %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
				                            }
				                            echo trim( $output, $separator );
				                        }
				                  	?>
									</li>
									<li><i class="icon-comments"></i> <span class="fb-comments-count" data-href="<?= the_permalink(); ?>"></span> Comentário(s)</li>
									<li><i class="icon-time"></i> <?= tt_reading_time($post->ID); ?></li>
									<li><i class="icon-eye"></i> <?= getPostViews_offpost($post->ID); ?></li>
								</ul>
								<div class="entry-content">
									<?php 
				                    	$content = get_the_content(); 
				                    echo str_replace('&nbsp;', ' ', strip_tags(mb_strimwidth($content, 0, 500, '...'))); 
				                  	?>
									<a href="<?= the_permalink(); ?>"class="more-link">Veja mais</a>
								</div>
							</div>
							
							<?php
					             	endwhile;
					             else:
					             	echo '<h4>Não foi encontrado nenhum resultado para o termo "'.get_search_query().'"</h4><br>';
					             endif;
				          	?>

						</div><!-- #posts end -->

						<!-- Pagination
						============================================= -->
						<div class="row mb-3">
							<div class="col-12">
								<?= get_previous_posts_link( '<i class="btn btn-outline-secondary float-left"></i> Posts Anteriores'); ?></a>
								<?= get_next_posts_link( 'Proximos Posts <i class="btn btn-outline-dark float-right"></i>' , $loop->max_num_pages); ?>
							</div>
						</div>
						<!-- .pager end -->

					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<div class="sidebar nobottommargin col_last clearfix">
						<div class="sidebar-widgets-wrap">

							<div class="widget clearfix">

								<div class="tabs nobottommargin clearfix" id="sidebar-tabs">

									<ul class="tab-nav clearfix">
										<li><a href="#tabs-1">Popular</a></li>
										<li><a href="#tabs-2">Recentes</a></li>
									</ul>

									<div class="tab-container">

										<div class="tab-content clearfix" id="tabs-1">
											<div id="popular-post-list-sidebar">
												<?php
										            $args = array(
										                'post_type' => 'post',
										                'posts_per_page' => 4,
										                'meta_key' => 'post_views_count',
                    									'orderby' => 'meta_value_num',
                    									'order' => 'DESC'
										            );

										            $loop = new WP_Query( $args );
										            if( $loop->have_posts() ):
										              while( $loop->have_posts() ):
										                $loop->the_post();
									          	?>
												<div class="spost clearfix">
													<div class="entry-image">
														<a href="<?= the_permalink(); ?>" class="nobg"><?php the_post_thumbnail(); ?></a>
													</div>
													<div class="entry-c">
														<div class="entry-title">
															<h4><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h4>
														</div>
														<ul class="entry-meta">
															<li><i class="icon-comments-alt"></i> <span class="fb-comments-count" data-href="<?= the_permalink(); ?>"></span> Comentários</li>
														</ul>
													</div>
												</div>
												<?php
										             	endwhile;
										             endif;
									          	?>
											</div>
										</div>
										<div class="tab-content clearfix" id="tabs-2">
											<div id="recent-post-list-sidebar">
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
												<div class="spost clearfix">
													<div class="entry-image">
														<a href="<?= the_permalink(); ?>" class="nobg"><?php the_post_thumbnail(); ?></a>
													</div>
													<div class="entry-c">
														<div class="entry-title">
															<h4><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h4>
														</div>
														<ul class="entry-meta">
															<li><?= get_the_date(); ?></li>
														</ul>
													</div>
												</div>
												<?php
										             	endwhile;
										             endif;
									          	?>
											</div>
										</div>

									</div>

								</div>

							</div>

							<div class="widget clearfix">

								<h4>Nuvem de tags</h4>
								<div class="tagcloud">
									<?php
										$categories = get_categories();
										foreach($categories as $category) {
										   echo '<a href="'.get_category_link($category->term_id).'">'.$category->name.'</a>';
										}
									?>
								</div>

							</div>

						</div>

					</div><!-- .sidebar end -->

				</div>

			</div>

		</section><!-- #content end -->

<?php get_footer(); ?>