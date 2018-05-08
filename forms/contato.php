<?php
/** TRATAMENTO INFORMAÇÕES DO FORM CONTATO */

$msg = '';
$status = 'danger';

$nome = trim($_POST['nome']);
$email = trim(utf8_encode($_POST['email']));
$telefone = trim($_POST['telefone']);
$mensagem = trim($_POST['mensagem']);
$data = date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d H:i:s');

if(empty($nome) || empty($email) || empty($telefone) || empty($mensagem)){
    $msg = 'Preencha todos os campos!';
}else{
    $wpdb->insert(
        'wp_start_wpcontato',
        array(
            'contato_nome' => $nome,
            'contato_email' => $email,
            'contato_telefone' => $telefone,
            'contato_mensagem' => $mensagem,
            'contato_data' => $data
        )
    );
    if($wpdb){
        $status = 'success';
        $msg = 'Sucesso! Contato enviado... aguarde retorno.';
    }else{
        $msg = 'Erro! Houve um problema no envio do formulário.';
    }
}

?>