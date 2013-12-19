<?php include PHP . "navbar.php";?>
<div class="hero-unit">
	<h2>
		<?php echo $this->strTitle;?>
	</h2>
	<?php 
		if(isset($this->strMessage)) echo '<h3 style="color:red;">' . $this->strMessage  .'<br><br></h3>'; 
		if(isset($this->friendRequestList) && count($this->friendRequestList)>0){ 
	?>
	<div>
		<table class="table-striped" width="80%">
			<tr>
				<th>Foto</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Usuario</th>
				<th>Solicitud</th>
			</tr>
	<?php
		foreach ($this->friendRequestList as $friendRequest) {
		?>
			<tr>
				<td><img src="<?php ?>" alt="foto"></td>
				<td><?php echo $friendRequest->objUserOwner->strName;?></td>
				<td><?php echo $friendRequest->objUserOwner->strLastName;?></td>
				<td><?php echo $friendRequest->objUserOwner->strUser;?></td>
				<td>
					<a href="<?php echo BASE_URL.'friend/AcceptRequest/'.$friendRequest->intId.'/';?>" 
						class="btn btn-info"><i class="icon-ok-sign"></i></a>
					<a href="<?php echo BASE_URL.'friend/CancelRequest/'.$friendRequest->intId.'/';?>" 
						class="btn btn-info"><i class="icon-remove-sign"></i></a>
				</td>
			</tr>
		<?php
		}
	?>
		</table>
	</div>
	<?php }else{ ?>
		<p>No tiene solicitudes de amistad</p>
	<?php } ?>
</div>    