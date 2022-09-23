
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                
                <!-- Área de widget -->

                <?php dynamic_sidebar( 'sidebar-footer-1' ); ?>

            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/lib/wow/wow.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/lib/easing/easing.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/lib/counterup/counterup.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo get_template_directory_uri();?>/js/main.js"></script>

    <?php wp_footer(); ?>
    
</body>

</html>