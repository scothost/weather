
<html>
<head>
	<title>&lt;&lt; OWS  &gt;&gt;</title>
	<link 	type="text/css" rel="stylesheet" 	href="<?php echo URL; ?>public/css/default.css" />
	<script type="text/javascript" 	src="<?php echo URL; ?>public/js/jQuery1.js" ></script>
	<script type="text/javascript" 	src="<?php echo URL; ?>public/js/custom.js"></script>
	<link rel="shortcut icon" href="<?php echo URL; ?>public/images/sunny-cloudy.png">
	<?php
	//engine to include a js file only for certain modules of the MVC
	//otherwise the custom js could get really big really fast
		if (isset($this->js))
		{
			foreach ($this->js as $js){
				echo '<script type="text/javascript" src="'. URL.'views/'.$js.'"></script>';
			}
		}
	?>
</head>
<body>

	<?php Session::init() ?>
<div id="header">
	Header
	<br/>
	<a href="<?php echo URL; ?>index">Index</a>
	<a href="<?php echo URL; ?>help">Help</a>
	<?php if (Session::get('loggedIn') == true ) :?>
		<a href="<?php echo URL; ?>dashboard/logout">Logout</a> (<?php echo Session::get('loggedIn'); ?>)
	<?php else: ?>
		<a href="<?php echo URL; ?>login">Login</a>
	<?php endif; ?>
	
</div>

<div id="content">
