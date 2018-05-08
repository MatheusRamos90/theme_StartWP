<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
    <p class="nocomments">Este artigo está protegido por senha. Insira para ver os comentários.</p>
    <?php
    return;
}
?>

<div class="col-lg-8 col-md-12 col-xs-12" id="comments">
    <h3><?php comments_number('0 comentários', '1 comentário', '% comentários' );?></h3>

    <?php if ( have_comments() ) : ?>

        <ol class="commentlist">
            <?php wp_list_comments('avatar_size=64&type=comment'); ?>
        </ol>

        <?php if ($wp_query->max_num_pages > 1) : ?>
            <div class="pagination">
                <ul>
                    <li class="older"><?php previous_comments_link('Anteriores'); ?></li>
                    <li class="newer"><?php next_comments_link('Novos'); ?></li>
                </ul>
            </div>
        <?php endif; ?>

    <?php endif; ?>

    <?php if ( comments_open() ) : ?>

        <div id="respond">
            <h3>Deixe o seu comentário!</h3>

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                <fieldset>
                    <?php if ( $user_ID ) : ?>

                        <p>Logado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php" style="color: #2e4453;font-size: 110%;font-weight: bold"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(); ?>" title="Sair desta conta" style="color: #2e4453;font-size: 110%;font-weight: bold">Sair &raquo;</a></p>

                    <?php else : ?>

                        <label for="author">Nome:</label>
                        <input type="text" class="form-control" name="author" id="author" value="<?php echo $comment_author; ?>" />

                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $comment_author_email; ?>" />

                        <label for="url">Website:</label>
                        <input type="text" class="form-control" name="url" id="url" value="<?php echo $comment_author_url; ?>" />

                    <?php endif; ?>

                    <label for="comment">Mensagem:</label>
                    <textarea name="comment" class="form-control" id="comment" rows="6" cols="5"></textarea><br/>

                    <input type="submit" class="btn btn-primary commentsubmit" value="Enviar Comentário" style="border-radius: 0px"/>

                    <?php comment_id_fields(); ?>
                    <?php do_action('comment_form', $post->ID); ?>
                </fieldset>
            </form>
            <p class="cancel"><?php cancel_comment_reply_link('Cancelar Resposta'); ?></p>
        </div>
    <?php else : ?>
        <h3>Os comentários estão fechados.</h3>
    <?php endif; ?>
</div>