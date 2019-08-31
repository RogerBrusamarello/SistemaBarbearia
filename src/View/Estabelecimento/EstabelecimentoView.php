<?php session_start() ?>
<html>
<?php header('Content-type: text/html; charset=ISO-8859-1'); ?>

<head>
	<title>Cadastro de Estabelecimento</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
	<link rel="stylesheet" type="text/css" href="../Site/css/estilo.css" />
</head>

<body>
	<nav class="navebar navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Barbearia</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item ">
					<a class="nav-link" href="../Site/telas/dashboard.php">Página Inicial<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Cadastro Estabelecimento<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="../Servicos/ServicosView.php">Cadastro Serviço<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../../Include/SairLogin.php">Sair</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="modal-dialog text-center">
		<div class="col-sm-9 main-section">
			<div class="modal-content">
				<div class="col-12 form-input">
					<form action="../../Controller/EstabelecimentoController.php?operation=cadastrar" class="inputs" method="post" name="cadEstabelecimento" style="padding-top:10%">
						<input type="text" class="form-control" name="txtNomeFantasia" id="txtNomeFantasia" placeholder="Nome Fantasia" /><br>
						<input type="text" class="form-control" name="txtRazaoSocial" id="txtRazaoSocial" placeholder="Razão Social" /><br>
						<input type="text" class="form-control" name="txtCnpj" id="txtCnpj" placeholder="CNPJ" /><br>

						<select id="estados" class="form-control">
							<option>Selecione um estado...</option>
							<?php
							header('Content-type: text/html; charset=UTF-8');
							include_once '../../DAO/EstadoDAO.php';
							include_once '../../Model/EstadoModel.php';
							$estadoDAO = new EstadoDAO();
							$estados = $estadoDAO->searchEstados();
							foreach ($estados as $e) {
								echo "<option value='$e->id'>$e->nome</option>";
							}
							?>
						</select>
						<br>

						<select id="cidades" name="cidades" class="form-control">
							<option>Selecione uma cidade...</option>
						</select>
						<br>
						<h1 style="color: #FFF">Horas de Trabalho</h1>
						<div class="div_table" id="div_table_semana">
							<table class="tabela-horario">
								<tr>
									<th class="th-horario">Dia da Semana</th>
									<th class="th-horario">Inicio Manhã</th>
									<th class="th-horario">Fim Manhã</th>
									<th class="th-horario">Inicio Tarde</th>
									<th class="th-horario">Fim Tarde</th>
								</tr>
								<tr>
									<td class="tr-dia-semana">Domingo</td>
									<td class="td-horario"><input type="time" name="horaManhaInicio1" id="horaManhaInicio1"></td>
									<td class="td-horario"><input type="time" name="horaManhaFim1" id="horaManhaFim1"></td>
									<td class="td-horario"><input type="time" name="horaTardeInicio1" id="horaTardeInicio1"></td>
									<td class="td-horario"><input type="time" name="horaTardeFim1" id="horaTardeFim1"></td>
								</tr>
								<tr>
									<td class="tr-dia-semana">Segunda-feira</td>
									<td class="td-horario"><input type="time" name="horaManhaInicio2" id="horaManhaInicio2"></td>
									<td class="td-horario"><input type="time" name="horaManhaFim2" id="horaManhaFim2"></td>
									<td class="td-horario"><input type="time" name="horaTardeInicio2" id="horaTardeInicio2"></td>
									<td class="td-horario"><input type="time" name="horaTardeFim2" id="horaTardeFim2"></td>
								</tr>
								<tr>
									<td class="tr-dia-semana">Terça-feira</td>
									<td class="td-horario"><input type="time" name="horaManhaInicio3" id="horaManhaInicio3"></td>
									<td class="td-horario"><input type="time" name="horaManhaFim3" id="horaManhaFim3"></td>
									<td class="td-horario"><input type="time" name="horaTardeInicio3" id="horaTardeInicio3"></td>
									<td class="td-horario"><input type="time" name="horaTardeFim3" id="horaTardeFim3"></td>
								</tr>
								<tr>
									<td class="tr-dia-semana">Quarta-feira</td>
									<td class="td-horario"><input type="time" name="horaManhaInicio4" id="horaManhaInicio4"></td>
									<td class="td-horario"><input type="time" name="horaManhaFim4" id="horaManhaFim4"></td>
									<td class="td-horario"><input type="time" name="horaTardeInicio4" id="horaTardeInicio4"></td>
									<td class="td-horario"><input type="time" name="horaTardeFim4" id="horaTardeFim4"></td>
								</tr>
								<tr>
									<td class="tr-dia-semana">Quinta-feira</td>
									<td class="td-horario"><input type="time" name="horaManhaInicio5" id="horaManhaInicio5"></td>
									<td class="td-horario"><input type="time" name="horaManhaFim5" id="horaManhaFim5"></td>
									<td class="td-horario"><input type="time" name="horaTardeInicio5" id="horaTardeInicio5"></td>
									<td class="td-horario"><input type="time" name="horaTardeFim5" id="horaTardeFim5"></td>
								</tr>
								<tr>
									<td class="tr-dia-semana">Sexta-feira</td>
									<td class="td-horario"><input type="time" name="horaManhaInicio6" id="horaManhaInicio6"></td>
									<td class="td-horario"><input type="time" name="horaManhaFim6" id="horaManhaFim6"></td>
									<td class="td-horario"><input type="time" name="horaTardeInicio6" id="horaTardeInicio6"></td>
									<td class="td-horario"><input type="time" name="horaTardeFim6" id="horaTardeFim6"></td>
								</tr>
								<tr>
									<td class="tr-dia-semana">Sábado</td>
									<td class="td-horario"><input type="time" name="horaManhaInicio7" id="horaManhaInicio7"></td>
									<td class="td-horario"><input type="time" name="horaManhaFim7" id="horaManhaFim7"></td>
									<td class="td-horario"><input type="time" name="horaTardeInicio7" id="horaTardeInicio7"></td>
									<td class="td-horario"><input type="time" name="horaTardeFim7" id="horaTardeFim7"></td>
								</tr>
							</table>
								<button type="submit" class="btn btn-success">Cadastrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#estados').change(function() {
				$('#cidades').load('../Estabelecimento/getCidades.php?estado=' + $('#estados').val());
			});
		});
	</script>
</body>
<html>