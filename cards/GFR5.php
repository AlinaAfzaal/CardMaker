<?php 
include_once('header.php');  
?>

<script>
  var cardImage = "../CardImages/GFR5.webp"; 
</script>

    <!-- Card Container -->
    <div class="editor mt-1 mb-1" id="editor" style="width: 450px;height: 370px;display: flex;flex-direction: row; margin: auto;overflow: hidden;">
      <div class="image-container" style="position: absolute;width: 450px;height: 370px;overflow:hidden;">
        <img class="cardImage"src="../CardImages/GFR5.webp" alt="Example Image" style="width: 100%;height: 100%;"/>
        <div class="text-overlay" style="top: 30px; left: 80px;">
          <div class="text"  style=" top: 30px; left: 80px;font-size:38px; font-weight: bold; font-family: Great Vibes; text-align: left; color: red; text-transform:normal; font-style:normal; " contenteditable>Hey Dear Friend!</div>
        </div>
        <div class="text-overlay" style="top: 80px; left: 60px;">
          <div class="text"  style=" top: 80px; left: 60px;font-size:34px; font-weight: normal; font-family: Great Vibes; text-align: left; color: orange;  text-transform:normal; font-style:normal;" contenteditable>Happy Friendship Day!</div>
        </div>
        <div class="text-overlay" style="top: 140px; left: 150px;">
          <div class="text"  style=" top: 140px; left: 150px;font-size:15px; font-weight: normal; font-family: Chivo Mono; text-align: left; color: orange; text-transform:normal; font-style:normal; " contenteditable>“Truly great friends are hard to find, difficult to leave, and impossible to forget.”</div>
        </div>
        <div class="text-overlay" style="top: 280px; left: 190px; " >
          <div class="text" contenteditable style=" top: 280px; left: 190px; font-size:15px; font-weight: bold; font-family: Chivo Mono; text-align: left; color: black; text-transform:none; font-style:normal;">Just wanted to write and tell you I've been thinking about you!</div>
        </div>
      </div>

    </div>
    <!-- Card Container End -->

</main><!-- End #main -->

<?php 
include_once('footer.php');  
?>


