<html>
<head>
<script type="text/javascript" src="assets/js/jquery-3.1.0.js"></script>
<script type="text/javascript" src="assets/js/time.js"></script>
<link rel="stylesheet" type="text/css"  href="assets/css/style.css" />
</head>
<body>
<div id="header"></div>
<div id="content">
	<form action="index.php?action=salvar" id="form">
		<input type="hidden" id="id" value="<?php echo $time['id']?>" />
		<label for="nome">Nome:</label>
		<input type="text" id="nome" value="<?php echo $time['nome']; ?>" />
		<label for="endereco">Endereço</label>
		<input type="text" id="endereco" value="<?php echo $time['endereco']; ?>" />
		<input type="button" id="submit" value="Enviar" />
		<input type="button" id="voltar" value="Voltar" />
	</form>
</div>
</body>
</html>