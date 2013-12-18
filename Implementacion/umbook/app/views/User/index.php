<?php include PHP . "navbar.php";?>
<div class="hero-unit">
	<h2>
		<?php echo $this->strTitle;?>
	</h2>
	<?php if(isset($this->strMessage)) echo '<h3 style="color:red;">' . $this->strMessage  .'<br><br></h3>'; ?>
	<?php include VIEW_PATH . "User" . DS . "menu.php"; ?>
	<form name="formUser" id="formUser" method="post" action="<?php echo BASE_URL;?>user/updateUserData/" class="form-signin form">
		<label for="user">Usuario: </label>
		<input type="text" name="user" id="user" value="<?php echo $this->objUser->strUser;?>" class="input-xlarge"/><br>
		<label for="email">Email: </label>
		<input type="text" name="email" id="email" value="<?php echo $this->objUser->strEmail;?>" class="input-xlarge"/><br>
		<label for="notification">Notificaciones: </label>
		<select name="notification" id="notification">
			<option value="ALL">Todos</option>
            <option value="NOTIFY">Solo notificación</option>
            <option value="MAIL">Solo email</option>
            <option value="NONE">Ninguno</option>
        </select><br>
		<input type="submit" name="button"  value="Guardar"/>
	</form>
</div>    