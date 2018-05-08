<?php get_header(); ?>
    <!-- Container -->
    <section class="container-fluid content">
        <div class="container">
            <div class="col-lg-8 col-md-8 content-wrapper float-left">
                <div class="center">
                    <?php if(have_posts()): while (have_posts()) : the_post();?>
                        <div class="row line-post">
                            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            <p class="content-post"><?php the_content();?></p>
                        </div>
                    <?php endwhile; else: ?>
                        <div class="row line-post">
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