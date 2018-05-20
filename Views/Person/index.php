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
      <?php include "Views/Home/left_side_menu.php" ?>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div style="text-align: center">
        <h3>Your interests</h3>
      </div>
      <?php foreach ($posts as $post) { ?>
        <?php 
        $disable = '';
        if($post['is_like']){
          $disable = 'disabled title="You have already liked that"';
        }
        ?>
        <div class="w3-container w3-card w3-white w3-round w3-margin" style="padding-bottom: 60px;"><br>
          <?php
            $yr = ' ';
            if(isset($post['year']) && $post['year'] != 0){
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

    $('#changeInterest').on('click', function(e) {
      e.preventDefault();
      $('#newInterestContainer').toggle();      
    });

    function expandInterests() {
      $('#myInterests').toggle();

    }
</script>