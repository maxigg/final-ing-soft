<?php $errores = $this->errores; ?>
<?php $usuario = $this->usuario; ?>
<br/>
<div class="hero-unit">
	<h2>
		<?php echo $this->titulo; ?>
	</h2>
	<form id="formLoginError" name="formLoginError" method="post" action="<?php echo BASE_URL;?>login/validarUsuario" class="form-signin form">
		<input type="text" name="user" id="user"
			value="<?php if(isset($usuario->user)) echo $usuario->user;?>" class="input-block-level"
			placeholder="Usuario"/>
		<?php if(array_key_exists('email',$errores)) echo $errores['user'];?>
		<input type="password" name="pass" id="pass"
			value="<?php if(isset($usuario->pass)) echo $usuario->pass;?>"  class="input-block-level" 
			placeholder="Password"/>
		<?php if(array_key_exists('pass',$errores)) echo $errores['pass'];?>
		<input type="submit" name="button" id="button" value="Acceder" class="button2" />
	</form>
</div>
