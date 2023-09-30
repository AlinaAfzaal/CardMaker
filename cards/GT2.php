<?php 
include_once('header.php');  
?>

<script>
  var cardImage = "../CardImages/GT2.jpg"; 
</script>

    <!-- Card Container -->
    <div class="editor mt-1 mb-1" id="editor" style="width: 450px;height: 370px;display: flex;flex-direction: row; margin: auto;overflow: hidden;">
      <div class="image-container" style="position: absolute;width: 450px;height: 370px;overflow:hidden;">
        <img class="cardImage"src="../CardImages/GT2.jpg" alt="Example Image" style="width: 100%;height: 100%;"/>
        <div class="text-overlay" style="top: 130px; left: 140px;">
          <div class="text"  style=" top: 130px; left: 140px;font-size:34px; font-weight: normal; font-family: Great Vibes; text-align: left; color: Pink; text-transform:normal; font-style:normal; " contenteditable>Dear Friend!</div>
        </div>
        <div class="text-overlay" style="top: 170px; left: 120px;">
          <div class="text"  style=" top: 170px; left: 120px;font-size:30px; font-weight: normal; font-family: Great Vibes; text-align: left; color: red;  text-transform:normal; font-style:normal;" contenteditable>Thank You so much</div>
        </div>
        <div class="text-overlay" style="top: 220px; left: 130px;">
          <div class="text"  style=" top: 220px; left: 130px;font-size:24px; font-weight: normal; font-family: Great Vibes; text-align: left; color: pink;  text-transform:normal; font-style:normal;" contenteditable>For attending party</div>
        </div>
      </div>

    </div>
    <!-- Card Container End -->

</main><!-- End #main -->

<?php 
include_once('footer.php');  
?>


