<?php include PHP . "navbar.php"; ?>
<div class="hero-unit">
	<h2>
		<?php if(isset($this->strTitle)) echo $this->strTitle; ?>
	</h2>

	<?php 
		if(isset($this->strMessage)) 
			echo '<h3 style="color:red;">'.$this->strMessage.' para "'.$this->search.'"</h3>'; 
	?>
</div>
<?php include PHP . "footer.php"; ?>