<?php 
	class TagsModel {
		public function getTags($link, $term) {
			// echo $term; die;
			$sql = mysqli_query($link, "SELECT * FROM tag where name_tag like '%".$term."%'");

			$rez = array();
	        while($row = mysqli_fetch_assoc($sql)){
	        	// print_r($row);
	            $rez[] = $row;
	        }

	        $exists = false;
	        for ($i=0; $i < count($rez); $i++) { 
	        	if ($rez[$i]['name_tag'] == $term) {
	        		$exists = true;
	        		break;
	        	}
	        }

	        if (!$exists) {
		        $rez[] = [
		        	"id_tag" => -1,
		        	"name_tag" => "Dodaj: ".$term,
		        ]; 
	        }

			return $rez;
		}

		public function addTag($link, $tag) {
			$sql = "INSERT INTO `tag`
					(
					`name_tag`
					)
					VALUES
					('".$tag."')";

					mysqli_query($link, $sql);
		}
	}
?>