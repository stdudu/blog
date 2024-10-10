<?php
// funcao que da a instrucao para a insercao de dados no bd pelo comando INSERT
// $entidade: tabela no bd a qual deseja realizar a funcao INSERT
function insert (string $entidade, array $dados) : String 
{
$instrucao = "INSERT INTO {$entidade}";
// implode: junta arrays com um parametro em uma unica string
// ex: implode(', ', array(#dados)): junta cada campo da array dados em uma unica string separada por virgulas

$campos = implode(', ', array_keys($dados));
$valores = implode(', ', array_values($dados));

$instrucao.= "({$campos})";
$instrucao .= " VALUES ({$valores})";

return $instrucao;
}

/* */
// funcao que da instrucao para a delecao á quaisquer tabelas ou dados realizados pela funcao INSERT com base em parametros
function delete (string $entidade, array $criterio = []) : String
{
    $instrucao = "DELETE {$entidade}";
    // verifca se o criterio para a delecao contem ou nao parametros, se verdadeiro imprime uma condicional para o comando DELETE
    // ex: DELETE FROM usuario WHERE email = 'gmail.com' -> apaga todos os usuarios que tem '@gmail.com' em email
    if(!empty($criterio)){
        $instrucao .=' WHERE ';

        foreach($criterio as $expressao){
            $instrucao .=' ' . implode(' ', $expressao);
        }
    }

    return $instrucao;
}
// funcao que da instrucao para atualizar quaisquer informações de tabelas do bd
function update (string $entidade, array $dados, array $criterio = []) : string
{
    $instrucao = "UPDATE {$entidade}";

    foreach ($dados as $campo => $dado)
    {
        $set[] = "{$campo} = {$dado}";
    }
    $instrucao .= ' SET ' . implode(',', $set) ;
    // verifca se o criterio para a delecao contem ou nao parametros, se verdadeiro imprime uma condicional para o comando UPDATE
    if (!empty($criterio)){
        $instrucao .= ' WHERE';
        
        foreach($criterio as $expressao) {
            $instrucao .= ' '. implode (' ',$expressao);
        }
    }
    return $instrucao;
}
// funcao que retorna valores de uma determinada entidade com base nos criterios apresentados
function  select (string $entidade, array $campos, array $criterio = [], string $ordem = null) : string
{
    $instrucao = " SELECT " . implode(',',$campos);
    $instrucao .= " FROM {$entidade}";
    // verifca se o criterio para a delecao contem ou nao parametros, se verdadeiro imprime uma condicional para o comando SELECT
    if(!empty($criterio)){
        $instrucao .= ' WHERE ';

        foreach ($criterio as $expressao){
            $instrucao .= ' '.implode (' ', $expressao);
        }
    }
    if(!empty($ordem)){
        $instrucao .= " ORDER BY $ordem ";
    }
    return $instrucao;
}

?>