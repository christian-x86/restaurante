    <?php get_header(); ?>

    <!-- Fin del Header -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative" data-dot="<img src='<?php echo get_template_directory_uri();?>/img/carousel-1.jpg'>">
                <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/img/carousel-1.jpg" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-2 text-white animated slideInDown"><?php bloginfo( 'name' ); ?></h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-3"><?php bloginfo( 'description' ); ?></p>
                                <a href="" class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative" data-dot="<img src='<?php echo get_template_directory_uri();?>/img/carousel-2.jpg'>">
                <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/img/carousel-2.jpg" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-2 text-white animated slideInDown"><?php bloginfo( 'name' ); ?></h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-3"><?php bloginfo( 'description' ); ?></p>
                                <a href="" class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative" data-dot="<img src='<?php echo get_template_directory_uri();?>/img/carousel-3.jpg'>">
                <img class="img-fluid" src="<?php echo get_template_directory_uri();?>/img/carousel-3.jpg" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-2 text-white animated slideInDown"><?php bloginfo( 'name' ); ?></h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-3"><?php bloginfo( 'description' ); ?></p>
                                <a href="" class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="text-primary"><?php the_category(", "); ?></h6>
                <h1 class="mb-4"><?php the_title(); ?></h1>
                
            </div>

            <div class="row g-4 portfolio-container wow fadeInUp" data-wow-delay="0.5s">
                <div class=" col-12 portfolio-item">
                        <?php the_content(); ?>
                </div>
                <!-- Wordpress Loop -->

                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>

                <?php endwhile;

                else :
                    echo '<p>There are no posts!</p>';

                endif;
                ?>
                
            </div>
        </div>
    </div>
    <!-- Projects End -->


    <!-- Empieza footer -->

    <?php get_footer(); ?>