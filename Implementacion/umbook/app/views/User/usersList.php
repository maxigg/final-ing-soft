<?php include PHP . "navbar.php";?>
<div class="hero-unit">
	<h2>
		<?php echo $this->strTitle;?>
	</h2>
	<?php 
		if(isset($this->strMessage)) echo '<h3 style="color:red;">' . $this->strMessage  .'<br><br></h3>'; 
		if(isset($this->usersList) && count($this->usersList)>0){ 
	?>
	<div>
		<table class="table-striped" width="80%">
			<tr>
				<th>Foto</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Usuario</th>
				<th></th>
			</tr>
	<?php
		foreach ($this->usersList as $user) {
		?>
			<tr>
				<td><img src="<?php ?>" alt="foto"></td>
				<td><?php echo $user->strName;?></td>
				<td><?php echo $user->strLastName;?></td>
				<td><?php echo $user->strUser;?></td>
				<td>
					<?php 
						foreach ($this->flagsId as $flagId) {
							if($flagId == 2){
					?>
							<p>Ya es mi amigo</p>
					<?php	
							}elseif ($flagId == 1) {
					?>
							<p>Se le ha enviado solicitud</p>
					<?php
							}else{
					?>
					<a href="<?php echo BASE_URL.'friend/SendRequest/'.$user->intId.'/';?>" 
						class="btn btn-info"><i class="icon-plus-sign"></i></a>
					<?php
						}
					?>	
				</td>
			</tr>
		<?php		
				}
		}
	?>
		</table>
	</div>
	<?php }else{ ?>
		<p>La busqueda no ha arrojado Resultados</p>
	<?php } ?>
</div>    