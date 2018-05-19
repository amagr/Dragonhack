<?php include "Views/Layout/upper.php" ?>

<?php include "Views/Layout/header.php" ?>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
	<div class="container" style="width: 60%; margin-left: auto; margin-right: auto;">

		<input type="text" name = "post_name" id="post_name" class="form-control" placeholder="Post name" required autofocus><br>
		<!-- <input type="text" name = "opis" id="opis" class="form-control" placeholder="Description"><br> -->
		<select id="school" name="school">
			<option value="0">No school</option>
			<?php while($row = mysqli_fetch_assoc($schools)) { ?>
				<option value="<?=$row['id_school']?>"><?=$row['name']?></option>
			<?php } ?>
		</select>
		<div id="year">
		</div>
		<div id="smer"> </div>
		<button name = "register" class="btn btn-lg btn-primary btn-block" type="submit">Register</button>

		<form action="/?param1=file-upload" class="dropzone" id="my-awesome-dropzone">
			<input type="hidden" name="id_subject" value="4">
			<input type="hidden" name="id_person" value="3">
			<input type="hidden" name="post_name" value="Test">
			<input type="hidden" name="opis" value="se en test">
			<input type="hidden" name="id_school" value="4">
			<input type="hidden" name="year" value="3">
		</form>
	</div>
</div>

<script type="text/javascript">
Dropzone.options.myAwesomeDropzone = {
  paramName: "file", 
  maxFilesize: 10,
  accept: function(file, done) {
    console.log("dela");

    done();
  }
};
</script>

<?php include "Views/Layout/Lower.php" ?>