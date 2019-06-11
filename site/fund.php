<!-- https://www.w3schools.com/howto/howto_js_dropdown.asp -->
<style>
.error {color: #FF0000;}
 
</style>
  
<?php //dict

$dlg = array("pt", "en");

?>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $amountErr = "";
$name = $email = $gender = $comment = $amount = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["amount"])) {
    $amount = "";
  } else {
    $amount = test_input($_POST["amount"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$amount)) {
      //$amountErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div id="content" style="">
Esta pre inscriçao funciona tipo uma sondagem

  <h2>Responsive Topnav Example</h2>
  <p>Resize the browser window to see how it works.</p>
    <h3>Sticky Navigation Example</h3>
  <p>The navbar will stick to the top when you reach its scroll position.</p>
  <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
  <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
  <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
  <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
  <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
  <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
  <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
</div>

<div class="formla" style="<?php if($name!="" && $emailErr=="")echo 'display:none';?>">

<h2>Pré inscrição para fundo de investimento</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($indexp.'?pg=fund#formi');?>">  
  Name: <input type="text" name="name"  required="required" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email"  value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  amount a investir: <input id="amount" type="number" min="10" style="width: 100px; text-align: right;" required="required" onchange="amountFunction()"  name="amount" value="<?php echo $amount;?>">
  <label >€</label> <span class="error"><?php echo $amountErr;?></span>
  <p id="demo"></p>
  <br><br>
  Comment: <br><textarea style="font-family:Arial;" name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>




  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</div>

<script>
function amountFunction() {
  var x = document.getElementById("amount").value;
  if(x<10){x=10; document.getElementById("amount").value=10;}
  document.getElementById("demo").innerHTML = "You selected: " + Math.round(x*1.3)+"€";
}
</script>

<form action="fh.php" method="post" enctype="multipart/form-data">
    Envie o seu CV:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>


<?php
echo "<h2 id='formi'>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $amount;
echo "<br>";
echo $comment;
$db = new PDO("sqlite:"."dbfund.sql");
$sql="CREATE TABLE IF NOT EXISTS fund (
 cid INTEGER PRIMARY KEY,
 name TEXT NOT NULL,
 email TEXT NOT NULL UNIQUE,
 amount INTEGER NOT NULL,
 comment BLOB
);";
$db->query($sql);

$stmt = $db -> prepare("insert into fund (name,email,amount,comment) values('".$name."','".$email."','".$amount."','".$comment."')");
//$stmt = $db -> prepare("insert into fund (name,email,amount,comment) values(:name,:email,,,)");
//$stmt -> bindParam(':name', $name, PDO::PARAM_STR);
if( $stmt -> execute() ){
	echo "Row Inserted";
}else{
	$stmt = $db -> prepare("update fund set name='".$name."',amount='".$amount."',comment='".$comment."' where email like '".$email."'");
	echo $stmt -> execute();
	echo "<br>alterado<br>";
}





//echo "mail".mail("superbem@gmail.com","teste","<br>www.missionsave.altervista.org<br>www.missionsave.epizy.com");







$stmt = $db -> prepare("SELECT * from fund");
		
		/* execute the query */
		$stmt -> execute();		
		
		/* fetch all results */
		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		foreach($res as $row){
			extract($row);
			echo $cid." | ".$name." | ".$email." | ".$amount." | ".$comment."<br>";
		}


?>
