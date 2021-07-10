<?php
date_default_timezone_set('Asia/Manila');
set_time_limit(0);
$page  = getPage();
$view = getView();
$dirPath = getPath();

function redirect($page = NULL ,$dirPath = NULL,$view = NULL)
{
	if(file_exists(ROOT.DS.'views'.DS.$page))
	{
		if(file_exists(ROOT.DS.'views'.DS.$page.DS.$dirPath.DS.$view.'.php'))
		{
			$title = getTitle($page,$view);

			session_start();
			if($page == 'admin' || $page == 'user'){
				if(!isset($_SESSION['account_id'])){
					header('location: ?pg=access');
				}	
			} 
			
			viewHeader($title);
			require_once(ROOT.DS.'views'.DS.$page.DS.$dirPath.DS.$view.'.php');
			viewFooter();
			
		}else{
			get404Error();
		}
	}else{
		get404Error();
	}
}


function viewHeader($title)
{	
	require_once('views/mainheader.php');		
}

function viewFooter()
{
	require_once('views/mainfooter.php');
}

function getTitle($page,$view)
{
	if($page == 'access'){
		if($view == 'index'){
			$title = 'STI Computing Fest 2016 Registration System | Log in';
		}elseif($view == 'logout'){
			$title = 'Logging out&hellip;';
		}
	}elseif($page == 'admin'){
		if($view == 'index'){
			$title = 'Administrator | Dashboard';
		}
	}elseif($page == 'user'){
		if($view == 'index'){
			$title = 'User | Register Students';
		}
	}
	return $title;
}

function get404Error()
{
	require_once('views/error404.php');
}

function getPage()
{
	if(isset($_GET['pg']))
		$page = $_GET['pg'];
	else
		$page = 'access';
	
	return $page;
}

function getView()
{
	if(isset($_GET['vw']))
		$view = $_GET['vw'];
	else{
		$view = 'index';
	}
	return $view;
}

function getPath()
{
	if(getPage() == 'access'){
		if(isset($_GET['dir'])){
			$dir = $_GET['dir'];
			if($dir == sha1('login')){
				$path = 'login';		
			}elseif($dir == sha1('logout')){
				$path = 'logout';		
			}
		}else{
			$path = 'login';
		}
	}elseif(getPage() == 'admin' || getPage() == 'user'){
		if(isset($_GET['dir'])){
			$dir = $_GET['dir'];
			if($dir == sha1('dashboard')){
				$path = 'dashboard';
			}elseif($dir == sha1('registration')){
				$path = 'registration';
			}
		}else{
			$path = 'registration';
		}
	}else{
		$path = 'login';
	}
	
	return $path;
}
?>
