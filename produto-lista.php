<?php include("cabecalho.php");
include("conecta.php");
include("banco-produto.php"); ?>

<!--
lógica para mostrar uma mensagem de sucesso após
a remoção de um produto
 -->

<?php
    //verifica se existe ou não o valor dentro de um array
    if(array_key_exists("removido", $_GET) && $_GET["removido"]==true):
?>
    <p class="alert-success">Produto apagado com Sucesso!</p>
<?php
    endif;
?>

<h1 class="text-center">Lista de Produtos</h1>
<table class="table table-striped table-bordered">
    <?php
        //recebe a lista de produtos
        $produtos = listaProduto($conexao);
        //para cada um dos produto chama de produto
        foreach($produtos as $produto):
    ?>
    <tr>
        <td><?= $produto['nome'] ?></td>
        <td><?= $produto['preco'] ?></td>
        <td><?= substr($produto['descricao'], 0, 40) ?></td>
        <td><?= $produto['categoria_nome']?></td>
        <td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?= $produto['id'] ?>">Alterar</a></td>
        <td>
            <form action="remove-produto.php?id=<?= $produto['id']?>" method="post">
                <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                <button class="btn btn-danger">Remover</button>
            </form>
        </td>
    </tr>
    <?php
        endforeach
    ?>
</table>
<?php include("rodape.php") ?>
