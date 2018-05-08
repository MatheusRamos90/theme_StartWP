<?php
/** Página inicial */
get_header(); ?>

<!-- Content Slider Jssor -->
<div id="jssor_1" style="width:1300px;height:500px;overflow:hidden;visibility:hidden;">
    <!-- Loading Screen -->
    <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="/start_wp/wp-content/themes/StartWP/imgs/spin.svg" />
    </div>
    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
        <div>
            <img data-u="image" src="/start_wp/wp-content/themes/StartWP/imgs/001.jpg" />
        </div>
        <div>
            <img data-u="image" src="/start_wp/wp-content/themes/StartWP/imgs/002.jpg" />
        </div>
        <div>
            <img data-u="image" src="/start_wp/wp-content/themes/StartWP/imgs/003.jpg" />
        </div>
    </div>
    <!-- Bullet Navigator -->
    <div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
        <div data-u="prototype" class="i" style="width:16px;height:16px;">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="b" cx="8000" cy="8000" r="5800"></circle>
            </svg>
        </div>
    </div>
    <!-- Arrow Navigator -->
    <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
        </svg>
    </div>
    <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
        </svg>
    </div>
</div>
<!-- End of Content Slider Jssor -->

<!-- Container -->
<section class="container-fluid content">
    <div class="container">
        <div class="col-lg-12 col-md-12 content-wrapper">
            <div class="center">
                <?php query_posts('posts_per_page=3'); ?> <!-- Query para limitar posts na página -->
                <?php if(have_posts()): while (have_posts()) : the_post();?>
                    <div class="line-post">
                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <div class="content-post post-index">
                                <a href="<?php the_permalink();?>">
                                    <?php if ( has_post_thumbnail() ):;?>
                                        <!-- mostra a imagem destacada -->
                                        <p class="img-post"><?php the_post_thumbnail();?></p>
                                    <?php else: ;?>
                                        <!-- mostra outra coisa (imagem, texto, etc.) -->
                                        }
                                    <?php endif; ?>
                                    <h3><?php the_title();?></h3>
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

    </div>
</section>

<?php get_footer(); ?>