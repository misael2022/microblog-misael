<?php
require "conecta.php";

/* Usada em post-insere.php */
function inserirPost(mysqli $conexao, string $titulo, string $texto, string $resumo, string $imagem, string $idUsuarioLogado){

    $sql = "INSERT INTO posts(titulo, texto, resumo, imagem, usuario_id)
               VALUES('$titulo', '$texto', '$resumo', '$imagem', $idUsuarioLogado)";
    
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} // fim inserirPost



/* Usada em posts.php */
function lerPosts(mysqli $conexao, int $idUsuarioLogado):array {
    $sql = "";

    $resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
    $posts = [];
    while($post = mysqli_fetch_assoc($resultado)){
        array_push($posts, $post);
    }
    return $posts;
} // fim lerPosts


/* Usada em post-atualiza.php */
function lerUmPost(mysqli $conexao):array {    
    $sql = "";

	$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado); 
} // fim lerUmPost



/* Usada em post-atualiza.php */
function atualizarPost(mysqli $conexao){
    $sql = "";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));       
} // fim atualizarPost



/* Usada em post-exclui.php */
function excluirPost(mysqli $conexao){    
    $sql = "";

	mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} // fim excluirPost



/* Funções utilitárias */

/* Usada em post-insere.php e post-atualiza.php */
function upload($arquivo){
    $tiposValidos = ["image/png", 
                     "image/jpeg", 
                     "image/gif", 
                     "image/svg+xml"
                    ];

    // Verificar se o arquivo enviado NÃO É um dos aceitos
    if( !in_array($arquivo['type'], $tiposValidos)){
        die("<script>alert('formato é invalido'); history.back();</script> ");
    }

    // Acessando apenas o nome do arquivo
    $nome = $arquivo['name']; // $_FILES['arquivo]['name']

    // Acessando dados de acesso temporario ao arquivo
    $temporario = $arquivo['tmp_name'];

    // Pasta de destino do arquivo que esta sendo enviado
    $destino = "../imagens/$nome";

    /* Se o processo de envio temporario para destino foe feito com sucesso, então a função retorna verdadeiro (indicando o sucesso no processo) */
    if( move_uploaded_file($temporario, $destino)){
        return true;
    }
} // fim upload



/* Usada em posts.php e páginas da área pública */
function formataData(){ 
    // Definindo os tipos de imagem aceitos



} // fim formataData



/*** Funções para a área PÚBLICA do site ***/

/* Usada em index.php */
function lerTodosOsPosts(mysqli $conexao):array {
    $sql = "";
    
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    $posts = [];
    while( $post = mysqli_fetch_assoc($resultado) ){
        array_push($posts, $post);
    }
    return $posts; 
} // fim lerTodosOsPosts



/* Usada em post-detalhe.php */
function lerDetalhes(mysqli $conexao):array {    
    $sql = "";

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado); 
} // fim lerDetalhes



/* Usada em search.php */
function busca($conexao):array {
    $sql = "";
        
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    $posts = [];
    while( $post = mysqli_fetch_assoc($resultado) ){
        array_push($posts, $post);
    }
    return $posts; 
} // fim busca