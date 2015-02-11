<?php include PHP . "navbar.php";?>
<div class="hero-unit">
	<h2>
		<?php echo $this->strTitle;?>
	</h2>
	<h3 style="color:red;">Recibidas<br></h3>
	<?php 
		if(isset($this->receivedRequests) && count($this->receivedRequests)>0){ 
	?>
	<div>
		<table class="table-striped" width="100%">
			<tr>
				<th>Foto</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Usuario</th>
				<th>Solicitud</th>
			</tr>
	<?php
		foreach ($this->receivedRequests as $friendRequest) {
		?>
			<tr>
				<td><img src='<?php echo $friendRequest->getStrPathPhoto() ?>' alt="foto" class="img-rounded-ET"></td>
				<td><?php echo $friendRequest->getStrName();?></td>
				<td><?php echo $friendRequest->getStrLastName();?></td>
				<td><?php echo $friendRequest->getStrUser();?></td>
				<td>
					<a href="<?php echo BASE_URL.'friend/AcceptRequest/'.$friendRequest->getIntId();?>" 
						class="btn btn-success"><i class="icon-ok-sign"></i></a>
					<a href="<?php echo BASE_URL.'friend/CancelRequest/'.$friendRequest->getIntId();?>" 
						class="btn btn-danger"><i class="icon-remove-sign"></i></a>
				</td>
			</tr>
		<?php
		}
	?>
		</table>
	</div>
	<?php 
		}else{
	?>
	<p>No tiene solicitudes de amistad</p>
	<?php 
		} 
	?>
<!--******************************************************************************************************-->
	<hr />
	<h3 style="color:red;">Enviadas<br></h3> 
	<?php 
		if(isset($this->sentRequests) && count($this->sentRequests)>0){ 
	?>
	<div>
		<table class="table-striped" width="100%">
			<tr>
				<th>Foto</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Usuario</th>
				<th>Solicitud</th>
			</tr>
	<?php
		foreach ($this->sentRequests as $friendRequest) {
		?>
			<tr>
				<td><img src='<?php echo $friendRequest->getStrPathPhoto() ?>' alt="foto" class="img-rounded-ET"></td>
				<td><?php echo $friendRequest->getStrName();?></td>
				<td><?php echo $friendRequest->getStrLastName();?></td>
				<td><?php echo $friendRequest->getStrUser();?></td>
				<td>
					<a href="<?php echo BASE_URL.'friend/CancelSentRequest/'.$friendRequest->getIntId();?>" 
						class="btn btn-danger"><i class="icon-remove-sign"></i></a>
				</td>
			</tr>
		<?php
		}
	?>
		</table>
	</div>
	<?php 
		}else{
	?>
	<p>No tiene solicitudes de amistad</p>
	<?php 
		} 
	?>
</div>
<?php
	include PHP . "footer.php";
?>