<?php 
	include PHP . "navbar.php";
	$objUser = Session::getSessionVariable('objUser');
	if(isset($this->sentRequests)){
		//$objFriends = $this->objFriends;
		$friends = array();
		foreach ($this->objFriends as $item) {
			array_push($friends, $item->getIntId());
		}
	}
	if(isset($this->sentRequests)){
		//$sentRequests = $this->sentRequests;
		$sentRequests = array();
		foreach ($this->sentRequests as $item) {
			array_push($sentRequests, $item->getIntId());
		}
	}
	if(isset($this->receivedRequests)){
		//$receivedRequests = $this->receivedRequests;
		$receivedRequests = array();
		foreach ($this->receivedRequests as $item) {
			array_push($receivedRequests, $item->getIntId());
		}
		//print_r($receivedRequests);
	}
	//print_r($this);
?>

<div class="hero-unit">
	<h2>
		<?php if(isset($this->strTitle)) echo $this->strTitle; ?>
	</h2>
	<?php 
		if(isset($this->strMessage)) 
			echo '<h3 style="color:red;">'.$this->strMessage.' para "'.$this->search.'"</h3>'; 
	?>
	<div>
		<table class="table-striped" width="100%" align="center">
			<tr>
				<th>Foto</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Usuario</th>
				<th>Estado</th>
				<th>&nbsp;</th>
			</tr>
	<?php	
		foreach ($this->usersList as $user) {
	?>
			<tr>
				<td><img src=<?php echo '"'.$user->getStrPathPhoto().'"'; ?> alt="foto" class="img-rounded-ET"/></td>
				<td><?php echo $user->getStrName();?></td>
				<td><?php echo $user->getStrLastName();?></td>
				<td><?php echo $user->getStrUser();?></td>
				<td>
					<?php
						
						if(isset($friends) and count($friends)>0 and false !== array_search($user->getIntId(), $friends) )
							echo 'Amigo';
						elseif(isset($sentRequests) and count($sentRequests)>0 and false !== array_search($user->getIntId(), $sentRequests) )
							echo 'Solicitud Enviada';
						elseif(isset($receivedRequests) and count($receivedRequests)>0 and false !== array_search($user->getIntId(), $receivedRequests) )
							echo 'Aceptar';
						else
							echo 'Enviar';
						
					?>
				</td>
				
				<td>
					<?php
						if(isset($friends) and false !== array_search($user->getIntId(), $friends) )
							echo '<a href="'.BASE_URL.'friend/'.$user->getIntId().'" class="btn btn-primary"><i class="icon-user"></i></a>';
						elseif(isset($sentRequests) and  false !== array_search($user->getIntId(), $sentRequests) )
							echo '<a href="'.BASE_URL.'friend/CancelSentRequest/'.$user->getIntId().'" class="btn btn-danger"><i class="icon-minus-sign"></i></a>';
						elseif(isset($receivedRequests) and  false !== array_search($user->getIntId(), $receivedRequests) )
							echo '<a href="'.BASE_URL.'friend/AcceptRequest/'.$user->getIntId().'" class="btn btn-success"><i class="icon-ok-sign"></i></a>';
						else
							echo '<a href="'.BASE_URL.'friend/SendRequest/'.$user->getIntId().'" class="btn btn-success"><i class="icon-plus-sign"></i></a>';
					?>
				</td>
			</tr>
	<?php		
		}
	?>
		</table>
	</div>
</div>
<?php
	include PHP . "footer.php";
?>