<?php include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");

$id = $_POST['id'];
removeProduto($conexao, $id);

//função que diz pra qual URI o browser deve ir depois de remover o produto
//pelo id, no caso, atualizará a página de lista de produtos
header("Location: produto-lista.php?removido=true");

//para a execução, não requisita mais nada
//sempre depois de fazer um Location, deve ser feito um die();
die();
?>

