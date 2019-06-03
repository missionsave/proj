<meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<link rel="shortcut icon" href="icon.ico">

<?php
session_set_cookie_params(3600000,"/");
session_start(); 
header("Cache-Control: no-cache");
?>
<script>
var sse = new EventSource("index.php");
sse.onmessage = function(event) {
document.write(event.data);
}
</script>
 <style>

#topmenu { 
	margin:0px auto;
	font-family:Arial; 
    background-color:#0033cc;
    color:#FFC60D;
    text-align:center;
    padding:5px; 
  top: 0;
}
.sticky {
position:fixed;
}
#myHeader {
	margin:0px auto;
	font-family:Arial;  
    color:#FFC60D;
    text-align:center;
    padding:5px;
  top: 0; 
}
#bd {	
	width:100%;
	margin:0px auto;
	font-family:Arial; 
    color:black;
    text-align:center;
    padding:5px;
}
#dpdf {
	margin:0px auto;
	font-family:Arial;  
    color:black;
    text-align:right;
    padding:0px;
	font-size: 14px;
}
#ht {
	margin:0px auto;
	font-family:Arial; 
    color:black;
    text-align:left;
    padding:0px;
}
 
#bandeira {
	margin:0px auto;
	font-family:Arial; 
    color:black;
    text-align:right;
    padding:5px;
}


 
html { 
    display: table;
    margin: auto;
}

body {
    display: table-cell;
    vertical-align: middle;
}
</style> 
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
<title>Mission Save</title>

<div id="topmenu">

<div id="bandeira">
<table border-spacing=10 style="width:100%">
<tr></tr>
<tr>
<?php echo styleImg(0,"flag_pt.png"); // &zwnj; &zwnj; ?>
</tr>
<tr></tr>
<tr>
<?php echo styleImg(1,"flag_en.png");  ?>
 </tr> 
 </table> 
 </div> 
<div class="header" id="myHeader">
<h1>Foundation Mission Save</h1>
</div>
 
	<div id="bd">
		<table style="width:100%">
			<tr>';
	<?php echo styleButton("descritiva_",$dupa[$lg],  $_GET["pg"]=="descritiva_"); ?>
			</tr>
			<tr>
	<?php echo styleButton("estrategia_",$dest[$lg] ,$_GET["pg"]=="estrategia_"); ?>
			</tr> 
			<tr> 
	<?php echo styleButton("voluntariado_",$dvol[$lg] , $_GET["pg"]=="voluntariado_" ); ?>
			</tr> 
			<tr> 
	<?php echo styleButton("donate_",$doar[$lg] ,$_GET["pg"]=="donate_"); ?>
			</tr> 
			<tr> 
	<?php echo styleButton("develop_",$dev[$lg], $_GET["pg"]=="develop_" ); ?>
			</tr>
			<tr> 
	<?php echo styleButton("plan_",$plan[$lg], $_GET["pg"]=="plan_" ); ?>
			</tr>
		</table>
		<br>
	</div>
	
</div>

<?php 
//echo '<div id="headerv">
//<h1>'.$page.'</h1>
//</div>';

$lgl=$dlg[$lg];

if($_GET["pg"]=="descritiva_")
//echo '<div id="dpdf">
//<a target="_blank" href="descritiva_'.$lgl.'.pdf">Download pdf</a> 
//<div>';

?>
<div id="ht">
 

<?php ///replace
$file= $_GET["pg"].$dlg[$lg].".xhtml";
$filestr = file_get_contents($file, true);

$filestr = str_replace('<?xml version="1.0" encoding="UTF-8"?>','',$filestr);
$filestr = str_replace('<a href="http://www.youtube.com/embed/QZ-5ADFl6WQ" class="Internet_20_link">http://www.youtube.com/embed/QZ-5ADFl6WQ</a>','<iframe title="YouTube video player" class="youtube-player" type="text/html" width="640" height="390" src="http://www.youtube.com/embed/QZ-5ADFl6WQ" frameborder="0" allowFullScreen></iframe>',$filestr);
$filestr = str_replace('position:relative;','',$filestr);
$filestr = str_replace('$doar','<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_donations"><input type="hidden" name="business" value="danielchanfana@gmail.com"><input type="hidden" name="lc" value="PT"><input type="hidden" name="item_name" value="Foundation Mission Save"><input type="hidden" name="no_note" value="0"><input type="hidden" name="currency_code" value="EUR"><input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest"><input type="image" src="https://www.paypalobjects.com/pt_PT/PT/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - A forma mais fácil e segura de efetuar pagamentos online!"><img alt="" border="0" src="https://www.paypalobjects.com/pt_PT/i/scr/pixel.gif" width="1" height="1"></form>',$filestr);
$filestr = str_replace('$donate','<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_donations"><input type="hidden" name="business" value="danielchanfana@gmail.com"><input type="hidden" name="lc" value="US"><input type="hidden" name="item_name" value="Foundation Mission Save"><input type="hidden" name="no_note" value="0"><input type="hidden" name="currency_code" value="EUR"><input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"><img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1"></form>',$filestr);
echo $filestr;
?>

</div>
<?php
//echo $contact[$lg];
//if($_SESSION['page']=="inicio_")
//	echo '<iframe title="YouTube video player" class="youtube-player" type="text/html" width="640" height="390" src="http://www.youtube.com/embed/QZ-5ADFl6WQ" frameborder="0" allowFullScreen></iframe>';
 

 
            flush();
         
//
//echo '<br><div id="ht" style="max-width: 300px;">';
//require "business_plan_pt.xhtml";
//echo '</div>';


?>
 <script>
  window.onscroll = function() {myFunction()};

  var header = document.getElementById("topmenu");
  var sticky = header.offsetTop;

 function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
 }
 </script>
<!--substituir position:relative;-->



