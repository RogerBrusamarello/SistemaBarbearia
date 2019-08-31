<?php session_start();
if (isset($_SESSION['logado'])) :
	?>
	<?php
	include_once("../../DAO/Persistence/connectionDB2.php");
	$codigo = $_GET['codigo'];
	$_SESSION['idEstabelecimento'] = $codigo;
	$result_events = "SELECT id, title, color, start, end FROM atendimento WHERE idEstabelecimento = $codigo;";
	$resultado_events = mysqli_query($conn, $result_events);
	$result_config = "SELECT diaSemana, horaManhaInicio, horaManhaFim, horaTardeInicio, horaTardeFim FROM configuracao WHERE idEstabelecimento = $codigo;";
	$resultado_config = mysqli_query($conn, $result_config);
	?>

	<!DOCTYPE html>
	<html lang="pt-br">

	<head>
		<meta charset='utf-8' />
		<title>Atendimento</title>
		<link rel="stylesheet" href="../Site/css/estiloCalendario.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


		<!-- Bootstrap core CSS -->
		<link href='../Site/FullCalendar/css/bootstrap.min.css' rel='stylesheet'>
		<link href='../Site/FullCalendar/css/fullcalendar.min.css' rel='stylesheet' />
		<link href='../Site/FullCalendar/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<link href='../Site/FullCalendar/css/personalizado.css' rel='stylesheet' />
		<script src='../Site/FullCalendar/js/jquery.min.js'></script>
		<script src='../Site/FullCalendar/js/bootstrap.min.js'></script>
		<script src='../Site/FullCalendar/js/moment.min.js'></script>
		<script src='../Site/FullCalendar/js/fullcalendar.min.js'></script>
		<script src='../Site/FullCalendar/locale/pt-br.js'></script>



		<script>
			$(document).ready(function() {
				$('#calendar').fullCalendar({
					windowResize: function(view) {},
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					defaultDate: Date(),
					defaultView: 'agendaWeek',
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					eventClick: function(event) {
						$('#visualizar #id1').text(event.id);
						$('#visualizar #title1').text(event.title);
						$('#visualizar #start1').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #end1').text(event.end.format('DD/MM/YYYY HH:mm:ss'));
						$('#link').attr('href', '../../Controller/AtendimentoController.php?operation=excluir&id=' + event.id);
						$('#visualizar').modal('show');
						return false;

					},
					select: function(start, end) {
						$('#cadastrar #start').val(moment(start).format('DD/MM/YYYY HH:mm:ss'));
						$('#cadastrar #end').val(moment(end).format('DD/MM/YYYY HH:mm:ss'));
						$('#cadastrar').modal('show');
					},
					selectable: true,
					selectHelper: true,

					events: [
						<?php
						while ($row_events = mysqli_fetch_array($resultado_events)) {
							?> {
								id: '<?php echo $row_events['id']; ?>',
								title: '<?php echo $row_events['title']; ?>',
								start: '<?php echo $row_events['start']; ?>',
								end: '<?php echo $row_events['end']; ?>',
								color: '<?php echo $row_events['color']; ?>',
							},
						<?php
					}
					?>
					],
				});
			});
		</script>



		<!-- AQUI CALCULA OS VALORES DO CORTE -->
		<script>
			<?php
			header('Content-type: text/html; charset=UTF-8');
			include_once '../../DAO/ServicosDAO.php';
			include_once '../../Model/ServicosModel.php';
			$servicosDAO = new ServicosDAO();
			$servicos = $servicosDAO->searchServicos();
			echo "var servicos = " . json_encode($servicos) . ";";

			?>
			var valorTotal = 0;

			function calcularValorTotal() {

				// Pegando o indice do <select> do servicos
				let indice1 = document.getElementById("servicos1").selectedIndex;
				let indice2 = document.getElementById("servicos2").selectedIndex;

				// Zera o valor total
				valorTotal = 0;

				// Verifica se o indice não é o "Selecione um serviço..."
				if (indice1 > 0) {
					// Somando o valorTotal + o valor do serviço selecionado
					valorTotal += parseInt(servicos[indice1 - 1].valor);
				}

				// Verifica se o indice não é o "Selecione um serviço..."
				if (indice2 > 0) {
					// Somando o valorTotal + o valor do serviço selecionado
					valorTotal += parseInt(servicos[indice2 - 1].valor);
				}

				// Setando o valor do serviço no HTML
				document.getElementById("txtValorTotal").value = valorTotal;
			}

			function validarCadastro() {
				let dateStart = convertStringToDate(document.getElementById("start").value);
				let dateEnd = convertStringToDate(document.getElementById("end").value);
				let freeMinutes = getDifferenceBetween(dateStart, dateEnd);

				// Pegando o indice do <select> do servicos
				let indice1 = document.getElementById("servicos1").selectedIndex;
				let indice2 = document.getElementById("servicos2").selectedIndex;

				// Zera os minutos total
				let minutosTotal = 0;

				// Verifica se o indice não é o "Selecione um serviço..."
				if (indice1 > 0) {
					// Somando o minutosTotal + a duracao do serviço selecionado
					minutosTotal += parseInt(servicos[indice1 - 1].duracao);
				}

				// Verifica se o indice não é o "Selecione um serviço..."
				if (indice2 > 0) {
					// Somando o minutosTotal + a duracao do serviço selecionado
					minutosTotal += parseInt(servicos[indice2 - 1].duracao);
				}
				if (minutosTotal > freeMinutes) {
					$("#div_error").removeClass("d-none");
					$("#div_error").html("<b>ERRO: </b>O seu serviço demora " + minutosTotal + ",\nporem o barbeiro só tem " + freeMinutes + " livres!")
					return false;
				}
				return true;
			}

			function convertStringToDate(string) {
				let array = string.split(" ");
				let day = array[0].split("/")[0];
				let month = array[0].split("/")[1];
				let year = array[0].split("/")[2];
				let time = array[1];
				let date = new Date(year + "-" + month + "-" + day + " " + time);
				return date;
			}

			function getDifferenceBetween(dateStart, dateEnd) {
				let minutes = 0;
				let hours = 0;
				if (dateStart.getMinutes() == dateEnd.getMinutes()) {
					hours = dateEnd.getHours() - dateStart.getHours();
				} else if (dateStart.getMinutes() > dateEnd.getMinutes()) {
					minutes = dateStart.getMinutes() - dateEnd.getMinutes();
					hours = dateEnd.getHours() - dateStart.getHours() - 1;
				} else {
					hours = dateEnd.getHours() - dateStart.getHours();
					minutes = dateEnd.getMinutes() - dateStart.getMinutes();
				}
				return (hours * 60) + minutes;
			}
		</script>



	</head>

	<body>
		<nav class="navebar navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="position: fixed">
			<a class="navbar-brand" href="../Site/telas/dashboard.php">Barbearia</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="../Site/telas/dashboard.php">Página Inicial<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="../../Controller/EstabelecimentoController.php?operation=consultar">Estabelecimentos<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../../Include/SairLogin.php">Sair</a>
					</li>
			</div>
		</nav>

		<div class="container">
			<div class="page-header">
				<h1 style="color: white">Atendimento</h1>
			</div>
			<?php
			if (isset($_SESSION['msg'])) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
			<div id='calendar' style="background-color:rgba(205,205,205,0.9)"></div>
		</div>

		<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title text-center">Dados do Evento</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<dl>
							<dt>ID do Evento</dt>
							<dd id="id1"></dd>
							<dt>Titulo do Evento</dt>
							<dd id="title1"></dd>
							<dt>Inicio do Evento</dt>
							<dd id="start1"></dd>
							<dt>Fim do Evento</dt>
							<dd id="end1"></dd>

						</dl>
						<a class="btn btn-danger" id="link" name="link" href='../../Controller/AtendimentoController.php?operation=excluir&id=id1'>Delete</a>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title text-center">Cadastrar Evento</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="POST" action="proc_cad_evento.php" onsubmit="return validarCadastro();">
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<label>Hora Inicial</label>
									<input readonly="readonly" type="text" class="form-control" name="start" id="start">
									<label>Hora Final</label>
									<input readonly="readonly" type="text" class="form-control" name="end" id="end"><br>
									<select id="servicos1" name="servicos1" class="form-control" onchange="calcularValorTotal()">
										<option value="">Selecione um Serviço...</option>
										<?php
										foreach ($servicos as $s) {
											echo "<option value='$s->id'>$s->nome</option>";
										}
										?>
									</select>
									<br>
									<select id="servicos2" name="servicos2" class="form-control" onchange="calcularValorTotal()">
										<option value="">Selecione um Serviço...</option>
										<?php
										foreach ($servicos as $s) {
											echo "<option value='$s->id'>$s->nome</option>";
										}
										?>
									</select>
									<br>
									<input readonly="readonly" type="text" class="form-control" name="txtValorTotal" id="txtValorTotal" placeholder="Valor Total" />
									<br>
									<button type="submit" class="btn btn-success">Cadastrar</button>
									<div class='alert alert-danger d-none' id="div_error" role='alert'>Erro ao cadastrar o evento
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>

	</html>
<?php else : ?>
	<?php header('location: ../index.php'); ?>
<?php endif; ?>