<?php
include PHP . "navbar.php";
?>

<table class="table-striped" width="80%" align='center'>
	<?php
		foreach ($this->publications as $publi) {
		?>
			<tr>
				<td><a href="<?php echo BASE_URL.'user/'.$publi->strPublisher; ?>">Creador</a></td>
				<td ><?php echo $publi->strDate; ?></td>
			</tr>
			<tr>
				<td collspan='2' align='center'><?php echo $publi->strMessage; ?></td>
			</tr>

		<?php
		}	
		?>
</table>


<?php include PHP . "footer.php";?>