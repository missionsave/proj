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

input[type=text], select {  
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

$stmt = $db -> prepare("SELECT tabFases.id,tabFases.Fase, round( Sum( ( UNIX_TIMESTAMP(tabPontos.end)-UNIX_TIMESTAMP(tabPontos.start) )/3600 ),1) AS hoursSpent, tabFases.EstimatedHours, round( Sum( ( UNIX_TIMESTAMP(tabPontos.end)-UNIX_TIMESTAMP(tabPontos.start) )/3600 )/tabFases.EstimatedHours*100,0) as per FROM tabFases LEFT JOIN tabPontos ON tabFases.id = tabPontos.idfase GROUP BY tabFases.Fase, tabFases.EstimatedHours, tabFases.id order by tabFases.Fase asc
");
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

<form id='loginForm'  method='post' style=" <?php if( @$postOk )echo 'display: none;'; ?>" >
    <input id="user-text-field" type="email" name="email" autocomplete="username"  placeholder="email"/>
	<input id="password-text-field" name="password" type="password" autocomplete="new-password"  placeholder="password"/>
    <input id='loginButton' type='submit' value="Login">
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
	
	$faseidsel=@$_POST['faseidsel'];
	if($faseidsel!='') //é login
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
echo '<select name="faseidsel" required="required">';
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
echo '<input name="'.$btfunc.'" type="submit" value="'.$btfunc.'">';




echo '</form>';

}
?>


<form  method="post" ><input name="logout" type="submit" value="Logout"> </form>

</div>

<table>
  <tr>
    <th>Fase</th>
    <th>Horas feitas</th>
    <th>Horas estimadas</th>
    <th>% feito</th>
  </tr> 
<?php 	
echo '<br>Esta tabela é actualizada diariamente<br>';
foreach($res as $row){
	extract($row);
	if($hoursSpent=='')$hoursSpent=0;
	echo '<tr><td>'.@$Fase.'</td><td style="text-align:right">'.$hoursSpent.'</td><td style="text-align:right">'.@$EstimatedHours.'</td><td style="text-align:right">'.$per.'</td></tr>';
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

