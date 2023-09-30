<?php 
include_once('header.php');  
?>

<script>
  var cardImage = "../CardImages/GT3.jpg"; 
</script>

    <!-- Card Container -->
    <div class="editor mt-1 mb-1" id="editor" style="width: 450px;height: 370px;display: flex;flex-direction: row; margin: auto;overflow: hidden;">
      <div class="image-container" style="position: absolute;width: 450px;height: 370px;overflow:hidden;">
        <img class="cardImage"src="../CardImages/GT3.jpg" alt="Example Image" style="width: 100%;height: 100%;"/>
        <div class="text-overlay" style="top: 100px; left: 150px;">
          <div class="text"  style=" top: 100px; left: 150px;font-size:44px; font-weight: bold; font-family: Great Vibes; text-align: left; color: purple; text-transform:normal; font-style:normal; " contenteditable>Hello!</div>
        </div>
        <div class="text-overlay" style="top: 170px; left: 30px;">
          <div class="text"  style=" top: 170px; left: 30px;font-size:25px; font-weight: normal; font-family: Dancing Script; text-align: left; color: purple;  text-transform:normal; font-style:normal;" contenteditable>“My heart just keeps thanking you and thanking you.”</div>
        </div>
      </div>

    </div>
    <!-- Card Container End -->

</main><!-- End #main -->

<?php 
include_once('footer.php');  
?>


