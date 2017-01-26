<?php
require('flagcontroller.php');
mustLogin();
?>
<!DOCTYPE html>
<!--
Capture The Flag hosted by Anwesha IITP 2017.
-->
<html>
    <head>
        <title>CAPTURE THE FLAG</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/quest.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/bootstrap.css">
         <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
        
       $(function () {
        $('#form1').on('submit', function (e) {

          e.preventDefault();
          console.log($('#form1').serialize());

          $.ajax({
            type: 'post',
            url: 'submit.php',
            data: $('#form1').serialize(),
            success: function (response) {
                var result = $.trim(response);
                 $("#flagresponse").show();
                if(result.includes("Flag Accepted!")){
                 //    location.href="/quest.html"
                 $('#flagresponse').css({ 'color': 'green'});
                } else {

                 $('#flagresponse').css({ 'color': 'red'});
                }
                $('#flagresponse').text(result);
                setTimeout(function() {
                    $("#flagresponse").hide('slow');
                }, 3000);
              console.log(response);
              
            }
          });

        });

         $.ajax({
            type: 'get',
            url: 'getscores.php',
            success: function (data) {
              data=jQuery.parseJSON(data);
              console.log(data);

              for (var i = 0; i < data.length; i++) {
                if(data[i][1]){
                  $("#but_"+(i+1)).css("background-color","green");
                  $("#but_"+(i+1)).css("background-blend-mode","multiply");
                  console.log("> "+(i+1));
                }
                var str = "Mission "+(1+i)+" ("+data[i][0]+")";
                $("#but_"+(i+1)).text(str);
                $("#but_"+(i+1)).attr("onmouseout",'this.innerHTML=\''+str+'\'');
                  
              
              };
              
            }
          });

      });

    </script>
    </head>
    <body>
        <div class="Site-top">
            <div class="container">
                <h2>Capture the Flag</h2>
            </div>
            <div class="logout">
                <button type="button" onclick="location.href='logout.php'">Logout</button>
            </div>
            <!-- adding welcome for person -->
            </div> 
        <div class="list">
                <nav class="navbar navbar-inverse">
                  <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <a href="quest.php" style="text-decoration: none"><li ><b>Home </b></li></a>
                      <a href="rules.html" style="text-decoration: none"><li><b>Rules</b></li></a>
                      <a href="leaderboard.html" style="text-decoration: none"><li><b>Leaderboard</b></li></a>
                      <a href="https://www.facebook.com/ctfiitp/" target="_blank"  style="text-decoration: none"><li><b>DiscussionForum</b></li></a>
                    </ul>
                  </div>
                </nav>
        </div>
        
        <div class="body-area">
            <center>Programmers love Whole Number</center><br><br>
            <center style='color:black;background-color:white'>Note : Score of Mission 7 is cleared (0000 hrs 27th Jan), Please try it again </center><br>
                    <div class="col-sm-6" >
                      <?php
                      for ($i=1; $i <= 8 ; $i+=2) { 
                        echo '<a target="_blank" href="missions/'.$i.'/"><button type="button" id="but_'.$i.'" class="left" onmouseover="this.innerHTML=\'Click ME!\'" onmouseout="this.innerHTML=\'Mission '.$i.'\'"><span> Mission '.$i.' </span></button></a>';
                      }
                      ?>
                     </div>
                    <div class="col-sm-right-6" id="right">
                        <?php
                      for ($i=2; $i <= 8 ; $i+=2) { 
                        echo '<a target="_blank" href="missions/'.$i.'/"><button type="button" id="but_'.$i.'" class="right" onmouseover="this.innerHTML=\'Click ME!\'" onmouseout="this.innerHTML=\'Mission '.$i.'\'"><span> Mission '.$i.' </span></button></a>';
                      }
                      ?>
                    </div>
                <div class="col-sm-right-5" id="submission">
                    <form id="form1">
                        <span id='flagresponse' style='color:red;font-size: 0.7em;'></span><br>
                        <button type="submit">Submit</button> 
                        <input type="text" placeholder="Enter Flag" class="mytext" maxlength="60" style="height: 30px" name="flag" required>                 
                    </form>
            </div>
        </div>
        <div class='footer'>
            <p>@Anwesha 2017</p>
        </div>
    </body>
</html>
