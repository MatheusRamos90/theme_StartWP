<?php
/** Página dos resultados das buscas */
get_header(); ?>
    <!-- Container -->
    <section class="container-fluid content">
        <div class="container">
            <div class="col-lg-8 col-md-8 content-wrapper float-left">
                <div class="center">
                    <?php
                    $s=get_search_query();
                    $args = array(
                        's' =>$s
                    );
                    // The Query
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ) {
                        _e("<span class='title-result'>Resultados da busca por: <span class='name-result'>".get_query_var('s')."</span></span>");
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            ?>
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
                            <?php
                        }
                    }else{
                        ?>
                        <h5 class="alert alert-warning not-found">Não houve resultados com essa pesquisa.</h5>
                    <?php } ?>

                </div>
            </div>

            <!-- Sidebar -->
            <?php get_sidebar(); ?>
        </div>
    </section>
<?php get_footer(); ?>