<?php get_header(); ?>

						<!-- Section -->
							<section>
								<header class="major">
									<h2>Búsqueda</h2>
								</header>
								<div class="posts">

									<?php
									if ( have_posts() ) :
										while ( have_posts() ) : the_post(); ?>
									<article>
										<!-- <a href="<?php the_permalink(); ?>" class="image"><img src="<?php echo get_template_directory_uri();?> /images/pic01.jpg" alt="" /></a> -->
										<a href="<?php the_permalink(); ?>" class="image"><?php the_post_thumbnail(); ?></a>
										<h3><?php the_title(); ?></h3>
										<?php the_content(); ?>
										<ul class="actions">
											<li><a href="<?php the_permalink(); ?>" class="button">More</a></li>
										</ul>
									</article>
									<?php endwhile;

									else :
										echo '<p>There are no posts!</p>';

									endif;
									?>
								</div>
							</section>

						</div>

<?php get_footer(); ?>