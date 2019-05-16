<html>
<head>
	<script type="text/javascript" src="assets/js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="assets/js/jogador.js"></script>
	<link rel="stylesheet" type="text/css"  href="assets/css/style.css" />
</head>
<body>
<div id="header"></div>
<div id="content" align="center">
<a href="jogador.php?action=novo">NOVO JOGADOR</a>
<div> <input type="text" id="termo" value="" /> <button id="pesquisar">Pesquisar</button> </div>
<table align="center">
	<tr>
		<th>Nome</th>
		<th>Time</th>
		<th>Data Nascimento</th>
		<th>Altura</th>
		<th>EDITAR</th>
		<th>REMOVER</th>
	</tr>
	<?php foreach($jogadores as $item){ ?>
	<tr>
		<td><?php echo mb_substr($item['nome'], 0, 30);?></td>
		<td><?php echo $item['time'];?></td>
		<td><?php echo date('d/m/Y', strtotime($item['datanascimento']));?></td>
		<td><?php echo $item['altura'];?></td>
		<td align="center"><a href="jogador.php?action=editar" data-id="<?php echo $item['id'];?>" class="editar"><img src="assets/img/edit.png" title="editar" /> </a></td>
		<td align="center"><a href="jogador.php?action=remover" data-id="<?php echo $item['id'];?>" class="remover"><img src="assets/img/remove.png" title="remover" /> </a></td>
	</tr>
	<?php }?>	
</table>
</div>
</body>
</html>