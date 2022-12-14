<?php
session_start();
require 'conexao-banco.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Produto</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('mensagem.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Produto 
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $produto_id = mysqli_real_escape_string($conexao, $_GET['id']);
                            $query = "SELECT * FROM produtos WHERE id='$produto_id' ";
                            $query_run = mysqli_query($conexao, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $produto = mysqli_fetch_array($query_run);
                                ?>
                                <form action="mysql.php" method="POST">
                                    <input type="hidden" name="produto_id" value="<?= $produto['id']; ?>">

                                    <div class="mb-3">
                                        <label>Descrição</label>
                                        <input type="text" name="descricao" value="<?=$produto['descricao'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Marca</label>
                                        <input type="text" name="marca" value="<?=$produto['marca'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Estoque</label>
                                        <input type="number" name="estoque" value="<?=$produto['estoque'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Preço(R$)</label>
                                        <input type="price" name="preco" value="<?=$produto['preco'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="atualizar-produto" class="btn btn-primary">Atualizar Produto</button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>Sem resultados!</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>