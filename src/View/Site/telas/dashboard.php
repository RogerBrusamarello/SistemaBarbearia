 <?php session_start();?>
 <?php
  //include_once ("../../../DAO/Persistence/ConnectionDB.php");
  include_once("../../../Model/ClienteModel.php");
  include_once("../../../DAO/ClienteDAO.php");
  $clienteDAO = new ClienteDAO();
  if ($clienteDAO->searchClienteAdmin($_SESSION['usuario']) != null) {
    require_once("dashboardAdmin.php");
  } else {
    require_once("dashboardCliente.php");
  }
  ?>
 <!doctype html>
 <html lang="pt-br">

 <head>
   <meta charset="utf-8">
   <title>Dashboard</title>

 </head>

 <body>

 </body>

 </html>