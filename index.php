<?php

define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(dirname(__FILE__)).DS.'STI-ARS');

require_once(ROOT.DS.'library'.DS.'init.php');

redirect($page, $dirPath, $view);

