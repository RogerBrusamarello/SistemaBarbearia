<?php session_start();
if (isset($_SESSION['logado'])) :
	?>

	<!doctype html>
	<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Lista de Estabelecimentos</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


		<!-- Bootstrap core CSS -->
		<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	</head>

	<body>
		<nav class="navebar navbar navbar-expand-lg navbar-dark bg-dark">
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
						<a class="nav-link" href="#">Estabelecimentos<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../../Include/SairLogin.php">Sair</a>
					</li>
			</div>
		</nav>

		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

				<div style="margin-right:50%">
						<h1>
							<?php
							if (isset($_SESSION['Estabelecimento'])) {
								include_once '../../Model/EstabelecimentoModel.php';
								$Estabelecimento = array();
								$Estabelecimento = unserialize($_SESSION['Estabelecimento']);

								foreach ($Estabelecimento as $e) {
									echo '<br>';
									echo '<tr>';
									echo "<a href='../Atendimento/AtendimentoView.php?codigo=$e->id'>$e->razaoSocial</a><br>";
									echo '</tr>';
								}

								unset($_SESSION['Estabelecimento']);
							}
							?>
						</h1>
					</div>
				</div>
			</div>
			<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script>
				window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
			</script>
			<script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
			<script src="dashboard.js"></script>
	</body>

	</html>
<?php else : ?>
	<?php header('location: ../index.php'); ?>
<?php endif; ?>