<?php get_header(); ?>

    <!-- empieza centro -->

    <div class="container">

        <!-- empieza izquierda -->

        <div class="izquierda">

            <h1><?php bloginfo( 'name' ); ?></h1>

            <?php // Mostrar búsqueda
            global $wp_query;
            $encontrados= $wp_query->found_posts;
            echo "<p>Hemos encontrado ".$encontrados." resultados.</p>";
            ?>
            <section class="contenido">

                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>

                <article>
                    <div class="imagen" style="background-image: url('<?php echo get_template_directory_uri();?>/img/card_image.jpg');"></div>

                    <div class="titulo"><?php the_title(); ?></div>

                    <div class="contenido_article">
                        <?php
                        the_content();
                        ?>
                    </div>

                    <div class="leer_mas">
                        <a href="<?php the_permalink(); ?>">Leer más</a>
                    </div>
                </article>

                <?php endwhile;

                else :
                    echo '<p>There are no posts!</p>';

                endif;
                ?>

            </section>     
        </div>

        <!-- fin izquierda -->

        <!-- empieza aside -->

        <aside>
            <div class="aside_block">
                <h2>Buscar</h2>
                <?php get_search_form( true ); ?>
            </div>
            <div class="aside_block">
                <h2>Los más visitados</h2>
                <ul class="aside_list">
                    <li>
                        Item 1
                    </li>

                    <li>
                        Item 2
                    </li>

                    <li>
                        Item 3
                    </li>

                    <li>
                        Item 4
                    </li>

                    <li>
                        Item 5
                    </li>
                </ul>
            </div>
        </aside>
        
        <!-- fin aside -->

    </div>

    <!-- fin centro -->

<?php get_footer(); ?>