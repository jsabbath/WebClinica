<?php
session_start();
if( !(isset($_SESSION['Rut'])) || $_SESSION['Tipo']!='Administrador' || $_SESSION['Estado']!='t')
	header("Location: /Clinica/index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="/Clinica/img/logo.jpg">
<title>Clinica</title>

<?php include("../../Estilos.php"); ?>

<script type="text/javascript" src="/Clinica/js/jquery-1.7.2.js"></script>
<style type="text/css">
</style>
</head>
<body>
  <div id="wrapper">
      <?php include("../../MainNav.php"); ?>
      <div class="MainContent well Mensaje">
      <?php
      	  $Rut=$_POST['Rut'];
      	  $Nombre=$_POST['Nombre'];
          $Apellido=$_POST['Apellido'];
          $Password= $_POST['Password'];
          $Estado=true;
          $Tipo= "Administrador";

          include("../../Conexion.php"); 

          $con=Conectar();

          if($con){ 
          	$consulta1="SELECT adm_rut FROM administrador WHERE adm_rut='$Rut'";
          	$consulta2="SELECT med_rut FROM medico WHERE med_rut='$Rut'";
          	$consulta3="SELECT cli_rut FROM cliente WHERE cli_rut='$Rut'";
          	
          	$res1=pg_query($consulta1);
          	$res2=pg_query($consulta2);
          	$res3=pg_query($consulta3);
          	$resF=null;
          	
          	if(pg_num_rows($res1)==0 && pg_num_rows($res2)==0 && pg_num_rows($res3)==0){
	        	$consultaF="INSERT INTO administrador 
	          		VALUES('$Rut','$Nombre','$Apellido','$Password','$Estado','$Tipo')";
	        	$resF=pg_query($consultaF);
	        }
	        if($resF){ ?>
	        	<div class="row">
				    <div class="span12">
				        <div class="alert alert-success">
				          <h4 class="alert-heading">Success</h4>
				          <p>Administrador Registrado Exitosamente.</p>
				        </div>
				    </div>
				</div>
	  <?php }else{ ?>
				<div class="row">
				    <div class="span12">
				        <div class="alert alert-error">
				          <h4 class="alert-heading">Error</h4>
				          <p>Error en el Ingreso, Verifique que el rut no se encuentre ya en la BD.</p>
				        </div>
				    </div>
				</div>
	  <?php }

          	Desconectar($con);
          } 
          else{ ?>
          	<div class="row">
				<div class="span12">
				    <div class="alert alert-error">
				        <h4 class="alert-heading">Error</h4>
				        <p>No se pudo Establecer la Conexión con la BD.</p>
				    </div>
				</div>
			</div>
    <?php } ?>
      	  <a class="btn btn-danger" href="/Clinica/Administrador/Admin/add.php">Atras</a>	
	  </div>
      <?php include("../../Footer.php"); ?>
  	</div>
</body>