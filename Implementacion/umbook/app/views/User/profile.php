<?php
	include PHP . "navbar.php";
	$objUser = Session::getSessionVariable('objUser');
	$user = $objUser->getStrUser();
	$email = $objUser->getStrEmail();
	$notifications = $objUser->getStrNotifications();
	$photo = $objUser->getStrPathPhoto();
?>

<div class="hero-unit">
	<h2>
		<?php if(isset($this->strTitle)) echo $this->strTitle;?>
	</h2>
	<?php if(isset($this->strMessage)) echo '<h3 style="color:red;">' . $this->strMessage  .'</h3><br /><br />'; ?>
	<?php include VIEW_PATH . "User" . DS . "menu.php"; ?>
	<form name="formUser" id="formUser" method="post" action="<?php echo BASE_URL;?>user/updateProfile/" 
			class="form-signin form" enctype="multipart/form-data">
		<label for="user">Usuario: </label>
		<input type="text" name="user" id="user" value="<?php echo $user;?>" class="input-xlarge"/><br>
		<label for="email">Email: </label>
		<input type="text" name="email" id="email" value="<?php echo $email?>" class="input-xlarge"/><br>
		<label for="notifications">Notificaciones: </label>
		<select name="notifications" id="notification">
			<option value="ALL" <?php if($notifications == 'ALL') echo 'selected';?> >Todos</option>
            <option value="NOTIFY" <?php if($notifications == 'NOTIFY') echo 'selected';?> >Solo notificación</option>
            <option value="MAIL" <?php if($notifications == 'MAIL') echo 'selected';?> >Solo email</option>
            <option value="NONE" <?php if($notifications == 'NONE') echo 'selected';?> >Ninguno</option>
        </select><br>
        <label for="photo">Photo: </label>
		<img src="<?php echo $photo; ?>" id="photo" name="photo"></img>
		<label for="newphoto">Desea subir una Foto: </label>
		<input type="file" name="newphoto" id="newphoto" class="input-xlarge" /><br>
		<input type="submit" name="button"  value="Guardar Cambios"/>
	</form>
</div>
<?php
	include PHP . "footer.php";
?>