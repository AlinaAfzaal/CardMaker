<?php 
include_once('header.php');  
?>

<script>
  var cardImage = "../CardImages/visitingcard1.jpg"; 
</script>

    <!-- Card Container -->
    <div class="editor mt-1 mb-1" id="editor" style="width: 450px;height: 300px;display: flex;flex-direction: row; margin: auto;overflow: hidden;">
      <div class="image-container" style="position: absolute;width: 450px;height: 300px;overflow:hidden;">
        <img class="cardImage"src="../CardImages/visitingcard1.jpg" alt="Example Image" style="width: 100%;height: 100%;"/>
        <div class="text-overlay" style="top: 100px; left: 50px;">
          <div class="text"  style=" top: 100px; left: 50px;font-size:14px; font-weight: normal; font-family: Arial; text-align: center; color: white; text-transform:normal; font-style:normal; " contenteditable>Main Bazar Lalamusa Distinct Gujrat Kharia</div>
        </div>
        <div class="text-overlay" style="top: 130px; left: 50px;">
          <div class="text"  style=" top: 130px; left: 50px;position: absolute;font-size:14px; font-weight: normal; font-family: Arial; text-align: center; color: white;  text-transform:normal; font-style:normal;" contenteditable>+92-34656666</div>
        </div>
        <div class="text-overlay" style="top: 150px; left: 50px;">
          <div class="text"  style=" top: 150px; left: 50px;font-size:14px; font-weight: normal; font-family: Arial; text-align: center; color: white; text-transform:normal; font-style:normal; " contenteditable>+92-34656666</div>
        </div>
        <div class="text-overlay" style="top: 250px; left: 120px; " >
          <div class="text" contenteditable style=" top: 250px; left: 120px; font-size:19px; font-weight: normal; font-family: Verdana; text-align: left; color: red; text-transform:none; font-style:normal;">www.mycompany.com
          </div>
        </div>
      </div>

    </div>
    <!-- Card Container End -->

</main><!-- End #main -->

<?php 
include_once('footer.php');  
?>


