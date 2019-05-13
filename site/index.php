<?php

echo '<meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="expires" content="0" />
  <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
  <meta http-equiv="pragma" content="no-cache" />';

session_set_cookie_params(3600000,"/");
session_start(); 
 
        header("Cache-Control: no-cache");

        echo '<script>
            var sse = new EventSource("index.php");
            sse.onmessage = function(event) {
                document.write(event.data);
            }
        </script>';



require 'dict.php';
require 'css.html';

function styleButton($style,$text,$sel){
    $html_str = "<form id='view_form' action='".$_SERVER['REQUEST_URI']."' method='get' >";
    $html_str .= "<input style='display:none;' name='pg' type='text' value='".$style."' >";
    $html_str .= "<input type='hidden' name='l'  value='".$_GET["l"]."' >";
    if($sel)
		$html_str .= "<input id='view_button' type='submit' style='font-size:20px; background-color: #00378D; color: #FFC60D; height:50px' value='".$text."' >";
	else
    	$html_str .= "<input id='view_button' type='submit' style='font-size:20px;  height:50px' value='".$text."' >";		
    $html_str .= "</form>";
    return $html_str;
}
 
function styleImg($style,$img){
    $html_str = "<form id='view_form' action='".$_SERVER['REQUEST_URI']."' method='get' >"; 
    $html_str .= "<input type='image' src='".$img."' height='30'  >";
    $html_str .= "<input type='hidden' name='l'  value='".$style."' >";
    $html_str .= "<input type='hidden' name='pg'  value='".$_GET["pg"]."' >";
    $html_str .= "</form>";
    return $html_str;
}

echo '<?xml version="1.0" encoding="UTF-8"?>';
  


echo '<link rel="shortcut icon" href="icon.ico">';

 
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

 echo '<title>Mission Save</title>';


echo '<div id="bandeira">';
echo '<table border-spacing=10 style="width:100%">';
echo '<tr>';
 
echo '</tr>';
echo '<tr>';
echo styleImg(0,"flag_pt.png");
echo '</tr>';
echo '<tr> &zwnj; &zwnj;';
echo '</tr>';
echo '<tr>';
echo styleImg(1,"flag_en.png");
echo '</tr>';
echo '</table>';

echo '</div>';

echo '<div id="header">
<h1>Foundation Mission Save</h1>
</div>';


echo '<div id="bd">';

echo '<table style="width:100%">';
echo '<tr>';
echo styleButton("descritiva_",$dupa[$lg],  $_GET["pg"]=="descritiva_");
echo '</tr>';
echo '<tr>';
echo styleButton("estrategia_",$dest[$lg] ,$_GET["pg"]=="estrategia_");
echo '</tr>';
echo '<tr>';
echo styleButton("voluntariado_",$dvol[$lg] , $_GET["pg"]=="voluntariado_" );
echo '</tr>';
echo '<tr>'; 
echo styleButton("donate_",$doar[$lg] ,$_GET["pg"]=="donate_");
echo '</tr>';
echo '<tr>'; 
echo styleButton("develop_",$dev[$lg], $_GET["pg"]=="develop_" );
echo '</tr>';
echo '</table>';
echo '<br>';

echo '</div>';

//echo '<div id="headerv">
//<h1>'.$page.'</h1>
//</div>';

$lgl=$dlg[$lg];

if($_GET["pg"]=="descritiva_")
echo '<div id="dpdf">
<a target="_blank" href="descritiva_'.$lgl.'.pdf">Download pdf</a> 
<div>';


echo '<div id="ht">';
require $_GET["pg"].$dlg[$lg].".html";
echo '</div>';

//echo $contact[$lg];
//if($_SESSION['page']=="inicio_")
//	echo '<iframe title="YouTube video player" class="youtube-player" type="text/html" width="640" height="390" src="http://www.youtube.com/embed/QZ-5ADFl6WQ" frameborder="0" allowFullScreen></iframe>';
 

 
            flush();
         

?>