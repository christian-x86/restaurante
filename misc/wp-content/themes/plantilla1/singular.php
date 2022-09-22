<?php get_header(); ?>

    <!-- empieza centro -->

    <div class="container">

        <!-- empieza izquierda -->

        <div class="izquierda">

            <h1><?php the_title(); ?></h1>

            <?php the_content(); ?>
            
            <section class="contenido">

            </section>     
        </div>

        <!-- fin izquierda -->

        <!-- empieza aside -->

        <aside>
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