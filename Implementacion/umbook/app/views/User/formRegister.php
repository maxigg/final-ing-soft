  <?php if(isset($this->strMessage)) echo '<h3 style="color:red;">' . $this->strMessage  .'<br><br></h3>'; ?>
  <form name="formUser" id="formUser" method="post" action="<?php echo BASE_URL;?>user/Register" class="form-signin form">
    <label for="nombre">nombre</label>
    <input type="text" name="name" id="name" value="<?php if(isset($this->objUser->strName)) echo $this->objUser->strName;?>" class="input-xlarge"/>
    <?php if(array_key_exists('name',$this->arrayErrors)) echo $this->arrayErrors['name'];?>
    <label for="apellido">apellido</label>
    <input type="text" name="lastname" id="lastname" value="<?php if(isset($this->objUser->strLastName)) echo $this->objUser->strLastName;?>" class="input-xlarge"/>
    <?php if(array_key_exists('lastname',$this->arrayErrors)) echo $this->arrayErrors['lastname'];?>
    <label for="email">Email: </label>
    <input type="text" name="email" id="email" value="<?php if(isset($this->objUser->strEmail)) echo $this->objUser->strEmail;?>" class="input-xlarge"/>
    <?php if(array_key_exists('email',$this->arrayErrors)) echo $this->arrayErrors['email'];?>
    <label for="user">Usuario: </label>
    <input type="text" name="user" id="user" value="<?php if(isset($this->objUser->strUser)) echo $this->objUser->strUser;?>" class="input-xlarge"/>
    <?php if(array_key_exists('user',$this->arrayErrors)) echo $this->arrayErrors['user'];?>
    <label for="password">Contraseña: </label>
    <input type="password" name="password" id="password" value="<?php if(isset($this->objUser->strPassword)) echo $this->objUser->strPassword;?>" class="input-xlarge"/>
    <?php if(array_key_exists('password',$this->arrayErrors)) echo $this->arrayErrors['password'];?>
    <label for="date">Fecha de nacimiento: </label>
    <input type="date" name="birthday" id="birthday" value="<?php if(isset($this->objUser->strBirthday)) echo $this->objUser->strBirthday;?>" class="input-xlarge"/>
    <?php if(array_key_exists('birthday',$this->arrayErrors)) echo $this->arrayErrors['birthday'];?>
    <br>
    <input type="submit" name="button"  value="Guardar" class="button"/>
  </form>