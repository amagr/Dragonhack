<?php include "Views/Layout/upper.php" ?>

<?php include "Views/Layout/header.php" ?>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
	<div class="container" style="width: 60%; margin-left: auto; margin-right: auto;">

		<input type="text" name = "post_name" id="post_name" class="form-control" placeholder="Post name" required autofocus><br>
		<!-- <input type="text" name = "opis" id="opis" class="form-control" placeholder="Description"><br> -->
		<p contenteditable="true" name="opis" id="opis" style="background-color: white" class="w3-border w3-padding"></p>
		
		<select style="margin-bottom: 15px;" id="id_school" name="school">
			<option value="0">No school</option>
			<?php while($row = mysqli_fetch_assoc($schools)) { ?>
				<option value="<?=$row['id_school']?>"><?=$row['name']?></option>
			<?php } ?>
		</select>
		
		<select style="margin-bottom: 15px;" id="year" name="year">
			<option value="0">No year</option>
			<?php for ($i = 1; $i <= 4; $i++) {  ?>
				<option value = "<?=$i?>"> <?=$i?> year </option>
			<?php } ?>
		</select>

		<select style="margin-bottom: 15px;" id="id_subject" name="subject">
			<option value="0">No subject</option>
			<?php while($row = mysqli_fetch_assoc($subjects)) { ?>
				<option value="<?=$row['id_subject']?>"><?=$row['name']?></option>
			<?php } ?>
		</select>

		<form action="/?param1=file-upload" class="dropzone" id="my-awesome-dropzone">
			<input type="hidden" name="id_subject_hidden" id="id_subject_hidden" value="-1">
			<!-- <input type="hidden" name="id_person_hidden" id="id_person_hidden" value="3"> -->
			<input type="hidden" name="post_name_hidden" id="post_name_hidden" value="">
			<input type="hidden" name="opis_hidden" id="opis_hidden" value="">
			<input type="hidden" name="id_school_hidden" id="id_school_hidden" value="-1">
			<input type="hidden" name="year_hidden" id="year_hidden" value="">
		</form>
	</div>
</div>

<script type="text/javascript">

// $('#my-awesome-dropzone').hide();

Dropzone.options.myAwesomeDropzone = {
  paramName: "file", 
  maxFilesize: 10,
  accept: function(file, done) {
    console.log("dela");

    done();
  }
};

$('#post_name').on('keyup', function(e) {
	var val = $(this).val();
	$('#post_name_hidden').val(val);
});

$('#opis').on('keyup', function(e) {
	var val = $(this).html();
	$('#opis_hidden').val(val);
});

$('#id_school').on('change', function(e) {
	var val = $(this).val();
	console.log(val);
	$('#id_school_hidden').val(val);
});

$('#year').on('change', function(e) {
	var val = $(this).val();
	console.log(val);
	$('#year_hidden').val(val);
});

$('#id_subject').on('change', function(e) {
	var val = $(this).val();
	console.log(val);
	$('#id_subject_hidden').val(val);

	// $('#my-awesome-dropzone').show();
});


</script>

<?php include "Views/Layout/Lower.php" ?>