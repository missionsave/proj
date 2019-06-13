<style>
.error {color: #FF0000;} 
</style>
  
<?php //dict

$dlg = array("pt", "en");

?>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $catErr = $presententionErr = $phoneErr = "";
$name = $email = $gender = $presentention = $phone = "";

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
    
  if (empty($_POST["presentention"])) {
    $presentention = "";
  } else {
    $presentention = test_input($_POST["presentention"]);
  }
  
  if (empty($_POST["phone"])) {
    $phone = "";
  } else {
    $phone = test_input($_POST["phone"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


$postOk=0;
if(isset($_POST['submit']) && ($nameErr=="") && $emailErr=="")$postOk=1;

$cvErr="";
if(isset($_POST['submit'])){
	$cvErr="color: #FF0000;";
}

?>



<p id="jobsid">
Estão abertas vagas para estagiários com hipótese de permanência posterior.<br><br>
<b>Faça a sua inscrição aqui:</b> <br>
<div  style="border-style: solid; padding:10px; <?php if( $postOk )echo 'display: none;'; ?> ">

	<form action="<?php echo htmlspecialchars($indexp.'?pg=jobs#jobsid');?>" method="post" enctype="multipart/form-data">
		 
		 Nome: <input type="text" name="name" size="30" required="required" value="<?php echo @$name;?>">
		 <span class="error">* <?php echo @$nameErr;?></span>
		 <br><br>
		 
		 E-mail: <input type="text" name="email" size="30" required="required" value="<?php echo @$email;?>">
		 <span class="error">* <?php echo @$emailErr;?></span>
		 <br><br>
	
		Telefone: <input name="phone"   size="20" type="number" required="required"  value="<?php echo @$phone;?>"/>
		<span class="error">* <?php echo @$phoneErr;?></span>
		<br><br> 
		
		Ano de nascimento: <select name="year" id="year" required="required"  >			
		</select>
		<span class="error">* <?php echo @$birthErr;?></span>
		<br><br> 
		
		Categoria:
		<select name="job" required="required">
			<option disabled selected value> -- select an option -- </option>
			<option>Engenheiro informático</option>
			<option value="engelect">Engenheiro eletrónico</option>
			<option value="engmec">Engenheiro mecânico</option>
			<option value="engagro">Engenheiro agrónomo</option>
			<option value="serralheiro">Serralheiro / soldador</option>
			<option value="administrativa">Administrativa</option>
			<option value="outro">Outro</option>
		</select>
		 <span class="error">* <?php echo @$catErr;?></span> 
		<br><br> 
		
		Carta de Apresentação:
		<span class="error">* <?php echo @$presententionErr;?></span>
		<br>
		<textarea style="width:100%; font-family:Arial;" name="presentention" id="presententionid" rows="5" required="required" ></textarea>
		<br><br>
		
		
		<span style=" <?php echo $cvErr;?>  ">Selecione o seu CV:</span> 
		<br>
		<input type="file" name="fileToUpload" id="fileToUpload" />
		<br><br>
		
		<input type="submit" name="submit"  onclick='storedata()' value="Submeter" />
	</form>
</div>
<script>
window.onload = function() { 
	if (sessionStorage.presententionid) {
		document.getElementById("presententionid").value = sessionStorage.presententionid; 
	}
	
	//fill year
	var start = new Date().getFullYear()-65;
	var end = new Date().getFullYear()-18;
	var options = "<option disabled selected value> -- select -- </option>";
	for(var year = end ; year >start; year--){
	  options += "<option>"+ year +"</option>";
	}
	document.getElementById("year").innerHTML = options;
};

function storedata() {
  if(typeof(Storage) !== "undefined") {
    var presententionid = document.getElementById("presententionid").value; 
    sessionStorage.presententionid = presententionid; 
  }
}
</script>
<?php
 
function fileupload($prefix){
	$target_dir = "uploads/";
	$target_file = $target_dir .$prefix.basename($_FILES["fileToUpload"]["name"]);
	//$target_file = $target_dir . "test";
	$uploadOk = 1;
	$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	// if(isset($_POST["submit"])) {
		// $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		// if($check !== false) {
			// echo "File is an image - " . $check["mime"] . ".";
			// $uploadOk = 1;
		// } else {
			// echo "File is not an image.";
			// $uploadOk = 0;
		// }
	// }
	// Check if file already exists
	// if (file_exists($target_file)) {
		// echo "Sorry, file already exists.";
		// $uploadOk = 0;
	// }
	// Check file size
	// if ($_FILES["fileToUpload"]["size"] > 500000) {
		// echo "Sorry, your file is too large.";
		// $uploadOk = 0;
	// }
	// // Allow certain file formats
	// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	// && $imageFileType != "gif" ) {
		// echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		// $uploadOk = 0;
	// }
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			//echo "Sorry, there was an error uploading your file.";
		}
	}
	return $target_file;
}
?>
<?php
if( $postOk ){
	echo "<h2>Obrigado pela sua inscrição</h2>";
	$data= date('Y-m-d H_m_s ');
	$datai=date('Y-m-d H:m:s');
	$target_file=fileupload($data.$_POST['name']); 
	echo $_POST['name'].'<br>';
	echo $_POST['email'].'<br>';
	echo $_POST['phone'].'<br>';
	echo $_POST['year'].'<br>';
	echo $_POST['job'].'<br>';
	echo $_POST['presentention'].'<br>';
	echo '<a href="'.$target_file.'">'.$target_file.'</a><br>';
	
	$$_POST['name'];
	
	
	$db = new PDO("sqlite:"."db.sqlite");
	$sql="CREATE TABLE IF NOT EXISTS tabJobs (
	 cid INTEGER PRIMARY KEY,
	 date TEXT NOT NULL,
	 name TEXT NOT NULL,
	 email TEXT NOT NULL UNIQUE,
	 phone TEXT NOT NULL,
	 year INTEGER NOT NULL,
	 job TEXT NOT NULL,
	 presentention TEXT NOT NULL,
	 cv TEXT,
	);";
	$db->query($sql);
	
	
$stmt = $db -> prepare("insert into fund (date,name,email,phone,year,job,presentention,cv)
values('".$datai."','".$_POST['name']."','".$_POST['email']."','".$$_POST['phone']."','".$_POST['year']."','".$_POST['job']."','".$_POST['presentention']."','".$target_file."')");
if( $stmt -> execute() ){
	echo "Row Inserted";
}else{
	$stmt = $db -> prepare("update fund set name='".$name."',amount='".$amount."',comment='".$comment."' where email like '".$email."'");
	echo $stmt -> execute();
	echo "<br>alterado<br>";
}

}
?>












