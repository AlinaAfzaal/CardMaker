<?php 
include_once('header.php');  
?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false" style="margin-bottom: 65px; ">
  <div class="carousel-inner">
    <div class="carousel-item active">

    <!-- Card Container -->
    <div class="editor mt-1 mb-1" id="editor1" style="width: 450px;height: 300px;display: flex;flex-direction: row; margin: auto;overflow: hidden;">
      <div class="image-container" style="position: absolute;width: 450px;height: 300px;overflow:hidden;">
        <img class="cardImage" src="../CardImages/visitingcard1.jpg" alt="Example Image" style="width: 100%;height: 100%;"/>
        <div class="text-overlay" style="top: 100px; left: 50px;">
          <div class="text draggable"  style=" top: 100px; left: 50px;font-size:14px; font-weight: normal; font-family: Arial; text-align: center; color: white; text-transform:none; font-style:normal; " contenteditable>Main Bazar Lalamusa Distinct Gujrat Kharia</div>
        </div>
        <div class="text-overlay" style="top: 130px; left: 50px;">
          <div class="text draggable"  style=" top: 130px; left: 50px;font-size:14px; font-weight: normal; font-family: Arial; text-align: center; color: white;  text-transform:normal; font-style:normal;" contenteditable>+92-34656666</div>
        </div>
        <div class="text-overlay" style="top: 150px; left: 50px;">
          <div class="text draggable"  style=" top: 150px; left: 50px;font-size:14px; font-weight: normal; font-family: Arial; text-align: center; color: white; text-transform:normal; font-style:normal; " contenteditable>+92-34656666</div>
        </div>
        <div class="text-overlay" style="top: 250px; left: 120px; " >
          <div class="text draggable" contenteditable style=" top: 250px; left: 120px; font-size:19px; font-weight: normal; font-family: Verdana; text-align: left; color: red; text-transform:none; font-style:normal;">www.mycompany.com
          </div>
        </div>
      </div>
    </div>



    <!-- Card Container End -->    </div>
    <div class="carousel-item">
    <!-- Card Container -->
    <div class="editor mt-1 mb-1" id="editor2" style="width: 450px;height: 300px;display: flex;flex-direction: row; margin: auto;overflow: hidden;">
      <div class="image-container" style="position: absolute; width: 450px;height: 300px;overflow:hidden;">
        <img class="cardImage"src="../CardImages/visitingcard1.jpg" alt="Example Image" style="width: 100%;height: 100%;"/>
        
        <div class="text-overlay" style="top: 150px; left: 150px; " >
          <div class="text draggable" contenteditable style=" top: 150px; left: 150px; font-size:19px; font-weight: normal; font-family: Verdana; text-align: left; color: yellow; text-transform:none; font-style:normal;">alina@gmail.com
        </div>
        </div>
      </div>

    </div>
    <!-- Card Container End -->    </div>
  
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" >
    <span class="carousel-control-prev-icon" aria-hidden="true"  style="background-color:#e03a3c;"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="color: red;">
    <span class="sr-only">Next</span>
    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color:#e03a3c;"></span>
  </a>
</div>


</main><!-- End #main -->

<?php 
include_once('footer.php');  
?>


