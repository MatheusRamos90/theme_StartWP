<?php
/** Página da chamada das 'categorias' */
get_header(); ?>
    <!-- Container -->
    <section class="container-fluid content">
        <div class="container">
            <div class="col-lg-8 col-md-8 content-wrapper float-left">
                <div class="center">
                    <span class="title-result">Resultados da categoria:</span> <span class="name-result"><?php echo strtoupper(single_cat_title( '', false )) ?></span>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
                            wpbeginner_numeric_posts_nav();
                            ?>
                        </div>
                    <?php else: ?>
                        <div class="line-post">
                            <h5 class="alert alert-warning not-found">Não há posts para serem mostrados.</h5>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Sidebar -->
            <?php get_sidebar(); ?>
        </div>
    </section>
<?php get_footer(); ?>