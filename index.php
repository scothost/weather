<?php

//TO DO: use an autoloader
require 'lib/Bootstrap.php';
require 'lib/Controller.php';
require 'lib/View.php';
require 'lib/Model.php';

require 'config/paths.php';
require 'config/database.php';

$app = new Bootstrap();
