<?php include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];

//verificar se a chave(id) informada existe dentro da requisi��o
//ou seja, se o valor informado foi false ou true
if(array_key_exists('usado', $_POST)){
    $usado = "true";
}else{
    $usado = "false";
}

//inser��o do produto no banco
if(alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)){ ?>
    <p class="text-success">O Produto <?= $nome ?>, <?= $preco ?> foi alterado com sucesso!</p>
<?php }else{
    $msg = mysqli_error($conexao);
    ?>
    <p class="text-danger">O Produto <?= $nome ?> n�o foi alterado: <?=$msg ?></p>
    <?php
}
mysqli_close($conexao);
?>



<?php include("rodape.php"); ?>