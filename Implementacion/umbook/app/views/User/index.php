<?php
	include PHP . "navbar.php";
	$objUser = Session::getSessionVariable('objUser');	
?>
<div class="hero-unit">
	<h2>
		<?php if(isset($this->strTitle)) echo $this->strTitle;?>
	</h2>
	<?php if(isset($this->strMessage)) echo '<h3 style="color:red;">' . $this->strMessage  .'</h3><br /><br />'; ?>
</div>
<?php
	include PHP . "footer.php";
?>