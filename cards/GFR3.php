<?php 
include_once('header.php');  
?>

<script>
  var cardImage = "../CardImages/GFR3.jpg"; 
</script>

    <!-- Card Container -->
    <div class="editor mt-1 mb-1" id="editor" style="width: 450px;height: 370px;display: flex;flex-direction: row; margin: auto;overflow: hidden;">
      <div class="image-container" style="position: absolute;width: 450px;height: 370px;overflow:hidden;">
        <img class="cardImage"src="../CardImages/GFR3.jpg" alt="Example Image" style="width: 100%;height: 100%;"/>
        <div class="text-overlay" style="top: 120px; left: 170px;">
          <div class="text"  style=" top: 120px; left: 170px;font-size:24px; font-weight: bold; font-family: Great Vibes; text-align: left; color: red; text-transform:normal; font-style:normal; " contenteditable>Dear Friend!</div>
        </div>
        <div class="text-overlay" style="top: 170px; left: 120px;">
          <div class="text"  style=" top: 170px; left: 120px;font-size:26px; font-weight: bold; font-family: Great Vibes; text-align: left; color: purple;  text-transform:normal; font-style:normal;" contenteditable>Happy Frindship Day!</div>
        </div>
        <div class="text-overlay" style="top: 230px; left: 170px;">
          <div class="text"  style=" top: 230px; left: 170px;font-size:20px; font-weight: bold; font-family: Great Vibes; text-align: left; color: red;  text-transform:normal; font-style:normal;" contenteditable>Best Wishes</div>
        </div>
      </div>

    </div>
    <!-- Card Container End -->

</main><!-- End #main -->

<?php 
include_once('footer.php');  
?>


