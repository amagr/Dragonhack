<?php 
	class HomeModel {
		public function getPerson($link,$id_person) {

			$sql = "SELECT P.*, Pr.*, S.* FROM person P
				JOIN program Pr ON (P.id_program = Pr.id_program)
				JOIN school S ON (Pr.id_school = S.id_school)
				WHERE id_person = ".$id_person;
			$sql_query = mysqli_query($link,$sql);
			$person_data = mysqli_fetch_assoc($sql_query);
			return $person_data;
		}
		public function getFeed($link,$user_id,$interest,$term) {
			$year = $interest['year'];
			$subject = $interest['id_subject'];
			$school = $interest['id_school'];
			$where = '';
			if($year){
				$where .= "AND FP.year = ".$year." ";
			}
			if($subject){
				$where .= "AND FP.id_subject = ".$subject." ";
			}
			if($school){
				$where .= "AND FP.id_school = ".$school." ";
			}
			if($term){
				$where .= "AND (FP.opis LIKE '%".$term."%' || FP.post_name LIKE '%".$term."%' ) ";
			}
			$sql = "SELECT FP.*, DATE_FORMAT(FP.date, '%d.%m.%Y') as date_parsed, P.nickname, S.name as subject_name,SO.name as school_name,
			(
			SELECT count(*) from like_logs WHERE id_post_file = FP.id_file_post LIMIT 1
			) as like_count,
			(SELECT GROUP_CONCAT(CONCAT(name_tag) SEPARATOR ';') as points FROM tag_on_files WHERE id_file_post = FP.id_file_post) as names,
			(SELECT count(*) from like_logs WHERE id_post_file = FP.id_file_post AND id_person = ".$user_id." LIMIT 1) as is_like
			FROM file_post FP
			JOIN person P on (FP.id_person = P.id_person)
			LEFT JOIN subject S on (FP.id_subject = S.id_subject)
			LEFT JOIN school SO on (FP.id_school = SO.id_school)
			WHERE 1=1  ".$where."
			order by FP.id_file_post DESC";
			//echo $sql; die;
		    $sql_query = mysqli_query($link,$sql);
	        $rez = array();
	        while($row = mysqli_fetch_assoc($sql_query)){
	            $rez[] = $row;
	        }
	        return $rez;
		}
		public function getInterestsWithNames($link, $user_id) {
			$sql = "SELECT MI.*, S.* FROM my_interests MI
				JOIN school S ON (MI.id_school = S.id_school)
				WHERE MI.id_person = ".$user_id;
			$sql_query = mysqli_query($link,$sql);
			$school_interest = mysqli_fetch_assoc($sql_query);

			$sql = "SELECT MI.*, S.* FROM my_interests MI
				JOIN Subject S ON (MI.id_subject = S.id_subject)
				WHERE MI.id_person = ".$user_id;
			$sql_query = mysqli_query($link,$sql);
			$subject_interest = mysqli_fetch_assoc($sql_query);

			$sql = "SELECT year FROM my_interests
				WHERE id_person = ".$user_id;
			$sql_query = mysqli_query($link,$sql);
			$year_interest = mysqli_fetch_assoc($sql_query);

			$interests = [];

			if ($school_interest) {
				$interests['school']['name'] = $school_interest['name'];
				$interests['school']['id_school'] = $school_interest['id_school'];
			}

			if ($subject_interest) {
				$interests['subject']['name'] = $subject_interest['name'];
				$interests['subject']['id_subject'] = $subject_interest['id_subject'];
			}

			if ($year_interest['year'] > 0) {
				$interests['year']['name'] = $year_interest['year']. ". year";
				$interests['year']['id_year'] = $year_interest['year'];
			}

			// print_r($interests);die;

			return $interests;
		}

		public function changeInterest($link) {
			// print_r($_POST);die;
			$id_school = $_POST['school'];
			$id_subject = $_POST['subject'];
			$year = $_POST['year'];

			$sql = "UPDATE my_interests
					SET id_school = ".$id_school.", id_subject = ".$id_subject.", year = ".$year."
					WHERE id_person = ".$_SESSION['user_id'].";";

			mysqli_query($link, $sql);
			
		}

		public function getInterest($link,$user_id) {
			$sql = "SELECT * FROM my_interests
					WHERE id_person = ".$user_id." LIMIT 1";
		    $sql_query = mysqli_query($link,$sql);
			$row = mysqli_fetch_assoc($sql_query);
			return $row;		    
		}
		public function add_like($link){
		  
		    $id_person = intval($_POST['id_person']);
			$id_post_file = intval($_POST['id_post_file']);
			
			$sql = "INSERT INTO `like_logs`
				(
				`id_person`,
				`id_post_file`)
				VALUES
				(".$id_person.",
				".$id_post_file.")";
			mysqli_query($link,$sql);
		}
	}
?>