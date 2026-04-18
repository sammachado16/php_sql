<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Listagem de Jogos</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="estilo/estilo.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

	
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
		$ordem = $_GET['o'] ?? "n";
		$chave = $_GET['c'] ?? "";
	?>
	<div id="corpo">
		<?php include_once "topo.php"; ?>
		<h1>Escolha seu jogo</h1>
		<?php 
			echo msg_sucesso(" Arquivo aberto com sucesso!");
			echo msg_aviso(" Você esqueceu de colocar o nome!");
			echo msg_erro(" Falha no cadastro do jogo!");
		?>
		<form method="get" id="busca" action="index.php">
			Ordenar: 
				<a href="index.php?o=n&c=<?php echo $chave;?>">Nome</a> | 
				<a href="index.php?o=p&c=<?php echo $chave;?>">Produtora</a> | 
				<a href="index.php?o=na&c=<?php echo $chave;?>">Nota Alta</a> | 
				<a href="index.php?o=nb&c=<?php echo $chave;?>">Nota Baixa</a> | 
				<a href="index.php">Mostrar Todos</a> |
				Buscar: <input type="text" name="c" size="10" maxlenght="40"/>
			<input type="submit" value="Ok"/>
		</form>
		<table class="listagem">
			<?php
				$q = "select j.cod, j.nome, g.genero, j.capa, p.produtora from jogos j join generos g on j.genero = g.cod join produtoras p on j.produtora = p.cod ";
				
				if (!empty($chave)) {
					$q .= "WHERE j.nome LIKE '%$chave%' OR p.produtora LIKE '%$chave%' OR g.genero LIKE '%$chave%' "; 
				}
				
				switch ($ordem) {
					case "p":
						$q .= "ORDER BY p.produtora";
						break;
					case "na":
						$q .= "ORDER BY j.nota DESC";
						break;
					case "nb":
						$q .= "ORDER BY j.nota ASC";
						break;
					default:
						$q .= "ORDER BY j.nome";
						break;				
				}
				
				$busca = $banco->query($q);
				if(!$busca) {
					echo "<tr><td>Infelizmente a busca deu errado";
				} else { 
					if ($busca->num_rows == 0) {
						echo "<tr><td>Nenhum registro encontrado";
					} else {
						while ($reg = $busca->fetch_object()) {
							$t = thumb($reg->capa);
							echo "<tr><td><img src=$t class='mini'/>";
							echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
							echo " [$reg->genero]";
							echo "<br>$reg->produtora";
							echo "<td>Adm";
						}
					}
				}
					
			?>
		</table>
	</div>
	<?php include_once "rodape.php";?>
</body>
</html>