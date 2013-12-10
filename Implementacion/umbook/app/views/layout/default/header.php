<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="ISO-8859-1"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php if(isset($this->titulo)) echo $this->titulo; ?></title>
<link id="gfont" href='<?php echo RUTA_RECURSO_EXTERNO . '/css/googleFonts.css'; ?>'
	rel='stylesheet' type='text/css'>
<link id="bootstrap" href='<?php echo RUTA_RECURSO_EXTERNO . '/css/bootstrap.css'; ?>'
	rel='stylesheet' type='text/css'>
<link id="bootstrapr"
	href='<?php echo RUTA_RECURSO_EXTERNO . '/css/bootstrap-responsive.css'; ?>'
	rel='stylesheet' type='text/css'>
<!--[if lt IE 7]>
		<link href="stylesheets/screen-ie6.css" type="text/css" rel="stylesheet" media="screen,projection" />
		<![endif]-->
<script type="text/javascript" src="<?php echo RUTA_RECURSO_EXTERNO . '/js/jquery1.8.2.min.js';?>"></script>
<script type="text/javascript" src="<?php echo RUTA_RECURSO_EXTERNO . '/js/bootstrap.min.js';?>"></script>
</head>
<body>