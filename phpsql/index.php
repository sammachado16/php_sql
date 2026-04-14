<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Listagem de Jogos</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="estilo/estilo.css?v=<?php echo time(); ?>">
	
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
	?>
	<div id="corpo">
		<h1>Escolha seu jogo</h1>	
		<table class="listagem">
			<?php
				$busca = $banco->query("select * from jogos order by nome");
				if(!$busca) {
					echo "<tr><td>Infelizmente a busca deu errado";
				} else { 
					if ($busca->num_rows == 0) {
						echo "<tr><td>Nenhum registro encontrado";
					} else {
						while ($reg = $busca->fetch_object()) {
							$t = thumb($reg->capa);
							echo "<tr><td><img src=$t class='mini'/><td>$reg->nome";
							echo "<td>Adm";
						}
					}
				}
					
			?>
		</table>
	</div>
	<?php $banco->close();?>
</body>
</html>