<?php 
include_once('header.php');  
?>

<script>
  var cardImage = "../CardImages/GFR7.webp"; 
</script>

    <!-- Card Container -->
    <div class="editor mt-1 mb-1" id="editor" style="width: 450px;height: 370px;display: flex;flex-direction: row; margin: auto;overflow: hidden;">
      <div class="image-container" style="position: absolute;width: 450px;height: 370px;overflow:hidden;">
        <img class="cardImage"src="../CardImages/GFR7.webp" alt="Example Image" style="width: 100%;height: 100%;"/>
        <div class="text-overlay" style="top: 70px; left: 80px;">
          <div class="text"  style=" top: 70px; left: 80px;font-size:44px; font-weight: bold; font-family: Great Vibes; text-align: left; color: red; text-transform:normal; font-style:normal; " contenteditable>Dear Friend!</div>
        </div>
        <div class="text-overlay" style="top: 120px; left: 60px;">
          <div class="text"  style=" top: 120px; left: 60px;font-size:15px; font-weight: normal; font-family: Arial; text-align: left; color: purple;  text-transform:normal; font-style:normal;" contenteditable>Flowers of friendship and kindness never fade.</div>
        </div>
        <div class="text-overlay" style="top: 160px; left: 100px;">
          <div class="text"  style=" top: 160px; left: 100px;font-size:20px; font-weight: normal; font-family: Dancing Script; text-align: left; color: green;  text-transform:normal; font-style:normal;" contenteditable>Thank you for being my friend.</div>
        </div>
      </div>

    </div>
    <!-- Card Container End -->

</main><!-- End #main -->

<?php 
include_once('footer.php');  
?>


