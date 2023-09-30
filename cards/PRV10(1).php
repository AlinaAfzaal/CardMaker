<?php 
include_once('header.php');  
?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false" style="margin-bottom: 65px; ">
  <div class="carousel-inner">
    <div class="carousel-item active">

    <!-- Card Container -->
    <div class="editor mt-1 mb-1" id="editor1" style="width: 450px;height: 300px;display: flex;flex-direction: row; margin: auto;overflow: hidden;">
      <div class="image-container" style="position: absolute;width: 450px;height: 300px;overflow:hidden;">
        <img class="cardImage"src="../CardImages/PRV10(2).webp" alt="Example Image" style="width: 100%;height: 100%;"/>
        <div class="text-overlay" style="top: 80px; left: 70px;">
          <div class="text draggable"  style=" top: 80px; left: 70px;font-size:14px; font-weight: bold; font-family: Arial; text-align: left; color: orange; text-transform:normal; font-style:normal; " contenteditable>Org. Name: </div>
        </div>
        <div class="text-overlay" style="top: 80px; left: 170px;">
          <div class="text draggable"  style=" top: 80px; left: 170px;font-size:14px; font-weight: normal; font-family: Arial; text-align: left; color: orange; text-transform:normal; font-style:normal; " contenteditable>GIMS University</div>
        </div>
        <div class="text-overlay" style="top: 110px; left: 70px; " >
          <div class="text draggable" contenteditable style=" top: 110px; left: 70px; font-size:14px; font-weight: bold; font-family: Verdana; text-align: left; color: orange; text-transform:none; font-style:normal;">Email: </div>
        </div>
        <div class="text-overlay" style="top: 110px; left: 170px; " >
          <div class="text draggable" contenteditable style=" top: 110px; left: 170px; font-size:14px; font-weight: normal; font-family: Verdana; text-align: left; color: orange; text-transform:none; font-style:normal;">gims77@gmail.com</div>
        </div>
        <div class="text-overlay" style="top: 140px; left: 70px; " >
          <div class="text draggable" contenteditable style=" top: 140px; left: 70px; font-size:14px; font-weight: bold; font-family: Verdana; text-align: left; color: orange; text-transform:none; font-style:normal;">Website: </div>
        </div>
        <div class="text-overlay" style="top: 140px; left: 170px; " >
          <div class="text draggable" contenteditable style=" top: 140px; left: 170px; font-size:14px; font-weight: normal; font-family: Verdana; text-align: left; color: orange; text-transform:none; font-style:normal;">www.ariduni.com</div>
        </div>
        <div class="text-overlay" style="top: 170px; left: 70px; " >
          <div class="text draggable" contenteditable style=" top: 170px; left: 70px; font-size:14px; font-weight: bold; font-family: Verdana; text-align: left; color: orange; text-transform:none; font-style:normal;">Phone no.: </div>
        </div>
        <div class="text-overlay" style="top: 170px; left: 170px; " >
          <div class="text draggable" contenteditable style=" top: 170px; left: 170px; font-size:14px; font-weight: normal; font-family: Verdana; text-align: left; color: orange; text-transform:none; font-style:normal;">+92-3997389732</div>
        </div>
        <div class="text-overlay" style="top: 200px; left: 70px; " >
          <div class="text draggable" contenteditable style=" top: 200px; left: 70px; font-size:14px; font-weight: bold; font-family: Verdana; text-align: left; color: orange; text-transform:none; font-style:normal;">Iss. Date: </div>
        </div>
        <div class="text-overlay" style="top: 200px; left: 170px; " >
          <div class="text draggable" contenteditable style=" top: 200px; left: 170px; font-size:14px; font-weight: normal; font-family: Verdana; text-align: left; color: orange; text-transform:none; font-style:normal;">01\01\2015</div>
        </div>
        <div class="text-overlay" style="top: 230px; left: 70px; " >
          <div class="text draggable" contenteditable style=" top: 230px; left: 70px; font-size:14px; font-weight: bold; font-family: Verdana; text-align: left; color: orange; text-transform:none; font-style:normal;">Exp.Date: </div>
        </div>
        <div class="text-overlay" style="top: 230px; left: 170px; " >
          <div class="text draggable" contenteditable style=" top: 230px; left: 170px; font-size:14px; font-weight: normal; font-family: Verdana; text-align: left; color: orange; text-transform:none; font-style:normal;">01\01\2025</div>
        </div>

      </div>

    </div>
    <!-- Card Container End -->    </div>
    <div class="carousel-item">

    <!-- Card Container -->
    <div class="editor mt-1 mb-1" id="editor" style="width: 450px;height: 300px;display: flex;flex-direction: row; margin: auto;overflow: hidden;">
      <div class="image-container" style="position: absolute;width: 450px;height: 300px;overflow:hidden;">
        <img class="cardImage"src="../CardImages/PRV10(1).jpeg" alt="Example Image" style="width: 100%;height: 100%;"/>
        <div class="text-overlay" style="top: 70px; left: 40px;">
          <div class="text draggable"  style=" top: 70px; left: 40px;font-size:70px; font-weight: bold; font-family: Great Vibes; text-align: left; color: orange; text-transform:none; font-style:normal; " contenteditable>Visitor</div>
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


