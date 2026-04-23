<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="estilo/estilo.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Edição de Dados do Usuário</title>
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/login.php";
		require_once "includes/funcoes.php";
	?>
	<div id="corpo">
        <?php 
            if(!is_logado()) {
                echo msg_erro("Efetue <a href='user-login.php'>login</a> para entrar");
            } else {
                if(!isset($_POST['usuario'])) {
                    include "user-edit-form.php";
                } else {
                    echo msg_sucesso("Sucesso");
                }
            }
        ?>

    </div>
	<?php require_once "rodape.php"; ?>
</body>
</html>