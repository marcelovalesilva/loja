<?php include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");


    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $categoria_id = $_POST['categoria_id'];

    //verificar se a chave(id) informada existe dentro da requisição
    //ou seja, se o valor informado foi false ou true
    if(array_key_exists('usado', $_POST)){
        $usado = "true";
    }else{
        $usado = "false";
    }

    //inserção do produto no banco
    if(insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)){ ?>
        <p class="text-success">O Produto <?= $nome ?>, <?= $preco ?> adiconado com sucesso!</p>
    <?php }else{
        $msg = mysqli_error($conexao);
    ?>
        <p class="text-danger">O Produto <?= $nome ?> não foi adiconado: <?=$msg ?></p>
    <?php
    }
    mysqli_close($conexao);
    ?>



<?php include("rodape.php"); ?>