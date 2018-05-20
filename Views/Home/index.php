<?php include "Views/Layout/upper.php" ?>

<?php include "Views/Layout/header.php" ?>

<!-- <body class="w3-theme-l5"> -->

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
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
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <p contenteditable="true" class="w3-border w3-padding search_term">Input your search term(searching name and description)</p>
              <input type="submit" id="search_submit" style="width: 100%"  class="w3-button w3-theme" value="Search"> 
            </div>
          </div>
        </div>
      </div>
      <div style="text-align: center">
        <h3>Your interests</h3>
      </div>
      <?php foreach($feed as $post){ ?>
        <?php 
        $disable = '';
        if($post['is_like']){
          $disable = 'disabled title="You have already liked that"';
        }
        ?>
        <div class="w3-container w3-card w3-white w3-round w3-margin" style="padding-bottom: 60px;"><br>
          <?php
            $yr = ' ';
            if(isset($post['year'])){
              $yr = ' <span style="font-size: 20px;">&rarr;</span>   '.$post['year'].'. year ';
            }
            if(isset($post['subject_name'])){
              $post['subject_name'] = '<span style="font-size: 20px;"> &rarr; </span>  '.$post['subject_name'];
            }
          ?>
          <div style="height: 50px;"><strong><?php echo $post['school_name'].$yr.$post['subject_name']; ?></strong></div>
          <img src="/w3images/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
          <span class="w3-right w3-opacity"><?php echo $post['date_parsed'] ?></span>
          <h4><?php echo $post['nickname'] ?></h4><br>
          <h3><?php echo $post['post_name'] ?></h3>
          <hr class="w3-clear">
            <p><?php echo $post['opis'] ?></p>
          <button <?php echo $disable; ?> data-id_post = "<?php echo $post['id_file_post'];?>" type="button" class="like w3-button w3-theme-d1 w3-margin-bottom" style="width: 100%"><i class="fa fa-thumbs-up"> <?php echo $post['like_count'] ?></i></button> 
          <a href="files/others/file_<?php echo $post['id_file_post'].'.'.$post['type']; ?>" download><button  type="button" class="w3-button w3-theme-d2 w3-margin-bottom" style="width: 100%"><i class="fa fa-download"></i> Download</button></a>
          <div style="width: 100%" >
            <?php foreach($post['tags'] as $tag){?>
              <a style="text-decoration: none;" href='/?param1=posts&param2={%20"tags": "<?php echo $tag ?>"}#'>
                <span style="padding: 10px;
              background-color: #97b5c4 !important; margin-left: 10px;">
                <?php if($tag) echo $tag; ?>
                </span>
              </a>
            <?php  } ?>
          </div> 
        </div>
      <!-- End Middle Column -->
      <?php } ?>

    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Upcoming Events:</p>
          <img src="/w3images/forest.jpg" alt="Forest" style="width:100%;">
          <p><strong>Holiday</strong></p>
          <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
        </div>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Friend Request</p>
          <img src="/w3images/avatar6.png" alt="Avatar" style="width:50%"><br>
          <span>Jane Doe</span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
          </div>
        </div>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
        <p>ADS</p>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

<?php include "Views/Layout/Lower.php" ?>
<script>
    $(document).on( "click", ".like", function() {
      var id_post_file = $(this).attr("data-id_post");
      btn = $(this);
        $.ajax({
            url: "?param1=common-ajax",
            dataType: "json",
            method: 'POST',
            type: 'json',
            data: {
              action : 'add-like',
              id_post_file : id_post_file,
              id_person : <?php echo $user_id; ?>
            },
            success: function (data) {
              var likes = parseInt(btn.find('i').html());
              btn.find('i').html(" "+(likes+1));
              btn.prop("disabled", true);
            },
        });
    });

    $('#myInterests').hide();
    $('#newInterestContainer').hide();

    $('#changeInterest').on('click', function() {
      e.preventDefault();
      $('#newInterestContainer').toggle();      
    });

    $('#search_submit').on('click', function(e) {
      let term = $('.search_term').text();
      window.location.href = "/?param1=home&param2="+term;

    });
    // $('#interest_type').on('change', function(e) {
    //   var type
    //   console.log()
    // });

    function expandInterests() {
      $('#myInterests').toggle();

    }
</script>