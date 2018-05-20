<?php include "Views/Layout/upper.php" ?>
		<div class="container" style="width: 40%; margin-left: auto; margin-right: auto;">
			<form class="form-register" method="post">
				<input type="text" name = "username" id="inputUsername" class="form-control" placeholder="Username" required autofocus><br>
				<input type="text" name = "e-mail" id="inputEmail" class="form-control" placeholder="Email" required autofocus><br>
				<input type="password" name = "password" id="inputPassword" class="form-control" placeholder="Password" required><br>
				<input type="password" name = "" id="inputPasswordRepeat" class="form-control" placeholder=" Repeat password" required><br>
				<select id="school" name="school" style="margin-bottom: 10px;">
					<option value="0">No school</option>
					<?php while($row = mysqli_fetch_assoc($schools)) { ?>
						<option value="<?=$row['id_school']?>"><?=$row['name']?></option>
					<?php } ?>
				</select>
				<div id="year">
				</div>
				<div id="smer"> </div>
				<button name = "register" class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
			</form>
	    </div>
<?php include "Views/Layout/lower.php" ?>
<script>
    $(document).on( "change", "#school", function() {
    	var school_id = $( "#school option:selected" ).val();
        $.ajax({
            url: "?param1=common-ajax",
            dataType: "json",
            method: 'POST',
            type: 'json',
            data: {
            	action : 'get-programs-by-school',
                school_id :school_id,
            },
            success: function (data) {
              	$('#select_smer').remove();
            	var html = '';
            	html += '<select style="margin-bottom: 10px;" id ="select_smer" name="smer">'
            	html += '<option value = "0"> No program </option>'
                $.each(data.obj, function( index, value ) {
	            	html += '<option value = "'+value.smer+'"> '+value.smer+' </option>'
                });
              	$('#smer').append(html);

              	$('#select_year').remove();
              	html = '<select style="margin-bottom: 10px;" id ="select_year" name="year">';
				for (i = 1; i <= 4; i++) { 
            		html += '<option value = "'+i+'"> '+i+' year </option>'
            	}
              	$('#year').append(html);
            },
        });
    });
</script>