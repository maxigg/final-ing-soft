<?php include PHP . "navbar.php";?>
<div class="hero-unit">
	<h2>
		<?php echo $this->strTitle;?>
	</h2>
	<?php 
		if(isset($this->strMessage)) echo '<h3 style="color:red;">' . $this->strMessage  .'<br><br></h3>'; 
			include VIEW_PATH . "User" . DS . "menu.php";
		if(isset($this->usersList)){ 
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
					<a href="<?php echo BASE_URL.'friend/SendRequest/'.$user->intId.'/';?>" 
						class="btn btn-info"><i class="icon-plus-sign"></i></a>
				</td>
			</tr>
		<?php	
		}
	?>
		</table>
	</div>
	<?php } ?>
</div>    