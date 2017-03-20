<ul>
    <?php
    global $wp_query;
    $current_category_object = $wp_query->get_queried_object();
    $current_category_name = $current_category_object->name;
    $current_category_slug = $current_category_object->slug;
    $taxonomy = 'service';
    $terms = get_terms($taxonomy, array(
            'orderby'    => 'name',
            'hide_empty' => 1,
            'parent' => 0
        )
    );

    $hierarchy = _get_term_hierarchy($taxonomy);
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        foreach($terms as $term) {
            the_post();
            $category_name = $term->name;
            $category_slug = $term->slug; ?>

            <li class="<?php echo ($category_name == $current_category_name)  ? 'active' : '' ; ?> has_children <?php echo $category_slug; ?>">
                <a href="<?php echo get_term_link( $term ) ?>" class="category_top_level"><em><?php echo $term->name; ?></em><span class="glyphicon glyphicon-menu-down category_dropdown_childs"></span></a>

                <?php
                $loop = new WP_Query( //First select only main event
                    array(
                        'post_status' => 'publish',
                        'post_type' => 'services',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'service',
                                'field' => 'term_id',
                                'terms' => $term->term_id,
                            )
                        )
                    )
                );
                ?>
                <ul>
                    <?php while($loop->have_posts()) {
                        $loop->the_post();
                        $current_post = $post->post_name;
                        ?>

                        <li><a href="<?php the_permalink(); ?>">_ <?php the_title(); ?></a></li>
                    <?php } ?>
                    <?php $loop->reset_postdata(); ?>
                    <?php the_post(); ?>
                </ul>
            </li>
            <?php
        }
    }
    ?>
</ul>