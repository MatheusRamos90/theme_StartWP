<?php
/**
Template Name: Blog */
/** Mostrar postagens recentes aqui... */
get_header(); ?>
    <!-- Container -->
    <section class="container-fluid content">
        <div class="container">
            <div class="col-lg-8 col-md-8 content-wrapper float-left">
                <div class="center">
                <?php
                $paged = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;

                $args = array(
                    'showposts'		 => 1,
                    'posts_per_page' => 1,
                    'order'          => 'DESC',
                    'paged'          => $paged,
                );
                $loop = new WP_Query($args);
                if ($loop->have_posts()):
                    while ($loop->have_posts()) : $loop->the_post(); ?>
                            <div class="line-post">
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="content-post post-blog">
                                        <a href="<?php the_permalink();?>">
                                            <?php if ( has_post_thumbnail() ):;?>
                                                <!-- mostra a imagem destacada -->
                                                <p class="img-post"><?php the_post_thumbnail();?></p>
                                            <?php else: ;?>
                                                <!-- mostra outra coisa (imagem, texto, etc.) -->
                                            <?php endif; ?>
                                            <h2><?php the_title();?></h2>
                                            <p class="details-post"><?php the_excerpt();?></p>
                                            <h6 class="details-post"><i class="fa fa-calendar"></i> <?php the_date('d/M/Y');?></h6>
                                            <h6 class="details-post"><?php edit_post_link('<i class="fa fa-pencil" aria-hidden="true"></i>');?></h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    <?php endwhile; ?>
                    <div class="pagination-post">
                        <?php
                        $total_pages = $loop->max_num_pages;
                        if ($total_pages > 1) {
                            $current_page = max(1, get_query_var( 'paged' ));
                            echo paginate_links( array(
                                'base' => get_pagenum_link( 1 ) . '%_%',
                                'format' => 'page/%#%',
                                'current' => $current_page,
                                'total' => $total_pages,
                                'prev_text' => __('Próximo'),
                                'next_text' => __('Anterior'),
                            ) );
                        }
                        ?>
                    </div>
                <?php else: ?>
                    <div class="line-post">
                        <h5 class="alert alert-warning not-found">Não há posts para serem mostrados.</h5>
                    </div>
                <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>

            <!-- Sidebar -->
            <?php get_sidebar(); ?>
        </div>
    </section>
<?php get_footer(); ?>