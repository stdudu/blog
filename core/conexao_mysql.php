<?php
// funcao que realiza a conexao do bd com o php
function conecta() :mysqli
{
    $servidor = 'localhost';
    $banco = 'blog';
    $port = 3307;
    $usuario = 'root';
    $senha = '';
    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco, $port);
    // verifica que a conexao teve exito ou nao e retorna a respectiva mensagem
    if(!$conexao){
        echo 'Erro: Não foi possível conectar ao MySql.' . PHP_EOL;
        echo 'Debugging errno: ' . mysqli_connect_errno() . PHP_EOL;
        echo 'Debugging error: ' . mysqli_connect_error() . PHP_EOL;
        return null;
    }
    return $conexao;

}
function desconecta($conexao){
    mysqli_close($conexao);
}
?>