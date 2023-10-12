<?php

// Incluir a conexão com banco de dados
include_once './conexao.php';

// Receber os dados do formulário
$dados = filter_input_array(INPUT_POST);

// Validar o campo nome_usuario, acessa o IF quando o campo está vazio 
if (empty($dados['nome'])) {

    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro: Necessário preencher o campo nome!"];
} elseif (empty($dados['email'])) { // Validar o campo email_usuario, acessa o ELSEIF quando o campo está vazio 

    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro: Necessário preencher o campo e-mail!"];
} elseif (empty($dados['telefone'])) { // Validar o campo email_usuario, acessa o ELSEIF quando o campo está vazio 

    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro: Necessário preencher o campo telefone!"];
} elseif (empty($dados['assunto'])) { // Validar o campo email_usuario, acessa o ELSEIF quando o campo está vazio 

    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro: Necessário preencher o campo assunto!"];
} else { // Acessa o ELSE quando todos os campo estão preenchidos

    // Criar a QUERY para cadastrar usuário no banco de dados
    $query_usuario = "INSERT INTO clientes (nome, email, telefone, assunto) VALUES (:nome, :email, :telefone, :assunto)";

    // Preparar a QUERY
    $cad_usuario = $conexao->prepare($query_usuario);

    // Usar o bindParam para substituir o link da QUERY pelo valor que vem do formulário 
    $cad_usuario->bindParam(':nome', $dados['nome']);

    // Usar o bindParam para substituir o link da QUERY pelo valor que vem do formulário 
    $cad_usuario->bindParam(':email', $dados['email']);

    // Usar o bindParam para substituir o link da QUERY pelo valor que vem do formulário 
    $cad_usuario->bindParam(':telefone', $dados['telefone']);

    // Usar o bindParam para substituir o link da QUERY pelo valor que vem do formulário 
    $cad_usuario->bindParam(':assunto', $dados['assunto']);

    // Executar a QUERY com PHP e PDO
    $cad_usuario->execute();

    // Acessa o IF quando cadastrar o registro no banco de dados
    if ($cad_usuario->rowCount()) {

        // Criar o array com status e a mensagem de sucesso
        $retorna = ['status' => true, 'msg' => "Sua mensagem foi enviada com sucesso!"];
    } else { // Acessa o ELSE quando não cadastrar o registro no banco de dados

        // Criar o array com status e a mensagem de erro
        $retorna = ['status' => false, 'msg' => "Erro: Usuário não cadastrado com sucesso!"];
    }
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);
