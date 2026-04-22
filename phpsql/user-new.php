<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="estilo/estilo.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Título da Página</title>
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/login.php";
		require_once "includes/funcoes.php";
	?>
	<div id="corpo">
        <?php
            if(!is_admin()) {
                echo msg_erro('Área Restrita! Você não é um administrador!');
            } else {
                if (!isset($_POST['usuario'])) {
                    require "user-new-form.php";
                } else {
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;

                    if($senha1 === $senha2) {
                        if(empty($usuario) || empty($nome) || empty($senha1) || empty($senha2) || empty($tipo)) {
                            echo msg_erro(" Todos os dados são obrigatórios");
                        } else {
                            $senha = gerarHash($senha1);
                            $q = "INSERT INTO usuarios(usuario, nome, senha, tipo) VALUES('$usuario', '$nome', '$senha', '$tipo')";
                            if ($banco->query($q)) {
                                echo msg_sucesso(" Usuário $nome cadastrado com sucesso!");
                            } else {
                                echo msg_erro(" ERRO! Não foi possível cadastrar o usuário $usuario");
                            }
                        }
                    } else {
                        echo msg_erro(" Erro! Senhas não conferem"); 
                    }
                }
                
            }
            echo voltar();
        ?>
    </div>
</body>
</html>