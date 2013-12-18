<div class="hero-unit">
	<h2>
		<?php echo $this->strTitle; ?>
	</h2>
	<?php if(isset($this->strMessage)) echo '<h3 style="color:red;">' . $this->strMessage  .'<br><br></h3>'; ?>
	<?php include VIEW_PATH  . "User" . DS . "menu.php"; ?>
	<form name="changePassword" id="changePassword" method="post" action="<?php echo BASE_URL;?>user/updatePassword/" class="form-signin form">
		<input type="password"  name="password" value="" class="input-xlarge" placeholder="Clave Actual"/><br/>
		<input type="password"  name="password1" id="password1" value ="" class="input-xlarge" placeholder="Clave Nuevo" /><br/>
	 	<input type="password"  name="password2" id="password2" value="" class="input-xlarge" placeholder="Clave de Confirmacion" /><br/>
	    <input type="submit" name="button"  value="Guardar" class="button2"/>
	</form>
</div>    