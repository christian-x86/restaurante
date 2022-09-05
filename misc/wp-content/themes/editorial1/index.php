<?php get_header(); ?>

						<!-- Banner -->
							<section id="banner">
								<div class="content">
									<header>
										<h1><?php bloginfo( 'name' ); ?></h1>
										<p><?php bloginfo( 'description' ); ?></p>
									</header>
									<p>Aenean ornare velit lacus, ac varius enim ullamcorper eu. Proin aliquam facilisis ante interdum congue. Integer mollis, nisl amet convallis, porttitor magna ullamcorper, amet egestas mauris. Ut magna finibus nisi nec lacinia. Nam maximus erat id euismod egestas. Pellentesque sapien ac quam. Lorem ipsum dolor sit nullam.</p>
									<ul class="actions">
										<li><a href="#" class="button big">Learn More</a></li>
									</ul>
								</div>
								<span class="image object">
									<img src="<?php echo get_template_directory_uri();?> /images/pic10.jpg" alt="" />
								</span>
							</section>

						<!-- Section -->
							<section>
								<header class="major">
									<h2>Erat lacinia</h2>
								</header>
								<div class="features">
									<article>
										<span class="icon fa-gem"></span>
										<div class="content">
											<h3>Portitor ullamcorper</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
										</div>
									</article>
									<article>
										<span class="icon solid fa-paper-plane"></span>
										<div class="content">
											<h3>Sapien veroeros</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
										</div>
									</article>
									<article>
										<span class="icon solid fa-rocket"></span>
										<div class="content">
											<h3>Quam lorem ipsum</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
										</div>
									</article>
									<article>
										<span class="icon solid fa-signal"></span>
										<div class="content">
											<h3>Sed magna finibus</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
										</div>
									</article>
								</div>
							</section>

						<!-- Section -->
							<section>
								<header class="major">
									<h2>Ipsum sed dolor</h2>
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