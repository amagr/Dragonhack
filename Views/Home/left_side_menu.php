<div class="w3-card w3-round w3-white">
    <div class="w3-container">
     <h4 class="w3-center">My Profile</h4>
     <p class="w3-center"><img src="/w3images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
     <hr>
     <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Designer, UI</p>
     <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p>
     <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>
    </div>
  </div>
  <br>
  
  <!-- Accordion -->
  <div class="w3-card w3-round">
    <div class="w3-white">
      <button onclick="expandInterests()" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Interests</button>
      <div id="myInterests" class="w3-container">
          <?php if(isset($interests['school'])) { ?>
            <p><?php echo $interests['school']['name']; ?> </p>
          <?php } ?>

          <?php if(isset($interests['year'])) { ?>
            <p><?php echo $interests['year']['name']; ?> </p>
          <?php } ?>

          <?php if(isset($interests['subject'])) { ?>
            <p><?php echo $interests['subject']['name']; ?> </p>
          <?php } ?>

        <p>(<a href="#" id="changeInterest">change</a>)</p>
        <div id="newInterestContainer" class="w3-container">
          <form class="form-register" method="post">
            <select style="margin-bottom: 15px;" id="id_school" name="school">
              <option value="0">No school</option>
              <?php while($row = mysqli_fetch_assoc($schools)) { ?>
                <option <?= (isset($interests['school']) && $interests['school']['id_school'] == $row['id_school']) ? 'selected' : '' ?> value="<?=$row['id_school']?>"><?=$row['name']?></option>
              <?php } ?>
            </select>
            
            <select style="margin-bottom: 15px;" id="year" name="year">
              <option value="0">No year</option>
              <?php for ($i = 1; $i <= 4; $i++) {  ?>
                <option <?= (isset($interests['year']) && $interests['year']['id_year'] == $i) ? 'selected' : '' ?> value = "<?=$i?>"> <?=$i?> year </option>
              <?php } ?>
            </select>

            <select style="margin-bottom: 15px;" id="id_subject" name="subject">
              <option value="0">No subject</option>
              <?php while($row = mysqli_fetch_assoc($subjects)) { ?>
                <option <?= (isset($interests['subject']) && $interests['subject']['id_subject'] == $row['id_subject']) ? 'selected' : '' ?> value="<?=$row['id_subject']?>"><?=$row['name']?></option>
              <?php } ?>
            </select>
            <button name = "changeInterest" class="btn btn-sm btn-primary btn-block" type="submit">Change</button>
          </form>
        </div>
      </div>
      <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
      <div id="Demo2" class="w3-hide w3-container">
        <p>Some other text..</p>
      </div>
      <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
      <div id="Demo3" class="w3-hide w3-container">
     <div class="w3-row-padding">
     <br>
       <div class="w3-half">
         <img src="/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
       </div>
       <div class="w3-half">
         <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
       </div>
       <div class="w3-half">
         <img src="/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
       </div>
       <div class="w3-half">
         <img src="/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
       </div>
       <div class="w3-half">
         <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
       </div>
       <div class="w3-half">
         <img src="/w3images/fjords.jpg" style="width:100%" class="w3-margin-bottom">
       </div>
     </div>
      </div>
    </div>      
  </div>
  <br>
  
  <!-- Interests --> 
  <div class="w3-card w3-round w3-white w3-hide-small">
    <div class="w3-container">
      <p>Interests</p>
      <p>
        <span class="w3-tag w3-small w3-theme-d5">News</span>
        <span class="w3-tag w3-small w3-theme-d4">W3Schools</span>
        <span class="w3-tag w3-small w3-theme-d3">Labels</span>
        <span class="w3-tag w3-small w3-theme-d2">Games</span>
        <span class="w3-tag w3-small w3-theme-d1">Friends</span>
        <span class="w3-tag w3-small w3-theme">Games</span>
        <span class="w3-tag w3-small w3-theme-l1">Friends</span>
        <span class="w3-tag w3-small w3-theme-l2">Food</span>
        <span class="w3-tag w3-small w3-theme-l3">Design</span>
        <span class="w3-tag w3-small w3-theme-l4">Art</span>
        <span class="w3-tag w3-small w3-theme-l5">Photos</span>
      </p>
    </div>
  </div>
  <br>
  
  <!-- Alert Box -->
  <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
    <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
      <i class="fa fa-remove"></i>
    </span>
    <p><strong>Hey!</strong></p>
    <p>People are looking at your profile. Find out who.</p>
  </div>