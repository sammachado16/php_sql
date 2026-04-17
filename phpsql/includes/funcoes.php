<?php
	function thumb($arq) {
		$caminho = "fotos/$arq";
		if (is_null($arq) || !file_exists($caminho)) {
			return "fotos/indisponivel.png";
		} else {
			return $caminho;
		}
	}

	function voltar() {
		return "<a href='index.php'><span class='material-symbols-outlined'>arrow_back </span></a>";
	}
?>