<?php
/* Aqui programaremos futuramente
os recursos de login/logout e verificação
de permissão de acesso dos usuários */

/* VERIFICANDO SE NÃO EXISTE UMA SESSÃO EM FUNCIONAMENTO */
if(!isset($_SESSION)){
    session_start();
}


function verificaAcesso(){
    /* Se NÃO EXISTE uma variavel de sessão */
    if(!isset($_SESSION['id'])) {
        session_destroy();
        header("location:../login.php");
        die();
    }
}

function login($id, $nome, $email, $tipo,){
    /* Criando variaveis de sessão ao logar */
    $_SESSION['id'] = $id; 
    $_SESSION['nome'] = $nome; 
    $_SESSION['email'] = $email; 
    $_SESSION['tipo'] = $tipo; 

}

/* Usando nas paginas admistrativas quando cliclamos em sair */
function logout(){
    session_start();
    session_destroy();
    header("location:../login.php");
    die();
}