<?php include PHP . "navbar.php";?>
<div class="hero-unit">
	<h2>
		<?php echo $this->strTitle;?>
	</h2>
	<?php if(isset($this->strMessage)) echo '<h3 style="color:red;">' . $this->strMessage  .'<br><br></h3>'; ?>
</div>    