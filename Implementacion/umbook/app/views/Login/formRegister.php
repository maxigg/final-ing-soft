<h2>Register UMBook</h2>

<?php
if(isset($this->registerStrMessage))
    echo '<h3 style="color:red;">'.$this->registerStrMessage.'</h3>';
?>

<form name="formUser" id="formUser" method="post" enctype="multipart/form-data"
        action="<?php echo BASE_URL;?>login/register" class="form-signin form">
    <label for="nombre">nombre</label>
    <input type="text" name="name" id="name" value="<?php if(isset($this->objUser->strName)) echo $this->objUser->strName;?>" class="input-xlarge"/><br />
    <?php if(array_key_exists('name',$this->arrayErrors)) echo $this->arrayErrors['name'];?>
    <label for="apellido">apellido</label>
    <input type="text" name="lastname" id="lastname" value="<?php if(isset($this->objUser->strLastName)) echo $this->objUser->strLastName;?>" class="input-xlarge"/><br />
    <?php if(array_key_exists('lastname',$this->arrayErrors)) echo $this->arrayErrors['lastname'];?>
    <label for="email">Email: </label>
    <input type="text" name="email" id="email" value="<?php if(isset($this->objUser->strEmail)) echo $this->objUser->strEmail;?>" class="input-xlarge"/><br />
    <?php if(array_key_exists('email',$this->arrayErrors)) echo $this->arrayErrors['email'];?>
    <label for="user">Usuario: </label>
    <input type="text" name="userR" id="userR" value="<?php if(isset($this->objUser->strUser)) echo $this->objUser->strUser;?>" class="input-xlarge"/><br />
    <?php if(array_key_exists('userR',$this->arrayErrors)) echo $this->arrayErrors['userR'];?>
    <label for="password">Contraseña: </label>
    <input type="password" name="passwordR" id="passwordR" value="<?php if(isset($this->objUser->strPassword)) echo $this->objUser->strPassword;?>" class="input-xlarge"/><br />
    <?php if(array_key_exists('passwordR',$this->arrayErrors)) echo $this->arrayErrors['passwordR'];?>
    <label for="date">Fecha de nacimiento: </label>
    <input type="date" name="birthday" id="birthday" value="<?php if(isset($this->objUser->strBirthday)) echo $this->objUser->strBirthday;?>" class="input-xlarge"/><br />
    <?php if(array_key_exists('birthday',$this->arrayErrors)) echo $this->arrayErrors['birthday']."<br />";?>
    <input type="submit" name="button" id="button2" value="Guardar" class="button"/>
</form>