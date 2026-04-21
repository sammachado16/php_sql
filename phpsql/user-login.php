<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="estilo/estilo.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_back" />
    <title>Login de Usuário</title>
    <style>
        div#corpo {
            margin-top: 50px;
            width: 400px;
        }

        td {
            padding: 5px;
        }
    </style>
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/login.php";
		require_once "includes/funcoes.php";
	?>
	<div id="corpo">
        <?php 
            $u = $_POST['usuario'] ?? null;
            $s = $_POST['senha'] ?? null;

            if (is_null($u) || is_null($s)) {
                require "user-login-form.php"; //Se os dados estiverem vazios, vai chamar o formulário para serem inseridos
            } else {
                echo 'Dados foram passados...';
            }
        ?>
    </div>
</body>
</html>