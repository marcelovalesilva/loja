<?php
//lista os produtos devolvendo um array de produtos
//e retorna essa lista
function listaProduto($conexao){
    $produtos = array();

    //retorna o produto associado ao nome da categoria
    $resultado = mysqli_query($conexao, "SELECT p.*,c.nome AS categoria_nome FROM
    produtos AS p JOIN categorias AS c ON c.id=p.categoria_id");

    //pega cada produto, um por um e coloca dentro do array
    while($produto = mysqli_fetch_assoc($resultado)){
        array_push($produtos, $produto);
    }
    return $produtos;
}

//funчуo para criar uma query e retornar essa query detro da conexуo
//insere produto dentro da tabela do banco
function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado){
    $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) VALUES
    ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})";
    return mysqli_query($conexao, $query);
}

//funчуo altera prod
function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado){
    $query = "UPDATE produtos SET nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}',
      categoria_id = {$categoria_id}, usado = {$usado} WHERE id = '{$id}'";
    return mysqli_query($conexao, $query);
}

//funчуo para retornar um produto do banco
function buscaProduto($conexao, $id){
    $query = "SELECT * FROM produtos WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

//funчуo para remover produto
function removeProduto($conexao, $id){
    $query = "DELETE FROM produtos WHERE id = {$id}";
    return mysqli_query($conexao, $query);
}