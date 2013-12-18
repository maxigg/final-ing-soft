<div class="hero-unit">
	<h2>
		<?php echo $this->strTitle; ?>
	</h2>
	<form id="formLoginError" name="formLoginError" method="post" action="<?php echo BASE_URL;?>login/validateUser" class="form-signin form">
		<input type="text" name="user" id="user"
			value="<?php if(isset($this->objUser->strUser)) echo $this->objUser->strUser;?>" class="input-block-level"
			placeholder="User"/>
		<?php if(array_key_exists('user',$this->arrayErrors)) echo $this->arrayErrors['user'];?>
		<input type="password" name="password" id="password"
			value="<?php if(isset($this->objUser->strPassword)) echo $this->objUser->strPassword;?>"  class="input-block-level" 
			placeholder="Password"/>
		<?php if(array_key_exists('password',$this->arrayErrors)) echo $this->arrayErrors['password'];?>
		<input type="submit" name="button" id="button" value="Acceder" class="button2" />
	</form>
</div>
