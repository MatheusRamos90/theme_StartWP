<?php
/** Página da postagem */
get_header(); ?>
    <!-- Container -->
    <section class="container-fluid content">
        <div class="container">
            <div class="col-lg-8 col-md-8 content-wrapper float-left">
                <div class="center">
                    <?php if(have_posts()): while (have_posts()) : the_post();?>
                        <div class="line-post">
                            <div class="content-post">
                                <a href="<?php the_permalink();?>"><h2><?php the_title();?></h2></a>
                                <div class="line-separate"></div>
                                <div class="col-lg-4 col-md-4 details-post">
                                    <i class="fa fa-eye"></i> Views: <?php if(function_exists('the_views')) { the_views(); } ?>
                                </div>
                                <div class="col-lg-4 col-md-4 details-post">
                                    <i class="fa fa-calendar"></i> <?php the_date('d/M/Y');?>
                                </div>
                                <div class="col-lg-4 col-md-4 details-post">
                                    <i class="fa fa-comments-o" aria-hidden="true"></i> <?php comments_popup_link('Sem comentários','1 comentários','% comentários','comments-link', '');?> - <?php edit_post_link('<i class="fa fa-pencil" aria-hidden="true"></i>');?>
                                </div>
                                <p class="content-post"><?php the_content();?></p>
                                <div class="col-lg-12 col-md-12 details-post categories-post">
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <!-- Chamar categoria do post (listar)-->
                                    <?php
                                    $id = get_the_ID();
                                    $cats = get_the_category($id);
                                    echo ( count($cats) == 1  ? 'Categoria: ' : 'Categorias: ');
                                    $c = 0; $n = 0;
                                    $c = count($cats);
                                    foreach ( $cats as $cat ):
                                        $n++; ?>
                                        <a href="<?php echo get_category_link($cat->cat_ID); ?>">
                                            <?php echo $cat->name; echo ( $n > 0 && $n < $c ? ', ' : ''); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                                <!-- About author -->
                                <div class="about-author">
                                    <div class="center-author">
                                        <div class="col-lg-2 col-md-2 col-xs-12 left-auth">
                                            <span class="avatar-author"><?php echo get_avatar (get_the_author_id() , 80 ); ?></span>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-xs-12 right-auth">
                                            <h4 class="name-author">Postado por: <span><?php the_author();?></span></h4>
                                            <p class="description-author"><?php the_author_description(); ?></p>
                                            <!-- Network socials -->
                                            <div class="col-lg-12 col-md-12 col-xs-12 network-auth">
                                                <a href="#" target="_blank" id="facebook-btn" class="col-lg-3 col-md-3 col-xs-12 btn-socials"><i class="fa fa-facebook"></i> <span class="lets-talk tal-fac">Let's talk!</span></a>
                                                <a href="#" target="_blank" id="twitter-btn" class="col-lg-3 col-md-3 col-xs-12 btn-socials"><i class="fa fa-twitter"></i> <span class="lets-talk tal-tw">Let's talk!</span></a>
                                                <a href="#" target="_blank" id="linkedin-btn" class="col-lg-3 col-md-3 col-xs-12 btn-socials"><i class="fa fa-linkedin"></i> <span class="lets-talk tal-lin">Let's talk!</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php comments_template();?>
                    <?php endwhile; else: ?>
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