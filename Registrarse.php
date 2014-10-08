<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?PHP
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="/Clinica/img/logo.jpg">
<title>Clinica</title>

<?php include("Estilos.php"); ?>

<script type="text/javascript" src="/Clinica/js/jquery-1.7.2.js"></script>
<style type="text/css">
</style>
</head>
<body>
  <div id="wrapper">
      <?php include("MainNav.php"); ?>
      <div class="MainContent well">
        <form class="form-horizontal" name="myForm" onsubmit="return check()" method="post" action="InsertarCliente.php">
        <fieldset>
          <legend>Registro Cliente</legend>
          <div class="control-group" id="DivMensajeRut">
            <label class="control-label" for="inputRut">Rut: </label>
            <div class="controls">
              <input type="text" id="inputRut" name="Rut" maxlength="12" placeholder="Rut" required>
              <span class="help-inline" id="MensajeRut" style="display:none;font-weight:bold">
                El Rut debe contener los puntos y el guion. Ej: XX.XXX.XXX-X
              </span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputNombre">Nombre: </label>
            <div class="controls">
              <input type="text" id="inputNombre" name="Nombre" maxlength="15" placeholder="Nombre" required>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputApellido">Apellido: </label>
            <div class="controls">
              <input type="text" id="inputApellido" name="Apellido" maxlength="20" placeholder="Apellido" required>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputContraseña">Contraseña: </label>
            <div class="controls">
              <input type="password" id="inputContraseña" name="Contraseña" maxlength="20" placeholder="Contraseña" required>
            </div>
          </div>
          <div class="control-group" id="DivMensajePass">
            <label class="control-label" for="inputContraseña2">Repetir Contraseña: </label>
            <div class="controls">
              <input type="password" id="inputContraseña2" maxlength="20" placeholder="Repetir Contraseña" required>
              <span id="MensajePass" class="help-inline" style="display:none;font-weight:bold">
                Las Contraseñas no coinciden
              </span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputCorreo">Correo: </label>
            <div class="controls">
              <input type="email" id="inputCorreo" name="Correo" maxlength="30" placeholder="Correo" required>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputTelefono">Teléfono: </label>
            <div class="controls">
              <input type="number" id="inputTelefono" name="Telefono" maxlength="8" placeholder="Teléfono" required>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputFechaNac">Fecha de Nacimiento: </label>
            <div class="controls">
              <input type="date" id="inputFechaNac" name="FechaNac" max="<?php echo date("Y-m-d") ?>" value="<?php echo date("Y-m-d") ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputDireccion">Direccion: </label>
            <div class="controls">
              <input type="text" id="inputDireccion" name="Direccion" maxlength="50" placeholder="Dirección">
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-inverse">Registrarse</button>
            <button type="reset" class="btn btn-danger" onclick="window.location='/Clinica/index.php'">Cancelar</button>
          </div>
        </fieldset>
      </form>
      </div>
      <?php include("Footer.php"); ?>
  </div>
</body>
<script language="javascript">
<!--
function check()
{
  $("#MensajeRut").css({"display":"none"});
  $("#DivMensajeRut").removeClass("error");
  $("#MensajePass").css({"display":"none"});
  $("#DivMensajePass").removeClass("error");
  
  if($("#inputContraseña").val() == $("#inputContraseña2").val()){
    if($("#inputRut").val().length > 10)
      return true;
    else{
      $("#MensajeRut").css({"display":"inline"});
      $("#DivMensajeRut").addClass("error");

      return false;
    }
  }
  else{
    $("#MensajePass").css({"display":"inline"});
    $("#DivMensajePass").addClass("error");

    return false;
  }
}
//-->
</script>