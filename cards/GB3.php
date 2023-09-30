<?php 
include_once('header.php');  
?>

<script>
  var cardImage = "../CardImages/GB3.jpg"; 
</script>

    <!-- Card Container -->
    <div class="editor mt-1 mb-1" id="editor" style="width: 450px;height: 370px;display: flex;flex-direction: row; margin: auto;overflow: hidden;">
      <div class="image-container" style="position: absolute;width: 450px;height: 370px;overflow:hidden;">
        <img class="cardImage"src="../CardImages/GB3.jpg" alt="Example Image" style="width: 100%;height: 100%;"/>
        <div class="text-overlay" style="top: 100px; left: 140px;">
          <div class="text"  style=" top: 100px; left: 140px;font-size:34px; font-weight: normal; font-family: Great Vibes; text-align: left; color: Pink; text-transform:normal; font-style:normal; " contenteditable>Dear Friend!</div>
        </div>
        <div class="text-overlay" style="top: 170px; left: 120px;">
          <div class="text"  style=" top: 170px; left: 120px;font-size:34px; font-weight: normal; font-family: Great Vibes; text-align: left; color: blue;  text-transform:normal; font-style:normal;" contenteditable>Happy Birthday</div>
        </div>
        <div class="text-overlay" style="top: 240px; left: 170px;">
          <div class="text"  style=" top: 240px; left: 170px;font-size:24px; font-weight: normal; font-family: Great Vibes; text-align: left; color: orange;  text-transform:normal; font-style:normal;" contenteditable>Best Wishes</div>
        </div>
      </div>

    </div>
    <!-- Card Container End -->

</main><!-- End #main -->

<?php 
include_once('footer.php');  
?>


