<?php
	include PHP . "navbar.php";
	$Publications = array();
	
	if(isset($this->arrayObjPublications))
		$publications = $this->arrayObjPublications;
?>

<table class="table table-hover" width="80%" align='center'>
	<?php
		//$publication = new PublicationModel();
		foreach ($publications as $publication) {
	?>
			<tr>
				<td><a href="<?php echo BASE_URL.'user/'.$publication->getIntIdOwner(); ?>">Creador</a></td>
				<td><?php echo $publication->getStrMessage(); ?></td>
				<td><?php echo $publication->getStrDate(); ?></td>
			</tr>
			<tr>
				<td colspan="3">
					<table class="table table-stripped" align="right">	
					<?php
						$comments = $publication->getArrayObjComments();
						foreach ($comments as $comment) {
					?>
					<tr>
						<td><a href="<?php echo BASE_URL.'user/'.$comment->getObjUserOwner(); ?>">Creador</a></td>
						<td align="right"><?php echo $comment->getStrMessage(); ?></td>
						<td align="right"><?php echo $comment->getStrDate(); ?></td>
					</tr>
					<?php
						}
					?>
					</table>
				</td>
			</tr>
	<?php
		}
	?>
</table>

<?php include PHP . "footer.php";?>