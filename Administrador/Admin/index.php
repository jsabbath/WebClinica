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
      		<a href="/Clinica/Administrador/Admin/add.php" class="Agregar">Agregar Administrador</a>
			<table class="table table-bordered table-striped table-hover">
			    <thead>
			      <tr>
			        <th>Rut</th>
			        <th>Nombre</th>
			        <th>Apellido</th>
			        <th>Password</th>
			        <th>Estado</th>
			        <th>Acciones</th>
			      </tr>
			    </thead>
			    <tbody>
			      	<?php include("../../Conexion.php"); 
			      	$con=Conectar();

			      	if($con){ 
			          $consulta = "SELECT * FROM administrador WHERE adm_tipo='Administrador' ORDER BY adm_rut";
			          $res = pg_query($consulta);

			          if(pg_num_rows($res)>0)
			          {
			          	while($row = pg_fetch_array($res)){ ?>
			          	<tr>
			          	  <td><?php echo $row["adm_rut"] ?></td>
			              <td><?php echo $row["adm_nombre"] ?></td>
			              <td><?php echo $row["adm_apellido"] ?></td>
			              <td><?php echo $row["adm_password"] ?></td>
			              <td><?php 
			              	if($row["adm_estado"]=="t")
			              		echo "Hablilitado";
			              	else 
			              		echo "Deshablilitado"; ?>
			              </td>
			              <td>
			                <a class="accion" href="/Clinica/Administrador/Admin/edit.php?Rut=<?php echo $row["adm_rut"] ?>">
			                	<i class='icon-pencil'></i>
			                </a>
			                <a class="accion" href="/Clinica/Administrador/Admin/enable.php?Rut=<?php echo $row["adm_rut"] ?>">
			                	<i class='icon-ok'></i>
			                </a>
			                <a href="/Clinica/Administrador/Admin/delete.php?Rut=<?php echo $row["adm_rut"] ?>">
			                	<i class='icon-remove'></i>
			                </a>
			              </td>
			          	</tr>
			      <?php }
			          }
			          else{ ?>
			          	<tr>
			          		<td colspan='6'>No hay Datos en la Tabla</td>
			          	</tr>
			    <?php }
			    	  Desconectar($con);
			      	}
			        else{ ?>
			        	<tr>
			           		<td colspan='6'>No se pudo establecer Conexión con la BD.</td>
			           	</tr>
			  <?php } ?>
			      </tr>
			    </tbody>
			</table>
		</div>
      <?php include("../../Footer.php"); ?>
  	</div>
</body>