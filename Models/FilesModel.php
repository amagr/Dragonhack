<?php 
	class FilesModel {
		public function upload($link) {


			$storeFolder = 'files\\others';  
 
			if (!empty($_FILES)) {
				$type = explode("/", $_FILES['file']['type']);
				$type = $type[count($type)-1];

				$date = date('Y-m-d');

				$sql = "INSERT INTO `file_post`
				(
				`post_name`,
				`opis`,
				`id_school`,
				`year`,
				`id_subject`,
				`id_person`,
				`type`,
				`date`
				)
				VALUES
				('".$_POST['post_name']."',
				'".$_POST['opis']."',
				".$_POST['id_school'].",
				".$_POST['year'].",
				".$_POST['id_subject'].",
				".$_POST['id_person'].",
				'".$type."',
				'".$date."')";

				// echo $sql;die;
				mysqli_query($link, $sql);

				$sql = "SELECT MAX(id_file_post) as id_file_post FROM file_post;";

				$row = mysqli_fetch_assoc(mysqli_query($link, $sql));

				$name = 'file_'.$row['id_file_post'];
				
			    $tempFile = $_FILES['file']['tmp_name'];                      
			      
			    $targetPath = $storeFolder . '\\'; 
			     
			    $targetFile =  $targetPath. $name . '.' .$type;
			 
			    move_uploaded_file($tempFile,$targetFile);
			     
			}
		}
	}
?>