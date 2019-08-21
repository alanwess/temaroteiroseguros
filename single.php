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

						     <div class="container clearfix" style="padding-bottom: 20px;">
						        <?php the_breadcrumb(); ?>
						     </div>

							<!-- Single Post
							============================================= -->
							<div class="entry clearfix">

								<?php 
					              if( have_posts() ):
					                while( have_posts() ):
					                  the_post();
					                  setPostViews(get_the_ID());
					                  $id_post = $post->ID;
					                  $link = get_the_permalink();
					            ?>

								<!-- Entry Title
								============================================= -->
								<div class="entry-title">
									<h2><?php the_title(); ?></h2>
								</div><!-- .entry-title end -->

								<!-- Entry Meta
								============================================= -->
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> <?= get_the_date(); ?></li>
									<li><i class="icon-user"></i> <?= get_the_author(); ?></li>
									<li><i class="icon-folder-open"></i> <?php  
				                        $categories = get_the_category();
				                        $separator = ' ';
				                        $output = '';
				                        if ( ! empty( $categories ) ) {
				                            foreach( $categories as $category ) {
				                            	$cat = $category->term_id;
				                                $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'Veja todos os posts em %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
				                            }
				                            echo trim( $output, $separator );
				                        }
			                      	?></li>
									<li><i class="icon-comments"></i> <span class="fb-comments-count" data-href="<?= the_permalink(); ?>"></span> Comentário(s)</li>
									<li><i class="icon-time"></i> <?= tt_reading_time($post->ID); ?></li>
									<li><i class="icon-eye"></i> <?= getPostViews_inpost($post->ID); ?></li>
								</ul><!-- .entry-meta end -->

								<!-- Entry Image
								============================================= -->
								<div class="entry-image">
									<a href="<?= the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
								</div><!-- .entry-image end -->

								<!-- Entry Content
								============================================= -->
								<div class="entry-content notopmargin">

									<?php the_content(); ?>

									<!-- Tag Cloud
									============================================= -->
									<div class="tagcloud clearfix bottommargin">
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
									</div><!-- .tagcloud end -->

									<div class="clear"></div>

									<!-- Post Single - Share
									============================================= -->
									<div class="si-share noborder clearfix">
										<span>Compartilhe esse Post:</span>
										<div>
											<a href="http://www.facebook.com/sharer.php?u=<?= the_permalink(); ?>" class="social-icon si-borderless si-facebook">
												<i class="icon-facebook"></i>
												<i class="icon-facebook"></i>
											</a>
											<a href="http://twitter.com/share?url=<?= the_permalink(); ?>&text=<?php the_title(); ?>" class="social-icon si-borderless si-twitter">
												<i class="icon-twitter"></i>
												<i class="icon-twitter"></i>
											</a>
											<a href="http://pinterest.com/pin/create/button/?url=<?= the_permalink(); ?>&media=<?= get_the_post_thumbnail_url($post->ID,'full'); ?>" class="social-icon si-borderless si-pinterest">
												<i class="icon-pinterest"></i>
												<i class="icon-pinterest"></i>
											</a>
											<a href="mailto:?subject=Veja <?php the_title(); ?> em <?= the_permalink(); ?>" class="social-icon si-borderless si-email3">
												<i class="icon-email3"></i>
												<i class="icon-email3"></i>
											</a>
										</div>
									</div><!-- Post Single - Share End -->

								</div>
								<?php
					                endwhile;
					              endif;
					            ?>
							</div><!-- .entry end -->

							<!-- Post Navigation
							============================================= -->
							<div class="post-navigation clearfix">

								<div class="col_half nobottommargin">
									<?= previous_post_link( '%link', '&#171; %title'); ?>
								</div>

								<div class="col_half col_last tright nobottommargin">
									<?= next_post_link( '%link', '%title &#187;' ); ?>
								</div>

							</div><!-- .post-navigation end -->

							<div class="line"></div>

							<!-- Post Author Info
							============================================= -->
							<div class="card">
								<div class="card-header"><strong>Postado por <?= get_author_name(); ?></strong></div>
								<div class="card-body">
									<div class="author-image">
										<img src="<?php if(in_array('wp-user-avatar/wp-user-avatar.php', apply_filters('active_plugins', get_option('active_plugins')))){ echo scrapeImage(get_wp_user_avatar($post->post_author)); } ?>" alt="" class="rounded-circle">
									</div>
									<?= get_the_author_meta('description'); ?>
								</div>
							</div><!-- Post Single - Author End -->

							<div class="line"></div>

							<h4>Posts relacionados:</h4>

							<div class="related-posts clearfix">

								<?php
							            $args = array(
							                'post_type' => 'post',
							                'posts_per_page' => 4,
							                'category__in' => array($cat)
							            );
							            $i = 1;


							            $loop = new WP_Query( $args );
							            if( $loop->have_posts() ):
							              while( $loop->have_posts() ):
							                $loop->the_post();
							                if($id_post != $post->ID){
							                	if($i == 1){
						        ?>

								<div class="col_half nobottommargin" style="padding-top: 5px">
									
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
					          	</div>
					          	<?php
					          					} else {
					          	?>
					          	
					          	<div class="col_half nobottommargin col_last" style="padding-top: 5px">
									
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
					          	</div>

					          	<?php 
					          					}
					          					$i = $i * (-1);
					          				}					 
						             	endwhile;
						             endif;
					          	?>
							</div>

							<!-- Comments
							============================================= -->
							<div id="comments" class="clearfix">

								<h3 id="comments-title"><span><span class="fb-comments-count" data-href="<?= the_permalink(); ?>"></span> Comentário(s)</h3>

								<!-- Comment Form
								============================================= -->
								<div id="respond" class="clearfix">

									<h3>Deixe um <span>Comentário</span></h3>

									<div class="fb-comments" width="100%" data-href="<?= $link; ?>" data-numposts="5"></div>

								</div><!-- #respond end -->

							</div><!-- #comments end -->

						</div>

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