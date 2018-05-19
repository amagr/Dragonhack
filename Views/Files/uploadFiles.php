<?php include "Views/Layout/upper.php" ?>

<?php include "Views/Layout/header.php" ?>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">

	<form action="/?param1=file-upload" class="dropzone" id="my-awesome-dropzone">
		<input type="hidden" name="id_subject" value="4">
		<input type="hidden" name="id_person" value="3">
		<input type="hidden" name="post_name" value="Test">
		<input type="hidden" name="opis" value="se en test">
		<input type="hidden" name="id_school" value="4">
		<input type="hidden" name="year" value="3">
	</form>
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