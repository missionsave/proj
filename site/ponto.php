<?php
if(!empty(@$_POST['newpassword'])){
echo 'teste'.@$_POST['newpassword'];
return;
}
?>


<!-- 
Por implementar:
	password md5 

-->


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script><!-- https://sweetalert2.github.io/ 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.3.3/bootbox.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
-->

<script>
//function loadDoc() {
 
 
async function loadDoc() {
try{
	Swal.mixin({
	input: 'password',
	confirmButtonText: 'Next &rarr;',
	showCancelButton: true,
	progressSteps: ['1', '2', '3']}).queue([ 'Current password',  'Type new password',  'Re-type new password']).then((result) => {
	
	if (result.value[1]!=result.value[2]){
		Swal.fire('Passwords doesn`t match','', 'error');
		return;
	}
	if (result.value[1]) { 
		
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "ponto.php", false);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		var params = 'newpassword='+result.value[1]+'&rnewpassword='+result.value[2];
		xhttp.send(params);  
		Swal.fire(xhttp.responseText+' '+result.value[0],'', 'success');
	}
})
}catch(e){
	// Fail!
	console.error(e);
}
}
 
 
// bootbox.prompt({
    // title: "This is a prompt with a password input!",
    // inputType: 'password',
    // callback: function (result) {
        // console.log(result);
    // }
// });	
	
// return;
  // var xhttp = new XMLHttpRequest();
  // xhttp.open("POST", "ponto.php", false);
  // xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  // var params = 'newpassword=1';
  // xhttp.send(params);
  // alert(xhttp.responseText);
  // //document.getElementById("demo").innerHTML = xhttp.responseText;
// }
</script>
<?php //dict
 
$d1 = array('<br>Esta tabela é actualizada diariamente<br>', '<br>This table is updated daily<br>')[$lg];


?>
<?php
 
?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

input[type=text], input[type=password], select {  
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

</style>
<?php //print_r($_POST); print_r($_SESSION);?>
<?php 
require("connect.php");

$sql="SELECT tabFases.id,tabFases.Fase,tabFases.FaseEn, round( Sum( ( UNIX_TIMESTAMP(tabPontos.end)-UNIX_TIMESTAMP(tabPontos.start) )/3600 ),1) AS hoursSpent, tabFases.EstimatedHours, round( Sum( ( UNIX_TIMESTAMP(tabPontos.end)-UNIX_TIMESTAMP(tabPontos.start) )/3600 )/tabFases.EstimatedHours*100,0) as per FROM tabFases LEFT JOIN tabPontos ON tabFases.id = tabPontos.idfase GROUP BY tabFases.Fase, tabFases.EstimatedHours, tabFases.id order by tabFases.Fase asc
";
//$sql=str_replace("tabFases.Fase","tabFases.FaseEn",$sql);
$stmt = $db -> prepare($sql);
$stmt -> execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<?php //verifica se utilizador existe e escolhe ultimo
if(isset($_POST['logout']))session_unset();



if(isset($_SESSION['email'])) $_POST['email']=$_SESSION['email'];
if(isset($_SESSION['password'])) $_POST['password']=$_SESSION['password'];
if( @$_POST['email'] ){

	$stmt1 = $db -> prepare('SELECT tabWorkers.id, tabWorkers.Name, tabWorkers.pass, tabWorkers.email
	FROM tabWorkers
	WHERE (((tabWorkers.pass)="'.@$_POST['password'].'") AND ((tabWorkers.email)="'.@$_POST['email'].'"));
	'); 
	$stmt1 -> execute();		
	$res1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
	foreach($res1 as $row){
		extract($row);
		$idWorker=$id;		
		//echo @$id." | ".$Name." | ".@$email." | ".@$amount." | ".@$comment."<br>";
		$postOk=1;		
	}	
}
?>

<form id='loginForm' autocomplete="on" method='post' style=" <?php if( @$postOk )echo 'display: none;'; ?>" >
    <input   type="text" name="email"    placeholder="email"/>
	<input   name="password" type="password"   placeholder="password"/>
    <input   type='submit' value="Login">
</form>


<div name="loggeddiv" style=" <?php if( !@$postOk )echo 'display: none;'; ?>" >

<?php
if( @$postOk ){
	$stmt2 = $db -> prepare('SELECT tabPontos.id ,tabPontos.start,tabPontos.end  , tabPontos.idfase, tabFases.Fase FROM tabPontos INNER JOIN tabFases ON tabPontos.idfase = tabFases.id WHERE (((tabPontos.idWorker)= ? ))
ORDER BY tabPontos.id desc LIMIT 1;	'); 
	
	$stmt2 -> execute(array($idWorker));		
	$res2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
	foreach($res2 as $row){
		extract($row); 
		//echo @$idfase." | ".$Fase." | ".$id." | ".$start." | ".$end."<br>";
	}

	$btfunc="Stop";
	if(@$end!='' || (@$start=='' && @$end==''))$btfunc="Start";

		
	//se estiver aberto noutro browser, o stop faz start e o start faz stop
	$write=1;
	if((@$_POST['btfunc']=="Start" && $btfunc=="Stop") || (@$_POST['btfunc']=="Stop" && $btfunc=="Start")) {
		echo "No write"; 
		session_unset();
		$write=0;
		$_POST = array(); 
		echo '<script>location.reload();</script>';
	}
		
	$faseidsel=@$_POST['faseidsel'];
	if($write==1 && $faseidsel!='') //é login
		if($btfunc=="Stop" ){
			$stmt3 = $db -> prepare("UPDATE  tabPontos SET idfase=? ,end=NOW() WHERE id=?;");
			$stmt3 -> execute(array($faseidsel,$id));
				$stmt -> execute();
				$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$btfunc="Start";
			//echo $faseidsel." | ".$id." | ".$start." | ".$end."<br>";
		}else{
			//echo "INSERT ".$faseidsel;
			$stmt3 = $db -> prepare("INSERT INTO tabPontos(idWorker, idfase, start) VALUES ( ? , ? , NOW() )");
			$stmt3 -> execute(array($idWorker,$faseidsel));	
				$btfunc="Stop";
		}
	
	//echo $btfunc." | ".@$faseidsel." | ".@$start." | ".@$start." | ".@$end."<br>";

echo 'Welcome '.$Name.'<br>';
if($btfunc=="Stop"){
	$stmt2 -> execute(array($idWorker));		
	$res2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
	foreach($res2 as $row){
		extract($row); 
		//echo @$idfase." | ".$Fase." | ".$id." | ".$start." | ".$end."<br>";
	}
	echo " Started at ".@$start." Elapsed ".'<span id="datetime"></span>';
}

//
if($faseidsel!='')$idfase=$faseidsel;
echo '<form  method="post" >';
echo '<select style="max-width: 280px;"; name="faseidsel" required="required">';
foreach($res as $row){
	extract($row); 
	$selv='';
	if($id==$idfase)$selv='selected value';
	echo '<option value="'.$id.'" '.$selv.'  >'.$Fase.'</option>';
}
echo '</select>';

$_SESSION['email'] = @$_POST['email'];
$_SESSION['password'] = @$_POST['password'];

//start or end
if($btfunc=='Stop')$btc='red'; else $btc='green';
echo '<input style="color:yellow; background-color: '.$btc.';" name="'.'btfunc'.'" type="submit" value="'.$btfunc.'">';


echo '';

echo '</form>';

}
?>


<form   style="float: left;" method="post" ><input name="logout" type="submit" value="Logout"> </form> 
<button type="button" onclick="loadDoc()">Change password</button>
</div>

<table>
  <tr>
    <th>Fase</th>
    <th>Horas feitas</th>
    <th>Horas estimadas</th>
    <th>% feito</th>
  </tr> 
<?php 	
echo $d1;
foreach($res as $row){
	extract($row);
	if($hoursSpent=='')$hoursSpent=0;
	if($_GET['l']==0)$fase=$Fase; else $fase=$FaseEn;
	echo '<tr><td>'.@$fase.'</td><td style="text-align:right">'.$hoursSpent.'</td><td style="text-align:right">'.@$EstimatedHours.'</td><td style="text-align:right">'.$per.'</td></tr>';
}
?>
</table> 
<script>
function timef(s) {
    return new Date(s  ).toISOString().slice(-13, -5);
}
var myVar = setInterval(myTimer, 1000);
var d = new Date("<?php 	

	echo $start; ?>").getTime();
function myTimer() {
  
  var time = new Date().getTime() - d; 
  document.getElementById("datetime").innerHTML = timef(time );
}
</script>

