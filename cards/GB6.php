<?php 
include_once('header.php');  
?>

<script>
  var cardImage = "../CardImages/GB6.jpg"; 
</script>

    <!-- Card Container -->
    <div class="editor mt-1 mb-1" id="editor" style="width: 450px;height: 370px;display: flex;flex-direction: row; margin: auto;overflow: hidden;">
      <div class="image-container" style="position: absolute;width: 450px;height: 370px;overflow:hidden;">
        <img class="cardImage"src="../CardImages/GB6.jpg" alt="Example Image" style="width: 100%;height: 100%;"/>
        
        <div class="text-overlay" style="top: 50px; left: 200px;">
          <div class="text"  style=" top: 50px; left: 200px;font-size:34px; font-weight: normal; font-family: Dancing Script; text-align: left; color: brown; text-transform:normal; font-style:normal; " contenteditable>Happy Birthday!</div>
        </div>
        <div class="text-overlay" style="top: 120px; left: 195px;">
          <div class="text"  style=" top: 120px; left: 195px;font-size:15px; font-weight: normal; font-family: Chivo Mono; text-align: left; color: brown;  text-transform:normal; font-style:normal;" contenteditable>Lot of best wishes to you.</div>
        </div>
        <div class="text-overlay" style="top: 140px; left: 190px; " >
          <div class="text" contenteditable style=" top: 140px; left: 190px; font-size:15px; font-weight: normal; font-family: Chivo Mono; text-align: left; color: brown; text-transform:none; font-style:normal;">I hope the birthday of the one i Love is the happiest!</div>
        </div>
        <div class="text-overlay" style="top: 240px; left: 40px; " >
          <div class="text" contenteditable style=" top: 240px; left: 40px; font-size:35px; font-weight: normal; font-family: Great Vibes; text-align: left; color: brown; text-transform:none; font-style:normal;">Don't count the candles, enjoy your day. Champ!</div>
        </div>
      </div>
    </div>
    <!-- Card Container End -->

</main><!-- End #main -->

<?php 
include_once('footer.php');  
?>


