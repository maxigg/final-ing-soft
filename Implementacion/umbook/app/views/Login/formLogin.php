<h2>Login UMBook</h2>

<?php 
//print_r($this);
if(isset($this->loginStrMessage))
    echo '<h3 style="color:red;">'.$this->loginStrMessage.'</h3>';
?>

<form id="formLogin" name="formLogin" method="post"	action="<?php echo BASE_URL;?>login/validateUser" class="form-signin form">
	<input type="text" name="userL" id="userL" class="input-block-level" placeholder="User" />
	<?php if(array_key_exists('userL',$this->arrayErrors)) echo $this->arrayErrors['userL'];?>
	<input type="password" name="passwordL" id="passwordL" class="input-block-level" placeholder="Password" /><br />
	<?php if(array_key_exists('passwordL',$this->arrayErrors)) echo $this->arrayErrors['passwordL']."<br />";?>
	<input type="submit" name="button" id="button" value="Acceder" class="button" />
</form><br /><br />
