<?php get_header(); ?>  

		<style>

		.swiper-container-horizontal>.swiper-scrollbar {
			top: 50%;
			bottom: auto;
			left: 50%;
			margin-left: 20%;
			width: 200px;
			height: 2px;
			transform: translateY(-50%);
			background-color: rgba(0,0,0,0.4);
			border-radius: 2px;
		}

		.swiper-scrollbar-drag { background: #000 }

		.slide-number {
			opacity: 1;
			bottom: 10px;
			text-align: left;
			right: auto;
		}

		.slide-number-current {
			top: auto;
			bottom: 0;
			font-size: 30px;
			font-weight: 700;
		}

		.slide-number span {
			margin-left: 20px;
			font-size: 16px;
		}

		.slide-number-total {
			font-size: 13px;
			line-height: 28px;
			left: 29px;
		}

		.swiper-navs {
			position: absolute;
			display: block;
			left: 50%;
			top: 50%;
			margin-top: 60px;
			margin-left: 20%;
		}

		.slider-arrow-left,
		.slider-arrow-right {
			border-radius: 50%;
			background: transparent;
			border: 1px solid rgba(0,0,0,0.7);
			width: 36px;
			height: 36px;
		}

		.slider-arrow-right { left: 45px; }

		.slider-arrow-left i,
		.slider-arrow-right i {
			display: block;
			width: 36px;
			height: 36px;
			font-size: 16px;
			line-height: 34px;
			margin: 0 auto;
			color: #000;
		}

		.slider-arrow-right i { margin-left: -1px; }

		.swiper-button-disabled {
			opacity: .5;
			cursor: default;
		}

		.dark .slider-arrow-left,
		.dark .slider-arrow-right { border-color: rgba(255,255,255,0.7); }

		.dark .swiper-container-horizontal > .swiper-scrollbar { background-color: rgba(255,255,255,0.4);  }

		.dark .swiper-scrollbar-drag { background: #FFF }

		.dark .slide-number,
		.dark .slider-arrow-left i,
		.dark .slider-arrow-right i { color: #FFF; }

		@media (min-width: 576px) and (max-width: 767px) {
			.swiper-container-horizontal>.swiper-scrollbar {
				top: auto;
				left: auto;
				bottom: 70px;
				right: 30px;
				width: 100px;
				height: 2px;
				transform: translateY(0);
			}

			.swiper-navs {
				left: auto;
				top: auto;
				bottom: 30px;
				right: 115px;
				margin: 0;
			}
		}

		.slider-element .slider-product-desc {
			position: absolute;
			top: auto;
			bottom: 0;
			left: auto;
			right: 0;
			width: 65%;
			z-index: 2;
			overflow: hidden;
		}

		.slider-element .slider-product-desc a .icon-play {
			position: absolute;
			left: 50%;
			top: 50%;
			z-index: 99;
			color: #000;
			font-size: 20px;
			width: 40px;
			height: 40px;
			line-height: 40px;
			background-color: #FFF;
			border-radius: 50%;
			text-align: center;
			padding-left: 4px;
			margin-top: -20px;
			margin-left: -20px;
			-webkit-transition: transform .3s ease;
			-o-transition: transform .3s ease;
			transition: transform .3s ease;
		}

		.slider-element .slider-product-desc a:hover .icon-play {
			-webkit-transform: scale(1.1);
			-ms-transform: scale(1.1);
			-o-transform: scale(1.1);
			transform: scale(1.1);
		}

		.blurred-box:after{
			content: '';
			width: 130%;
			height: 130%;
			background: inherit;
			position: absolute;
			left: -25px;
			top: -25px;
			background-color: rgba(255,255,255,0.2);
			-webkit-filter: blur(20px);
			-o-filter: blur(20px);
			filter: blur(20px);
		}

		@media (max-width: 576px) {
			.swiper-container-horizontal>.swiper-scrollbar { display: none; }
			.swiper-navs { right: 0px; }
		}

		</style>

			<!-- Slider
		============================================= -->

		<!-- Changes Functions.js // added .swiper-scrollbar -->

		<section id="slider" class="slider-element dark swiper_wrapper full-screen clearfix" data-autoplay="5000" data-speed="450">

			<div class="swiper-container swiper-parent">
				<div class="swiper-wrapper">
					<?php
			            $args = array(
			                'post_type' => 'post',
			                'posts_per_page' => 3
			            );

			            $loop = new WP_Query( $args );
			            if( $loop->have_posts() ):
			              while( $loop->have_posts() ):
			                $loop->the_post();
				    ?>
					<div class="swiper-slide dark" style="background-image: url('<?= get_the_post_thumbnail_url(get_the_ID(),'full'); ?>')">
						<div class="container clearfix">
							<div class="slider-caption" style="max-width: 450px">
								<h2 class="nott" data-animate="fadeInUp"><?php the_title(); ?></h2>
								<p class="d-none d-sm-block" style="font-size: 17px;" data-animate="fadeInUp" data-delay="200">
								<?php 
			                    	$content = get_the_content(); 
			                    	echo str_replace('&nbsp;', ' ', strip_tags(mb_strimwidth($content, 0, 150, '...'))); 
			                  	?></p>
								<a href="<?= the_permalink(); ?>" data-animate="fadeInUp" data-delay="400" class="button button-rounded button-large ml-0 mt-4">Know More</a>
							</div>
						</div>
					</div>
					<?php
			             	endwhile;
			             endif;
		          	?>
				</div>
				<div class="swiper-navs">
					<div class="slider-arrow-left"><i class="icon-line-arrow-left"></i></div>
					<div class="slider-arrow-right"><i class="icon-line-arrow-right"></i></div>
				</div>
				<div class="swiper-scrollbar">
					<div class="swiper-scrollbar-drag">
					<div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div></div>
				</div>
			</div>

			<!-- Slider Bottom Content
			============================================= -->
			<div class="slider-product-desc dark">
				<div class="row nomargin d-none d-md-flex clearfix">
					<div class="col-md-8 px-5 py-4 blurred-box">
						<div class="before-heading text-white-50 t400 uppercase ls1 t400 mb-3" style="font-style: normal; font-family: 'Poppins', sans-serif; font-size: 12px;">Recent Post</div>
						<h3 class="mb-1" style="font-family: 'Poppins', sans-serif;">Rules not to Follow about Travel</h3>
						<p class="mb-2 text-white-50">
						Texto de teste
	                  	</p>
					</div>

					<a href="https://www.youtube.com/watch?v=P3Huse9K6Xs"  data-lightbox="iframe" class="col-md-4 image_fade" style="background: url('http://source.unsplash.com/tsmjSSSdU-A') center center / cover">
						<i class="icon-play"></i>
					</a>
				</div>
			</div>

		</section>

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin clearfix">

						<!-- Posts
						============================================= -->
						<div id="posts">

						  	<?php
					            $paged = (get_query_var('paged') ) ? get_query_var('paged') : 1;
					            $args = array(
					                'post_type' => 'post',
					                'posts_per_page' => 10,
					                'paged' => $paged
					            );

					            $loop = new WP_Query( $args );
					            if( $loop->have_posts() ):
					              while( $loop->have_posts() ):
					                $loop->the_post();
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