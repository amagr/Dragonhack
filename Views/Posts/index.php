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
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>Some text..</p>
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
              <p contenteditable="true" class="w3-border w3-padding">Input your search term(searching name and description)</p>
              <button type="button" class="w3-button w3-theme">Search</button> 
            </div>
            <div class="w3-container w3-padding">
              <div style="width: 100%; display: flex; margin-right: 5px;">

                <select style="width: 30%; margin-right: 5px;" id="school">
                    <option value='0'>All schools</option>
                  <?php foreach($schools as $school){ ?>
                    <option value='<?php echo $school['id_school']; ?>'><?php echo $school['name'] ?></option>
                  <?php } ?>
                </select>
                <select style="width: 30%; margin-right: 5px;" id="year">
                  <option value='0'>All years</option>
                  <?php $i = 0; for($i=1;$i<5;$i++){ ?>
                    <option value=<?php echo $i; ?>><?php echo $i ?></option>
                  <?php } ?>
                </select>
                <select style="width: 30%; margin-right: 5px;" id="subject">
                  <option value="0" selected="selected">All subjects</option>
                  <?php foreach($subjects as $subject){ ?>
                    <option value="<?php echo $subject['id_subject']; ?>"><?php echo $subject['name'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="tag_showing" style="text-align: center"></div>
    <div class="posts" style=""><br>
    </div>
</div>    <!-- Right Column -->
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
      json = <?php echo $json?>;
      tags = json['tags'];
      console.log(tags);
      subject = json['subject'];
      year = json['year'];
      school = json['school'];
      if(typeof tags == "undefined"){
        tags = 0;
      }
      if(typeof subject == "undefined"){
        subject = 0;
      }
      if(typeof year == "undefined"){
        year = 0;
      }    
      if(typeof school == "undefined"){
        school = 0;
      }      
      append_posts();
      function append_posts(){
        console.log(subject);
          $.ajax({
            url: "?param1=common-ajax",
            dataType: "json",
            method: 'POST',
            type: 'json',
            data: {
              action : 'sort-posts',
              tags : tags,
              subject : subject,
              school : school,
              year : year,
            },
            success: function (data) {
              $('.posts').empty();

              html = '';
              $.each(data.obj, function(key, value) {
              if ((value.year)) {
                value.year = '<span style="font-size: 20px;"> &rarr; </span>'+ value.year+'. year';
              }else{
                value.year = '';
              }
              if (!(typeof value.subject_name === "undefined")) {
                value.subject_name = '<span style="font-size: 20px;"> &rarr; </span>'+ value.subject_name;
              } else{
                value.subject_name = '';
              }
              if ((value.school_name)) {
              }else{
                value.school_name = '';
              }
              html += '<div class="w3-container w3-card w3-white w3-round w3-margin posts" style="padding-bottom: 60px;"><br>'+
                 '<div style="height: 50px;"><strong>'+value.school_name+value.subject_name+value.year+'</strong></div>'+
                 '<img src="/w3images/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">'+
                 '<span class="w3-right w3-opacity">'+value.date_parsed+'</span>'+
                 '<h4>'+value.nickname+'</h4><br>'+
                 '<hr class="w3-clear">'+
                 '<p>'+value.opis+'</p>'+
                 '<button data-id_post = "'+value.id_file_post+'" type="button" class="like w3-button w3-theme-d1 w3-margin-bottom" style="width: 100%"><i class="fa fa-thumbs-up"> '+value.like_count+'</i></button>'+ 
                 '<button  type="button" class="w3-button w3-theme-d2 w3-margin-bottom" style="width: 100%"><i class="fa fa-comment"></i>  Comment</button>';
                  html +='<div style="width: 100%; display: flex">';
                 $.each(value['tags'], function(key1, tag) {
                     html+= '<span class="tag" data-tag="'+tag+'" style="padding: 10px;'+
                     'background-color: #97b5c4 !important; margin-left: 10px;">'+tag+'</span>';
                  });
                 html+='</div>'+
                  '</div>';

              });
              $('.posts').append(html);
              append_tag();
            },
        });
        function append_tag(){
          $('#tag_showing').empty();
          if(tags){
            $('#tag_showing').append('<h3>Choosen tag is: '+tags+'</h3>');
            window.scrollTo(0, 0);
          }
        }
        $(document).on( "change", "#school", function() {
          school = $(this).val();
          append_posts();
        });
        $(document).on( "change", "#year", function() {
          year = $(this).val();
          append_posts();
        });
        $(document).on( "change", "#subject", function() {
          subject = $(this).val();
          append_posts();
        });
        $(document).on( "click", ".tag", function() {
          tags = $(this).attr("data-tag")
          append_posts();
        });
      }
</script>