<?php
//session_set_cookie_params(3600,"/");
session_start(); 
require 'dict.php';
require 'css.html';

function styleButton($style,$text,$sel){
    $html_str = "<form id='view_form' action='".$_SERVER['REQUEST_URI']."' method='post' >";
    $html_str .= "<input style='display:none;' name='p' type='text' value='".$style."' >";
    if($sel)
		$html_str .= "<input id='view_button' type='submit' style='font-size:20px; background-color: #4CAF50; height:50px' value='".$text."' >";
	else
    	$html_str .= "<input id='view_button' type='submit' style='font-size:20px;  height:50px' value='".$text."' >";
		
    $html_str .= "</form>";
    return $html_str;
}
 
function styleImg($style,$img){
    $html_str = "<form id='view_form' action='".$_SERVER['REQUEST_URI']."' method='post' >";
    $html_str .= "<input style='display:none;' name='p' type='text' value='".$style."' >";
    $html_str .= "<input type='image' src='".$img."' height='30' name='p'  value='".$style."' >";
    $html_str .= "</form>";
    return $html_str;
}

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<link rel="shortcut icon" href="icon.ico">';


$entityBody = file_get_contents('php://input');

//echo $_POST["p"] ;

//$local=Locale::getDefault();
if(@$_POST["p"] ==""){
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	//echo $lang;
	if($lang=="pt"){
		
	$_SESSION['lg']=0;
	$_SESSION['lgl']="pt";	
	}
//if($local=="pt_PT"||$local=="pt_BR"){
//	$_SESSION['lg']=0;
//	$_SESSION['lgl']="pt";
else{
	$_SESSION['lg']=1;
	$_SESSION['lgl']="en";	
}
}
if(@$_POST["p"] =="lg0"){
	$_SESSION['lg']=0;
	$_SESSION['lgl']="pt";
}
if(@$_POST["p"] =="lg1"){ // ||@$_POST["p"] ==""){
	$_SESSION['lg']=1;
	$_SESSION['lgl']="en";
}


$lgl=$_SESSION['lgl'];
$lg=$_SESSION['lg'];

$page="";

if($entityBody=="" || $entityBody=="p=ini") {
	$_SESSION['page']="descritiva_";//$dfini[$lg];
	$page=$dupa[$lg];	
}
if($entityBody=="p=rw"){
	$_SESSION['page']="descritiva_" ;
	$page=$dupa[$lg];	
}
if($entityBody=="p=rw2") {
	$_SESSION['page']= "voluntariado_" ;
	$page=$dvol[$lg];	
}
if($entityBody=="p=rw3") {
	$_SESSION['page']= "estrategia_" ;
	$page=$dest[$lg];	
}
if($entityBody=="p=rwdonate") {
	$_SESSION['page']= "donate_" ;
	$page=$doar[$lg];	
}
if($entityBody=="p=rwdevelop"){
	$_SESSION['page']= "develop_" ;
	$page=$dev[$lg];	
}
 echo '<title>Mission Save</title>';


echo '<div id="bandeira">';
echo '<table border-spacing=10 style="width:100%">';
echo '<tr>';
//echo  '<audio autoplay controls>
//       <source src="MAK - 18 13 AudioTrack 13.mp3" type="audio/ogg">
//   </audio>';
echo '</tr>';
echo '<tr>';
echo styleImg("lg0","flag_pt.png");
echo '</tr>';
echo '<tr> &zwnj; &zwnj;';
echo '</tr>';
echo '<tr>';
echo styleImg("lg1","flag_en.png");
echo '</tr>';
echo '</table>';

echo '</div>';

echo '<div id="header">
<h1>Foundation Mission Save</h1>
</div>';


echo '<div id="bd">';

echo '<table style="width:100%">';
echo '<tr>';
echo styleButton("rw",$dupa[$lg],  $_SESSION['page']=="descritiva_");
echo '</tr>';
echo '<tr>';
echo styleButton("rw3",$dest[$lg] ,$_SESSION['page']=="estrategia_");
echo '</tr>';
echo '<tr>';
echo styleButton("rw2",$dvol[$lg] , $_SESSION['page']=="voluntariado_" );
echo '</tr>';
echo '<tr>'; 
echo styleButton("rwdonate",$doar[$lg] ,$_SESSION['page']=="donate_");
echo '</tr>';
echo '<tr>'; 
echo styleButton("rwdevelop",$dev[$lg], $_SESSION['page']=="develop_" );
echo '</tr>';
echo '</table>';
echo '<br>';

echo '</div>';

//echo '<div id="headerv">
//<h1>'.$page.'</h1>
//</div>';

if($_SESSION['page']=="descritiva_")
echo '<div id="dpdf">
<a target="_blank" href="descritiva_'.$lgl.'.pdf">Download pdf</a> 
<div>';


echo '<div id="ht">';
require $_SESSION['page'].$lgl.".html";
echo '</div>';

//echo $contact[$lg];
//if($_SESSION['page']=="inicio_")
//	echo '<iframe title="YouTube video player" class="youtube-player" type="text/html" width="640" height="390" src="http://www.youtube.com/embed/QZ-5ADFl6WQ" frameborder="0" allowFullScreen></iframe>';
 



?>