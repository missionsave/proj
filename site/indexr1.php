<!DOCTYPE html>

<html>

<head>
<meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<link rel="shortcut icon" href="icon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
session_set_cookie_params(3600000,"/");
session_start(); 
header("Cache-Control: no-cache");
?>
<?php //dict
$lg=0;


$dlg = array("pt", "en");

$dini = array("Inicio", "Home");
$dupa = array("Unidade de produção alimentar", "Unit of food production");
$dvol = array("Trabalho", "Jobs");
$dest = array("Estratégia", "Strategy");
$contact = array("Contacto", "Contact");
$doar = array("Doar", "Donate");
$dev = array("Desenvolvimento", "Development");
$plan = array("Plano de negócio", "Business plan");


?>
<?php 
if(@$_GET["l"] ==""){
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	//echo $lang;
	if($lang=="pt"){
		$_GET["l"]=0; 	
	}else{		
		$_GET["l"]=1;	
	}
}
$lg=$_GET["l"];
 


if(@$_GET["pg"]=="") {
	$_GET["pg"]="descritiva_"; 	
}
?>
<script>
var sse = new EventSource("index.php");
sse.onmessage = function(event) {
document.write(event.data);
}
</script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {margin:0;font-family:Arial}

.topnav { 
  position:fixed;
  overflow: hidden;
  background-color: #333; 
  width: 100%;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
	align:right;
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}

 
html { 
    display: table;
    margin: auto;
}

body {
    display: table-cell;
    vertical-align: middle;
}
ht {
	position:fixed;
  top: 250px;
	margin:100px auto;
	font-family:Arial; 
    color:black;
    text-align:left;
    padding-top:100px;
	padding-left:16px;
	
}
htr { 
	position:fixed;
	margin:0px auto;
	font-family:Arial; 
    color:black;
    text-align:left;
    padding-top:100px;
	padding-left:16px;
	
}

</style>
</head>
<body>
<section id="htr">
<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Foundation Mission Save</a>
  <a href="#news">Unidade de batata doce</a>
  <a href="#contact">Doar (1400 salva 1)</a>
  
  <div class="dropdown">
    <button class="dropbtn">Dropdown 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div>  
  
  <div class="dropdown">
    <button class="dropbtn">Dropdown1 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Link 11</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> 
  
  <a href="#about">About</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
</section>
<section  id="ht">
<br>
<br>
<br>
 <?php 

$file= $_GET["pg"].$dlg[$lg].".xhtml";
//$file= "donate_pt.xhtml";
//$file= "descritiva_pt.xhtml";
$filestr = file_get_contents($file, true);

$filestr = str_replace('<?xml version="1.0" encoding="UTF-8"?>','',$filestr);
$filestr = str_replace('<a href="http://www.youtube.com/embed/QZ-5ADFl6WQ" class="Internet_20_link">http://www.youtube.com/embed/QZ-5ADFl6WQ</a>','<iframe title="YouTube video player" class="youtube-player" type="text/html" width="640" height="390" src="http://www.youtube.com/embed/QZ-5ADFl6WQ" frameborder="0" allowFullScreen></iframe>',$filestr);
$filestr = str_replace('position:relative;','',$filestr);
$filestr = str_replace('$doar','<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_donations"><input type="hidden" name="business" value="danielchanfana@gmail.com"><input type="hidden" name="lc" value="PT"><input type="hidden" name="item_name" value="Foundation Mission Save"><input type="hidden" name="no_note" value="0"><input type="hidden" name="currency_code" value="EUR"><input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest"><input type="image" src="https://www.paypalobjects.com/pt_PT/PT/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - A forma mais fácil e segura de efetuar pagamentos online!"><img alt="" border="0" src="https://www.paypalobjects.com/pt_PT/i/scr/pixel.gif" width="1" height="1"></form>',$filestr);
$filestr = str_replace('$donate','<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_donations"><input type="hidden" name="business" value="danielchanfana@gmail.com"><input type="hidden" name="lc" value="US"><input type="hidden" name="item_name" value="Foundation Mission Save"><input type="hidden" name="no_note" value="0"><input type="hidden" name="currency_code" value="EUR"><input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"><img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1"></form>',$filestr);
echo $filestr; 
?>

</section>


</body>
<script>
function myFunction() {
	window.scrollTo(0, 0);
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</html>
