<h2 class="tituloLogin"><?php echo $titulo; ?></h2>
<div class="login-container">
  <div class="login-item">
    <div></div>
    <?php echo validation_errors(); ?>
    </div>
  <div class="login-item">
    <?php echo form_open('login/processLoginInput'); ?>
      <p>Email</p>
      <input type="input" name="usu_email"/><br />
      <p>Password</p>
      <input type="password" name="usu_password" /><br />
      <input type="submit" name="submit" value="Login" class="normal-button"/>
    </form>
    <?php if(isset($loginError)) {echo "$loginError";} ?>
  </div>
</div>