<?php $errores = $this->errores; ?>
<?php $User = $this->User; ?>
<br/>
<div class="hero-unit">
	<h2>
		<?php echo $this->Title; ?>
	</h2>
	<form id="formLoginError" name="formLoginError" method="post" action="<?php echo BASE_URL;?>login/validarUser" class="form-signin form">
		<input type="text" name="user" id="user"
			value="<?php if(isset($User->user)) echo $User->user;?>" class="input-block-level"
			placeholder="User"/>
		<?php if(array_key_exists('email',$errores)) echo $errores['user'];?>
		<input type="password" name="pass" id="pass"
			value="<?php if(isset($User->pass)) echo $User->pass;?>"  class="input-block-level" 
			placeholder="Password"/>
		<?php if(array_key_exists('pass',$errores)) echo $errores['pass'];?>
		<input type="submit" name="button" id="button" value="Acceder" class="button2" />
	</form>
</div>
