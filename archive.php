<?php
/** Página da chamada das 'categorias', 'busca' e 'posts por datas', se for encontrado mostrar */
get_header(); ?>
    <!-- Container -->
    <section class="container-fluid content">
        <div class="container">
            <div class="col-lg-8 col-md-8 content-wrapper float-left">
                <div class="center">

                    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
                    <?php /* If this is a category archive */ if (is_category()) { ?>
                        <span class="title-result">Resultados da categoria:</span> <span class="name-result"><?php echo single_cat_title(); ?></span>
                        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                        <span class="title-result">Arquivos de</span> <span class="name-result"><?php the_time('j F, Y'); ?></span>
                        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                        <span class="title-result">Arquivos de</span> <span class="name-result"><?php the_time('F, Y'); ?></span>
                        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                        <span class="title-result">Arquivos de</span> <span class="name-result"><?php the_time('Y'); ?>
                        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                        <span class="title-result">Arquivos do Autor</span>
                        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                        <span class="title-result">Arquivos do Blog</span>
                    <?php } ?>

                    <?php query_posts('posts_per_page=10'); ?> <!-- Query para limitar posts na página -->
                    <?php if(have_posts()): while (have_posts()) : the_post();?>
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