<?php
/**
Template Name: Contato */

/* Com o nome acima eu crio template page modelo para páginas personalizadas */
if ($_POST['envia-contato']){
    require TEMPLATEPATH . "/forms/contato.php";
}
get_header(); ?>
    <!-- Container -->
    <section class="container-fluid content">
        <div class="container">
            <div class="col-lg-8 col-md-8 content-wrapper">
                <div class="conteudo-resposta"></div>
                <form method="post" action="">
                    <div class="center">
                        <p><span style="color: #d9534f">*</span> Nome:</p>
                        <input type="text" name="nome" class="form-control">
                        <br/>
                        <p><span style="color: #d9534f">*</span> E-mail:</p>
                        <input type="text" name="email" class="form-control">
                        <br/>
                        <p><span style="color: #d9534f">*</span> Telefone:</p>
                        <input type="text" name="telefone" class="form-control">
                        <br/>
                        <p><span style="color: #d9534f">*</span> Mensagem:</p>
                        <textarea class="form-control" name="mensagem" rows="7"></textarea>
                        <br/>
                        <input type="submit" name="envia-contato" class="btn btn-success" value="Enviar">
                    </div>
                </form>
                <?php
                if ( $msg )
                    echo '<h6 class="alert alert-'.$status.'">'.$msg.'</h6>'; //mensagem de retorno do envio de contato
                ?>
            </div>
            <div class="col-lg-4 col-md-4 content-wrapper">
                <div class="center">
                    <!--<img src="/start_wp/wp-content/themes/StartWP/imgs/bootstrap4.png"> <!-- Caminho completo -->
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>