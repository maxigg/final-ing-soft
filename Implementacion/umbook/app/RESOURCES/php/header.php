<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php if(isset($this->strTitle)) echo $this->strTitle; ?></title>
<link id="gfont" href='<?php echo PUBLIC_RESOURCES . 'css'. DS . 'googleFonts.css'; ?>'
	rel='stylesheet' type='text/css'>
<link id="bootstrap" href='<?php echo PUBLIC_RESOURCES . 'css'. DS . 'bootstrap.css'; ?>'
	rel='stylesheet' type='text/css'>
<link id="bootstrapr"
	href='<?php echo PUBLIC_RESOURCES . 'css'. DS . 'bootstrap-responsive.css'; ?>'
	rel='stylesheet' type='text/css'>
<link id="style"
	href='<?php echo CSS . 'style.css'; ?>'
	rel='stylesheet' type='text/css'>
<!--[if lt IE 7]>
		<link href="stylesheets/screen-ie6.css" type="text/css" rel="stylesheet" media="screen,projection" />
		<![endif]-->
<script type="text/javascript" src="<?php echo PUBLIC_RESOURCES . 'js'. DS . 'jquery1.10.2.min.js';?>"></script>
<script type="text/javascript" src="<?php echo PUBLIC_RESOURCES . 'js'. DS . 'bootstrap.min.js';?>"></script>
</head>
<body>
	<div class="container-fluid">

