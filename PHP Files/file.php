<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		Folder<input type="text" name="f1"><br><br>
		Image<input type="file" name="t1" multiple="multiple"><br><br>
		<button type="submit">Upload</button>
	</form>
</body>
</html>
<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$folder=$_POST['f1'];
		for($i=0;$i<count($_FILES['t1']['name']);$i++){
			$name=$_FILES['t1']['name'][$i];
			$new_name=str_replace(" ","_",$name);
			$type=$_FILES['t1']['type'][$i];
			$new_type=explode("/",$type);
			$size=$_FILES['t1']['size'][$i];
			$location=$_FILES['t1']['tmp_name'][$i];
			$error=$_FILES['t1']['error'][$i];
			$my_name=$i.".".$new_type[1];
			if($error>0){
				echo"Some Error";
			}	
			else{
				if(file_exists($folder)){}
					else{ 
						mkdir($folder); 
					}
				$final=$folder."/".$my_name;
				move_uploaded_file($location, $final);
				if($new_type[0]=="image"){
					echo"<img src=".$final." height=100 width=100>";
				}
				else if($new_type[0]=="video"){
					echo"<video controls='controls' height=300 width=300>
					<source src=".$final.">
					</video>";
				}
				else if($new_type[0]=="audio"){
					echo"<audio controls='controls'>
					<source src=".$final.">
					</audio>";
				}
				else if($new_type[0]=="application"){
					echo"<a href=".$final.">Download</a>";
				}

			}
		}
	}
?>