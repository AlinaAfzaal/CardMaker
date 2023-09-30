<?php 
include_once('header.php');  
?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false" style="margin-bottom: 65px; ">
  <div class="carousel-inner">
    <div class="carousel-item active">

    <!-- Card Container -->
    <div class="editor mt-1 mb-1" id="editor1" style="width: 450px;height: 300px;display: flex;flex-direction: row; margin: auto;overflow: hidden;">
      <div class="image-container" style="position: absolute;width: 450px;height: 300px;overflow:hidden;">
        <img class="cardImage"src="../CardImages/PRE10(1).png" alt="Example Image" style="width: 100%;height: 100%;"/>
        
        <div class="text-overlay" style="top: 80px; left: 170px;">
          <div class="text draggable"  style=" top: 80px; left: 170px;font-size:14px; font-weight: normal; font-family: Arial; text-align: left; color: blue; text-transform:none; font-style:normal; " contenteditable> 0020328398293</div>
        </div>
        <div class="text-overlay" style="top: 110px; left: 170px;">
          <div class="text draggable"  style=" top: 110px; left: 170px;font-size:14px; font-weight: normal; font-family: Arial; text-align: left; color: blue; text-transform:none; font-style:normal; " contenteditable> www.OVEXtec.com</div>
        </div>
        <div class="text-overlay" style="top: 150px; left: 170px; " >
          <div class="text draggable" contenteditable style=" top: 150px; left: 170px; font-size:14px; font-weight: normal; font-family: Verdana; text-align: left; color: blue; text-transform:none; font-style:normal;">Kotla Arab ALi Khan, Gujrat</div>
        </div>
      </div>

    </div>
    <!-- Card Container End -->    </div>
    <div class="carousel-item">

    <!-- Card Container -->
    <div class="editor mt-1 mb-1" id="editor" style="width: 450px;height: 300px;display: flex;flex-direction: row; margin: auto;overflow: hidden;">
      <div class="image-container" style="position: absolute;width: 450px;height: 300px;overflow:hidden;">
        <img class="cardImage"src="../CardImages/PRE10(2).jpeg" alt="Example Image" style="width: 100%;height: 100%;"/>
        <div class="text-overlay" style="top: 130px; left: 100px;">
          <div class="text draggable"  style=" top: 130px; left: 100px;font-size:24px; font-weight: bold; font-family: Chivo Mono; text-align: left; color: Blue; text-transform:none; font-style:normal; " contenteditable>Ovex Technologies</div>
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


