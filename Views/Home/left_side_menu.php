<div class="w3-card w3-round w3-white">
    <div class="w3-container">
     <h4 class="w3-center">My Profile</h4>
     <p class="w3-center"><img src="/w3images/avatar3.png" class="" style="height:106px;width:106px" alt="Avatar"></p>
     <hr>
     <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_SESSION['user_nickname']; ?></p>
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
      <div id="Demo2" class="w3-hide w3-container">
        <p>Some other text..</p>
      </div>
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
      <p>Most Popular Tags</p>
      <p>
        <?php foreach($tags as $tag){?>
          <a href='/?param1=posts&param2={%20"tags": "<?php echo $tag['name_tag'] ?>"}#'><span class="w3-tag w3-small w3-theme-d5"><?php echo $tag['name_tag']; ?>
            </span></a>
          </span>
        <?php } ?>
      </p>
    </div>
  </div>
  <br>
  
  <!-- Alert Box -->

