<?php 
include_once('header.php');  
?>

<script>
  var cardImage = "../CardImages/GM6.webp"; 
</script>

    <!-- Card Container -->
    <div class="editor mt-1 mb-1" id="editor" style="width: 450px;height: 370px;display: flex;flex-direction: row; margin: auto;overflow: hidden;">
      <div class="image-container" style="position: absolute;width: 450px;height: 370px;overflow:hidden;">
        <img class="cardImage"src="../CardImages/GM6.webp" alt="Example Image" style="width: 100%;height: 100%;"/>
        <div class="text-overlay" style="top: 20px; left: 100px;">
          <div class="text"  style=" top: 20px; left: 50px;font-size:44px; font-weight: normal; font-family: Great Vibes; text-align: left; color: white; text-transform: normal; font-style:normal;" contenteditable>Dear Friend!</div>
        </div>
        <div class="text-overlay" style="top: 100px; left: 80px;">
          <div class="text"  style=" top: 100px; left: 80px;font-size:24px; font-weight: normal; font-family: Chivo Mono; text-align: left; color: white;  text-transform:normal; font-style:normal;" contenteditable>CONGRATULATIONS!</div>
        </div>
        <div class="text-overlay" style="top: 150px; left: 50px;">
          <div class="text"  style=" top: 150px; left: 50px;font-size:14px; font-weight: normal; font-family: Cambria; text-align: left; color: white; text-transform:normal; font-style:normal; " contenteditable>A lot of best wishes to you. May Allah bless you.</div>
        </div>
        <div class="text-overlay" style="top: 280px; left: 80px; " >
          <div class="text" contenteditable style=" top: 280px; left: 80px; font-size:19px; font-weight: normal; font-family: Chivo Mono; text-align: left; color: red; text-transform:none; font-style:normal;">Hope to see you soon</div>
        </div>
      </div>

    </div>
    <!-- Card Container End -->

</main><!-- End #main -->

<?php 
include_once('footer.php');  
?>


