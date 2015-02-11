<?php
	include PHP . "navbar.php";
	$objUser = Session::getSessionVariable('objUser');
	$Friends = array();
	//print_r($this);die();
	
	if(isset($this->objFriends))
		$Friends = $this->objFriends;
?>
<div class="hero-unit">
	<h2>
	<?php if(isset($this->strTitle)) echo $this->strTitle;?>
	</h2>
	<?php if(isset($this->strMessage)) echo '<h3 style="color:red;">' . $this->strMessage  .'<br><br></h3>'; ?>
	<?php 
		if(isset($Friends) && count($Friends)>0){ 
	?>
	<div>
		<table class="table-striped" width="100%">
			<tr>
				<th>Foto</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Usuario</th>
				<th>&nbsp;</th>
			</tr>
	<?php
		$objFriend = new UserModel();
		foreach ($Friends as $objFriend) {
		?>
			<tr>
				<td><img src='<?php echo $objFriend->getStrPathPhoto() ?>' alt="foto" class="img-rounded-ET"></td>
				<td><?php echo $objFriend->getStrName();?></td>
				<td><?php echo $objFriend->getStrLastName();?></td>
				<td><?php echo $objFriend->getStrUser();?></td>
				<td>
					<a href='<?php echo BASE_URL.'friend/'.$objFriend->getIntId();?>' class="btn btn-primary"><i class="icon-user"></i></a>
					<a href='<?php echo BASE_URL.'friend/RemoveFriend/'.$objFriend->getIntId();?>' class="btn btn-danger"><i class="icon-remove-sign"></i></a>
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
	<p>No tiene Amigos</p>
	<?php 
		} 
	?>
</div>
<?php
	include PHP . "footer.php";
?>
