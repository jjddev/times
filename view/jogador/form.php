<html>
<head>
<script type="text/javascript" src="assets/js/jquery-3.1.0.js"></script>
<script type="text/javascript" src="assets/js/jogador.js"></script>
<link rel="stylesheet" type="text/css"  href="assets/css/style.css" />
</head>
<body>
<div id="header"></div>
<div id="content">
	<form action="index.php?action=salvar" id="form">
		<input type="hidden" id="id" value="<?php echo $jogador['id']?>" />
		<label for="nome">Nome:</label>
		<input type="text" id="nome" value="<?php echo $jogador['nome']; ?>" />
		
		<label for="endereco">Endereço</label>
		<input type="text" id="endereco" value="<?php echo $jogador['endereco']; ?>" />
		
		<label for="altura">Altura</label>
		<input type="text" id="altura" value="<?php echo $jogador['altura']; ?>" />
		
		
		<label for="datanascimento">Data Nascimento</label>
		<input type="text" id="datanascimento" value="<?php echo !empty($jogador['datanascimento']) ? date('d/m/Y', strtotime($jogador['datanascimento'])) : '' ; ?>" />
		
		
		<label for="time">Time</label>
		<select id="time">
			<?php 
				foreach($times as $item){
					$selected = $item['id'] == $jogador['time'] ? 'selected="selected"' : '';
					printf('<option value="%s"%s>%s</option>', $item['id'], $selected, $item['nome']);
				}	
			?>		
			
		</select>
		
		
		<input type="button" id="submit" value="Enviar" />
		<input type="button" id="voltar" value="Voltar" />
	</form>
</div>
</body>
</html>