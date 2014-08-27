
<html>
<head>
	<title><?=(isset($this->title)) ? $this->title : 'Weather'; ?></title>
	<link 	type="text/css" rel="stylesheet" 	href="<?php echo URL; ?>public/css/default.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
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
	<?php if (Session::get('loggedIn') == false ) :?>
	    <a class="headderButton" href="<?php echo URL; ?>index">Index</a> |
	    <a class="headderButton" href="<?php echo URL; ?>help">Help</a> |
	<?php endif; ?>
	<?php if (Session::get('loggedIn') == true ) :?>
		<a class="headderButton" href="<?php echo URL; ?>dashboard">Dashboard</a>
		<a class="headderButton" href="<?php echo URL; ?>note">Notes</a>
		
		<?php if (Session::get('role') == 'owner' ) :?>
		    <a class="headderButton" href="<?php echo URL; ?>user">Users</a>
		<?php endif; ?>
		
		<a class="headderButton" href="<?php echo URL; ?>dashboard/logout">Logout</a>
	<?php else: ?>
		<a class="headderButton" href="<?php echo URL; ?>login">Login</a>
	<?php endif; ?>
	
</div>

<div id="content">
