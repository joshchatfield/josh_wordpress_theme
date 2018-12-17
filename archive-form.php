<h1>archive-form template</h1>

            <?php
                $args = array(
                    'posts_per_page' => '-1',
                    'post_type' => 'form',
                );

                $myForms = new WP_Query($args);
                while ($myForms->have_posts()){
                    $myForms->the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                <?php } ?>
