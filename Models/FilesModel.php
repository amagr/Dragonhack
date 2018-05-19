<?php 
	class FilesModel {
		public function upload($link) {
			$storeFolder = 'files\\others';  

			// print_r($_POST);die;
 
			if (!empty($_FILES)) {
				$type = explode("/", $_FILES['file']['type']);
				$type = $type[count($type)-1];

				$date = date('Y-m-d');

				$id_person = $_SESSION['user_id'];

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
				('".$_POST['post_name_hidden']."',
				'".$_POST['opis_hidden']."',
				".$_POST['id_school_hidden'].",
				".$_POST['year_hidden'].",
				".$_POST['id_subject_hidden'].",
				".$id_person.",
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