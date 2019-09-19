  <body class="text-center" class="login">
    <form class="form-signin" method="post">
      <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Iniciar sesion</h1>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" id="inputEmail"  name="mail" value="" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" name="clave" value="" class="form-control" placeholder="Password" required>
      <!-- mensaje de error enviado por flashdata en el metodo iniciar_sesion_post del controlador usuarios -->
 		<?php if (false): ?>
 			<p style="color: red;"> <?php echo $error ?> </p>
 		<?php endif; ?>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesion</button>
      <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y"); ?> </p> 
    </form>
  </body>