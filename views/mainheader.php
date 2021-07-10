<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="icon" href="images/logo/ben-png.ico" type="image/x-icon" />
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="layout" content="main"/>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>

    <script src="js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />
	<link href="css/custom.css" type="text/css" media="screen, projection" rel="stylesheet" />
	<link href="css/all.css" rel="stylesheet" type="text/css" />
	<script src="public/js/processFunctions.js" type="text/javascript" ></script>
	<style>
	
		/*printing invoice*/
		
		@media print{
			body{
				margin:none;
			}
		}
		
		input.no-input{
			background-color: #f2dede;
		}

        #body-content{
			padding-top: 40px;
		}
		
		table.table-hover tr{
			cursor:pointer;
		}
		
		a{
			cursor:pointer;
		}
		
		input.required{
			background-color:bisque;
		}
		
		.mainform{
			background-color:whitesmoke;
		}
		
		.ui-autocomplete {
		  padding: 0;
		  list-style: none;
		  background-color: #fff;
		  width: 218px;
		  border: 1px solid #B0BECA;
		  max-height: 350px;
		  overflow-x: hidden;
		}
		.ui-autocomplete .ui-menu-item {
		  border-top: 1px solid #B0BECA;
		  display: block;
		  padding: 4px 6px;
		  color: #353D44;
		  cursor: pointer;
		}
		.ui-autocomplete .ui-menu-item:first-child {
		  border-top: none;
		}
		.ui-autocomplete .ui-menu-item.ui-state-focus {
		  background-color: #D5E5F4;
		  color: #161A1C;
		}
    </style>
</head>
<body background="<?php //if(getPage()=="access"){echo "images/logo/sti-wallpaper.JPG";}?>" >