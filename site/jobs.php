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
    
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
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
if(isset($_POST['submit']))
	$cvErr="color: #FF0000;";


?>

<p id="jobsid">
Estão abertas vagas para estagiários com hipótese de permanência posterior.<br><br>
Faça a sua inscrição aqui. <br><br>
<div  style="border-style: solid; padding:10px; <?php if( $postOk )echo 'display: none;'; ?> ">

	<form action="<?php echo htmlspecialchars($indexp.'?pg=jobs#jobsid');?>" method="post" enctype="multipart/form-data">
		 
		 Nome: <input type="text" name="name"  required="required" value="<?php echo @$name;?>">
		 <span class="error">* <?php echo @$nameErr;?></span>
		 <br><br>
		 
		 E-mail: <input type="text" name="email"  value="<?php echo @$email;?>">
		 <span class="error">* <?php echo @$emailErr;?></span>
		 <br><br>
	
		Telefone: <input name="phone"   style="  text-align: right;" />
		<br><br> 
		
		Categoria: 
		<select name="jobsform">
			<option disabled selected value> -- select an option -- </option>
			<option value="enginfor">Engenheiro informático</option>
			<option value="engelect">Engenheiro eletrónico</option>
			<option value="engmec">Engenheiro mecânico</option>
			<option value="engagro">Engenheiro agrónomo</option>
			<option value="serralheiro">Serralheiro / soldador</option>
			<option value="administrativa">Administrativa</option>
			<option value="outro">Outro</option>
		</select>
		<br><br> 
		
		Carta de Apresentação:*
		<br>
		<textarea style="width:100%; font-family:Arial;" name="presentention" rows="5"  ></textarea>
		<br><br>
		
		
		<span style=" <?php echo $cvErr;?>  ">Selecione o seu CV:</span> 
		<br>
		<input type="file" name="fileToUpload" id="fileToUpload" />
		<br><br>
		
		<input type="submit" name="submit" value="Submeter" />
	</form>
</div>
<?php
function fileupload(){
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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
}
?>
<?php

if( $postOk ){
	echo "<h1>Obrigado pela sua inscrição</h1>";
	fileupload();
	$selected_val = $_POST['jobsform'];
	
}
?>












