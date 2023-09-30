<?php 
include_once('header.php');  
?>

<script>
  var cardImage = "../CardImages/GB4.jpg"; 
</script>

    <!-- Card Container -->
    <div class="editor mt-1 mb-1" id="editor" style="width: 450px;height: 370px;display: flex;flex-direction: row; margin: auto;overflow: hidden;">
      <div class="image-container" style="position: absolute;width: 450px;height: 370px;overflow:hidden;">
        <img class="cardImage"src="../CardImages/GB4.jpg" alt="Example Image" style="width: 100%;height: 100%;"/>
        
        
        <div class="text-overlay" style="top: 80px; left: 220px;">
          <div class="text"  style=" top: 80px; left: 220px;font-size:34px; font-weight: normal; font-family: Great Vibes; text-align: left; color: green; text-transform:normal; font-style:normal; " contenteditable>Dear Friend!</div>
        </div>
        <div class="text-overlay" style="top: 150px; left: 200px;">
          <div class="text"  style=" top: 130px; left: 200px;font-size:30px; font-weight: normal; font-family: Great Vibes; text-align: left; color: blue;  text-transform:normal; font-style:normal;" contenteditable>Happy Birthday</div>
        </div>
        <div class="text-overlay" style="top: 200px; left: 190px;">
          <div class="text"  style=" top: 200px; left: 190px;font-size:24px; font-weight: normal; font-family: arial; text-align: left; color: blue;  text-transform:normal; font-style:normal;" contenteditable>May Allah blessyou</div>
        </div>
        <div class="text-overlay" style="top: 250px; left: 230px;">
          <div class="text"  style=" top: 250px; left: 230px;font-size:24px; font-weight: normal; font-family: Great Vibes; text-align: left; color: orange;  text-transform:normal; font-style:normal;" contenteditable>Best Wishes</div>
        </div>
      </div>

    </div>
    <!-- Card Container End -->

</main><!-- End #main -->

<?php 
include_once('footer.php');  
?>


