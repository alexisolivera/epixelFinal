<h2 class="tituloLogin"><?php echo $titulo; ?></h2>
<div class="login-container">
  <div class="login-item">
    <div></div>
    <?php echo validation_errors(); ?>
    </div>
  <div class="login-item">
    <?php echo form_open('index.php/login/processLoginInput'); ?>
      <p>Email</p>
      <input type="input" name="usu_email" value="francoazari@gmail.com"/><br />
      <p>Password</p>
      <input type="password" name="usu_password" value="1234"/><br />
      <input type="submit" name="submit" value="Login" class="normal-button"/>
    </form>
    <button onclick="location.href='<?php echo base_url();?>index.php/registro/index'">¿Aún no tienes cuenta? Haz click aquí para registrarte</button>
    <?php if(isset($loginError)) {echo "$loginError";} ?>
  </div>
</div>