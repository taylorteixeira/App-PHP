<?php
// Verificar se os campos foram preenchidos
if (empty($_POST['titulo']) || empty($_POST['conteudo'])) {
    echo "Por favor, preencha todos os campos.";
    exit;
}

// Obter os dados enviados pelo formulário
$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];

// Incluir o arquivo de conexão com o banco de dados
include('../Model/conexao.php');

// Inserir a nova postagem na tabela "postagens" (supondo que a tabela já exista)
$query = "INSERT INTO postagens (titulo, conteudo) VALUES ('$titulo', '$conteudo')";
$result = mysqli_query($conexao, $query);

if ($result) {
    echo "Postagem publicada com sucesso!";
} else {
    echo "Ocorreu um erro ao publicar a postagem.";
}

// Fechar a conexão com o banco de dados
mysqli_close($conexao);
?>
