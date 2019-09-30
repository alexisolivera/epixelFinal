<h2 class="tituloRegistro"><?php echo $titulo; ?></h2>
<div class="registro-container">
  <div class="login-item">
    <div></div>
    <?php echo validation_errors(); ?>
    </div>
  <div class="registro-item">
    <?php echo form_open('index.php/registro/registrar_usuario'); ?>
      <p>Nombre</p>
      <input type="input" name="usu_nombre"/><br />
      <p>Apellido</p>
      <input type="input" name="usu_apellido"/><br />
      <p>Fecha de nacimiento</p>
      <input type="date" name="usu_fecha_nacimiento"/><br />
      <p>Email</p>
      <input type="input" name="usu_email" value="francoazari@gmail.com"/><br />
      <p>Password</p>
      <input type="password" name="usu_password" value="1234"/><br />
      <input type="submit" name="submit" value="Registrarse" class="normal-button"/>
    </form>
    <button onclick="location.href='<?php echo base_url();?>index.php/login'">¿Ya tienes cuenta? Haz click aquí para iniciar sesión</button>
    <?php if(isset($registroError)) {echo "$registroError";} ?>
  </div>
</div>