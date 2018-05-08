<!-- Conteudo Sidebar Padrão -->
<div class="col-lg-4 col-md-4 sidebar float-right">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?><?php endif; ?>
    <div class="widget">
        <h3>Posts recentes</h3>
        <ul>
            <?php query_posts('posts_per_page=3'); ?> <!-- Query para limitar posts na página -->
            <?php if(have_posts()): while (have_posts()) : the_post();?>
                <li class="not-ancora">
                    <a href="<?php the_permalink();?>"><div class="post-sidebar">
                        <div class="col-lg-4">
                            <?php if ( has_post_thumbnail() ):;?>
                                <!-- mostra a imagem destacada -->
                                <p class="img-post"><?php the_post_thumbnail();?></p>
                            <?php else: ;?>
                                <!-- mostra outra coisa (imagem, texto, etc.) -->
                                }
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-8">
                            <h5><?php the_title();?></h5>
                        </div>
                        </div></a>
                </li>
            <?php endwhile; ?>
                <div class="see-more">
                    <a href="/start_wp/blog" target="_blank" class="btn-seemore"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Veja mais</a>
                </div>
            <?php else: ?>
                <div class="line-post">
                    <h5 class="alert alert-warning not-found">Não há posts para serem mostrados.</h5>
                </div>
            <?php endif; ?>
        </ul>
    </div>
</div>